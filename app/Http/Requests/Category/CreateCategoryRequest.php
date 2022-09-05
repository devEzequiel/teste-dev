<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|unique:categories,name'
        ];
    }

    public function messages()
    {
        return[
            'name.unique' => 'Categoria já adicionada',
            'name.required' => 'É necessário o nome da categoria',
            'name.min' => 'Nome muito curto'
        ];
    }
}
