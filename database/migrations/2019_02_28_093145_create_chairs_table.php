<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chairs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('flight_detail_id');
            $table->unsignedInteger('seat_type_id');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('flight_detail_id')
      ->references('id')->on('flight_details')
      ->onDelete('cascade');

      $table->foreign('seat_type_id')
      ->references('id')->on('seat_types')
      ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chairs');
    }
}
