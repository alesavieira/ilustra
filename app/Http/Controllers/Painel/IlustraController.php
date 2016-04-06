<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use App\Http\Requests;
use App\Http\Controllers\CrudController;
use App\Models\Ilustra;
use App\Models\Categoria;

class IlustraController extends CrudController
{
    protected $request;
    protected $model;
    protected $categoria;
    protected $validator;
    protected $nameView = 'ilustracoes';
    protected $titulo = 'Gestão de Ilustrações';
    
    public function __construct(Request $request, Ilustra $ilustra, Factory $validator, Categoria $categoria) {
        $this->request      = $request;
        $this->model        = $ilustra;
        $this->validator    = $validator;
        $this->categoria = $categoria;
    }
    //Substitui o método da classe abstrata
       public function getIndex() {

        $data = $this->model
                ->join('categorias', 'categorias.id', '=', 'ilustras.id_categoria')
                ->select('ilustras.id', 'categorias.nome as categoria', 'ilustras.descricao', 'ilustras.fonte')
                ->paginate($this->totalItensPorPagina);

        $categoria = $this->categoria
                ->select('nome', 'id')
                ->lists('nome', 'id');



        return view("painel.{$this->nameView}.index", compact('data', 'categoria','titulo'));
    }
    
    public function getPesquisar($palavraPesquisa = ''){
         $data = $this->model
                ->join('categorias', 'categorias.id', '=', 'ilustras.id_categoria')
                ->select('ilustras.id', 'categorias.nome as categoria', 'ilustras.descricao', 'ilustras.fonte')
                 ->where('descricao', 'LIKE', "%{$palavraPesquisa}%")
                ->paginate($this->totalItensPorPagina);

        $categoria = $this->categoria
                ->select('nome', 'id')
                ->lists('nome', 'id');
        
        
        

           $titulo = "Resultados para a pesquisa: {$palavraPesquisa}";

           return view("painel.{$this->nameView}.index", compact('data', 'categoria','titulo'));


    }
    
    
}
