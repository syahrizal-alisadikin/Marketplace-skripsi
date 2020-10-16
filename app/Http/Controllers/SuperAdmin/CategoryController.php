<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Superadmin\CategoryRequest;
use Illuminate\Support\Str;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $category = Category::query();
            // dd($category);
            return DataTables::of($category)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                        type="button"
                                        data-toggle="dropdown"> Aksi 
                                </button>
                               <div class="dropdown-menu">
                                 <a class="dropdown-item" href="' . route('category.edit', $item->id) . '">Sunting</a>
                                <form action="' . route('category.destroy', $item->id) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger">
                                    Hapus
                                    </button>
                               </div>
                            </div>
                        </div>
                        
                        ';
                })
                ->editColumn('image', function ($item) {
                    return $item->photo ? '<img src="' . url('category/' . $item->photo) . '" style="max-width:100px;" />' : '';
                })
                ->rawColumns(['action', 'image'])
                ->make();
        }
        return view('pages.superadmin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.superadmin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // $data = $request->all();
        // // dd($data);
        // $data['slug'] = Str::slug($request->name);
        // $data['photo'] = $request->file('photo')->store('assets/category', 'public');

        // Category::create($data);
        $category = new Category;
        $category->name = $request->name;
        $category->slug = $request->name;
        $image                  = $request->photo;
        $namafile = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(500, "auto", function ($constraint) {
            $constraint->aspectRatio();
        })->save('category/' . $namafile);
        $image->move('category-original/', $namafile);
        $category->photo             = $namafile;

        $category->save();
        return redirect()->route('category.index');
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
        $category = Category::findOrFail($id);
        // dd($category);
        return view('pages.superadmin.category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {

        $item = Category::findOrFail($id);
        $filename       = $item->photo;
        if ($request->hasFile('photo')) {
            $filename   = Str::random(3) . $request->email . ".jpg";
            $file       =  $request->file('photo');
            Image::make($file)->resize(500, "auto", function ($constraint) {
                $constraint->aspectRatio();
            })->save('category/' . $filename);
            // unlink(base_path('public/akadbaiq/product/' . $data->image));
        }
        $item->update([
            'name'       => $request->name,
            'slug'          => $request->name,
            'photo'             => $filename,
        ]);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        return redirect()->route('category.index');
    }
}
