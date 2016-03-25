<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Administrador',
            'email' => 'alesavieira@gmail.com',
            'password' => bcrypt('admin1234'),
            'ativo'=>'S'
        ];

        DB::table('users')->insert($user);
    }
}
