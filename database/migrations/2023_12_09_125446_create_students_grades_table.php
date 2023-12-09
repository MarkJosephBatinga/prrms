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
        Schema::create('students_grades', function (Blueprint $table) {
            $table->id();
            $table->string('term');
            $table->string('code_no');
            $table->string('course_no');
            $table->string('descriptive_title');
            $table->integer('units');
            $table->string('final_grades');
            $table->string('removal_rating');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_grades');
    }
};
