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
            $table->unsignedBigInteger('user_id');
        });

        /**
         * 
         */
        Schema::create('group_system_niss_evacuations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('info_base_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('rescue')->nullable();
            $table->unsignedBigInteger('rescuer_id')->nullable();
            $table->string('evacuation')->nullable();
            $table->text('comment')->nullable();

            $table->foreign('info_base_id')->references('id')->on('info_bases')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('rescuer_id')->references('id')->on('users')->onDelete('cascade');
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
