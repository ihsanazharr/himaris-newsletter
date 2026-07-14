<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $fillable = [
        'title',
        'edition',
        'cover_image',
        'published_date',
        'author_name',
        'description',
        'file_url',
        'status',
    ];

    protected $casts = [
        'published_date' => 'date',
    ];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
