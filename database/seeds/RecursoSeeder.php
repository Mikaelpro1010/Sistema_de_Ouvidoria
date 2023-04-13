<?php

use App\Models\EstadoProcesso;
use App\Models\Manifestacao;
use App\Models\Recurso;
use Illuminate\Database\Seeder;


class RecursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado_processo_recurso = EstadoProcesso::where('nome', 'Recurso')->first();
        $manifestacao = Manifestacao::where('estado_processo_id', $estado_processo_recurso->id)->count();
        factory(Recurso::class, $manifestacao)->create();

    }
}
