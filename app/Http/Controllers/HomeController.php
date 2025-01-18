<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view()
    {
        if (!Auth::check()) {
            $products = ProductModel::orderBy('sold', 'desc')->paginate(8);
        }
        else{
            if(Auth::user()->roles == 'admin'){
                $products = ProductModel::orderBy('id', 'desc')->paginate(8);
            }
            else{
                $products = ProductModel::orderBy('sold', 'desc')->paginate(8);
            }
        }

        return view('ecowise.home', compact('products'));
    }

    public function add(Request $request){
        $product = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|integer|min:1000',
            'product_desc' => 'required|string|max:255',
            'product_stock' => 'required|integer|min:0',
            'product_category' => 'required|string',
        ]);

        $category = 0;
        if($product['product_category'] == 'personal_care'){
            $category = 1;
        }
        elseif($product['product_category'] == 'household'){
            $category = 2;
        }
        elseif($product['product_category'] == 'reusable'){
            $category = 3;
        }

        ProductModel::create([
            'name' => $product['product_name'],
            'price' => $product['product_price'],
            'desc' => $product['product_desc'],
            'stock' => $product['product_stock'],
            'sold' => 0,
            'image' => 0,
            'category_id' => $category,
        ]);

        return redirect()->back();
    }
}
