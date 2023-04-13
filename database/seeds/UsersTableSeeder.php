<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert(
            [
                'name' => "Mikael",
                'email' => "mikaelantonio398@gmail.com",
                'tipo_usuario_id' => 1, //admin
                'secretaria_id' => 18, //cgm
                'password' => bcrypt("123"),
                'remember_token' => str_random(10),
            ]
        );
        factory(User::class, 20)->create();
    }
}
