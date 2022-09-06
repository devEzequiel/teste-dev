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
                    'size' => $book->size . ' páginas',
                    'created_at' => $book->created_at,
                    'category' => $book->category->name ?? null,
                    'type' => $book->type->description
                ])->toArray();

            if (empty($books)) {
                throw new Exception('Nenhum livro encontrado');
            }

            return (array) $books;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function create(array $data): bool
    {
        try {
            return (bool)Book::create($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getBook(int $id): array
    {
        try {
            $book = Book::query()
                ->where('id', $id)
                ->with('category', 'type')
                ->get()->map(fn($book) => [
                    'id' => $book->id,
                    'name' => $book->name,
                    'code' => $book->code,
                    'size' => $book->size . ' páginas',
                    'created_at' => $book->created_at,
                    'category' => $book->category->name ?? null,
                    'type' => $book->type->description
                ])->toArray();

            if (!$book) {
                throw new Exception('Livro não encontrado');
            }

            return $book;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function delete(int $id): bool
    {
        try {
            $book = Book::find($id);

            if (!$book) {
                throw new Exception('Livro não encontrado');
            }

            return (bool)$book->delete();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update(array $data)
    {
        try {
            $book = Book::find((int) $data['id']);

            if (!$book) {
                throw new Exception('Livro não encontrado');
            }

            return (bool)$book->update($data);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
