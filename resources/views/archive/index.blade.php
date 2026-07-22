@extends('layouts.app')
@section('title', 'Archive — Himaris Newsletter')
@section('meta_description', 'Browse all editions of Himaris Newsletter magazine. Explore past volumes, articles, and creative works from the English Department of Politeknik Negeri Bandung.')

@push('styles')
<style>
/* ===== ARCHIVE PAGE ===== */
.archive-hero {
  margin-top: var(--nav-h);
  background: var(--dark);
  border-bottom: 3px solid var(--gold);
  padding: 56px 0 52px;
  position: relative;
  overflow: hidden;
}
.archive-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 70% 50%, rgba(212,160,23,.14) 0%, transparent 65%);
  pointer-events: none;
}
.archive-hero-inner {
  max-width: 1160px;
  margin: 0 auto;
  padding: 0 32px;
  display: grid;
  grid-template-columns: 1fr 280px;
  gap: 52px;
  align-items: center;
  position: relative;
  z-index: 1;
}
.archive-hero-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(212,160,23,.15);
  border: 1px solid rgba(212,160,23,.35);
  color: var(--gold);
  font-size: .72rem;
  font-weight: 700;
  letter-spacing: .12em;
  text-transform: uppercase;
  padding: 5px 14px;
  border-radius: 20px;
  margin-bottom: 18px;
}
.archive-hero-title {
  font-size: clamp(1.6rem, 3.5vw, 2.4rem);
  font-weight: 700;
  color: var(--white);
  line-height: 1.2;
  margin-bottom: 16px;
}
.archive-hero-title span { color: var(--gold); font-style: italic; }
.archive-hero-desc {
  font-size: .92rem;
  color: rgba(255,255,255,.62);
  line-height: 1.8;
  margin-bottom: 28px;
  max-width: 520px;
}
.archive-hero-stats {
  display: flex;
  gap: 32px;
  flex-wrap: wrap;
}
.archive-stat-num {
  font-size: 1.6rem;
  font-weight: 700;
  color: var(--gold);
  line-height: 1;
}
.archive-stat-lbl {
  font-size: .7rem;
  color: rgba(255,255,255,.45);
  text-transform: uppercase;
  letter-spacing: .06em;
  margin-top: 3px;
}

/* ===== COVER IMAGE ===== */
.archive-cover-wrap {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}
.archive-cover-card {
  width: 100%;
  max-width: 240px;
  border-radius: 12px;
  overflow: hidden;
  border: 2px solid rgba(212,160,23,.35);
  box-shadow: 0 20px 48px rgba(0,0,0,.5), 6px 6px 0 rgba(212,160,23,.2);
  transform: rotate(1.5deg);
  transition: transform .3s ease, box-shadow .3s ease;
}
.archive-cover-card:hover {
  transform: rotate(0deg) scale(1.02);
  box-shadow: 0 28px 64px rgba(0,0,0,.6), 8px 8px 0 rgba(212,160,23,.3);
}
.archive-cover-card img {
  width: 100%;
  display: block;
  aspect-ratio: 2/3;
  object-fit: cover;
}
.archive-cover-badge {
  position: absolute;
  top: -10px;
  right: -10px;
  background: var(--gold);
  color: var(--black);
  font-size: .6rem;
  font-weight: 700;
  letter-spacing: .1em;
  text-transform: uppercase;
  padding: 5px 10px;
  border-radius: 6px;
  border: 2px solid var(--black);
  box-shadow: 2px 2px 0 rgba(0,0,0,.25);
}

/* ===== MAGAZINE GRID ===== */
.archive-main {
  max-width: 1160px;
  margin: 0 auto;
  padding: 56px 32px 80px;
}
.archive-section-heading {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 32px;
  flex-wrap: wrap;
  gap: 14px;
}
.archive-section-heading h2 {
  font-size: 1.3rem;
  font-weight: 700;
  color: var(--dark);
  font-style: italic;
}
.archive-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}
.mag-card {
  background: var(--white);
  border: 1.5px solid var(--gray-light);
  border-radius: 14px;
  overflow: hidden;
  text-decoration: none;
  display: flex;
  flex-direction: column;
  transition: border-color .2s, transform .2s, box-shadow .2s;
}
.mag-card:hover {
  border-color: var(--gold);
  transform: translateY(-4px);
  box-shadow: 0 12px 32px rgba(0,0,0,.1);
}
.mag-card-cover {
  width: 100%;
  aspect-ratio: 3/4;
  object-fit: cover;
  background: linear-gradient(135deg, #e8e0cc, #d4c9a8);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 4rem;
  overflow: hidden;
  position: relative;
  flex-shrink: 0;
}
.mag-card-cover img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform .3s ease;
}
.mag-card:hover .mag-card-cover img { transform: scale(1.04); }
.mag-card-body {
  padding: 18px 20px 20px;
  display: flex;
  flex-direction: column;
  flex: 1;
  gap: 6px;
}
.mag-card-edition {
  font-size: .64rem;
  font-weight: 700;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: var(--gold);
}
.mag-card-title {
  font-size: 1rem;
  font-weight: 700;
  color: var(--dark);
  line-height: 1.35;
}
.mag-card-desc {
  font-size: .8rem;
  color: var(--gray);
  line-height: 1.6;
  flex: 1;
  margin-top: 4px;
}
.mag-card-meta {
  font-size: .72rem;
  color: var(--gray);
  margin-top: 10px;
  padding-top: 12px;
  border-top: 1px solid var(--gray-light);
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 6px;
}
.mag-card-read-btn {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 7px 14px;
  background: var(--gold);
  color: var(--black);
  font-size: .73rem;
  font-weight: 700;
  border-radius: var(--radius);
  text-decoration: none;
  margin-top: 12px;
  width: fit-content;
  border: 1.5px solid var(--black);
  box-shadow: 2px 2px 0 var(--black);
  transition: background .2s, transform .2s, box-shadow .2s;
}
.mag-card-read-btn:hover {
  background: var(--gold-bright);
  transform: translate(-1px, -1px);
  box-shadow: 3px 3px 0 var(--black);
}

/* ===== EMPTY STATE ===== */
.archive-empty {
  text-align: center;
  padding: 80px 32px;
  background: var(--white);
  border-radius: var(--radius-lg);
  border: 1.5px dashed var(--gray-light);
}
.archive-empty-icon { font-size: 4rem; margin-bottom: 16px; }
.archive-empty h3 { font-size: 1.1rem; font-weight: 700; color: var(--dark); margin-bottom: 8px; }
.archive-empty p { font-size: .85rem; color: var(--gray); }

/* ===== RESPONSIVE ===== */
@media (max-width: 900px) {
  .archive-hero-inner { grid-template-columns: 1fr; gap: 36px; }
  .archive-cover-wrap { justify-content: flex-start; }
  .archive-cover-card { max-width: 180px; }
  .archive-grid { grid-template-columns: 1fr 1fr; gap: 18px; }
  .archive-main { padding: 40px 20px 64px; }
  .archive-hero { padding: 40px 0 36px; }
  .archive-hero-inner { padding: 0 20px; }
}
@media (max-width: 580px) {
  .archive-hero-inner { grid-template-columns: 1fr; }
  .archive-cover-wrap { display: none; }
  .archive-grid { grid-template-columns: 1fr; gap: 16px; }
  .archive-main { padding: 32px 16px 56px; }
  .archive-hero-inner { padding: 0 16px; }
}

/* ===== GALLERY CARD STYLES (mirrored from newsletter page) ===== */
.cat-card { background: var(--white); border-radius: 8px; overflow: hidden; border: 1.5px solid var(--gray-light); transition: transform var(--transition), box-shadow var(--transition), border-color var(--transition); text-decoration: none; display: block; }
.cat-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(0,0,0,0.09); border-color: var(--gold); }
.cat-thumb { width: 100%; height: 160px; background: linear-gradient(135deg,#e8e0cc,#d4c9a8); display: flex; align-items: center; justify-content: center; font-size: 2.6rem; overflow: hidden; }
.cat-thumb img { width: 100%; height: 100%; object-fit: cover; display: block; }
.cat-foot { padding: 14px 16px; display: flex; align-items: center; justify-content: space-between; }
.cat-foot h3 { font-size: 0.93rem; font-weight: 600; color: var(--black); }
.cat-foot p { font-size: 0.7rem; color: var(--gray); margin-top: 3px; }
.cat-btn { width: 34px; height: 34px; background: var(--gold); border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: background var(--transition), transform var(--transition); }
.cat-card:hover .cat-btn { background: var(--gold-bright); transform: rotate(8deg); }
.cat-btn svg { width: 15px; height: 15px; color: var(--black); }
</style>
@endpush

@section('content')

{{-- ===== HERO ===== --}}
<div class="archive-hero">
  <div class="archive-hero-inner">
    <div>
      <div class="archive-hero-eyebrow">📚 Volume 2 Archive</div>
      <h1 class="archive-hero-title">
        Himaris Newsletter<br>
        <span>2026 Volume</span>
      </h1>
      <p class="archive-hero-desc">
        Explore the digital archive of the Himaris Newsletter Volume 2 — a creative digital publication from the
        <strong style="color:rgba(255,255,255,.85)">English Department of Politeknik Negeri Bandung</strong>.
        Here you can browse all articles, profiles, review features, and student creative works published in 2026.
      </p>
      <p class="archive-hero-desc" style="margin-bottom:0">
        This volume highlights the theme <strong style="color:rgba(255,255,255,.85)">“English emerges as a medium for self-expression and personal growth,”</strong> giving students a borderless space to share their voices.
      </p>
      <div class="archive-hero-stats" style="margin-top:28px">
        <div>
          <div class="archive-stat-num">
            {{ $postsByCategory->reduce(function($carry, $item) { return $carry + $item->count(); }, 0) }}
          </div>
          <div class="archive-stat-lbl">Articles Published</div>
        </div>
        <div>
          <div class="archive-stat-num">Vol. 2</div>
          <div class="archive-stat-lbl">Latest Volume</div>
        </div>
        <div>
          <div class="archive-stat-num">2026</div>
          <div class="archive-stat-lbl">Year Active</div>
        </div>
      </div>
    </div>

    <div class="archive-cover-wrap reveal">
      <div class="archive-cover-card">
        <img src="{{ asset('images/covermag.png') }}" alt="Himaris Newsletter Magazine Cover"/>
      </div>
      <span class="archive-cover-badge">Latest Issue</span>
    </div>
  </div>
</div>

{{-- ===== CATEGORIZED ARTICLES ===== --}}
<div style="background: var(--off-white); min-height: 400px;">
  <div class="archive-main">

    <div class="archive-section-heading" style="margin-bottom: 24px;">
      <h2>📰 Volume 2 Articles by Category</h2>
    </div>

    @if($postsByCategory->count())
      @foreach([
        'whats-new'         => "What's New",
        'self-improvement'  => 'Self-improvement',
        'entertainment'     => 'Entertainment',
        'miscellaneous'     => 'Miscellaneous',
        'alumni-profile'    => 'Inspirational Alumni & Current Students Profile',
        'review'            => 'Review',
        'upcoming-event'    => 'Upcoming Event',
        'sponsored-content' => 'Sponsored Content',
      ] as $catSlug => $catLabel)
        @if(isset($postsByCategory[$catSlug]) && $postsByCategory[$catSlug]->count())
          <div style="margin-bottom: 48px;">
            <h3 style="font-size:1.1rem; font-weight: 700; color: var(--dark); margin-bottom: 20px; border-bottom: 2.5px solid var(--gold); padding-bottom: 8px; font-style: italic; display: flex; align-items: center; gap: 8px;">
              📁 {{ $catLabel }}
            </h3>
            <div class="archive-grid">
              @foreach($postsByCategory[$catSlug] as $post)
                <a href="{{ route('newsletter.show', $post->slug) }}" class="mag-card reveal" style="transform:none; box-shadow:none;">
                  <div style="width:100%; aspect-ratio:16/10; overflow:hidden;">
                    @if($post->thumbnail)
                      <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" style="width:100%; height:100%; object-fit:cover; display:block;"/>
                    @else
                      <div style="width:100%; height:100%; background:linear-gradient(135deg,#e8e0cc,#d4c9a8); display:flex; align-items:center; justify-content:center; font-size:2.5rem;">📰</div>
                    @endif
                  </div>
                  <div class="mag-card-body" style="padding:14px 16px 16px;">
                    <div class="mag-card-title" style="font-size:0.9rem; line-height:1.4;">{{ Str::limit($post->title, 60) }}</div>
                    <div class="mag-card-meta" style="margin-top:6px; padding-top:8px; border-top:1.5px solid var(--gray-light); font-size:0.68rem; color:var(--gray); display:flex; justify-content:space-between; width:100%;">
                      <span>By {{ $post->author_name ?? $post->user?->name ?? 'Himaris' }}</span>
                      <span>{{ $post->published_at?->format('d M Y') ?? $post->created_at->format('d M Y') }}</span>
                    </div>
                  </div>
                </a>
              @endforeach
            </div>
          </div>
        @endif
      @endforeach
    @else
      <div class="archive-empty reveal">
        <div class="archive-empty-icon">📰</div>
        <h3>No articles published yet</h3>
        <p>Articles will appear here once they are published from the admin panel.</p>
      </div>
    @endif

  </div>
</div>

{{-- ===== GALLERY SECTION ===== --}}
<div style="background:var(--white); border-top: 3px solid var(--black); padding: 60px 32px 72px;">
  <div style="max-width:1160px; margin: 0 auto;">
    <div class="archive-section-heading" style="margin-bottom:32px">
      <h2>📸 Gallery</h2>
    </div>

    @if($photos->count())
      <div class="cat-grid">
        @foreach($photos as $photo)
          <a href="{{ route('gallery.show', $photo->id) }}" class="cat-card reveal">
            <div class="cat-thumb">
              @if($photo->image)
                <img src="{{ asset('storage/' . $photo->image) }}" alt="{{ $photo->title }}"/>
              @else
                📷
              @endif
            </div>
            <div class="cat-foot">
              <div>
                <h3>{{ Str::limit($photo->title, 40) }}</h3>
                <p>
                  @if($photo->date)
                    {{ $photo->date->format('d M Y') }}
                  @endif
                  @if($photo->location)
                    {{ $photo->date ? ' • ' : '' }}{{ $photo->location }}
                  @endif
                </p>
              </div>
              <div class="cat-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                  <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
              </div>
            </div>
          </a>
        @endforeach
      </div>
    @else
      <div style="text-align:center;padding:60px 0;color:var(--gray)">
        <div style="font-size:3rem;margin-bottom:12px">📷</div>
        <p style="font-weight:600">No photos yet.</p>
        <p style="font-size:0.85rem;margin-top:6px">Check back soon for gallery updates!</p>
      </div>
    @endif
  </div>
</div>

@endsection
