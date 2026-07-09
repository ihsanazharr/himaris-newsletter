<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobOpportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'company',
        'location',
        'type',
        'description',
        'apply_url',
        'deadline',
        'thumbnail',
        'status',
        'user_id',
        'author_name',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'date',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}