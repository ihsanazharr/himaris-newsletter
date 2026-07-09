@extends('layouts.app')
@section('title', 'Himaris Newsletter — Home')
@section('meta_description', 'Campus news, stories & insights from the English Department, Politeknik Negeri Bandung.')

@push('styles')
<style>
.hero {
  position: relative; width: 100%; min-height: 440px;
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  padding: calc(var(--nav-h) + 32px) 20px 64px; overflow: hidden;
}
.hero-bg {
  position: absolute; inset: 0; z-index: 0;
  background-image: url("{{ asset('images/himaris.jpg') }}");
  background-position: center; background-size: cover; background-repeat: no-repeat;
  filter: brightness(0.32) saturate(0.6);
}
.hero-bg::after {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(to bottom, rgba(17,17,17,0.05) 0%, rgba(17,17,17,0.65) 100%);
}
.hero-content { position: relative; z-index: 1; text-align: center; display: flex; flex-direction: column; align-items: center; gap: 14px; }
.hero-logo-wrap {
  width: 120px; height: 120px; border: 2px solid rgba(212,160,23,0.35);
  border-radius: 50%; background: rgba(212,160,23,0.08);
  display: flex; align-items: center; justify-content: center; margin-bottom: 6px; overflow: hidden;
}
.hero-logo-wrap img { width: 80%; height: 80%; object-fit: contain; }
.hero-title { font-size: clamp(1.9rem, 4.5vw, 3rem); font-weight: 700; color: var(--white); line-height: 1.15; }
.hero-sub { font-size: 0.97rem; color: rgba(255,255,255,0.68); font-style: italic; }
.hero-scroll {
  position: absolute; bottom: 22px; left: 50%; transform: translateX(-50%); z-index: 1;
  display: flex; flex-direction: column; align-items: center; gap: 7px;
}
.hero-scroll span { font-size: 0.68rem; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(255,255,255,0.38); }
.scroll-caret {
  width: 16px; height: 16px;
  border-right: 2px solid rgba(255,255,255,0.35); border-bottom: 2px solid rgba(255,255,255,0.35);
  transform: rotate(45deg); animation: bounce 1.5s infinite;
}
@keyframes bounce { 0%,100%{transform:rotate(45deg) translateY(0)} 50%{transform:rotate(45deg) translateY(6px)} }
.articles-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 32px 36px; }

/* Write for Us banner */
.write-banner{background:var(--dark);border-top:3px solid var(--gold);}
.write-banner-inner{max-width:1160px;margin:0 auto;padding:56px 32px;display:grid;grid-template-columns:1fr auto;gap:32px;align-items:center;}
.write-banner-text .eyebrow{font-size:.68rem;font-weight:700;color:var(--gold);text-transform:uppercase;letter-spacing:.12em;margin-bottom:10px;}
.write-banner-text h2{font-size:clamp(1.3rem,2.5vw,1.9rem);font-weight:700;color:var(--white);line-height:1.25;margin-bottom:10px;}
.write-banner-text p{font-size:.88rem;color:rgba(255,255,255,.5);line-height:1.7;max-width:520px;}
.write-banner-btns{display:flex;flex-direction:column;gap:10px;min-width:200px;}
.btn-write{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:12px 22px;font-family:var(--font);font-weight:700;font-size:.84rem;border-radius:var(--radius);text-decoration:none;transition:all var(--transition);white-space:nowrap;}
.btn-write.article{background:var(--gold);color:var(--black);border:2px solid var(--gold);box-shadow:3px 3px 0 rgba(255,255,255,.15);}
.btn-write.article:hover{background:var(--gold-bright);transform:translateY(-1px);}
.btn-write.artwork{background:transparent;color:var(--white);border:2px solid rgba(255,255,255,.25);}
.btn-write.artwork:hover{border-color:var(--gold);color:var(--gold);}
.btn-write.guideline{background:transparent;color:rgba(255,255,255,.4);border:none;font-size:.76rem;font-weight:500;padding:4px 0;justify-content:flex-start;}
.btn-write.guideline:hover{color:rgba(255,255,255,.75);}

@media(max-width:900px){
  .articles-grid { grid-template-columns: 1fr; }
  .write-banner-inner{grid-template-columns:1fr;padding:40px 20px;}
  .write-banner-btns{flex-direction:row;flex-wrap:wrap;}
}
</style>
@endpush

@section('content')

{{-- ===== HERO ===== --}}
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-content">
    <div class="hero-logo-wrap">
      <img src="{{ asset('images/logonewsletter.png') }}" alt="Himaris Newsletter Logo"/>
    </div>
    <h1 class="hero-title">Stay Informed</h1>
    <p class="hero-sub">Your daily dose of campus news, stories, and insights</p>
  </div>
  <div class="hero-scroll">
    <span>Scroll</span>
    <div class="scroll-caret"></div>
  </div>
</section>

{{-- ===== TICKER ===== --}}
<div class="ticker-wrap">
  <div class="ticker-track">
    @if($latestPosts->count())
      @foreach($latestPosts as $post)
        <span class="ticker-item">{{ $post->title }}</span>
      @endforeach
      @foreach($latestPosts as $post)
        <span class="ticker-item">{{ $post->title }}</span>
      @endforeach
    @else
      <span class="ticker-item">Welcome to Himaris Newsletter</span>
      <span class="ticker-item">Campus news &amp; events from English Dept POLBAN</span>
      <span class="ticker-item">Stay updated with the latest opportunities</span>
      <span class="ticker-item">Welcome to Himaris Newsletter</span>
      <span class="ticker-item">Campus news &amp; events from English Dept POLBAN</span>
      <span class="ticker-item">Stay updated with the latest opportunities</span>
    @endif
  </div>
</div>

{{-- ===== WHAT'S ON? ===== --}}
<section class="section">
  <div class="container">
    <h2 class="section-heading">
      <span class="icon">📖</span>
      <span class="underline">Featured Articles</span>
      <span class="icon">📖</span>
    </h2>

    @if($latestPosts->count())
      <div class="articles-grid">
        @foreach($latestPosts as $post)
          <a href="{{ route('newsletter.show', $post->slug) }}" class="article-card reveal">
            <div class="article-card-img-wrap">
              @if($post->thumbnail)
                <img src="{{ asset('storage/' . $post->thumbnail) }}"
                     alt="{{ $post->title }}"
                     class="article-card-img"/>
              @else
                <div class="article-card-img"
                     style="display:flex;align-items:center;justify-content:center;font-size:3rem;background:var(--gray-light)">
                  &#128240;
                </div>
              @endif
            </div>
            <div class="article-card-body">
              <span class="article-card-tag">{{ $post->category }}</span>
              <h3 class="article-card-title">{{ $post->title }}</h3>
              <p class="article-card-meta">
                By {{ $post->author_name ?? $post->user?->name ?? 'HIMARIS' }}
                &mdash;
                {{ $post->published_at?->format('d M Y') ?? $post->created_at->format('d M Y') }}
              </p>
            </div>
          </a>
        @endforeach
      </div>
    @else
      <div style="text-align:center;padding:60px 0;color:var(--gray)">
        <div style="font-size:3rem;margin-bottom:16px">&#128221;</div>
        <p style="font-size:1rem;font-weight:600">No articles published yet.</p>
        <p style="font-size:.85rem;margin-top:6px">Check back soon!</p>
      </div>
    @endif

    <div style="text-align:center;margin-top:40px">
      <a href="{{ route('newsletter.index') }}"
         style="display:inline-flex;align-items:center;gap:8px;padding:12px 28px;background:var(--gold);color:var(--black);font-weight:700;font-size:0.9rem;border:2px solid var(--black);border-radius:var(--radius);box-shadow:3px 3px 0 var(--black);">
        View All Articles &rarr;
      </a>
    </div>
  </div>
</section>

{{-- ===== UPCOMING EVENTS ===== --}}
@if($upcomingEvents->count())
<section class="section" style="background:var(--white);">
  <div class="container">
    <h2 class="section-heading">
      <span class="icon">&#128197;</span>
      <span class="underline">Upcoming Events</span>
      <span class="icon">&#128197;</span>
    </h2>
    <div class="articles-grid">
      @foreach($upcomingEvents as $event)
        <a href="{{ route('student-resources.show', $event->slug) }}" class="article-card reveal">
          <div class="article-card-img-wrap">
            @if($event->thumbnail)
              <img src="{{ asset('storage/' . $event->thumbnail) }}"
                   alt="{{ $event->title }}"
                   class="article-card-img"/>
            @else
              <div class="article-card-img"
                   style="display:flex;align-items:center;justify-content:center;font-size:3rem;background:var(--gray-light)">
                &#128197;
              </div>
            @endif
          </div>
          <div class="article-card-body">
            <span class="article-card-tag">{{ $event->organizer ?? 'Event' }}</span>
            <h3 class="article-card-title">{{ $event->title }}</h3>
            <p class="article-card-meta">
              &#128197; {{ $event->start_date->format('d M Y') }}
              @if($event->location) &mdash; {{ $event->location }} @endif
            </p>
          </div>
        </a>
      @endforeach
    </div>
    <div style="text-align:center;margin-top:40px">
      <a href="{{ route('student-resources.index') }}"
         style="display:inline-flex;align-items:center;gap:8px;padding:12px 28px;background:transparent;color:var(--black);font-weight:700;font-size:0.9rem;border:2px solid var(--black);border-radius:var(--radius);">
        View All Events
      </a>
    </div>
  </div>
</section>
@endif

@include('partials.social-media-publications')

{{-- ===== WRITE FOR US BANNER ===== --}}
<section class="write-banner reveal">
  <div class="write-banner-inner">
    <div class="write-banner-text">
      <div class="eyebrow">&#9997;&#65039; Contribute</div>
      <h2>Have a Story or Artwork<br>to Share?</h2>
      <p>
        We're always looking for fresh voices from the English Department community.
        Write an article, submit your artwork, or share a campus story —
        your work could be featured on Himaris Newsletter.
      </p>
    </div>
    <div class="write-banner-btns">
      <a href="https://forms.gle/XkAYYbgfQCLkJznS8"
         target="_blank" rel="noopener noreferrer"
         class="btn-write article">
        &#128221; Submit an Article
      </a>
      <a href="https://forms.gle/CAqSS6x6wE1rbUHX6"
         target="_blank" rel="noopener noreferrer"
         class="btn-write artwork">
        &#127912; Submit Artwork
      </a>
      <a href="{{ route('submission-guidelines') }}"
         class="btn-write guideline">
        Read submission guidelines &rarr;
      </a>
    </div>
  </div>
</section>

@endsection