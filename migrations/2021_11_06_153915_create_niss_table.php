<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNissTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 
         */
        Schema::create('group_system_niss_health_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('word');
        });

        /**
         * 
         */
        Schema::create('group_system_niss_evacuations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->string('rescue');
            $table->unsignedBigInteger('rescuer_id');
            $table->string('evacuation');
            $table->string('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_system_niss_health_records');
        Schema::dropIfExists('group_system_niss_evacuations');
    }
}
