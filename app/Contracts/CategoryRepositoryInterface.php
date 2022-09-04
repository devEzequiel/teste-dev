<?php

namespace App\Contracts;

interface CategoryRepositoryInterface
{
    public function create (array $data);
    public function list();
    public function delete (int $id);
}
