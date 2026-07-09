<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'body_image',
        'body_image_alt',
        'body_image_caption',
        'body_image_copyright',
        'body_images',
        'description',
        'date',
        'location',
        'status',
        'user_id',
        'author_name',
    ];

    protected function casts(): array
    {
        return [
            'date'        => 'date',
            'body_images' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
