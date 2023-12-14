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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_create');
            $table->foreign('employee_create')->references('id')->on('employees')->onDelete('cascade');
            $table->string('customer_code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->bigInteger('int')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
