<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Ilustra;

class IlustracoesController extends Controller
{
    protected $categoria;
    protected $request;
    protected $model;
    protected $validator;
    protected $nameView = 'ilustracoes';
    protected $titulo = 'Ilustrações com fonte de matéria';
        
    public function __construct(Categoria $categoria, Ilustra $ilustracoes, Request $request)
    {
        
        $this->categoria = $categoria;
        $this->model = $ilustracoes;
        $this->request = $request;
    }
    
     public function getIndex()
    {
         $data = $this->model
                ->join('categorias', 'categorias.id', '=', 'ilustras.id_categoria')
                ->select('ilustras.id', 'categorias.nome as categoria', 'ilustras.descricao', 'ilustras.fonte')
                ->paginate(10);
         
         $categorias = $this->categoria
                ->select('nome', 'id')
                ->lists('nome', 'id');
        
        return view('site.ilustracoes',compact('data','categorias'));
    }
    
     public function postPesquisar() {
         
         $dadosForm = $this->request->all();
         
       $id_categoria = $dadosForm['id_categoria'];

        $data = $this->model
                ->join('categorias', 'categorias.id', '=', 'ilustras.id_categoria')
                ->select('ilustras.id', 'categorias.nome as categoria', 'ilustras.descricao', 'ilustras.fonte')
                ->where('ilustras.id_categoria','=',"{$id_categoria}")
                ->paginate(10);

        $categorias = $this->categoria
                ->select('nome', 'id')
                ->lists('nome', 'id');

        $titulo = "Ilustrações | Resultados para a pesquisa: {$data['categoria']}";

        return view('site.ilustracoes',compact('data','categorias','titulo'));
    }
}
