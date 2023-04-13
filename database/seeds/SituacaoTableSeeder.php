<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('situacoes')->insert([
            [
                'id' => 1,
                'nome' => 'Aberta',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'nome' => 'Em andamento',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'nome' => 'Compartilhada',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'nome' => 'Respondida do Compartilhamento',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'nome' => 'Respondida da Porrogação',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'nome' => 'Aguardando Porrogação',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'nome' => 'Pré-Concluída',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'nome' => 'Concluída',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'nome' => 'Bloqueada',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 11,
                'nome' => 'Recurso',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
