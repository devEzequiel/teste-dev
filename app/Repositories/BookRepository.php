<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function list(array $filters)
    {
        $books = Book::query()
            ->filter($filters)
            ->get();
    }
}
