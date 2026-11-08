<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        return Recipe::all();
    }
    public function create()
    {
        return view('recipes.create');
    }
    public function store(StoreRecipeRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = 1; // Temporary placeholder for local testing

        Recipe::create($data);

        return redirect('/recipes');
    }
}
