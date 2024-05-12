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
        Schema::table('approval_log', function (Blueprint $table) {
            $table->integer('last_status')->default(1);
            $table->string('approve_notes')->nullable();
            $table->string('register_notes')->nullable();
            $table->string('enroll_notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
