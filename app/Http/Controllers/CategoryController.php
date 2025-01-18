<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category as CategoryModel;

class CategoryController extends Controller
{
    public function view($id)
    {
        $category = CategoryModel::with(['products'])->findOrFail($id);
    
        return view('ecowise.category', compact('category'));
    }

}
