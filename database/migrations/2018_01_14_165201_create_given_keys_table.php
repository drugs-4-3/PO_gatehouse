<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGivenKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('given_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('key_id');
            $table->integer('employee_id');
            $table->timestamp('give_away_time');
            $table->timestamp('hand_back_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('given_keys');
    }
}
