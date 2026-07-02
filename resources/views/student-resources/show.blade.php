@extends('layouts.app')

@section('title', $event->title . ' — Student Resources — Himaris Newsletter')

@section('content')

<!-- BREADCRUMB -->
<div class="breadcrumb">
  <a href="{{ route('home') }}">Home</a>
  <span class="sep">›</span>
  <a href="{{ route('student-resources.index') }}">Student Resources</a>
  <span class="sep">›</span>
  <span>{{ Str::limit($event->title, 40) }}</span>
</div>

<!-- EVENT HERO -->
<div class="event-hero">
  <div class="event-hero-bg">
    @if($event->thumbnail)
      <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}"/>
    @else
      <div style="width:100%;height:100%;background:linear-gradient(135deg,var(--dark),var(--black))"></div>
    @endif
  </div>
  <div class="event-hero-content">
    <div class="event-type-badge">📅 {{ $event->organizer ?? 'Event' }}</div>
    <h1 class="event-hero-title">{{ $event->title }}</h1>
  </div>
</div>

<!-- MAIN CONTENT -->
<div class="main-wrap">
  <div>
    <!-- ABOUT THIS EVENT -->
    <div class="event-body-card reveal">
      <h2>About This Event</h2>
      <p>{{ $event->description ?? 'No description provided.' }}</p>

      <h2>Event Details</h2>
      <div class="agenda-list">
        <div class="agenda-item">
          <div class="agenda-dot">📅</div>
          <div>
            <div class="agenda-time">Date</div>
            <div class="agenda-title">{{ $event->start_date->format('l, d F Y') }}</div>
          </div>
        </div>
        @if($event->start_date->format('H:i') !== '00:00')
        <div class="agenda-item">
          <div class="agenda-dot">⏰</div>
          <div>
            <div class="agenda-time">Time</div>
            <div class="agenda-title">{{ $event->start_date->format('H:i') }} WIB</div>
          </div>
        </div>
        @endif
        @if($event->location)
        <div class="agenda-item">
          <div class="agenda-dot">📍</div>
          <div>
            <div class="agenda-time">Location</div>
            <div class="agenda-title">{{ $event->location }}</div>
          </div>
        </div>
        @endif
        @if($event->organizer)
        <div class="agenda-item">
          <div class="agenda-dot">🏢</div>
          <div>
            <div class="agenda-time">Organizer</div>
            <div class="agenda-title">{{ $event->organizer }}</div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>

  <!-- SIDEBAR -->
  <aside class="sidebar" style="display:flex;flex-direction:column;gap:22px">
    <div class="quick-info-card">
      <h3>Quick Info</h3>
      <div class="qi-item">
        <div class="qi-label">Date</div>
        <p class="qi-val">{{ $event->start_date->format('d M Y') }}</p>
      </div>
      @if($event->start_date->format('H:i') !== '00:00')
      <div class="qi-item">
        <div class="qi-label">Time</div>
        <p class="qi-val">{{ $event->start_date->format('H:i') }} WIB</p>
      </div>
      @endif
      @if($event->location)
      <div class="qi-item">
        <div class="qi-label">Location</div>
        <p class="qi-val">{{ $event->location }}</p>
      </div>
      @endif
    </div>

    <a href="{{ route('student-resources.index') }}" class="btn-outline" style="justify-content:center">← Back to Events</a>
  </aside>
</div>

<!-- MORE EVENTS -->
@if($moreEvents->count())
<section class="section" style="background:var(--off-white)">
  <div class="container">
    <h2 class="sec-heading"><span>📅</span><span class="underline">More Events</span><span>📅</span></h2>
    <div class="more-grid">
      @foreach($moreEvents as $e)
        <a href="{{ route('student-resources.show', $e->slug) }}" class="more-item reveal">
          <div style="overflow:hidden">
            @if($e->thumbnail)
              <img src="{{ asset('storage/' . $e->thumbnail) }}" alt="{{ $e->title }}" class="more-item-img"/>
            @else
              <div class="more-item-img" style="display:flex;align-items:center;justify-content:center;font-size:2rem;background:var(--gray-light)">📅</div>
            @endif
          </div>
          <div class="more-item-body">
            <p class="more-tag">{{ $e->organizer ?? 'Event' }}</p>
            <p class="more-title">{{ Str::limit($e->title, 35) }}</p>
            <p class="more-date">{{ $e->start_date->format('d M Y') }}</p>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection