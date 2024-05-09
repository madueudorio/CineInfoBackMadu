<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmeFormRequest;
use App\Http\Requests\FilmeFormRequestUpdate;
use App\Http\Requests\FormRequestFilmeUpDate;
use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    // Cadastro de filme
    public function cadastroFilme(FilmeFormRequest $request)
    {
        $filme = Filme::create([

            'titulo' => $request->titulo,
            'diretor' => $request->diretor,
            'genero' => $request->genero,
            'dt_lancamento' => $request->dt_lancamento,
            'duracao' => $request->duracao,
            'sinopse' => $request->sinopse,
            'elenco' => $request->elenco,
            'classificacao' => $request->classificacao,
            'plataformas' => $request->plataformas,
        ]);
        return response()->json([
            "success" => true,
            "message" => "Cadastrado com sucesso",
            "data" => $filme
        ], 200);
    }


















    // pesquisar de filme

    public function pesquisa(Request $request)
    {
     
        $query = Filme::query();
       
        $query->where(function ($q) use ($request) {
            $q->where('sinopse', 'like', '%' . $request->input('pesquisa') . '%')
                ->orWhere('genero', 'like', '%' .$request->input('pesquisa') . '%')
                ->orWhere('diretor', 'like', '%' .$request->input('pesquisa') . '%')     
                ->orWhere('classificacao', 'like', '%' .$request->input('pesquisa') . '%')    
                ->orWhere('plataformas', 'like', '%' .$request->input('pesquisa') . '%')   
                ->orWhere('elenco', 'like', '%' .$request->input('pesquisa') . '%')   
                ->orWhere('titulo', 'like', '%' .$request->input('pesquisa') . '%');     
        });

        $filme = $query->get();
        if (count($filme) > 0) {
            return response()->json([
                'status' => true,
                'data' => $filme
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Nenhum resultado encontrado"
        ]);
    }

    //FUNÇÃO DE EXCLUIR
    public function deletarFilme($filmes)
    {
        $filmes = Filme::find($filmes);
        if (!isset($filmes)) {
            return response()->json([
                'status' => false,
                'message' => "Filme não encontrado"
            ]);
        }
        $filmes->delete();
        return response()->json(([
            'status' => true,
            'message' =>  "Filme excluido com sucesso"
        ]));
    }

    //Listagem
    public function retornarTodos()
    {
        $filmes =  Filme::all();
        if (!isset($filmes)) {
            return response()->json([
                'status' => false,
                'message' => 'Não há registros no sistema'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $filmes
        ]);
    }
    //FUNÇÃO DE UPDATE
    public function updatefilmes(FormRequestFilmeUpDate $request)
    {
        $filmes = Filme::find($request->id);
        if (!isset($filmes)) {
            return response()->json([
                'status' => false,
                'message' => 'filmes não encontrado'
            ]);
        }
        if (isset($request->titulo)) {
            $filmes->titulo = $request->titulo;
        }
        if (isset($request->diretor)) {
            $filmes->diretor = $request->diretor;
        }
        if (isset($request->genero)) {
            $filmes->genero = $request->genero;
        }
        if (isset($request->dt_lancamento)) {
            $filmes->dt_lancamento = $request->dt_lancamento;
        }
        if (isset($request->duracao)) {
            $filmes->duracao = $request->duracao;
        }

        if (isset($request->sinopse)) {
            $filmes->sinopse = $request->sinopse;
        }
        if (isset($request->elenco)) {
            $filmes->elenco = $request->elenco;
        }
        if (isset($request->classificacao)) {
            $filmes->classificacao = $request->classificacao;
        }
        if (isset($request->plataformas)) {
            $filmes->plataformas = $request->plataformas;
        }
        $filmes->update();
        return response()->json([
            'status' => true,
            'message' => 'filmes ataulizado'
        ]);
    }
}
