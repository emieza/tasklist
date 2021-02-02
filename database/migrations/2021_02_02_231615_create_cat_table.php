<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            // no es pot referenciar la pròpia taula al defnir-la
            // https://laravel.com/docs/8.x/migrations#foreign-key-constraints
            //$table->foreign("parent")->references("id")->on("categories")->nullable();
            $table->unsignedBigInteger("parent")->nullable();
            $table->timestamps();
        });

        Schema::table('categories', function (Blueprint $table) {
            // creem la relació
            $table->foreign("parent")->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
