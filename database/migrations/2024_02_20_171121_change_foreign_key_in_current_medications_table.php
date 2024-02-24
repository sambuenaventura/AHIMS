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
       // Drop the existing foreign key constraint
       Schema::table('current_medications', function (Blueprint $table) {
        $table->dropForeign(['patient_id']);
    });

    // Add a new foreign key constraint
    Schema::table('current_medications', function (Blueprint $table) {
        $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the new foreign key constraint
        Schema::table('current_medications', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
        });

        // Add the old foreign key constraint
        Schema::table('current_medications', function (Blueprint $table) {
            $table->foreign('patient_id')->references('patient_id3')->on('patientsc')->onDelete('cascade');
        });
    }
};
