<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index()
    {

        if (request()->ajax()) {
            $transaction = TransactionDetail::with(['transaction.user', 'product.galleries']);
            // dd($category);
            return DataTables::of($transaction)
                ->make();
        }

        return view('pages.superadmin.transaction.index');
    }
}
