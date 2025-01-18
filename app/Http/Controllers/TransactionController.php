<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Cart as CartModel;
use App\Models\Transaction as TransactionModel;
use App\Models\Delivery as DeliveryModel;
use App\Models\TransactionDetail as TransactionDetailModel;
use App\Models\Product as ProductModel;
use Midtrans\Snap;
use Midtrans\Config;

class TransactionController extends Controller
{
    public function show(){
        $user = Auth::user();

        $carts = CartModel::where('user_id', $user->id)->with('product')->get();

        $products = CartModel::where('user_id', $user->id)->get();

        $totalPrice = $products->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        $redeemPoints = session('redeem_points', 0);
        $discount = session('redeem_discount', 0);

        $grandtotal = ($totalPrice - $discount) + 10000;
        
        return view('ecowise.checkout', compact('carts', 'totalPrice', 'user', 'grandtotal', 'discount'));
    }

    public function change_address(Request $request){
        $delivery = $request->validate([
            'delivery_name' => 'required|string|max:255',
            'delivery_phone' => 'required|string|regex:/^08[0-9]{8,13}$/',
            'delivery_address' => 'required|string|max:500',
        ]);
    
        session([
            'delivery_name' => $delivery['delivery_name'],
            'delivery_phone' => $delivery['delivery_phone'],
            'delivery_address' => $delivery['delivery_address'],
        ]);
    
        return redirect()->back();
    }

    public function create(Request $request){
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $user = Auth::user();
        $deliveryName = session('delivery_name', auth()->user()->name);
        $deliveryPhone = session('delivery_phone', auth()->user()->phone);
        $deliveryAddress = session('delivery_address', auth()->user()->address);

        $delivery = DeliveryModel::firstOrCreate([
            'name' => $deliveryName,
            'phone' => $deliveryPhone,
            'address' => $deliveryAddress,
        ]);

        $products = CartModel::where('user_id', auth()->user()->id)->get();
        $totalPrice = $products->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        $redeemPoints = session('redeem_points', 0);
        $discount = session('redeem_discount', 0);

        $grandtotal = max(0, $totalPrice + 10000 - $discount);

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $grandtotal,
            ],
            'customer_details' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
        ];
        
        $snapToken = Snap::getSnapToken($params);

        $transaction = TransactionModel::create([
            'user_id' => auth()->id(),
            'status' => 'Unpaid',
            'subtotal' => $totalPrice,
            'total' => $grandtotal,
            'delivery_id' => $delivery->id,
            'snap_token' => $snapToken
        ]);

        foreach($products as $product){
            $item = ProductModel::findOrFail($product['product_id']);

            if ($item->stock < $product['quantity']) {
                throw new \Exception("Insufficient stock for product: {{$product->name}}");
            }

            $item->stock -= $product['quantity'];
            $item->sold += $product['quantity'];
            $item->save();

            TransactionDetailModel::create([
                'quantity' => $product->quantity,
                'transaction_id' => $transaction->id,
                'product_id' => $item->id,
            ]);
        }
        $points = 0;
        foreach($products as $product){
            $points += $product->quantity*5;
        }
        
        if ($redeemPoints > 0) {
            $user->earth_star -= $redeemPoints;
        }
        $user->earth_star += $points;
        $user->save();

        CartModel::where('user_id', auth()->id())->delete();

        session()->forget(['delivery_name', 'delivery_phone', 'delivery_address', 'redeem_points', 'redeem_discount']);

        return view('layout.success');
    }

    public function show2($id){
        $user = Auth::user();

        $product = ProductModel::findOrFail($id);

        $totalPrice = $product->price;

        $redeemPoints = session('redeem_points', 0);
        $discount = session('redeem_discount', 0);

        $grandtotal = ($totalPrice - $discount) + 10000;

        $quantity = 1;
        
        return view('ecowise.checkout2', compact('product', 'totalPrice', 'user', 'grandtotal', 'quantity', 'discount'));
    }

    public function create2(Request $request, $id){
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $user = Auth::user();

        $deliveryName = session('delivery_name', auth()->user()->name);
        $deliveryPhone = session('delivery_phone', auth()->user()->phone);
        $deliveryAddress = session('delivery_address', auth()->user()->address);

        $delivery = DeliveryModel::firstOrCreate([
            'name' => $deliveryName,
            'phone' => $deliveryPhone,
            'address' => $deliveryAddress,
        ]);

        $product = ProductModel::findOrFail($id);

        $totalPrice = $product->price;

        $redeemPoints = session('redeem_points', 0);
        $discount = session('redeem_discount', 0);

        $grandtotal = max(0, $totalPrice + 10000 - $discount);

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $grandtotal,
            ],
            'customer_details' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
        ];
        
        $snapToken = Snap::getSnapToken($params);

        $transaction = TransactionModel::create([
            'user_id' => auth()->id(),
            'status' => 'Unpaid',
            'subtotal' => $totalPrice,
            'total' => $grandtotal,
            'delivery_id' => $delivery->id,
            'snap_token' => $snapToken
        ]);

        if($product->stock < 1){
            throw new \Exception("Insufficient stock for product: {{$product->name}}");
        }
        $product->stock -= 1;
        $product->sold += 1;
        $product->save();
        
        TransactionDetailModel::create([
            'quantity' => 1,
            'transaction_id' => $transaction->id,
            'product_id' => $product->id,
        ]);

        if ($redeemPoints > 0) {
            $user->earth_star -= $redeemPoints;
        }
        $user->earth_star += 5;
        $user->save();

        session()->forget(['delivery_name', 'delivery_phone', 'delivery_address', 'redeem_points', 'redeem_discount']);

        return view('layout.success');
    }

    public function history(Request $request){
        $user = Auth::user();

        $sortOrder = $request->input('sort', 'desc');

        $transactions = TransactionModel::where('user_id', $user->id)
        ->orderBy('created_at', $sortOrder)
        ->get();

        foreach($transactions as $transaction){
            $transaction->distinct = TransactionDetailModel::where('transaction_id', $transaction->id)->distinct('product_id')->count('product_id');
        }

        return view('ecowise.transaction', compact('transactions', 'sortOrder'));
    }

    public function detail($id){

        $transaction = TransactionModel::with(['delivery'])->findOrFail($id);
        $delivery = $transaction->delivery; 

        $details = TransactionDetailModel::with(['transaction', 'product'])->where('transaction_id', $id)->get();
   
        return view('ecowise.transactiondetail', compact('details', 'transaction', 'delivery'));
    }

    public function history2(Request $request){
        $sortOrder = $request->input('sort', 'desc');

        $transactions = TransactionModel::orderBy('created_at', $sortOrder)
        ->get();

        foreach($transactions as $transaction){
            $transaction->distinct = TransactionDetailModel::where('transaction_id', $transaction->id)->distinct('product_id')->count('product_id');
        }

        return view('ecowise.alltransaction', compact('transactions', 'sortOrder'));
    }

    public function redeem(Request $request)
{
    $request->validate([
        'points' => 'required|integer|min:50',
    ]);

    $user = Auth::user();
    $pointsToUse = $request->input('points');

    if ($pointsToUse > $user->earth_star) {
        return redirect()->back()->withErrors(['points' => 'You do not have enough points to redeem this amount.'])
                                 ->with('modal', 'redeemModal');
    }

    $discount = $pointsToUse * 100;

    session([
        'redeem_points' => $pointsToUse,
        'redeem_discount' => $discount,
    ]);

    return redirect()->back();
}

    public function success($id){

        $transaction = TransactionModel::findOrFail($id);
        $transaction->status  = 'Paid';
        $transaction->save();

        return view('layout.paid');
    }

    public function filter(Request $request){

        $filter = $request->query('filter', 'all');
        if($filter == 'all'){
            $transactions = TransactionModel::latest()->get();
        }
        elseif ($filter === 'paid') {
            $transactions = TransactionModel::where('status', 'Paid')->latest()->get();
        } 
        elseif ($filter === 'unpaid') {
            $transactions = TransactionModel::where('status', 'Unpaid')->latest()->get();
        } 

        return view('ecowise.alltransaction', compact('transactions'));
    }

    public function filter2(Request $request){

        $filter = $request->query('filter', 'all');
        if($filter == 'all'){
            $transactions = TransactionModel::latest()->get();
        }
        elseif ($filter === 'paid') {
            $transactions = TransactionModel::where('status', 'Paid')->latest()->get();
        } 
        elseif ($filter === 'unpaid') {
            $transactions = TransactionModel::where('status', 'Unpaid')->latest()->get();
        } 

        return view('ecowise.transaction', compact('transactions'));
    }

}
