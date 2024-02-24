<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable();
        });

        // Copy data from the old column to the new one
        DB::table('patients')->update(['date_of_birth' => DB::raw('birth_of_date')]);

        // Remove the old column
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('birth_of_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // If needed, you can define the 'down' method to reverse the changes
        Schema::table('patients', function (Blueprint $table) {
            // Add the old column back
            $table->date('birth_of_date')->nullable();
        });

        // Copy data from the new column to the old one
        DB::table('patients')->update(['birth_of_date' => DB::raw('date_of_birth')]);

        // Remove the new column
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('date_of_birth');
        });
    }
};
