<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->enum('category', [
                'notes',
                'tutorial',
                'template',
                'ebook',
                'link',
                'tool',
                'other',
            ])->default('other');
            $table->string('file_path')->nullable();   // uploaded file (storage/public)
            $table->string('external_url')->nullable(); // external link/resource
            $table->string('thumbnail')->nullable();
            $table->string('source')->nullable();      // credit / source name
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_resources');
    }
};

