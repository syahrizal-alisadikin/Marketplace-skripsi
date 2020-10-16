<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Superadmin\ProductGalleryRequest;
use App\Models\User;
use App\Models\ProductGallery;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Image;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $product = ProductGallery::with(['product']);
            // dd($product);
            return DataTables::of($product)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                        type="button"
                                        data-toggle="dropdown"> Aksi 
                                </button>
                               <div class="dropdown-menu">
                               
                                <form action="' . route('product-gallery.destroy', $item->id) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger">
                                    Hapus
                                    </button>
                               </div>
                            </div>
                        </div>
                        
                        ';
                })
                ->editColumn('photos', function ($item) {
                    return $item->photos ? '<img src="' . url('product/' . $item->photos) . '" style="max-width:100px;" />' : '';
                })
                ->rawColumns(['action', 'photos'])
                ->make();
        }
        return view('pages.superadmin.product-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();


        return view('pages.superadmin.product-gallery.create', [
            'products' => $products,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request)
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

        return redirect()->route('product-gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProductGallery::findOrFail($id);
        $data->delete();

        return redirect()->route('product-gallery.index');
    }
}
