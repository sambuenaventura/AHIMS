<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('nurse_histories', function (Blueprint $table) {
            $table->bigIncrements('nurse_history_id');
            $table->unsignedBigInteger('medical_history_id');
            $table->unsignedBigInteger('nurse_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('medical_history_id')->references('history_id')->on('medical_histories')->onDelete('cascade');
            $table->foreign('nurse_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nurse_histories');
    }
};
