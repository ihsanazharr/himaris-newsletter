@extends('layouts.app')

@section('title', $gallery->title . ' — Gallery — Himaris Newsletter')

@push('styles')
<style>
.gal-detail-hero {
  margin-top: var(--nav-h); position: relative;
  display: flex; align-items: center; justify-content: center;
  background: var(--black); min-height: 460px; padding: 32px;
}
.gal-detail-hero img {
  max-width: 100%; max-height: 540px; object-fit: contain;
  border-radius: var(--radius-lg); box-shadow: 0 12px 48px rgba(0,0,0,0.4);
}

.gal-detail-body {
  max-width: 720px; margin: 0 auto; padding: 40px 32px 72px;
}
.gal-detail-title { font-size: 1.5rem; font-weight: 700; color: var(--black); margin-bottom: 14px; }
.gal-detail-meta { display: flex; gap: 24px; flex-wrap: wrap; margin-bottom: 22px; }
.gal-meta-item { display: flex; align-items: center; gap: 8px; }
.gal-meta-icon { font-size: 1.1rem; }
.gal-meta-label { font-size: 0.68rem; font-weight: 600; color: var(--gray); text-transform: uppercase; letter-spacing: 0.06em; }
.gal-meta-val { font-size: 0.88rem; font-weight: 600; color: var(--dark); }

.gal-desc-top {
  font-size: 0.93rem; color: #444; line-height: 1.85;
  padding: 22px 0 20px; border-top: 1px solid var(--gray-light);
}
.gal-body-image {
  width: 100%; border-radius: var(--radius-lg);
  box-shadow: 0 6px 28px rgba(0,0,0,0.12); margin: 4px 0 20px;
  display: block;
}
.gal-desc-bottom {
  font-size: 0.93rem; color: #444; line-height: 1.85;
  padding-bottom: 22px; border-bottom: 1px solid var(--gray-light);
}

.gal-more { max-width: 1160px; margin: 0 auto; padding: 0 32px 72px; }
.gal-more-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.gal-more-item {
  border-radius: 8px; overflow: hidden; border: 1.5px solid var(--gray-light);
  transition: transform var(--transition), box-shadow var(--transition), border-color var(--transition);
}
.gal-more-item:hover { transform: translateY(-3px); box-shadow: var(--shadow); border-color: var(--gold); }
.gal-more-item img { width: 100%; aspect-ratio: 4/3; object-fit: cover; }
.gal-more-item-body { padding: 10px 12px; }
.gal-more-item-title { font-size: 0.82rem; font-weight: 600; color: var(--black); line-height: 1.3; }
.gal-more-item-date { font-size: 0.68rem; color: var(--gray); margin-top: 3px; }

@media (max-width: 900px) { .gal-more-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 600px) {
  .gal-detail-hero { min-height: 300px; padding: 20px; }
  .gal-detail-body { padding: 28px 18px 48px; }
  .gal-more { padding: 0 18px 48px; }
  .gal-more-grid { grid-template-columns: 1fr; }
}
</style>
@endpush

@section('content')

<!-- THUMBNAIL HERO -->
<div class="gal-detail-hero">
  <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"/>
</div>

<!-- DETAIL BODY -->
<div class="gal-detail-body">
  <h1 class="gal-detail-title">{{ $gallery->title }}</h1>

  <div class="gal-detail-meta">
    @if($gallery->date)
      <div class="gal-meta-item">
        <span class="gal-meta-icon">📅</span>
        <div>
          <div class="gal-meta-label">Date</div>
          <div class="gal-meta-val">{{ $gallery->date->format('d M Y') }}</div>
        </div>
      </div>
    @endif
    @if($gallery->location)
      <div class="gal-meta-item">
        <span class="gal-meta-icon">📍</span>
        <div>
          <div class="gal-meta-label">Location</div>
          <div class="gal-meta-val">{{ $gallery->location }}</div>
        </div>
      </div>
    @endif
  </div>

  {{-- Description split around body image --}}
  @php
    $desc = $gallery->description ?? '';
    // Split description roughly at the midpoint (by sentence or word boundary)
    $half = '';
    $rest = '';
    if ($desc) {
      $mid = (int) (mb_strlen($desc) / 2);
      // Find the nearest space at or after midpoint to avoid cutting words
      $splitAt = mb_strpos($desc, ' ', $mid);
      if ($splitAt === false) {
        $half = $desc;
      } else {
        $half = mb_substr($desc, 0, $splitAt);
        $rest = mb_substr($desc, $splitAt + 1);
      }
    }
  @endphp

  @if($desc)
    <div class="gal-desc-top">
      {{ $half }}
    </div>
  @endif

  @if($gallery->body_image)
    <img
      src="{{ asset('storage/' . $gallery->body_image) }}"
      alt="{{ $gallery->title }} — detail"
      class="gal-body-image"
    />
  @endif

  @if($rest)
    <div class="gal-desc-bottom">
      {{ $rest }}
    </div>
  @elseif(!$desc && !$gallery->body_image)
    {{-- fallback border if nothing to show --}}
    <div style="border-top:1px solid var(--gray-light);padding-top:22px"></div>
  @endif

  <div style="margin-top:24px">
    <a href="{{ route('gallery.index') }}" class="btn-outline" style="font-size:0.82rem;padding:8px 18px">
      ← Back to Gallery
    </a>
  </div>
</div>

<!-- MORE PHOTOS -->
@if($morePhotos->count())
<div class="gal-more">
  <h2 class="sec-heading" style="margin-bottom:24px"><span>📷</span><span class="underline">More Photos</span><span>📷</span></h2>
  <div class="gal-more-grid">
    @foreach($morePhotos as $photo)
      <a href="{{ route('gallery.show', $photo->id) }}" class="gal-more-item reveal">
        <img src="{{ asset('storage/' . $photo->image) }}" alt="{{ $photo->title }}"/>
        <div class="gal-more-item-body">
          <div class="gal-more-item-title">{{ $photo->title }}</div>
          @if($photo->date)
            <div class="gal-more-item-date">{{ $photo->date->format('d M Y') }}</div>
          @endif
        </div>
      </a>
    @endforeach
  </div>
</div>
@endif

@endsection
