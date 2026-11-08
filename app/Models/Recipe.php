<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory; // 1. Import the trait

class Recipe extends Model
{    
    use HasFactory; // 2. Use the trait inside the class
    protected $fillable = [
        'user_id',
        'category_id', // Añadimos la clave al asignable en masa
        'recipe_title',
        'instructions',
        'cooking_time',
        'ww_smartpoints',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class)
                    ->withPivot('amount', 'unit')
                    ->withTimestamps();
    }
}

/*
COMMANDS: 

 - MAKE THE MODEL
 php artisan make:model Recipe (Same name as the db but in singular)

NOTES:

1. We need to define the fields that are fillable
2. MANY -> ONE RELATIONSHIP: This table is defining a many to one relationship by adding the belongsTo
*/