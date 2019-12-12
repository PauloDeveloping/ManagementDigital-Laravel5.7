<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'data_nascimento', 
        'rg',
        'cpf',
        'celular',
        'telefone',
        'cargo',
        'setor',
        'salario',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado'
    ];
}
