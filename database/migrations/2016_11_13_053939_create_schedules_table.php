<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('child_vaccine');

        Schema::create('child_vaccine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('child_id')->unsigned();
            $table->integer('vaccine_id')->unsigned();
            $table->foreign('child_id')->references('id')->on('children');
            $table->foreign('vaccine_id')->references('id')->on('vaccines');
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->date('remind_date');
            $table->integer('pivot_id')->unsigned();
            $table->foreign('pivot_id')->references('id')->on('child_vaccine');
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
        Schema::drop('schedules');
    }
}
