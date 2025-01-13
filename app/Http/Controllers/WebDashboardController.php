<?php

namespace App\Http\Controllers;

use App\Models\AppSettings;
use App\Models\device;
use App\Models\Kandang;
use App\Models\Perusahaan;
use App\Models\SettingRoles;
use App\Models\SettingShift;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebDashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()-> route('loginform')->with('Success', 'logout berhasil');
    }
}
