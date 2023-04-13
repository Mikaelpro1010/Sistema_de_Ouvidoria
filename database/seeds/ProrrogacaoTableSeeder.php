<?php

use App\Models\Prorrogacao;
use Illuminate\Database\Seeder;

class ProrrogacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Prorrogacao::class, 20)->create();
    }
}
