<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Zmienna powinna być ustawiona na true, aby pozwolić na autoryzację
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'parent_category' => 'required|string|max:255',
            'sub_category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'description' => 'required|string|max:1000',
        ];
    }
}
