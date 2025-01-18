<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product as ProductModel;

class DetailController extends Controller
{
    public function view($id){
        
        $product = ProductModel::with(['category'])->findOrFail($id);

        return view('ecowise.detail', compact('product'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $product = ProductModel::findOrFail($id);

        $product->stock = $validated['stock'];
        $product->save();
    
        return redirect()->back()->with('success', __('ecowise.stock_updated_msg'));
    }

    public function destroy($id){
        $product = ProductModel::findOrFail($id);

        $product->delete();

        return view('layout.deleted');
    }
}
