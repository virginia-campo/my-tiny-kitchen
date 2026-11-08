<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        return true; //FOR NOW WE RETURN TRUE, WE WILL TACKLE THIS ON THAY 8
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'recipe_title' => ['required', 'string'],
            'instructions' => ['required', 'string'],
            'cooking_time' => ['nullable', 'integer', 'min:0'],
            'ww_smartpoints' => ['nullable', 'integer', 'min:0']            
        ];
    }
}
