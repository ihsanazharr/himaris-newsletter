<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JobOpportunityController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutNewsletterController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ArchiveController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// About — with tab parameter (himaris / esaa / english-dept)
Route::get('/about/{tab?}', [AboutController::class, 'index'])
    ->name('about')
    ->where('tab', 'himaris|esaa|english-dept');

Route::view('/about/editorial-team', 'pages.editorial-team')->name('about.editorial-team');

// Newsletter (Posts)
Route::get('/newsletter', [PostController::class, 'index'])->name('newsletter.index');
Route::get('/newsletter/{slug}', [PostController::class, 'show'])->name('newsletter.show');
Route::get('/about-newsletter', [AboutNewsletterController::class, 'index'])->name('about-newsletter');

// Student Resources (Events)
Route::get('/student-resources', [EventController::class, 'index'])->name('student-resources.index');
Route::get('/student-resources/{slug}', [EventController::class, 'show'])->name('student-resources.show');

// Job Opportunities — slug-based
Route::get('/job-opportunities', [JobOpportunityController::class, 'index'])->name('jobs.index');
Route::get('/job-opportunities/{job:slug}', [JobOpportunityController::class, 'show'])->name('jobs.show');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');

// Support
Route::get('/support', [SupportController::class, 'index'])->name('support');

// Subscriber
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');
Route::get('/unsubscribe/{token}', [SubscriberController::class, 'unsubscribe'])->name('unsubscribe');

// Submission Guidelines (static page)
Route::view('/submission-guidelines', 'pages.submission-guidelines')->name('submission-guidelines');

// Magazine Archive
Route::get('/archive', [ArchiveController::class, 'index'])->name('archive');