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
        Schema::create('Personal', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 32);
            $table->string('correo', 104)->unique();
            $table->string('cargo', 20);
            $table->boolean('asistencia')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Personal');
    }
};
