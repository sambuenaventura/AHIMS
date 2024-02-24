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
        Schema::table('medication_remarks', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign('medication_remarks_ibfk_1');

            // Add a new foreign key constraint referencing the 'patients' table
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medication_remarks', function (Blueprint $table) {
            //
        });
    }
};
