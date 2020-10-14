<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::take(6)->get();
        $products   = Product::with('galleries')->paginate(1);
        return view('pages.category', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $products   = Product::with('galleries')->where('fk_categories_id', $category->id)->paginate(2);
        // dd($products);
        return view('pages.category', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
