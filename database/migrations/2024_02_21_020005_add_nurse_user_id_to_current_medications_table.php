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
        Schema::table('current_medications', function (Blueprint $table) {
            $table->bigInteger('nurse_user_id')->unsigned()->nullable();
            $table->foreign('nurse_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('current_medications', function (Blueprint $table) {
            $table->dropForeign(['nurse_user_id']);
            $table->dropColumn('nurse_user_id');
        });
    }
};
