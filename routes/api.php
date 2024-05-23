<?php

use App\Http\Controllers\animacaoController;
use App\Http\Controllers\filmeController;
use App\Http\Controllers\serieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Filmes
route::post('filmes/cadastro', [filmeController::class, 'cadastroFilme']);
route::get('filmes/listagem', [filmeController::class, 'retornarTodos']);
route::get('filmes/pesquisar/{pesquisa}', [filmeController::class, 'pesquisa']);
route::get('filmes/pesquisar/titulo', [filmeController::class, 'pesquisarPorTitulo']);
route::get('filmes/pesquisar/diretor', [filmeController::class, 'pesquisarPorDiretor']);
route::get('filmes/pesquisar/genero', [filmeController::class, 'pesquisarPorGenero']);
route::get('filmes/pesquisar/sinopse', [filmeController::class, 'pesquisarPorSinopse']);
route::delete('filmes/delete/{id}', [filmeController::class, 'excluir']);
route::put('filmes/update', [filmeController::class, 'update']);
route::get('filmes/find/{id}', [filmeController::class, 'pesquisarPorId']);


//Series
route::post('series/cadastro', [serieController::class, 'cadastroSerie']);
route::get('series/listagem', [serieController::class, 'retornarTodos']);
route::get('series/pesquisa', [serieController::class, 'pesquisa']);
route::get('series/pesquisar/titulo', [serieController::class, 'pesquisarPorTitulo']);
route::get('series/pesquisar/diretor', [serieController::class, 'pesquisarPorDiretor']);
route::get('series/pesquisar/genero', [serieController::class, 'pesquisarPorGenero']);
route::get('series/pesquisar/sinopse', [serieController::class, 'pesquisarPorSinopse']);
route::delete('series/delete/{id}', [serieController::class, 'excluir']);
route::put('series/update', [serieController::class, 'update']);
route::get('series/find/{id}', [serieController::class, 'pesquisarPorId']);


//Animações
route::post('animacao/cadastro', [animacaoController::class, 'cadastroAnimacao']);
route::get('animacao/listagem', [animacaoController::class, 'retornarTodos']);
route::get('animacao/pesquisa', [animacaoController::class, 'pesquisa']);
route::get('animacao/pesquisar/titulo', [animacaoController::class, 'pesquisarPorTitulo']);
route::get('animacao/pesquisar/diretor', [animacaoController::class, 'pesquisarPorDiretor']);
route::get('animacao/pesquisar/genero', [animacaoController::class, 'pesquisarPorGenero']);
route::get('animacao/pesquisar/sinopse', [animacaoController::class, 'pesquisarPorSinopse']);
route::delete('animacao/delete/{id}', [animacaoController::class, 'excluir']);
route::put('animacao/update', [animacaoController::class, 'update']);
route::get('animacao/find/{id}', [animacaoController::class, 'pesquisarPorId']);