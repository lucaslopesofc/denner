<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'title'    => 'Título',
            'subtitle' => 'Sub Título',
            'text1'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'text2'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'image'    => 'images/pages/denner.png',
            'tags'     => 'Home'
        ]);

        Page::create([
            'title'    => 'Título',
            'subtitle' => 'Sub Título',
            'text1'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec nunc mauris. Pellentesque euismod vulputate vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam non justo sit amet metus molestie ultrices at ac magna. Quisque ac enim laoreet, acc',
            'text2'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec nunc mauris. Pellentesque euismod vulputate vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam non justo sit amet metus molestie ultrices at ac magna. Quisque ac enim laoreet, acc',
            'image'    => 'images/pages/sobremim1.jpg',
            'tags'     => 'Sobre Mim 1'
        ]);

        Page::create([
            'title'    => 'Título',
            'subtitle' => 'Sub Título',
            'text1'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec nunc mauris. Pellentesque euismod vulputate vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam non justo sit amet metus molestie ultrices at ac magna. Quisque ac enim laoreet, acc',
            'text2'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec nunc mauris. Pellentesque euismod vulputate vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam non justo sit amet metus molestie ultrices at ac magna. Quisque ac enim laoreet, acc',
            'image'    => 'images/pages/sobremim2.jpg',
            'tags'     => 'Sobre Mim 2'
        ]);
    }
}
