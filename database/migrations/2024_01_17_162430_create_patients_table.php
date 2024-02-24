<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_of_date')->nullable();
            $table->string('gender');
            $table->string('contact_number');
            $table->string('address');
            $table->string('pic_first_name')->nullable();
            $table->string('pic_last_name')->nullable();
            $table->string('pic_relation')->nullable();
            $table->string('pic_contact_number')->nullable();
            $table->string('ap_first_name')->nullable();
            $table->string('ap_last_name')->nullable();
            $table->string('ap_contact_number')->nullable();
            // Add other columns as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
