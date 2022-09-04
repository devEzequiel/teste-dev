<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['category'], function ($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        })
            ->when($filters['type'], function ($query, $type) {
                $query->whereHas('type', function ($query) use ($type) {
                    $query->where('id', $type);
                });
            })
            ->when($filters['search'], function ($query, $search) {
                $query->where('id', 'LIKE', '%' . $search . '%');
            });
    }
}
