<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class PainelController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
   
    
    public function getIndex(){
        return view('painel.home.home');
    }
    
    public function missingMethod($parameters = array()) {
        return view('painel.404.index',compact('parameters'));
    }
    
    
  
}
