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
        Schema::table('review_of_systems', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['patient_id']);
        
            // Add a new foreign key constraint referencing the correct column
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
