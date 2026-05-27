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
        Schema::table('becas', function (Blueprint $table) {
            $table->boolean('activo')->default(true);
        });

        Schema::table('facultades', function (Blueprint $table) {
            $table->boolean('activo')->default(true);
        });

        Schema::table('categorias', function (Blueprint $table) {
            $table->boolean('activo')->default(true);
        });

        Schema::table('carreras', function (Blueprint $table) {
            $table->boolean('activo')->default(true);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->boolean('activo')->default(true);
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('becas', function (Blueprint $table) {
            $table->dropColumn('activo');
        });

        Schema::table('facultades', function (Blueprint $table) {
            $table->dropColumn('activo');
        });

        Schema::table('categorias', function (Blueprint $table) {
            $table->dropColumn('activo');
        });

        Schema::table('carreras', function (Blueprint $table) {
            $table->dropColumn('activo');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('activo');
        
            });


    }
};
