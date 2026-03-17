<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NozzleController extends Controller
{
    public $view_path = 'master.nozzel.';
    public function index(){
        return view($this->view_path.'index');
    }
    public function create(){
        return view($this->view_path.'create');
    }
}
