<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $product = Product::with(['galleries', 'user'])->where('slug', $slug)->firstOrFail();
        $comment = Comment::where('fk_product_id',$product->id)->with('user')->get();
        // dd($comment);
        return view('pages.detail', compact('product','comment'));
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
