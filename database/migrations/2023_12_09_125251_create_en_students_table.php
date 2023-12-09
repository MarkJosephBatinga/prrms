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
        Schema::create('en_students', function (Blueprint $table) {
            $table->id();
            $table->string('student_type');
            $table->string('student_status');
            $table->string('name');
            $table->string('nationality');
            $table->string('address');
            $table->string('mobile_number');
            $table->string('program');
            $table->string('file_record');
            $table->string('payment_mode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('en_students');
    }
};
