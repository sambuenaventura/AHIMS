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
        Schema::table('requests', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign('requests_ibfk_1');
        
            // Add a new foreign key constraint referencing the patients table
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['patient_id']);

            // Add the old foreign key constraint (if needed)
            // $table->foreign('patient_id')->references('patient_id3')->on('patientsc')->onDelete('cascade');
        });
    }
};
