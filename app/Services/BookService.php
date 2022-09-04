<?php

namespace App\Services;

use App\Contracts\BookRepositoryInterface;

class BookService
{
    public function __construct(protected BookRepositoryInterface $bookRepository)
    {
    }

    public function getBooks($filters)
    {
        return $this->bookRepository->list($filters);
    }

}
