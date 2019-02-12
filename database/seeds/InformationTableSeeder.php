<?php

use Illuminate\Database\Seeder;
use App\Models\Information;

class InformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create([
            'logo'         => 'images/logo.png',
            'desc'         => 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor ut labore et dolore magna aliqua ut enim.',
            'facebook'     => 'https://facebook.com/denner.grillo',
            'instagram'    => 'https://instagram.com/dennergrillonutri/',
            'street'       => 'Rua Paulo Ribeiro da Silva',
            'neighborhood' => 'Boa Esperança',
            'number'       => 52,
            'city'         => 'Cachoeiro de Itapemirim',
            'email'        => 'dennergrillo@hotmail.com',
            'telephone'    => '2835212881',
            'cellphone'    => '28999010528'
        ]);
    }
}
