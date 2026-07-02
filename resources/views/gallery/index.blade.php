@extends('layouts.app')

@section('title', 'Gallery — Himaris Newsletter')
@section('meta_description', 'Browse photos from HIMARIS events, activities, and campus life at Politeknik Negeri Bandung.')

@push('styles')
<style>
.gallery-header { margin-top: var(--nav-h); padding: 48px 0 36px; background: var(--dark); text-align: center; }
.gallery-header h1 { font-size: 1.8rem; font-weight: 700; color: var(--gold); }
.gallery-header p { font-size: 0.88rem; color: rgba(255,255,255,0.55); font-style: italic; margin-top: 8px; }

.gallery-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px;
  max-width: 1160px; margin: 0 auto; padding: 48px 32px 72px;
}
.gallery-item {
  position: relative; border-radius: var(--radius-lg); overflow: hidden;
  border: 1.5px solid var(--gray-light); background: var(--white);
  transition: transform var(--transition), box-shadow var(--transition), border-color var(--transition);
  cursor: pointer;
}
.gallery-item:hover { transform: translateY(-4px); box-shadow: var(--shadow); border-color: var(--gold); }
.gallery-item img {
  width: 100%; aspect-ratio: 4/3; object-fit: cover; background: var(--gray-light);
  transition: transform var(--transition);
}
.gallery-item:hover img { transform: scale(1.05); }
.gallery-item-overlay {
  position: absolute; bottom: 0; left: 0; right: 0;
  background: linear-gradient(to top, rgba(17,17,17,0.78) 0%, transparent 100%);
  padding: 18px 16px 14px; display: flex; flex-direction: column; gap: 2px;
}
.gallery-item-title { font-size: 0.88rem; font-weight: 600; color: var(--white); line-height: 1.3; }
.gallery-item-meta { font-size: 0.7rem; color: rgba(255,255,255,0.55); }

@media (max-width: 900px) { .gallery-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 600px) { .gallery-grid { grid-template-columns: 1fr; padding: 32px 18px 48px; } }
</style>
@endpush

@section('content')

<div class="gallery-header">
  <h1>📸 Gallery</h1>
  <p>Moments captured from our events, activities, and campus life.</p>
</div>

<div class="gallery-grid">
  @forelse($photos as $photo)
    <a href="{{ route('gallery.show', $photo->id) }}" class="gallery-item reveal">
      <img src="{{ asset('storage/' . $photo->image) }}" alt="{{ $photo->title }}"/>
      <div class="gallery-item-overlay">
        <span class="gallery-item-title">{{ $photo->title }}</span>
        @if($photo->date)
          <span class="gallery-item-meta">{{ $photo->date->format('d M Y') }}@if($photo->location) — {{ $photo->location }}@endif</span>
        @endif
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
    {!! $photos->links() !!}
  </div>
@endif

@endsection
