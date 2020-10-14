<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.admin.product');
    }

    public function create()
    {
        return view('pages.admin.product-create');
    }

    public function detail()
    {
        return view('pages.admin.product-detail');
    }
}
