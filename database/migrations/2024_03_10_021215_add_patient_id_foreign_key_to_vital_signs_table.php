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
    // Disable foreign key checks
    Schema::disableForeignKeyConstraints();

    // Add foreign key constraint
    Schema::table('vital_signs', function (Blueprint $table) {
        $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
    });

    // Re-enable foreign key checks
    Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vital_signs', function (Blueprint $table) {
            $table->dropForeign('vital_signs_patient_id_foreign');
        });
    }
};
