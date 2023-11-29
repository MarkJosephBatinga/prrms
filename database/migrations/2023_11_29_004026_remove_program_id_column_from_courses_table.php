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
        Schema::table('courses', function (Blueprint $table) {
            // Define the foreign key name if it was explicitly named
            $table->dropForeign('courses_program_id_foreign');
        });

        // Now drop the column
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('program_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('program_id');
        });

        // Add back the foreign key constraint
        Schema::table('courses', function (Blueprint $table) {
            // Define the foreign key name if it was explicitly named
            $table->foreign('program_id')->references('id')->on('programs');
        });
    }
};
