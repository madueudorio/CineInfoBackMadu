<?php

use App\Http\Controllers\FilmeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


route::post('filmes/cadastro', [FilmeController::class, 'cadastroFilme']);
route::get('filmes/listagem', [filmeController::class, 'retornarTodos']);
route::get('filmes/pesquisar', [filmeController::class, 'pesquisa']);

route::delete('filmes/delete/{id}', [filmeController::class, 'deletarFilme']);