<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\JobOpportunity;
use App\Models\Post;
use App\Observers\EventObserver;
use App\Observers\JobOpportunityObserver;
use App\Observers\PostObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Post::observe(PostObserver::class);
        Event::observe(EventObserver::class);
        JobOpportunity::observe(JobOpportunityObserver::class);
    }
}
