<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Denner Grillo',
            'login'    => 'admin',
            'email'    => 'dennergrillo@hotmail.com',
            'password' => bcrypt('admin'),
            'photo'    => 'images/perfil/perfil.jpg'
        ]);
    }
}