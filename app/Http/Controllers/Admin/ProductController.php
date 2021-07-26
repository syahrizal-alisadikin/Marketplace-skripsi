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
use App\Models\Comment;
use Illuminate\Container\RewindableGenerator;
use Image;

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

    public function comment(Request $request)
    {

        // dd($request->all());
        Comment::create([
            'fk_user_id' => request()->fk_user_id,
            'fk_product_id' => request()->fk_product_id,
            'comment' => request()->comment,
        ]);

        $product = Product::with(['galleries', 'user'])->findOrFail(request()->fk_product_id);
        return redirect()->route('product-detail-user',$product->slug)->with('success','Komentar Success !!');
    }


    public function store(ProductRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $data['slug'] = Str::slug($request->name);
        $product = Product::create($data);

        // Create Galleri
        $gallery = new ProductGallery;
        $gallery->fk_product_id = $product->id;
        $image                  = $request->photos;
        $namafile = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, "auto", function ($constraint) {
            $constraint->aspectRatio();
        })->save('product/' . $namafile);
        $image->move('product-original/', $namafile);
        $gallery->photos             = $namafile;

        $gallery->save();

        return redirect()->route('dashboard-product');
    }

    public function detail($id)
    {
        $product = Product::with('galleries', 'category')->findOrFail($id);
        // dd($product);
        $categories = Category::all();
        return view('pages.admin.product-detail', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $data['slug'] = Str::slug($request->name);

        $item = Product::findOrFail($id);
        $item->update($data);

        return redirect()->route('dashboard-product');
    }

    public function uploadGallery(Request $request)
    {
        $gallery = new ProductGallery;
        $gallery->fk_product_id = $request->fk_product_id;
        $image                  = $request->photos;
        $namafile = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(500, "auto", function ($constraint) {
            $constraint->aspectRatio();
        })->save('product/' . $namafile);
        $image->move('product-original/', $namafile);
        $gallery->photos             = $namafile;

        $gallery->save();



        return redirect()->route('product-detail', $request->fk_product_id);
    }

    public function deleteGallery($id)
    {
        $data = ProductGallery::findOrFail($id);
        $data->delete();

        return redirect()->route('product-detail', $data->fk_product_id);
    }
}
