<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $carts = Cart::with('product.galleries', 'user')->where('fk_user_id', $user_id)->get();
        // dd($carts);
        return view('pages.cart', compact('carts'));
    }

    public function deleteCart($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->route('cart');
    }

    public function success()
    {
        return view('pages.success');
    }

    public function register_success()
    {
        return view('auth.success');
    }
}
