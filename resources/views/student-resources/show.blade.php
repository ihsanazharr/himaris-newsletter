@extends('layouts.app')

@section('title', $title . ' — Student Resources — Himaris Newsletter')

@section('content')

<!-- BREADCRUMB -->
<div class="breadcrumb">
  <a href="{{ route('home') }}">Home</a>
  <span class="sep">›</span>
  <a href="{{ route('student-resources.index') }}">Student Resources</a>
  <span class="sep">›</span>
  <span>{{ Str::limit($title, 40) }}</span>
</div>

<!-- EVENT HERO -->
<div class="event-hero">
  <div class="event-hero-bg">
    @if($thumbnail)
      <img src="{{ asset('storage/' . $thumbnail) }}" alt="{{ $title }}"/>
    @else
      <div style="width:100%;height:100%;background:linear-gradient(135deg,var(--dark),var(--black))"></div>
    @endif
  </div>
  <div class="event-hero-content">
    <div class="event-type-badge">
      {{ ['events'=>'📅','seminar'=>'🎓','workshop'=>'🛠️','scholarship'=>'💵','competition'=>'🏆'][$category] ?? '📝' }}
      {{ ['events'=>'Event','seminar'=>'Seminar','workshop'=>'Workshop','scholarship'=>'Scholarship','competition'=>'Competition'][$category] ?? 'Resource' }}
    </div>
    <h1 class="event-hero-title">{{ $title }}</h1>
  </div>
</div>

<!-- MAIN CONTENT -->
<div class="main-wrap">
  <div>
    <!-- ABOUT THIS EVENT / RESOURCE -->
    <div class="event-body-card reveal">
      <h2>About This {{ $type === 'event' ? 'Event' : 'Resource' }}</h2>
      <p style="line-height:1.75;color:#444;font-size:0.93rem;">{{ $description ?? 'No description provided.' }}</p>

      @if($type === 'event')
        <h2>Event Details</h2>
        <div class="agenda-list">
          <div class="agenda-item">
            <div class="agenda-dot">📅</div>
            <div>
              <div class="agenda-time">Date</div>
              <div class="agenda-title">{{ $date->format('l, d F Y') }}</div>
            </div>
          </div>
          @if($date->format('H:i') !== '00:00')
          <div class="agenda-item">
            <div class="agenda-dot">⏰</div>
            <div>
              <div class="agenda-time">Time</div>
              <div class="agenda-title">{{ $date->format('H:i') }} WIB</div>
            </div>
          </div>
          @endif
          @if($location)
          <div class="agenda-item">
            <div class="agenda-dot">📍</div>
            <div>
              <div class="agenda-time">Location</div>
              <div class="agenda-title">{{ $location }}</div>
            </div>
          </div>
          @endif
          @if($source)
          <div class="agenda-item">
            <div class="agenda-dot">🏢</div>
            <div>
              <div class="agenda-time">Organizer</div>
              <div class="agenda-title">{{ $source }}</div>
            </div>
          </div>
          @endif
        </div>
      @else
        <h2>Resource Details</h2>
        <div class="agenda-list">
          <div class="agenda-item">
            <div class="agenda-dot">📅</div>
            <div>
              <div class="agenda-time">Published Date</div>
              <div class="agenda-title">{{ $date->format('l, d F Y') }}</div>
            </div>
          </div>
          @if($source)
          <div class="agenda-item">
            <div class="agenda-dot">🏢</div>
            <div>
              <div class="agenda-time">Source / Credit</div>
              <div class="agenda-title">{{ $source }}</div>
            </div>
          </div>
          @endif
        </div>

        {{-- Resource Action Access Button --}}
        <div style="margin-top:28px;padding:22px;background:var(--off-white);border-radius:var(--radius);border:2px dashed var(--gray-light)">
          <h3 style="font-size:1.05rem;font-weight:700;margin-bottom:8px;color:var(--dark)">📥 Resource Access</h3>
          <p style="font-size:0.82rem;color:var(--gray);margin-bottom:18px">This resource has files or links available for you to download or open.</p>
          @if($file_path)
            <a href="{{ asset('storage/' . $file_path) }}" target="_blank" class="btn-apply" style="display:inline-flex;align-items:center;gap:8px;text-decoration:none;font-weight:700;padding:12px 24px;border:2.2px solid var(--black);background:var(--gold);color:var(--black);box-shadow:3px 3px 0 var(--black);border-radius:var(--radius);transition:all .15s;"
               onmouseover="this.style.transform='translate(-1px,-1px)';this.style.boxShadow='4px 4px 0 var(--black)';"
               onmouseout="this.style.transform='none';this.style.boxShadow='3px 3px 0 var(--black)';">
              📥 Download Attached File
            </a>
          @elseif($external_url)
            <a href="{{ $external_url }}" target="_blank" class="btn-apply" style="display:inline-flex;align-items:center;gap:8px;text-decoration:none;font-weight:700;padding:12px 24px;border:2.2px solid var(--black);background:var(--gold);color:var(--black);box-shadow:3px 3px 0 var(--black);border-radius:var(--radius);transition:all .15s;"
               onmouseover="this.style.transform='translate(-1px,-1px)';this.style.boxShadow='4px 4px 0 var(--black)';"
               onmouseout="this.style.transform='none';this.style.boxShadow='3px 3px 0 var(--black)';">
              🔗 Open External Link
            </a>
          @endif
        </div>
      @endif
    </div>
  </div>

  <!-- SIDEBAR -->
  <aside class="sidebar" style="display:flex;flex-direction:column;gap:22px">
    <div class="quick-info-card">
      <h3>Quick Info</h3>
      <div class="qi-item">
        <div class="qi-label">Date</div>
        <p class="qi-val">{{ $date->format('d M Y') }}</p>
      </div>
      @if($type === 'event' && $date->format('H:i') !== '00:00')
      <div class="qi-item">
        <div class="qi-label">Time</div>
        <p class="qi-val">{{ $date->format('H:i') }} WIB</p>
      </div>
      @endif
      @if($type === 'event' && $location)
      <div class="qi-item">
        <div class="qi-label">Location</div>
        <p class="qi-val">{{ $location }}</p>
      </div>
      @endif
      @if($source)
      <div class="qi-item">
        <div class="qi-label">{{ $type === 'event' ? 'Organizer' : 'Source' }}</div>
        <p class="qi-val">{{ $source }}</p>
      </div>
      @endif
    </div>

    <a href="{{ route('student-resources.index') }}" class="btn-outline" style="justify-content:center">← Back to Resources</a>
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