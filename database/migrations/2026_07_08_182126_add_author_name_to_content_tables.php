<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Posts
        Schema::table('posts', function (Blueprint $table) {
            $table->string('author_name', 255)->nullable()->after('user_id');
        });

        // Galleries (artworks)
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('author_name', 255)->nullable()->after('user_id');
        });

        // Job Opportunities
        Schema::table('job_opportunities', function (Blueprint $table) {
            $table->string('author_name', 255)->nullable()->after('user_id');
        });

        // Events (student resources)
        Schema::table('events', function (Blueprint $table) {
            $table->string('author_name', 255)->nullable()->after('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('posts', fn ($t) => $t->dropColumn('author_name'));
        Schema::table('galleries', fn ($t) => $t->dropColumn('author_name'));
        Schema::table('job_opportunities', fn ($t) => $t->dropColumn('author_name'));
        Schema::table('events', fn ($t) => $t->dropColumn('author_name'));
    }
};
