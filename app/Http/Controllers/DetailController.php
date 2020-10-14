<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $product = Product::with(['galleries', 'user'])->where('slug', $slug)->firstOrFail();
        // dd($product);
        return view('pages.detail', compact('product'));
    }

    public function AddCart(Request $request, $id)
    {
        $data = [
            'fk_product_id' => $id,
            'fk_user_id' => Auth::user()->id
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }
}
