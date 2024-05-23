<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable =[

        'titulo',
        'diretor',
        'studio',
        'genero',
        'dt_lancamento',
        'sinopse',
        'elenco',
        'classificacao',
        'plataformas',
        'episodios'
    ];
}
