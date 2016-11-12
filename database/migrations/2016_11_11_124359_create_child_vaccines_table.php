<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_vaccines', function (Blueprint $table) {
            $table->integer('child_id')->unsigned();
            $table->integer('vaccine_id')->unsigned();
            $table->primary(['child_id', 'vaccine_id']);
            $table->foreign('child_id')->references('id')->on('children');
            $table->foreign('vaccine_id')->references('id')->on('vaccines');
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
        Schema::drop('child_vaccines');
    }
}
