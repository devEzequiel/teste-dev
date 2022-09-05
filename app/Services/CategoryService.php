<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Str;
use Exception;

class CategoryService
{
    public function __construct(protected CategoryRepository $categoryRepository)
    {
    }

    public function create(array $data)
    {
        try {
            $data['slug'] = Str::slug($data['name']);

            return $this->categoryRepository->create($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function list()
    {
        try {
            return $this->categoryRepository->list();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete(int $id)
    {
        try {
            return $this->categoryRepository->delete($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

}
