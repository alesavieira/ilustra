<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ilustra extends Model
{
    protected $guarded = ['id']; // Proteje para o campo não ser preenchido pelo usuário
    //Regras de Validação
    public $rules = [
        'descricao' => 'required|min:3',
        
    ];
}
