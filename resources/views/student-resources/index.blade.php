@extends('layouts.app')

@section('title', 'Student Resources — Himaris Newsletter')

@push('styles')
<style>
.sr-filter-bar { background: var(--white); border-bottom: 1.5px solid var(--gray-light); }
.sr-filter-inner { max-width: 1160px; margin: 0 auto; padding: 0 32px; display: flex; align-items: center; gap: 4px; }
</style>
@endpush

@section('content')

<!-- PAGE HEADER -->
<div class="page-header">
  <div class="page-header-inner">
    <h1>Student Resources</h1>
    <p>Events, workshops, seminars, and more — curated for English Department students.</p>
  </div>
</div>

<!-- FILTER BAR -->
<div class="sr-filter-bar">
  <div class="sr-filter-inner">
    <a href="{{ route('student-resources.index') }}"
       class="filter-tab {{ $filter === 'all' ? 'active' : '' }}">All Events</a>
    <a href="{{ route('student-resources.index', ['filter' => 'upcoming']) }}"
       class="filter-tab {{ $filter === 'upcoming' ? 'active' : '' }}">Upcoming</a>
    <a href="{{ route('student-resources.index', ['filter' => 'past']) }}"
       class="filter-tab {{ $filter === 'past' ? 'active' : '' }}">Past</a>
  </div>
</div>

<!-- EVENTS GRID -->
<section class="section" style="background:var(--off-white)">
  <div class="container">
    <div class="articles-grid">
      @forelse($events as $event)
        <a href="{{ route('student-resources.show', $event->slug) }}" class="res-card reveal">
          <div class="res-card-img-wrap">
            @if($event->thumbnail)
              <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}" class="res-card-img"/>
            @else
              <div class="res-card-img" style="display:flex;align-items:center;justify-content:center;font-size:3rem;background:var(--gray-light)">📅</div>
            @endif
            <div class="res-card-badge {{ $event->start_date->isFuture() ? 'badge-upcoming' : 'badge-past' }}">
              {{ $event->start_date->isFuture() ? 'Upcoming' : 'Past' }}
            </div>
          </div>
          <div class="res-card-body">
            <span class="res-card-tag">{{ $event->organizer ?? 'Event' }}</span>
            <h3 class="res-card-title">{{ $event->title }}</h3>
            <div class="res-card-meta">
              <span class="res-card-date">📅 {{ $event->start_date->format('d M Y') }}</span>
            </div>
          </div>
        </a>
      @empty
        <div style="grid-column:1/-1;text-align:center;padding:60px 0;color:var(--gray)">
          <div style="font-size:3rem;margin-bottom:12px">📅</div>
          <p style="font-weight:600">No events found.</p>
          <p style="font-size:.85rem;margin-top:6px">Check back soon for updates!</p>
        </div>
      @endforelse
    </div>

    <div style="margin-top:40px">
      {!! $events->appends(request()->query())->links() !!}
    </div>
  </div>
</section>

@endsection