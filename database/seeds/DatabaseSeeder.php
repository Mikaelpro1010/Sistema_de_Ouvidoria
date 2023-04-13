<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TiposUsuarioTableSeeder::class);
        $this->call(SecretariaTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EstadoProcessoTableSeeder::class);
        $this->call(MotivacaoTableSeeder::class);
        $this->call(SituacaoTableSeeder::class);
        $this->call(TipoManifestacaoTableSeeder::class);
        $this->call(ManifestacoesTableSeeder::class);
        $this->call(ProrrogacaoTableSeeder::class);
        $this->call(FaqTableSeeder::class);
        $this->call(RecursoSeeder::class);
    }
}
