<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product as ProductModel;

class SearchController extends Controller
{
    public function view(Request $request){
        $query = $request->input('query');

        $products = ProductModel::where('name', 'LIKE', "%{$query}%")
                ->paginate(8);

        return view('ecowise.search', compact(['products', 'query']));
    }
}
