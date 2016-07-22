<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('password')->nullable();
            $table->string('wechat');
            $table->string('imgs');
            $table->string('describe');
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('smoking')->nullable();
            $table->string('city')->nullable();
            $table->string('discovery_time')->nullable();
            $table->string('situation')->nullable();
            $table->string('earnest_money')->nullable();
            $table->string('report',5000)->nullable();
            $table->integer('doctor_id');
            $table->integer('desease_id')->nullable();
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
        Schema::drop('reservations');
    }
}
