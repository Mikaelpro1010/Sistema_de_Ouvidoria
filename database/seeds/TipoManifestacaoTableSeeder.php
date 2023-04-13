<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoManifestacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_manifestacao')->insert([
            [
                'id' => 6,
                'nome' => 'Sugestão',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'nome' => 'Elogio',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'nome' => 'Solicitação',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'nome' => 'Reclamação',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 21,
                'nome' => 'Solicitação de Informação',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 13,
                'nome' => 'Denúncia',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 41,
                'nome' => 'Denúncia Fake News',
                'descricao' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
