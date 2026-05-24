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
        Schema::create('beca_facultad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beca_id')->constrained()->onDelete('cascade');
            $table->foreignId('facultad_id')->constrained('facultades')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beca_facultad');
    }
};
