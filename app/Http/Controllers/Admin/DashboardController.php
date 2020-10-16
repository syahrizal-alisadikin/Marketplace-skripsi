<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('product', function ($product) {
                $product->where('fk_user_id', Auth::user()->id);
            })->paginate(5);
        $transaction_count = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('product', function ($product) {
                $product->where('fk_user_id', Auth::user()->id);
            })->count();
        $revenue_transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('product', function ($product) {
                $product->where('fk_user_id', Auth::user()->id);
            });
        // dd($transaction);
        $revenue = $revenue_transaction->get()->reduce(function ($carry, $item) {
            return $carry + $item->price;
        });

        $customer = User::count();

        return view('pages.admin.dashboard', [
            'transaction_count' => $transaction_count,
            'transaction_data' => $transaction,
            'revenue' => $revenue,
            'customer' => $customer,
        ]);
    }
}
