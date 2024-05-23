<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimacaoFormRequest;
use App\Http\Requests\AnimacaoFormRequestUpdate;
use App\Models\Animacao;
use Illuminate\Http\Request;

class animacaoController extends Controller
{
    // Cadastro de animacao
    public function cadastroanimacao(AnimacaoFormRequest $request){
        $animacao = Animacao::create([
            'titulo' => $request->titulo,
            'diretor' => $request->diretor,
            'studio' => $request->studio,
            'genero' => $request->genero,
            'dt_lancamento' => $request->dt_lancamento,
            'sinopse' => $request->sinopse,
            'classificacao' => $request->classificacao,
            'plataformas' => $request->plataformas,
            'episodios' => $request->episodios,
        ]);
        return response()->json([
            "success" => true,
            "message" => "Cadastrado com sucesso",
            "data" => $animacao
        ], 200);
    }

    // Retornar todos
    public function retornarTodos(){
        $animacao = animacao::all();
        return response()->json([
            'status' => true,
            'data' => $animacao
        ]);
    }

    //Pesquisar por título/genero/diretor/sinopse/classificacao/plataformas
    public function pesquisa(Request $request)
    {
     
        $query = animacao::query();
       
        $query->where(function ($q) use ($request) {
            $q->where('sinopse', 'like', '%' . $request->input('pesquisa') . '%')
                ->orWhere('genero', 'like', '%' .$request->input('pesquisa') . '%')
                ->orWhere('diretor', 'like', '%' .$request->input('pesquisa') . '%')     
                ->orWhere('classificacao', 'like', '%' .$request->input('pesquisa') . '%')    
                ->orWhere('plataformas', 'like', '%' .$request->input('pesquisa') . '%')   
                ->orWhere('titulo', 'like', '%' .$request->input('pesquisa') . '%');     
        });

        $animacao = $query->get();
        if (count($animacao) > 0) {
            return response()->json([
                'status' => true,
                'data' => $animacao
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Nenhum resultado encontrado"
        ]);
    }


    //Pesquisar por id
    public function pesquisarPorId($id){
        $animacao = animacao::find($id);
        if($animacao == null){
            return response()->json([
                'status'=> false,
                'message' => "Produção não encontrada"
            ]);     
        }
        return response()->json([
            'status'=> true,
            'data'=> $animacao
        ]);
    }


    //Pesquisar por título
    public function pesquisarPorTitulo(Request $request)
    {
        $animacao = animacao::where('titulo', 'like', '%' . $request->titulo . '%')->get();
        if (count($animacao) > 0) {

            return response()->json([
                'status' => true,
                'data' => $animacao
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }

    //Pesquisar por diretor
    public function pesquisarPorDiretor(Request $request){
        $animacao = animacao::where('diretor', 'like', '%' . $request->diretor . '%')->get();
        if (count($animacao) > 0) {
            return response()->json([
                'status' => true,
                'data' => $animacao
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }

    //Pesquisar por genêro
    public function pesquisarPorGenero(Request $request){
        $animacao = animacao::where('genero', 'like', '%' . $request->genero . '%')->get();
        if (count($animacao) > 0) {
            return response()->json([
                'status' => true,
                'data' => $animacao
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }

    //pesquisar por Sinopse
    public function pesquisarPorSinopse(Request $request){
        $animacao = animacao::where('sinopse', 'like', '%' . $request->sinopse . '%')->get();
        if (count($animacao) > 0) {
            return response()->json([
                'status' => true,
                'data' => $animacao
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }

    //Excluir
    public function excluir($id){
        $animacao = animacao::find($id);
        if(!isset($animacao)){
            return response()->json([
                "status" => false,
                "message" => "Não foi encontrado nenhuma produção"
            ]);
        }
        $animacao->delete();
    
        return response()->json([
            'status' => false,
            'message' => 'Programa excluido com sucesso'
        ]);
    }

    public function update(AnimacaoFormRequestUpdate $request){
        $animacao = Animacao::find($request->id);
    
        if(!isset($animacao)){
            return response()->json([
                "status" => false,
                "message" => "Não foi encontrado nenhuma produção"
            ]);
        }
    
        if(isset($request->titulo)){
            $animacao->titulo = $request->titulo;
        }

        if(isset($request->diretor)){
            $animacao->diretor = $request->diretor;
        }
        
        if(isset($request->studio)){
            $animacao->studio = $request->studio;
        }

        if(isset($request->genero)){
            $animacao->genero = $request->genero;
        }
        
        if(isset($request->dt_lancamento)){
            $animacao->dt_lancamento = $request->dt_lancamento;
        }
        
        if(isset($request->sinopse)){
            $animacao->sinopse = $request->sinopse;
        }
        
        if(isset($request->classificacao)){
            $animacao->classificacao = $request->classificacao;
        }
        
        if(isset($request->plataforma)){
            $animacao->plataforma = $request->plataforma;
        }

        if(isset($request->episodios)){
            $animacao->episodios = $request->episodios;
        }

        $animacao->update();
    
        return response()->json([
            "status" => false,
            "message" => "Programa atualizado"
        ]);
    }
}
