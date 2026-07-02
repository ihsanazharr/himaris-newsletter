<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\JobOpportunity;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_opportunities', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        // Backfill slug untuk data yang sudah ada
        JobOpportunity::withoutEvents(function () {
            JobOpportunity::whereNull('slug')->orWhere('slug', '')->each(function ($job) {
                $baseSlug = Str::slug($job->title);
                $slug = $baseSlug;
                $i = 1;
                while (JobOpportunity::where('slug', $slug)->where('id', '!=', $job->id)->exists()) {
                    $slug = $baseSlug . '-' . $i++;
                }
                $job->update(['slug' => $slug]);
            });
        });

        Schema::table('job_opportunities', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
            $table->unique('slug');
        });
    }

    public function down(): void
    {
        Schema::table('job_opportunities', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};