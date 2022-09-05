<?php

namespace App\Services;


use App\Repositories\BookRepository;

class BookService
{
    public function __construct(protected BookRepository $bookRepository)
    {
    }

    public function getBooks($filters)
    {
        return $this->bookRepository->list($filters);
    }

}
