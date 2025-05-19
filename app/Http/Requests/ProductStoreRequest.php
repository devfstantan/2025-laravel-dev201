<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255|min:3',
            'price' => 'required|numeric|min:0|max:1000000',
            'stock' => 'required|integer|min:0|max:1000',
            'image' => 'nullable|file|image|max:2048', // max:2Mo
            'description' => 'nullable',
            'category_id' => 'nullable|exists:categories,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'l3nwan rah darouri',
            'price.max.numeric' => 'Taman 5assou ikoun s4r mn 1000DH',
        ];
    }
}
