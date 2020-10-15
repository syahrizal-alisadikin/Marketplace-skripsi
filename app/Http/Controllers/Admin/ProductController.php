<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\Superadmin\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('galleries', 'category')->where('fk_user_id', Auth::user()->id)->get();
        // dd($products);
        return view('pages.admin.product', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.product-create', compact('categories'));
    }

    public function detail()
    {
        return view('pages.admin.product-detail');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $data['slug'] = Str::slug($request->name);
        $product = Product::create($data);
        $gallery = [
            'fk_product_id' => $product->id,
            'photos' => $request->file('photos')->store('assets/product', 'public')
        ];

        ProductGallery::create($gallery);

        return redirect()->route('dashboard-product');
    }
}
