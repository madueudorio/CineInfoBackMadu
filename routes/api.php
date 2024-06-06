<?php

use App\Http\Controllers\animacaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\serieController;

// -------------------------Teste:-------------------------------------------
route::post('filmes/cadastro', [FilmeController::class, 'cadastroFilme']);
route::get('filmes/listagem', [filmeController::class, 'retornarTodosFilmes']);
route::get('filmes/pesquisar', [filmeController::class, 'pesquisaFilme']);
route::delete('filmes/delete/{id}', [filmeController::class, 'deletarFilme']);
route::put('filmes/update', [filmeController::class, 'updatefilmes']);




// ----------------ADM--------------------------------------------------------
//FILMES:
route::post('adm/filmes/cadastro', [FilmeController::class, 'cadastroFilme']);
route::get('adm/filmes/listagem', [filmeController::class, 'retornarTodosFilmes']);
route::get('adm/filmes/pesquisar/{pesquisa}', [filmeController::class, 'pesquisaFilme']);
route::delete('adm/filmes/delete/{id}', [filmeController::class, 'deletarFilme']);
route::put('adm/filmes/update', [filmeController::class, 'updatefilmes']);

//SERIE:
route::post('adm/serie/cadastro', [serieController::class, 'cadastroSeries']);
route::get('adm/serie/listagem', [serieController::class, 'retornarTodosSeries']);
route::get('adm/serie/pesquisar', [serieController::class, 'pesquisaSerie']);
route::delete('adm/serie/delete/{id}', [serieController::class, 'deletarSerie']);
route::put('adm/serie/update', [serieController::class, 'updateSerie']);


//ANIMCAO:
route::post('adm/animacao/cadastro', [animacaoController::class, 'cadastroAnimacao']);
route::get('adm/animacao/listagem', [animacaoController::class, 'retornarTodosAnimacao']);
route::get('adm/animacao/pesquisar', [animacaoController::class, 'pesquisaAnimacao']);
route::delete('adm/animacao/delete/{id}', [animacaoController::class, 'deletarAnimacao']);
route::put('adm/animacao/update', [animacaoController::class, 'updateanimacao']);




//--------------------Usuario------------------------------------------------------
route::post('usuario/cadastro', [FilmeController::class, 'cadastroUsuario']);
route::put('usuario/update', [filmeController::class, 'updateanimacao']);
