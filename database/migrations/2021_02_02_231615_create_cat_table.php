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
            // creem camp per a la FK recursiva (categoria pare)
            $table->unsignedBigInteger("parent")->nullable();
            $table->timestamps();

            // creem la relació
            $table->foreign("parent")->references('id')->on('categories');
        });

        Schema::table('tasks', function(Blueprint $table) {
            // foreignId crea la columna i la relaciona en un sol pas
            // https://laravel.com/docs/8.x/migrations#foreign-key-constraints

            // ell sol dedueix la taula relacionada mitjançant el string abans de _id
            // category -> categories , sap pluralitzar
            $table->foreignId('category_id')->constrined()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // eliminem FK primer
        Schema::table('tasks', function(Blueprint $table) {
            $table->dropColumn('category_id');
        });
        // dp eliminem taula
        Schema::dropIfExists('categories');
    }
}
