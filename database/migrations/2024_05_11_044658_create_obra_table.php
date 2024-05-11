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
        Schema::create('obra', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['c', 'p', 't']);
            $table->string('contenido', 500);
            $table->unsignedBigInteger('autor_id');

            $table->foreign('autor_id')->references('id')->on('autor')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obra');
    }
};
