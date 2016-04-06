<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Categoria;

class HomeController extends Controller
{
    protected $categoria;


    public function __construct(Categoria $categoria)
    {
        //$this->middleware('auth');
        $this->categoria = $categoria;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.index');
    }
    
    public function getIlustracoes()
    {
         $categorias = $this->categoria
                ->select('nome', 'id')
                ->lists('nome', 'id');
        
        return view('site.ilustracoes',compact('categorias'));
    }
}
