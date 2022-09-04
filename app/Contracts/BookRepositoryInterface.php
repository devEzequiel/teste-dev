<?php

namespace App\Contracts;

interface BookRepositoryInterface
{
    public function find (int $id);
    public function create (array $data);
    public function list(array $filters);
    public function update (array $data, int $id);
    public function delete (int $id);

    public function rateBook (array $data);
    public function getByRate(array $filter);
}
