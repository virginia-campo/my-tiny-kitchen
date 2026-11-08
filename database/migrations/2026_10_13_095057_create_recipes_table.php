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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id(); //AUTOMATICALLY AUTO-INCREMENTS
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // The Foreign Key, 
            // In the constrained we don't specify the table name because is already in the field name
            // If the user_id was something else like creator_id we would need to specify that this foreignId comes from the users table
            // $table->foreignId('creator_id')->constrained('users)
            $table->string('recipe_title'); //STRING TYPE, 
            $table->text('instructions')->fullText();  //TEXT TYPE,
            $table->integer('cooking_time')->nullable();
            $table->integer('ww_smartpoints')->nullable();
            $table->timestamps(); //CREATES TWO FIELDS, CREATED_AT Y UPDATED AT
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};

/* 
COMMANDS:
 - CREATE A TABLE: 
php artisan make:migration create_posts_table
php artisan make:migration create_comments_table

 - DOES THE MIGRATION
php artisan migrate
php artisan migrate:regresh

 - ROLLBACK
php artisan migrate:rollback 
the entire last batch

php artisan migrate:rollback --stpe=1
exactly one single migration file
php artisan migrate:rollback --path=


*/

