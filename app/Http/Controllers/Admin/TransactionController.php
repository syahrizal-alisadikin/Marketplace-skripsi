<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $selltransaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('product', function ($product) {
                $product->where('fk_user_id', Auth::user()->id);
            })->paginate(5);
        $buytransaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($product) {
                $product->where('fk_user_id', Auth::user()->id);
            })->paginate(5);

        return view('pages.admin.transaction', compact('selltransaction', 'buytransaction'));
    }

    public function detail($id)
    {
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->findOrFail($id);
        // dd($transaction);
        return view('pages.admin.transaction-detail', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = TransactionDetail::findOrFail($id);
        $transaction = Transaction::findOrFail($item->fk_transaction_id);
        if ($request->shipping_status == "SHIPPING") {
            $transaction->update([
                'transaction_status' => "SHIPING"
            ]);
        } elseif ($request->shipping_status == "SUCCESS") {
            $transaction->update([
                'transaction_status' => "SHIPING"
            ]);
        } else {
            $transaction->update([
                'transaction_status' => "PENDING"
            ]);
        }

        $item->update($data);
        return redirect()->route('dashboard-transaction-detail', $id);
    }
}
