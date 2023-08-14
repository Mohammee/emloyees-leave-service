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
        Schema::create('employee_leave', function (Blueprint $table) {
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('leave_id')->constrained()->cascadeOnDelete();

            $table->date('start_date');
            $table->integer('days');

            $table->enum('status', ['approved', 'deny', 'pending'])->default('pending');
            $table->string('deny_reason')->nullable();

            $table->timestamp('created_at')->nullable();

            $table->primary(['employee_id', 'leave_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_leave');
    }
};
