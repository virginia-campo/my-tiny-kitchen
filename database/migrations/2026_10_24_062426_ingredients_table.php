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
        //
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id(); //AUTOMATICALLY AUTO-INCREMENTS
            $table->string('name')->index(); // Standard B-Tree index for quick prefix matching
            $table->timestamps(); //CREATES TWO FIELDS, CREATED_AT Y UPDATED AT
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('ingredients');
    }
};
