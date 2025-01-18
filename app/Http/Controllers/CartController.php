<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product as ProductModel;
use App\Models\Cart as CartModel;

class CartController extends Controller
{
    public function view(){
        $user = Auth::user();

        $carts = CartModel::where('user_id', $user->id)->with('product')->get();

        $products = CartModel::where('user_id', $user->id)->get();

        $totalPrice = $products->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        return view('ecowise.cart', compact('carts', 'totalPrice'));
    }

    public function add($id){
        $user = Auth::user();

        $product = ProductModel::find($id);

        $cart = CartModel::where('user_id', $user->id)->where('product_id', $product->id)->first();

        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            CartModel::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }
        return redirect()->back()->with('success', __('ecowise.product_added_cart_msg'));
    }

    public function update(Request $request, $id){
        $cart = CartModel::findOrFail($id);

        if ($request->action === 'increment') {
            $cart->quantity += 1;
        } elseif ($request->action === 'decrement' && $cart->quantity > 1) {
            $cart->quantity -= 1;
        }

        $cart->save();

        return redirect()->back();
    }

    public function destroy($id){
        $cart = CartModel::findOrFail($id);

        $cart->delete();

        return redirect()->back();
    }
}
