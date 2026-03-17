<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public $view_path = 'master.pricing.';
    public function index(){
        return view($this->view_path.'index');
    }
    public function create(){
        try{
            return view($this->view_path.'create');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
