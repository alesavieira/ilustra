<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $guarded = ['id']; // Proteje para o campo não ser preenchido pelo usuário
    //Regras de Validação
    public $rules = [
        'nome' => 'required|min:3|max:40',
        
    ];
}
