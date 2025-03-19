<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {

        $categories = Category::all();
        $categoryId = $request->input('category_id');
        if ($categoryId) {
            $products = Product::where('category_id', $categoryId)->get();
        } else {
            $products = Product::all();
        }

        return view('home.index', compact('products', 'categories'));
    }
}
