<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\Category;
use Exception;

class BookRepository
{
    /**
     * @param array $filters
     * @return mixed
     * @throws Exception
     */
    public function list(array $filters): array
    {
        try {
            $books = Book::query()
                ->with('category', 'type')
                ->filter($filters)
                ->get()->map(fn($book) => [
                    'id' => $book->id,
                    'name' => $book->name,
                    'code' => $book->code,
                    'size' => $book->sie,
                    'created_at' => $book->created_at,
                    'category' => $book->category->name ?? null,
                    'type' => $book->type
                ])->toArray();

            return $books;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    public function create(array $data)
    {
        try {
            return Book::create($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getBook(int $id)
    {
        try {
            $books = Book::query()
                ->where('id', $id)
                ->with('category', 'type')
                ->get()->map(fn($book) => [
                    'id' => $book->id,
                    'name' => $book->name,
                    'code' => $book->code,
                    'size' => $book->sie,
                    'created_at' => $book->created_at,
                    'category' => $book->category ?? null,
                    'type' => $book->type
                ])->toArray();

            return $books;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
