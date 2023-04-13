<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecretariaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secretarias')->insert([
            [
                'id' => 1,
                'nome' => 'Secretaria do Planejamento e Gestão',
                'sigla' => 'SEPLAG',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'nome' => 'Secretaria do Urbanismo e Meio Ambiente',
                'sigla' => 'SEUMA',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'nome' => 'Procuradoria Geral do Município',
                'sigla' => 'PGM',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'nome' => 'Gabinete do Prefeito',
                'sigla' => 'GABPREF',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'nome' => 'Gabinete Vice Prefeitura',
                'sigla' => 'GABVICE',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'nome' => 'Secretaria de Educação',
                'sigla' => 'SME',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'nome' => 'Secretaria da Saúde',
                'sigla' => 'SMS',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'nome' => 'Secretaria da Juventude, Esporte e Lazer',
                'sigla' => 'SECJEL',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'nome' => 'Secretaria das Finanças',
                'sigla' => 'SEFIN',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'nome' => 'Secretaria de Trabalho e Desenvolvimento Econômico',
                'sigla' => 'STDE',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 11,
                'nome' => 'Secretaria dos Direitos Humanos, Habitação e Assist. Social',
                'sigla' => 'SEDHAS',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 12,
                'nome' => 'Agência Municipal do Meio Ambiente',
                'sigla' => 'AMA',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 13,
                'nome' => 'Secretaria de Serviços Públicos',
                'sigla' => 'SESEP',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 14,
                'nome' => 'Secretaria de Infraestrutura',
                'sigla' => 'SEINF',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 15,
                'nome' => 'Secretaria da Segurança Cidadã',
                'sigla' => 'SESEC',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 16,
                'nome' => 'Secretaria da Cultura e Turismo',
                'sigla' => 'SECULT',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 17,
                'nome' => 'Secretaria do Trânsito e Transportes',
                'sigla' => 'SETRAN',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 18,
                'nome' => 'Controladoria e Ouvidoria geral do Município',
                'sigla' => 'CGM',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 19,
                'nome' => 'Central de Licitações',
                'sigla' => 'CELIC',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 20,
                'nome' => 'Serviço Autônomo de Água e Esgoto de Sobral',
                'sigla' => 'SAAE',
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // [
            //     'id' => 21,
            //     'nome' => 'Outros',
            //     'sigla' => 'outros',
            //     'ativo' => true,
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            // ],
            // [
            //     'id' => 22,
            //     'nome' => 'Todas as secretarias',
            //     'sigla' => 'Todas as SECs',
            //     'ativo' => true,
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            // ],
        ]);
    }
}
