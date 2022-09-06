<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'type_id',
        'name',
        'author',
        'code',
        'size'
    ];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['category'] ?? null, function ($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        })
            ->when($filters['type'] ?? null, function ($query, $type) {
                $query->whereHas('type', function ($query) use ($type) {
                    $query->where('id', $type);
                });
            })
            ->when($filters['search'] ?? null, function ($query, $search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(FileType::class, 'type_id', 'id', '');
    }
}
