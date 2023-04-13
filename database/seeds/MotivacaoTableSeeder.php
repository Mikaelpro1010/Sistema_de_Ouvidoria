<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motivacoes')->insert([
            [
            'id' => 1,
            'nome' => 'Manifestação',
            'descricao' => null,
            'ativo' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'id' => 2,
            'nome' => 'Solicitação de Informação',
            'descricao' => null,
            'ativo' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
    ]);
    }
}
