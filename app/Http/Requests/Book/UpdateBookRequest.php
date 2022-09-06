<?php

namespace App\Http\Requests\Book;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    protected Book $book;

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
        $this->book = Book::find($this->get('id'));

        return [
            'type_id' => 'nullable|exists:file_types,id',
            'name' => 'nullable|unique:books,name,'. $this->book->name,
            'author' => 'nullable',
            'code' => 'nullable|unique:books,code,'. $this->book->code,
            'size' => 'nullable|numeric'
        ];
    }
}
