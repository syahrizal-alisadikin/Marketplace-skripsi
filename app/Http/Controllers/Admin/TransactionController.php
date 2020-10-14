<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.admin.transaction');
    }

    public function detail()
    {
        return view('pages.admin.transaction-detail');
    }
}
