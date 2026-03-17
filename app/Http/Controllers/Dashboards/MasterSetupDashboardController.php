<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterSetupDashboardController extends Controller
{
    public function index()
    {
        return view('master.dashboard');
    }
}
