<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;
use Exception;

class CategoryRepository
{
    /**
     * @return Collection
     * @throws Exception
     */
    public function list(): Collection
    {
        try {
            return Category::query()
                ->get()->map(fn($category) => [
                    'name' => $category->name,
                    'slug' => $category->slug
                ]);
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
            return Category::create($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @return mixed
     * @throws Exception
     */
    public function delete(int $id)
    {
        try {
            $category = Category::find($id);

            if ($category) {
                throw new Exception('Categoria não encontrada');
            }

            return $category->delete();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
