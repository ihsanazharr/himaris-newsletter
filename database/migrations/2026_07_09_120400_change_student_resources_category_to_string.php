<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('student_resources', function (Blueprint $table) {
            // Change the category column from ENUM to VARCHAR to support new categories
            $table->string('category', 50)->default('other')->change();
        });
    }

    public function down(): void
    {
        Schema::table('student_resources', function (Blueprint $table) {
            // Revert back to enum
            $table->enum('category', [
                'notes',
                'tutorial',
                'template',
                'ebook',
                'link',
                'tool',
                'other',
            ])->default('other')->change();
        });
    }
};
