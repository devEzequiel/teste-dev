<?php

namespace App\Services;

use Exception;
use App\Repositories\BookRepository;

class BookService
{
    public function __construct(protected BookRepository $bookRepository)
    {
    }

    public function list(array $filters): array
    {
        try {
            return $this->bookRepository->list($filters);
        } catch (Exception $e) {
            throw $e;
        }

    }

    public function getBook(int $id): array
    {
        try {
            return $this->bookRepository->getBook($id);
        } catch (Exception $e) {
            throw $e;
        }

    }

    public function create(array $data): bool
    {
        try {
            return $this->bookRepository->create($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete(int $id): bool
    {
        try {
            return $this->bookRepository->delete($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update(array $data): bool
    {
        try {
            return $this->bookRepository->update($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

}
