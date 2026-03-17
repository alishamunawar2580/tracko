<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TankController extends Controller
{
    public $view_path = 'master.fuel_tank.';

    public function index(){
        return view($this->view_path.'index');
    }
    public function create(){
        return view($this->view_path.'create');
    }
}
