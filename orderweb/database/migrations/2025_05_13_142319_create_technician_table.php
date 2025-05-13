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
        Schema::create('technician', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document')->unique()->comment('CC');
            $table->string('name', 80)->comment('name');
            $table->string('speciality',50)->nullable()->comment('speciality');
            $table->string('phone', 30)->nullable()->comment('phone number');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technician');
    }
};
