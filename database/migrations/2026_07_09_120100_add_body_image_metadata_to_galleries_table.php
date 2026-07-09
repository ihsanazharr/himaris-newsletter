<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('body_image_alt', 255)->nullable()->after('body_image');
            $table->text('body_image_caption')->nullable()->after('body_image_alt');
            $table->string('body_image_copyright', 255)->nullable()->after('body_image_caption');
        });
    }

    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn(['body_image_alt', 'body_image_caption', 'body_image_copyright']);
        });
    }
};
