<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function store()
    {
        return view('pages.admin.setting-store');
    }

    public function account()
    {
        return view('pages.admin.setting-account');
    }
}
