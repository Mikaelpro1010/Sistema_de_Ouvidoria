<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoProcessoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados_processo')->insert([
            [
            'id' => 1,
            'nome' => 'Inicial',
            'descricao' => null,
            'ativo' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'id' => 2,
            'nome' => 'Recurso',
            'descricao' => null,
            'ativo' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
    ]);
    }
}
