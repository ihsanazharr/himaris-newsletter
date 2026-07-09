<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'date',
        'location',
        'author_name',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }
}
