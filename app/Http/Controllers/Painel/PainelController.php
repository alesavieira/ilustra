<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Ilustra;


class PainelController extends Controller
{
    protected $categoria;
    protected $ilustra;
    
     public function __construct(Categoria $categoria, Ilustra $ilustra)
    {
        $this->middleware('auth');
        $this->categoria = $categoria;
        $this->ilustra = $ilustra;
    }
   
    
    public function getIndex(){
         //Conta categorias cadastradas
        $cat = $this->categoria
                    ->count('*');
        
         //Conta Ilustrações Cadastradas
        $ilustra = $this->ilustra
                    ->count('*');
        
        return view('painel.home.home',compact('cat','ilustra'));
    }
    
    public function missingMethod($parameters = array()) {
        return view('painel.404.index',compact('parameters'));
    }
    
    
  
}
