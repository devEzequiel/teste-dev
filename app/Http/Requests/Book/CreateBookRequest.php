<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            'category_id' => 'nullable|exists:categories,id',
            'type_id' => 'required|exists:file_types,id',
            'name' => 'required|unique:books,name',
            'author' => 'required',
            'code' => 'required|unique:books,code',
            'size' => 'required|numeric'
        ];
    }
}
