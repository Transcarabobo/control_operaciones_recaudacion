<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->integer('id');
            $table->string('product_code', 11);
            $table->string('motor_code', 11);
            $table->enum('type', ['gas', 'diesel']);
            $table->string('brand', 16);
            $table->string('model', 24);
            $table->integer('year');
            $table->string('vin', 17);
            $table->string('imei', 15);
            $table->string('sincard', 18);
            $table->string('line_number', 11);
            $table->enum('status', ['enabled', 'disabled']);
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
        Schema::drop('buses');
    }
}
