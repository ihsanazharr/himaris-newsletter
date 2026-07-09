<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Drop existing category check constraint
        DB::statement('ALTER TABLE posts DROP CONSTRAINT IF EXISTS posts_category_check');

        // Add new constraint with the updated category list
        DB::statement("
            ALTER TABLE posts
            ADD CONSTRAINT posts_category_check
            CHECK (category IN (
                'whats-new',
                'self-improvement',
                'entertainment',
                'miscellaneous',
                'alumni-profile',
                'review',
                'upcoming-event',
                'sponsored-content',
                'news',
                'scholarship',
                'announcement',
                'article',
                'cafe-review',
                'alumni'
            ))
        ");
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE posts DROP CONSTRAINT IF EXISTS posts_category_check');
        DB::statement("
            ALTER TABLE posts
            ADD CONSTRAINT posts_category_check
            CHECK (category IN (
                'news','scholarship','announcement','article',
                'cafe-review','alumni','self-improvement',
                'upcoming-event','miscellaneous'
            ))
        ");
    }
};
