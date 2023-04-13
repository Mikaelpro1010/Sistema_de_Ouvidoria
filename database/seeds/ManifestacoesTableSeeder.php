<?php

use App\Models\EstadoProcesso;
use App\Models\Manifestacao;
use Illuminate\Database\Seeder;

class ManifestacoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Manifestacao::class, 200)->create();
    }
}
