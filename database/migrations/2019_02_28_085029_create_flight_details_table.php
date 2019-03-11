<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('org_id');
            $table->string('code',31)->unique();
            $table->unsignedInteger('from');
            $table->unsignedInteger('to');
            $table->timestamp('time_start');
            $table->timestamp('time_end');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('org_id')
      ->references('id')->on('orgs')
      ->onDelete('cascade');

      $table->foreign('from')
      ->references('city_id')->on('city')
      ->onDelete('cascade');

      $table->foreign('to')
      ->references('city_id')->on('city')
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
        Schema::dropIfExists('flight_details');
    }
}
