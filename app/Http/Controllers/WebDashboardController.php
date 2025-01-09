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

class WebDashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }
}
