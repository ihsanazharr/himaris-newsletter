<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    public const CATEGORY_LABELS = [
        'whats-new' => "What's New",
        'self-improvement' => 'Self-improvement',
        'entertainment' => 'Entertainment',
        'miscellaneous' => 'Miscellaneous',
        'alumni-profile' => 'Inspirational alumni & current students profile',
        'review' => 'Review',
        'upcoming-event' => 'Upcoming Event',
        'sponsored-content' => 'Sponsored content',
    ];

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'category',
        'status',
        'user_id',
        'author_name',
        'published_at',
        'content_images',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'content_images' => 'array',
        ];
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::CATEGORY_LABELS[$this->category] ?? $this->category;
    }

    public static function categoryOptions(): array
    {
        return self::CATEGORY_LABELS;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}