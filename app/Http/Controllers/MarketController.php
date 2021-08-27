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

    public function dataKuis()
    {
        $data = Kuisioner::all();
        $usia15 = Kuisioner::where('usia', 'like', '%'. 15 . '%')->count();
        $usia21 = Kuisioner::where('usia', 'like', '%'. 21 . '%')->count();
        $usia27 = Kuisioner::where('usia', 'like', '%'. 27 . '%')->count();
        $usia36 = Kuisioner::where('usia', 'like', '%'. 36 . '%')->count();
        $usia46 = Kuisioner::where('usia', 'like', '%'. 46 . '%')->count();
        $membeliCredit = Kuisioner::where('membeli','Credit')->count();
        $membeliCash = Kuisioner::where('membeli','Cash')->count();
        $membeliMenabung = Kuisioner::where('membeli','Menabung')->count();
        $caradadakan = Kuisioner::where('cara','dadakan')->count();
        $caradirencanakan = Kuisioner::where('cara','direncanakan')->count();
        $electronic = Kuisioner::where('harapan1', 'like', '%'. 'Electronic' . '%')->count();
        $liburan = Kuisioner::where('harapan2', 'like', '%'. 'Liburan' . '%')->count();
        $aqiqah = Kuisioner::where('harapan3', 'like', '%'. 'Aqiqah' . '%')->count();
        $kurban = Kuisioner::where('harapan7', 'like', '%'. 'Qurban' . '%')->count();
        $event = Kuisioner::where('harapan8', 'like', '%'. 'Event' . '%')->count();
        $liburan2 = Kuisioner::where('harapan9', 'like', '%'. 'Liburan' . '%')->count();
        $motor = Kuisioner::where('harapan10', 'like', '%'. 'Kendaraan Motor' . '%')->count();
        $renove = Kuisioner::where('harapan11', 'like', '%'. 'Renovasi' . '%')->count();

        return response()->json([
            'success' => true,
            'Message' => 'Data berhasil diambil',
            'kuisioner' => [
                'kuis' => $data,
                'usia15' => $usia15,
                'usia21' => $usia21,
                'usia27' => $usia27,
                'usia36' => $usia36,
                'usia46' => $usia46,
                'membeliCredit' => $membeliCredit,
                'membeliCash' => $membeliCash,
                'membeliMenabung' => $membeliMenabung,
                'caradadakan' => $caradadakan,
                'caradirencanakan' => $caradirencanakan,
                'electronic' => $electronic,
                'liburan' => $liburan,
                'aqiqah' => $aqiqah,
                'kurban' => $kurban,
                'event' => $event,
                'liburan2' => $liburan2,
                'motor' => $motor,
                'renove' => $renove,
            ]
        ],200);
    }
}
