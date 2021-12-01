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
            $table->unsignedBigInteger('info_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('feeling')->nullable();
            $table->string('syokuyoku')->nullable();
            $table->string('taiju')->nullable();
            $table->string('otuzi')->nullable();
            $table->string('taion')->nullable();
            $table->string('ketuatu_saikou')->nullable();
            $table->string('ketuatu_saitei')->nullable();
            $table->string('comment')->nullable();
            $table->json('warui_bui')->nullable();

            $table->foreign('info_id')->references('id')->on('infos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        /**
         * 
         */
        Schema::create('group_system_niss_evacuations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('info_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('evacuation')->nullable();
            $table->text('comment')->nullable();

            $table->foreign('info_id')->references('id')->on('infos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        /**
         * 
         */
        Schema::create('group_system_niss_rescues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('info_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('rescue')->nullable();
            $table->unsignedBigInteger('rescuer_id')->nullable();

            $table->foreign('info_id')->references('id')->on('infos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('group_system_niss_rescues');
    }
}
