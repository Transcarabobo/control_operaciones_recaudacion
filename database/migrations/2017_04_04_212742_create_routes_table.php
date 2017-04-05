<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->decimal('passage', 7, 2);
            $table->timestamps();
        });

        //Tabla pibot para almacenar la actualizacion de precios del pasaje de las rutas 
        Schema::create('passage_update', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('route_id')->unsigned();
            $table->decimal('passage', 7, 2);

            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
            
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
        Schema::drop('routes');
    }
}
