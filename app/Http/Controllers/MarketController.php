<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class MarketController extends Controller
{
    public function index()
    {
        $categories = Category::take(6)->get();
        $products   = Product::with('galleries')->take(8)->get();
        // dd($products);
        return view('pages.home', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function check(Request $request)
    {
        return User::where('email', $request->email)->count() > 0 ? 'Unavailable' : 'Available';
    }
}
