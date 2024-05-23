<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmeFormRequest;
use App\Http\Requests\FilmeFormRequestUpdate;
use App\Models\Filme;
use Illuminate\Http\Request;

class filmeController extends Controller
{
    // Cadastro de filme
    public function cadastroFilme(FilmeFormRequest $request){
        $filme = Filme::create([
            'titulo' => $request->titulo,
            'diretor' => $request->diretor,
            'genero' => $request->genero,
            'dt_lancamento' => $request->dt_lancamento,
            'sinopse' => $request->sinopse,
            'elenco' => $request->elenco,
            'classificacao' => $request->classificacao,
            'plataformas' => $request->plataformas,
            'duracao' => $request->duracao,
        ]);
        return response()->json([
            "success" => true,
            "message" => "Cadastrado com sucesso",
            "data" => $filme
        ], 200);
    }

    // Retornar todos
    public function retornarTodos(){
        $filme = Filme::all();
        return response()->json([
            'status' => true,
            'data' => $filme
        ]);
    }

    //Pesquisar por título/genero/diretor/sinopse
    public function pesquisa(Request $pesquisa)
    {
     
        $query = Filme::query();
       
        $query->where(function ($q) use ($pesquisa) {
            $q->where('sinopse', 'like', '%' .$pesquisa('pesquisa') . '%')
                ->orWhere('genero', 'like', '%' .$pesquisa('pesquisa') . '%')
                ->orWhere('diretor', 'like', '%' .$pesquisa('pesquisa') . '%')     
                ->orWhere('classificacao', 'like', '%' .$pesquisa('pesquisa') . '%')    
                ->orWhere('plataformas', 'like', '%' .$pesquisa('pesquisa') . '%')   
                ->orWhere('elenco', 'like', '%' .$pesquisa('pesquisa') . '%')   
                ->orWhere('titulo', 'like', '%' .$pesquisa('pesquisa') . '%');     
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


    //Pesquisar por id
    public function pesquisarPorId($id){
        $filme = Filme::find($id);
        if($filme == null){
            return response()->json([
                'status'=> false,
                'message' => "Produção não encontrada"
            ]);     
        }
        return response()->json([
            'status'=> true,
            'data'=> $filme
        ]);
    }


    //Pesquisar por título
    public function pesquisarPorTitulo(Request $request)
    {
        $filme = Filme::where('titulo', 'like', '%' . $request->titulo . '%')->get();
        if (count($filme) > 0) {

            return response()->json([
                'status' => true,
                'data' => $filme
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }

    //Pesquisar por diretor
    public function pesquisarPorDiretor(Request $request){
        $filme = Filme::where('diretor', 'like', '%' . $request->diretor . '%')->get();
        if (count($filme) > 0) {
            return response()->json([
                'status' => true,
                'data' => $filme
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }

    //Pesquisar por genêro
    public function pesquisarPorGenero(Request $request){
        $filme = Filme::where('genero', 'like', '%' . $request->genero . '%')->get();
        if (count($filme) > 0) {
            return response()->json([
                'status' => true,
                'data' => $filme
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }

    //pesquisar por Sinopse
    public function pesquisarPorSinopse(Request $request){
        $filme = Filme::where('sinopse', 'like', '%' . $request->sinopse . '%')->get();
        if (count($filme) > 0) {
            return response()->json([
                'status' => true,
                'data' => $filme
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }

    //Excluir
    public function excluir($id){
        $filme = Filme::find($id);
        if(!isset($filme)){
            return response()->json([
                "status" => false,
                "message" => "Não foi encontrado nenhuma produção"
            ]);
        }
        $filme->delete();
    
        return response()->json([
            'status' => false,
            'message' => 'Programa excluido com sucesso'
        ]);
    }

    public function update(FilmeFormRequestUpdate $request){
        $filme = filme::find($request->id);
    
        if(!isset($filme)){
            return response()->json([
                "status" => false,
                "message" => "Não foi encontrado nenhuma produção"
            ]);
        }
    
        if(isset($request->titulo)){
            $filme->titulo = $request->titulo;
        }

        if(isset($request->diretor)){
            $filme->diretor = $request->diretor;
        }
        
        if(isset($request->genero)){
            $filme->genero = $request->genero;
        }
        
        if(isset($request->dt_lancamento)){
            $filme->dt_lancamento = $request->dt_lancamento;
        }
        
        if(isset($request->sinopse)){
            $filme->sinopse = $request->sinopse;
        }
        
        if(isset($request->elenco)){
            $filme->elenco = $request->elenco;
        }
        
        if(isset($request->classificacao)){
            $filme->classificacao = $request->classificacao;
        }
        
        if(isset($request->plataforma)){
            $filme->plataforma = $request->plataforma;
        }

        if(isset($request->duracao)){
            $filme->duracao = $request->duracao;
        }

        $filme->update();
    
        return response()->json([
            "status" => false,
            "message" => "Programa atualizado"
        ]);
    }
}
