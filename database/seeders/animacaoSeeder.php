<?php

namespace Database\Seeders;

use App\Models\Animacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class animacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++){
            Animacao::create([
                'titulo' => 'titulo'.$i,
                'diretor' => 'diretor'.$i,
                'studio' => 'studio'.$i,
                'genero' => 'genero'.$i,
                'dt_lancamento' => '2000-01-11',
                'sinopse'=> 'sinopse'.$i,
                'classificacao'=> 'livre',
                'plataformas'=> 'plataforma'.$i,
                'episodios'=> '10'+$i,
            ]);
        }
    }
}
