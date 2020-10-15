<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('pages.admin.setting-store', [
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function account()
    {
        $user = Auth::user();
        $Provinsi  = Province::findOrFail($user->fk_provinces_id);
        // dd($Provinsi);
        return view('pages.admin.setting-account', [
            'user' => $user,
            'Provinsi' => $Provinsi,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        // dd($data);
        $user = Auth::user();

        $user->update($data);
        return redirect()->route($redirect);
    }
}
