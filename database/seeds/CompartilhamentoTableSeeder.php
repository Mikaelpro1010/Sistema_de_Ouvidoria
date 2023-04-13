<?php

use App\Models\Compartilhamento;
use Illuminate\Database\Seeder;

class CompartilhamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Compartilhamento::class, 200)->create();
    }
}
