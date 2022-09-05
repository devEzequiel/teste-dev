<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;
use Exception;

class CategoryRepository
{
    /**
     * @return array
     * @throws Exception
     */
    public function list(): array
    {
        try {
            return Category::query()
                ->get()->map(fn($category) => [
                    'id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug
                ])->toArray();
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

            if (!$category) {
                throw new Exception('Categoria não encontrada');
            }

            return $category->delete();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
