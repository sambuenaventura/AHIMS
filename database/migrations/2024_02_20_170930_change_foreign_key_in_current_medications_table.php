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
        Schema::table('current_medications', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['patient_id']);

            // Add a new foreign key constraint referencing the 'patients' table
            $table->foreign('patient_id')
                  ->references('patient_id')  // Assuming 'patient_id' is the primary key in 'patients' table
                  ->on('patients')
                  ->onDelete('cascade');  // This will delete related records in 'current_medications' table if a patient is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('current_medications', function (Blueprint $table) {
            //
        });
    }
};
