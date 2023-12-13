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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_create');
            $table->foreign('employee_create')->references('id')->on('employees')->onDelete('cascade');
            $table->string('product_name');
            $table->string('barcode');
            $table->string('smallest_selling_unit')->nullable();
            $table->string('catatan_obat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
