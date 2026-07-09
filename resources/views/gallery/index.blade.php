@extends('layouts.app')

@section('title', 'Gallery — Himaris Newsletter')
@section('meta_description', 'Explore outstanding artworks, photography, and creative expressions from HIMARIS students.')

@push('styles')
<style>
.gallery-header { margin-top: var(--nav-h); padding: 48px 0 36px; background: var(--dark); text-align: center; }
.gallery-header h1 { font-size: 1.8rem; font-weight: 700; color: var(--gold); }
.gallery-header p { font-size: 0.88rem; color: rgba(255,255,255,0.55); font-style: italic; margin-top: 8px; }

.gallery-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;
  max-width: 1160px; margin: 0 auto; padding: 48px 32px 72px;
}
.cat-card { background: var(--white); border-radius: 8px; overflow: hidden; border: 1.5px solid var(--gray-light); transition: transform var(--transition), box-shadow var(--transition), border-color var(--transition); text-decoration: none; display: block; }
.cat-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(0,0,0,0.09); border-color: var(--gold); }
.cat-thumb { width: 100%; height: 180px; background: linear-gradient(135deg,#e8e0cc,#d4c9a8); display: flex; align-items: center; justify-content: center; font-size: 2.6rem; overflow: hidden; }
.cat-thumb img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform var(--transition); }
.cat-card:hover .cat-thumb img { transform: scale(1.04); }
.cat-foot { padding: 14px 16px; display: flex; align-items: center; justify-content: space-between; }
.cat-foot h3 { font-size: 0.93rem; font-weight: 600; color: var(--black); }
.cat-foot p { font-size: 0.7rem; color: var(--gray); margin-top: 3px; }
.cat-btn { width: 34px; height: 34px; background: var(--gold); border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: background var(--transition), transform var(--transition); }
.cat-card:hover .cat-btn { background: var(--gold-bright); transform: rotate(8deg); }
.cat-btn svg { width: 15px; height: 15px; color: var(--black); }

@media (max-width: 900px) { .gallery-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 600px) { .gallery-grid { grid-template-columns: 1fr; padding: 32px 18px 48px; } }
</style>
@endpush

@section('content')

<div class="gallery-header">
  <h1>📸 Gallery</h1>
  <p>Explore outstanding artworks, photography, and creative expressions from HIMARIS students.</p>
</div>

<div class="gallery-grid">
  @forelse($photos as $photo)
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
  @empty
    <div style="grid-column:1/-1;text-align:center;padding:80px 0;color:var(--gray)">
      <div style="font-size:3rem;margin-bottom:14px">📷</div>
      <p style="font-weight:600">No photos yet.</p>
      <p style="font-size:0.85rem;margin-top:6px">Check back soon for gallery updates!</p>
    </div>
  @endforelse
</div>

@if($photos->hasPages())
  <div style="max-width:1160px;margin:0 auto;padding:0 32px 48px">
    {!! $photos->links('partials.pagination') !!}
  </div>
@endif

@endsection
