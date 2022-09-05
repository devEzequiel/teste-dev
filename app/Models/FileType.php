<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{
    use HasFactory;

    protected $table = 'file_types';

    protected $fillable = [
        'description'
    ];

    public const TYPES = [
        [ 'description' => 'phisycal'],
        [ 'description' => 'digital']
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'type_id', 'id');
    }
}
