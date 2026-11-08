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
        Schema::create('ingredient_recipe', function (Blueprint $table) {
            $table->id(); //AUTOMATICALLY AUTO-INCREMENTS
            $table->foreignId('ingredient_id')->constrained()->cascadeOnDelete(); // The Foreign Key
            $table->foreignId('recipe_id')->constrained()->cascadeOnDelete(); // The Foreign Key
            $table->float('amount')->nullable();
            $table->string('unit')->nullable();
            $table->timestamps(); //CREATES TWO FIELDS, CREATED_AT Y UPDATED AT
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('ingredient_recipe');
    }
};
