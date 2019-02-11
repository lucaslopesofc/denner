<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo', 150);
            $table->string('desc', 150);
            $table->string('facebook');
            $table->string('instagram');
            $table->string('street');
            $table->string('neighborhood');
            $table->integer('number');
            $table->string('email');
            $table->string('telephone', 13);
            $table->string('cellphone', 14);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
}
