<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('magazines', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('edition')->nullable();   // e.g. "Volume 2 — 2025"
            $table->string('cover_image')->nullable();
            $table->date('published_date')->nullable();
            $table->string('author_name')->nullable();
            $table->text('description')->nullable();
            $table->string('file_url')->nullable();  // link to read/download (Issuu, Drive, etc.)
            $table->string('status')->default('draft'); // draft | published | archived
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('magazines');
    }
};
