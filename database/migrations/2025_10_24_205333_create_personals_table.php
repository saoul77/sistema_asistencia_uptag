<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('personals', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('correo')->unique();
        $table->string('cargo')->nullable();
        $table->enum('asistencia', ['Presente','Ausente','Permiso'])->default('Presente');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
