<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // PostgreSQL implements enum() as a CHECK constraint.
        // We need to drop the old constraint and add a new one with all category values.

        // 1. Drop the old category check constraint
        DB::statement('ALTER TABLE posts DROP CONSTRAINT IF EXISTS posts_category_check');

        // 2. Change column type to text (to safely accept any value during transition)
        DB::statement('ALTER TABLE posts ALTER COLUMN category TYPE VARCHAR(50)');

        // 3. Add new check constraint with all allowed categories
        DB::statement("
            ALTER TABLE posts
            ADD CONSTRAINT posts_category_check
            CHECK (category IN (
                'news',
                'scholarship',
                'announcement',
                'article',
                'cafe-review',
                'alumni',
                'self-improvement',
                'upcoming-event',
                'miscellaneous'
            ))
        ");

        // 4. Also fix status constraint to include 'archived'
        DB::statement('ALTER TABLE posts DROP CONSTRAINT IF EXISTS posts_status_check');
        DB::statement('ALTER TABLE posts ALTER COLUMN status TYPE VARCHAR(20)');
        DB::statement("
            ALTER TABLE posts
            ADD CONSTRAINT posts_status_check
            CHECK (status IN ('draft', 'published', 'archived'))
        ");
    }

    public function down(): void
    {
        // Revert category constraint to original values
        DB::statement('ALTER TABLE posts DROP CONSTRAINT IF EXISTS posts_category_check');
        DB::statement("
            ALTER TABLE posts
            ADD CONSTRAINT posts_category_check
            CHECK (category IN ('news', 'scholarship', 'announcement', 'article'))
        ");

        // Revert status constraint
        DB::statement('ALTER TABLE posts DROP CONSTRAINT IF EXISTS posts_status_check');
        DB::statement("
            ALTER TABLE posts
            ADD CONSTRAINT posts_status_check
            CHECK (status IN ('draft', 'published'))
        ");
    }
};
