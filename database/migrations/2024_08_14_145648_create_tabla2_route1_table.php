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
        Schema::create('tabla2_route1', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->string('calle');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('colonia');
            $table->string('codigo_postal');
            $table->string('pais');
            $table->timestamps();
            $table->foreign('persona_id')->references('id')->on('tabla1_route1')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabla2_route1');
    }
};
