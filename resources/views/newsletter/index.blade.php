@extends('layouts.app')
@section('title', 'Newsletter — Himaris')

@push('styles')
<style>
.page-header-nl { margin-top: var(--nav-h); background: var(--gold); border-bottom: 3px solid var(--black); padding: 36px 32px 30px; }
.page-header-nl-inner { max-width: 1160px; margin: 0 auto; }
.page-header-nl h1 { font-size: clamp(1.55rem,3vw,2.1rem); font-weight: 700; color: var(--black); font-style: italic; }
.featured-badge { display: inline-flex; align-items: center; padding: 5px 14px; margin-top: 14px; background: var(--black); color: var(--white); font-size: 0.76rem; font-weight: 600; font-style: italic; border-radius: var(--radius); }
.featured-section { background: var(--gold); padding: 0 32px 44px; border-bottom: 3px solid var(--black); }
.featured-inner { max-width: 1160px; margin: 0 auto; }
.featured-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 20px; padding-top: 24px; }
.feat-card { background: var(--white); border-radius: 8px; overflow: hidden; border: 2px solid var(--black); transition: transform var(--transition), box-shadow var(--transition); text-decoration: none; display: block; }
.feat-card:hover { transform: translateY(-3px) rotate(-0.4deg); box-shadow: 4px 4px 0 var(--black); }
.feat-card-img-wrap { overflow: hidden; }
.feat-card-img { width: 100%; aspect-ratio: 4/3; object-fit: cover; background: #e0d8c8; transition: transform var(--transition); display: block; }
.feat-card:hover .feat-card-img { transform: scale(1.04); }
.feat-card-body { padding: 14px 16px; display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; }
.feat-card-tag { font-size: 0.62rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: var(--gold); margin-bottom: 4px; }
.feat-card-title { font-size: 0.9rem; font-weight: 600; line-height: 1.38; color: var(--black); }
.feat-card-meta { font-size: 0.7rem; color: var(--gray); margin-top: 6px; }
.feat-card-btn { width: 36px; height: 36px; flex-shrink: 0; background: var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: background var(--transition), transform var(--transition); }
.feat-card:hover .feat-card-btn { background: var(--gold-bright); transform: rotate(45deg); }
.feat-card-btn svg { width: 15px; height: 15px; color: var(--black); }

/* Submission inline strip */
.submit-strip{background:var(--dark);border-bottom:2px solid var(--gold);padding:18px 32px;}
.submit-strip-inner{max-width:1160px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap;}
.submit-strip-text{font-size:.84rem;color:rgba(255,255,255,.6);}
.submit-strip-text strong{color:var(--white);font-weight:600;}
.submit-strip-btns{display:flex;gap:8px;flex-wrap:wrap;}
.btn-strip{display:inline-flex;align-items:center;gap:6px;padding:8px 16px;font-family:var(--font);font-weight:700;font-size:.78rem;border-radius:var(--radius);text-decoration:none;white-space:nowrap;transition:all var(--transition);}
.btn-strip.article{background:var(--gold);color:var(--black);border:1.5px solid var(--gold);}
.btn-strip.article:hover{background:var(--gold-bright);}
.btn-strip.artwork{background:transparent;color:rgba(255,255,255,.75);border:1.5px solid rgba(255,255,255,.2);}
.btn-strip.artwork:hover{border-color:var(--gold);color:var(--gold);}
.btn-strip.guide{background:transparent;color:rgba(255,255,255,.35);border:none;font-size:.72rem;font-weight:500;padding:8px 4px;}
.btn-strip.guide:hover{color:rgba(255,255,255,.7);}

.explore-section { background: var(--off-white); padding: 60px 32px; }
.explore-inner { max-width: 1160px; margin: 0 auto; }
.explore-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 32px; flex-wrap: wrap; gap: 14px; }
.explore-title { font-size: 1.35rem; font-weight: 700; font-style: italic; }
.cat-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 20px; }
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

@media(max-width:900px){
  .featured-grid { grid-template-columns: 1fr; }
  .cat-grid { grid-template-columns: 1fr 1fr; }
  .featured-section, .explore-section, .page-header-nl { padding-left: 20px; padding-right: 20px; }
  .submit-strip { padding: 16px 20px; }
  .submit-strip-inner { flex-direction: column; align-items: flex-start; gap: 12px; }
}
@media(max-width:500px){ .cat-grid { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')

<div class="page-header-nl">
  <div class="page-header-nl-inner">
    <h1><em>News, Stories,</em> and <em>Opportunities.</em></h1>
    <div class="featured-badge">Featured Articles</div>
  </div>
</div>

<div class="featured-section">
  <div class="featured-inner">
    @if($featured->count())
      <div class="featured-grid">
        @foreach($featured as $post)
          <a href="{{ route('newsletter.show', $post->slug) }}" class="feat-card reveal">
            <div class="feat-card-img-wrap">
              @if($post->thumbnail)
                <img src="{{ asset('storage/' . $post->thumbnail) }}"
                     alt="{{ $post->title }}"
                     class="feat-card-img"/>
              @else
                <div class="feat-card-img"
                     style="display:flex;align-items:center;justify-content:center;font-size:3rem;">
                  &#128240;
                </div>
              @endif
            </div>
            <div class="feat-card-body">
              <div>
                <div class="feat-card-tag">{{ $post->category }}</div>
                <div class="feat-card-title">{{ $post->title }}</div>
                <div class="feat-card-meta">
                  By {{ $post->user->name ?? 'HIMARIS' }}
                  &mdash;
                  {{ $post->published_at?->format('d M Y') ?? $post->created_at->format('d M Y') }}
                </div>
              </div>
              <div class="feat-card-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                  <path d="M5 19L19 5M19 5H10M19 5v9"/>
                </svg>
              </div>
            </div>
          </a>
        @endforeach
      </div>
    @endif
  </div>
</div>

{{-- ===== SUBMISSION BUTTON ===== --}}
<div style="background:var(--dark);border-bottom:2px solid var(--gold);padding:16px 32px;">
  <div style="max-width:1160px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap;">
    <p style="font-size:.84rem;color:rgba(255,255,255,.6);">
      <strong style="color:var(--white);font-weight:600;">Want to write for us?</strong>
      Share your story or campus experience with the HIMARIS community.
    </p>
    <a href="{{ route('submission-guidelines') }}"
       style="display:inline-flex;align-items:center;gap:6px;padding:9px 20px;background:var(--gold);color:var(--black);font-weight:700;font-size:.8rem;border-radius:var(--radius);border:1.5px solid var(--gold);text-decoration:none;white-space:nowrap;transition:all .2s;">
      &#128221; Submission Guidelines &rarr;
    </a>
  </div>
</div>

<div class="explore-section">
  <div class="explore-inner">
    <div class="explore-header">
      <h2 class="explore-title">All Articles</h2>
      <form method="GET" action="{{ route('newsletter.index') }}">
        @if(request()->get('category'))
          <input type="hidden" name="category" value="{{ request()->get('category') }}"/>
        @endif
        <div class="filter-search">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"/>
            <path d="M21 21l-4.35-4.35"/>
          </svg>
          <input type="text" name="search"
                 value="{{ request()->get('search') }}"
                 placeholder="Search articles..."/>
        </div>
      </form>
    </div>

    {{-- Category filter tabs --}}
    <div style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:28px;">
      @foreach([
        ''                 => 'All',
        'news'            => 'News',
        'scholarship'     => 'Scholarship',
        'announcement'    => 'Announcement',
        'article'         => 'Article',
        'cafe-review'     => 'Cafe Review',
        'alumni'          => 'Alumni Profile',
        'self-improvement'=> 'Self-Improvement',
        'upcoming-event'  => 'Upcoming Event',
        'miscellaneous'   => 'Miscellaneous',
      ] as $val => $label)
        <a href="{{ route('newsletter.index', array_merge(request()->only('search'), $val ? ['category' => $val] : [])) }}"
           style="display:inline-block;padding:6px 14px;font-size:.75rem;font-weight:600;border-radius:20px;border:1.5px solid {{ request()->get('category','') === $val ? 'var(--black)' : 'var(--gray-light)' }};background:{{ request()->get('category','') === $val ? 'var(--gold)' : 'var(--white)' }};color:{{ request()->get('category','') === $val ? 'var(--black)' : 'var(--gray)' }};text-decoration:none;transition:all .18s;">{{ $label }}</a>
      @endforeach
    </div>

    @if($posts->count())
      <div class="cat-grid">
        @foreach($posts as $post)
          <a href="{{ route('newsletter.show', $post->slug) }}" class="cat-card reveal">
            <div class="cat-thumb">
              @if($post->thumbnail)
                <img src="{{ asset('storage/' . $post->thumbnail) }}"
                     alt="{{ $post->title }}"/>
              @else
                &#128240;
              @endif
            </div>
            <div class="cat-foot">
              <div>
                <h3>{{ Str::limit($post->title, 40) }}</h3>
                <p>{{ $post->category }}</p>
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

      <div style="margin-top:40px">
        {!! $posts->appends(request()->query())->links() !!}
      </div>
    @else
      <div style="text-align:center;padding:60px 0;color:var(--gray)">
        <div style="font-size:3rem;margin-bottom:12px">&#128269;</div>
        <p style="font-weight:600">No articles found.</p>
        <p style="font-size:.85rem;margin-top:6px">Try a different search term.</p>
      </div>
    @endif
  </div>
</div>

@endsection