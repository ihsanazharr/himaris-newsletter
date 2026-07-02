<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subscriber extends Model
{
    protected $fillable = [
        'email',
        'token',
        'verified',
    ];

    protected $casts = [
        'verified' => 'boolean',
    ];

    /**
     * Generate a unique unsubscribe token.
     */
    public static function generateToken(): string
    {
        return Str::random(64);
    }
}
