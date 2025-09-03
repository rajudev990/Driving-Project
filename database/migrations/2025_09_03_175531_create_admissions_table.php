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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('admission_date')->nullable();
            $table->string('package_id')->nullable();
            $table->float('course_fee')->nullable();
            $table->float('paid')->nullable();
            $table->float('due')->nullable();
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
        Schema::dropIfExists('admissions');
    }
};
