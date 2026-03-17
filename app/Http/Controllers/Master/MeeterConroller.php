<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeeterConroller extends Controller
{
    public $view_path = 'master.meeter.';
    public function index(){
        return view($this->view_path.'index');
    }
    public function create(){
        return view($this->view_path.'create');
    }
}
