<?php

namespace App\Services;

use Exception;
use App\Repositories\BookRepository;

class BookService
{
    public function __construct(protected BookRepository $bookRepository)
    {
    }

    /**
     * @throws \Exception
     */
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

    public function create(array $data)
    {
        try {
            return $this->bookRepository->create($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

}
