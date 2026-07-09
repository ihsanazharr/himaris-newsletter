<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('ALTER TABLE posts DROP CONSTRAINT IF EXISTS posts_category_check');

        // Normalize legacy category values to the latest taxonomy.
        DB::statement("UPDATE posts SET category = 'whats-new' WHERE category IN ('news', 'announcement', 'article')");
        DB::statement("UPDATE posts SET category = 'miscellaneous' WHERE category = 'scholarship'");
        DB::statement("UPDATE posts SET category = 'review' WHERE category = 'cafe-review'");
        DB::statement("UPDATE posts SET category = 'alumni-profile' WHERE category = 'alumni'");

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
                'sponsored-content'
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
};
