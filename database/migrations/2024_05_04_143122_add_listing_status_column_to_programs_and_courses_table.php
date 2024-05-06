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
        Schema::table('programs', function (Blueprint $table) {
            $table->integer('listing_status')->default(0)->after('program_chair');
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->integer('listing_status')->default(0)->after('units');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
