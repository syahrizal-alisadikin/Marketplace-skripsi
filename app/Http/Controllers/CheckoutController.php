<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{
    public function proccess(Request $request)
    {
        // Save User Data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // Proccess Checkout
        $code = 'STORE-' . mt_rand(00000, 99999);
        $carts = Cart::with(['product', 'user'])
            ->where('fk_user_id', $user->id)
            ->get();

        // Transaction Create
        $transaction = Transaction::create([
            'fk_user_id' => Auth::user()->id,
            'inscurence_price' => 0,
            'shiping_price' => 0,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code,
        ]);

        // TransactionDetail Create
        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(00000, 99999);
            TransactionDetail::create([
                'fk_transaction_id' => $transaction->id,
                'fk_product_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => 'PENDING',
                'resi' => '',
                'code' => $trx,
            ]);
        }

        // cart Delete Data
        Cart::where('fk_user_id', Auth::user()->id)->delete();

        // Config Midtrans
        
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
        // dd($serverKey);
        // Buat Aray untuk dikirim ke midtrans
        $midtrans = [
            "transaction_details" => [
                "order_id" => $code,
                "gross_amount" => (int) $request->total_price,
            ],
            "customer_details" => [
                "first_name" => Auth::user()->name,
                "email" => Auth::user()->email,
            ],
            "enabled_payments" => [
                "gopay", "indomaret", "bca_klikbca", "bank_transfer"
            ],
            "vtweb" => []
        ];
        // dd($paymentUrl);
        try {
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            // Get Snap Payment Page URL

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function callback()
    {
        // 
    }
}
