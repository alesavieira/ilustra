<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use App\Http\Requests;
use App\Http\Controllers\CrudController;
use App\Models\Categoria;

class CategoriaController extends CrudController
{
    protected $request;
    protected $model;
    protected $validator;
    protected $nameView = 'categorias';
    protected $titulo = 'Gestão de Categorias';
    
    public function __construct(Request $request, Categoria $categoria, Factory $validator) {
        $this->request      = $request;
        $this->model        = $categoria;
        $this->validator    = $validator;
    }
}
