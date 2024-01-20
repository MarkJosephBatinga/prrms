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
        Schema::table('students', function (Blueprint $table) {
            $table->string('birth_cert')->nullable();
            $table->string('letter_intent')->nullable();
            $table->string('rec_letter')->nullable();
            $table->integer('years_stop')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('birth_cert');
            $table->dropColumn('letter_intent');
            $table->dropColumn('rec_letter');
            $table->dropColumn('years_stop');
        });
    }
};
