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
        $tableName = 'patient_medical_history';
        $columnName = 'patient_id';

        // Check if the column already exists before adding it
        if (!Schema::hasColumn($tableName, $columnName)) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->foreignId('patient_id')->constrained('patients');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableName = 'patient_medical_history';
        $columnName = 'patient_id';

        Schema::table($tableName, function (Blueprint $table) use ($columnName) {
            // Drop the foreign key and the column
            $table->dropForeign([$columnName]);
            $table->dropColumn($columnName);
        });
    }
    
};
