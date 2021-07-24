<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use App\Models\City;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class LocationController extends Controller
{
    public function Provinces()
    {
        return Province::all();
    }

    public function Regencies($province_id)
    {
        return Regency::where('province_id', $province_id)->get();
    }

    public function City($province_id)
    {
        return City::where('province_id', $province_id)->get();
    }

    public function City_ID($city_id)
    {
        return City::find($city_id);
    }

    public function checkOngkir(Request $request)
    {
        $cost =  RajaOngkir::ongkosKirim([
            'origin' => 67, //ID kota / Kabupaten asal/ 113 adalah kode kota Bekasi
            'destination' => $request->city_destination, //Id Kota //kabupaten tujuan
            'weight' => 100, // berat barang dalam gram sample 100
            'courier' => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Cost All Courir: ' . $request->courier,
            'data'    => $cost
        ]);
    }
}
