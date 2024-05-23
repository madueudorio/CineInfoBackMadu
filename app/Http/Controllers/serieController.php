<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieFormRequest;
use App\Http\Requests\SerieFormRequestUpdate;
use App\Models\Serie;
use Illuminate\Http\Request;

class serieController extends Controller
{
    // Cadastro de Serie
    public function cadastroSerie(SerieFormRequest $request){
        $Serie = Serie::create([
            'titulo' => $request->titulo,
            'diretor' => $request->diretor,
            'studio' => $request->studio,
            'genero' => $request->genero,
            'dt_lancamento' => $request->dt_lancamento,
            'sinopse' => $request->sinopse,
            'elenco' => $request->elenco,
            'classificacao' => $request->classificacao,
            'plataformas' => $request->plataformas,
            'episodios' => $request->episodios,
        ]);
        return response()->json([
            "success" => true,
            "message" => "Cadastrado com sucesso",
            "data" => $Serie
        ], 200);
    }

    // Retornar todos
    public function retornarTodos(){
        $Serie = Serie::all();
        return response()->json([
            'status' => true,
            'data' => $Serie
        ]);
    }

    //Pesquisar por título/genero/diretor/sinopse
    public function pesquisa(Request $request)
    {
     
        $query = Serie::query();
       
        $query->where(function ($q) use ($request) {
            $q->where('sinopse', 'like', '%' . $request->input('pesquisa') . '%')
                ->orWhere('genero', 'like', '%' .$request->input('pesquisa') . '%')
                ->orWhere('diretor', 'like', '%' .$request->input('pesquisa') . '%')     
                ->orWhere('classificacao', 'like', '%' .$request->input('pesquisa') . '%')    
                ->orWhere('plataformas', 'like', '%' .$request->input('pesquisa') . '%')   
                ->orWhere('elenco', 'like', '%' .$request->input('pesquisa') . '%')   
                ->orWhere('titulo', 'like', '%' .$request->input('pesquisa') . '%');     
        });

        $Serie = $query->get();
        if (count($Serie) > 0) {
            return response()->json([
                'status' => true,
                'data' => $Serie
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Nenhum resultado encontrado"
        ]);
    }


    //Pesquisar por id
    public function pesquisarPorId($id){
        $Serie = Serie::find($id);
        if($Serie == null){
            return response()->json([
                'status'=> false,
                'message' => "Produção não encontrada"
            ]);     
        }
        return response()->json([
            'status'=> true,
            'data'=> $Serie
        ]);
    }


    //Pesquisar por título
    public function pesquisarPorTitulo(Request $request)
    {
        $Serie = Serie::where('titulo', 'like', '%' . $request->titulo . '%')->get();
        if (count($Serie) > 0) {

            return response()->json([
                'status' => true,
                'data' => $Serie
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }

    //Pesquisar por diretor
    public function pesquisarPorDiretor(Request $request){
        $Serie = Serie::where('diretor', 'like', '%' . $request->diretor . '%')->get();
        if (count($Serie) > 0) {
            return response()->json([
                'status' => true,
                'data' => $Serie
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }

    //Pesquisar por genêro
    public function pesquisarPorGenero(Request $request){
        $Serie = Serie::where('genero', 'like', '%' . $request->genero . '%')->get();
        if (count($Serie) > 0) {
            return response()->json([
                'status' => true,
                'data' => $Serie
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }

    //pesquisar por Sinopse
    public function pesquisarPorSinopse(Request $request){
        $Serie = Serie::where('sinopse', 'like', '%' . $request->sinopse . '%')->get();
        if (count($Serie) > 0) {
            return response()->json([
                'status' => true,
                'data' => $Serie
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }

    //Excluir
    public function excluir($id){
        $Serie = Serie::find($id);
        if(!isset($Serie)){
            return response()->json([
                "status" => false,
                "message" => "Não foi encontrado nenhuma produção"
            ]);
        }
        $Serie->delete();
    
        return response()->json([
            'status' => false,
            'message' => 'Programa excluido com sucesso'
        ]);
    }

    public function update(SerieFormRequestUpdate $request){
        $Serie = Serie::find($request->id);
    
        if(!isset($Serie)){
            return response()->json([
                "status" => false,
                "message" => "Não foi encontrado nenhuma produção"
            ]);
        }
    
        if(isset($request->titulo)){
            $Serie->titulo = $request->titulo;
        }

        if(isset($request->diretor)){
            $Serie->diretor = $request->diretor;
        }
        
        if(isset($request->studio)){
            $Serie->studio = $request->studio;
        }

        if(isset($request->genero)){
            $Serie->genero = $request->genero;
        }
        
        if(isset($request->dt_lancamento)){
            $Serie->dt_lancamento = $request->dt_lancamento;
        }
        
        if(isset($request->sinopse)){
            $Serie->sinopse = $request->sinopse;
        }
        
        if(isset($request->elenco)){
            $Serie->elenco = $request->elenco;
        }
        
        if(isset($request->classificacao)){
            $Serie->classificacao = $request->classificacao;
        }
        
        if(isset($request->plataforma)){
            $Serie->plataforma = $request->plataforma;
        }

        if(isset($request->episodios)){
            $Serie->episodios = $request->episodios;
        }

        $Serie->update();
    
        return response()->json([
            "status" => false,
            "message" => "Programa atualizado"
        ]);
    }
}
