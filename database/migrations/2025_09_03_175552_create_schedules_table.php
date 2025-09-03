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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('teacher_id')->nullable();
            $table->string('class_date')->nullable();
            $table->string('class_time')->nullable();
            $table->string('road_test_time')->nullable();
            $table->string('road_test_location')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->default(0);
            $table->string('auth_user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
