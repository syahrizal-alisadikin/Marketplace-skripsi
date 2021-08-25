<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Kuisioner;
use App\Models\Product;
use App\Models\User;
use Doctrine\DBAL\Schema\Visitor\Visitor;

class MarketController extends Controller
{
    public function index()
    {
        $categories = Category::take(6)->get();
        $products   = Product::with('galleries')->take(8)->get();
        // dd($products);
        return view('pages.home', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function check(Request $request)
    {
        return User::where('email', $request->email)->count() > 0 ? 'Unavailable' : 'Available';
    }

    public function kuisioner()
    {
        return view('pages.kuisioner');
    }

    public function Formkuisioner(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'phone'      => 'required',
            'email'     => 'required|email|unique:kuisioners',
        ]);

        Kuisioner::create([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'jk'    => $request->jk,
            'usia'  => $request->usia,
            'membeli' => $request->membeli,
            'cara'  => $request->cara,
            'harapan1'  => $request->harapan1,
            'harapan2'  => $request->harapan2,
            'harapan3'  => $request->harapan3,
            'harapan4'  => $request->harapan4,
            'harapan7'  => $request->harapan7,
            'harapan8'  => $request->harapan8,
            'harapan9'  => $request->harapan9,
            'harapan10'  => $request->harapan10,
            'harapan11'  => $request->harapan11,
        ]);

        return redirect()->route('kuis')->with('success','Terimakasih,'.$request->name. ' data telah dikirim!');
    }

    public function thanks()
    {
        return view('pages.thanks');
    }
}
