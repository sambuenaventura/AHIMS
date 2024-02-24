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
            $table->string('age');
            $table->string('gender');
            $table->string('contact_number');
            $table->string('address');
            $table->string('past_conditions')->nullable();
            $table->string('surgical_procedures')->nullable();
            $table->string('allergies')->nullable();
            $table->text('medication_and_dosage')->nullable();
            $table->string('frequency')->nullable();
            $table->string('prescribing_physician')->nullable();
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
