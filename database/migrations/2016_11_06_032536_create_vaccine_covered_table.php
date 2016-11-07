<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccineCoveredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine_covered', function (Blueprint $table) {
            $table->integer('vaccine_id');
            $table->integer('child_id');
            $table->primary(['vaccine_id', 'child_id']);
            $table->foreign('vaccine_id')->references('id')->on('vaccines');
            $table->foreign('child_id')->references('id')->on('childs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vaccine_covered');
    }
}
