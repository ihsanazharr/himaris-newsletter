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
       class="filter-tab {{ $filter === 'upcoming' ? 'active' : '' }}">Upcoming Events</a>
    <a href="{{ route('student-resources.index', ['filter' => 'past']) }}"
       class="filter-tab {{ $filter === 'past' ? 'active' : '' }}">Past Events</a>
    <a href="{{ route('student-resources.index', ['filter' => 'files']) }}"
       class="filter-tab {{ $filter === 'files' ? 'active' : '' }}">Files &amp; Study Materials</a>
  </div>
</div>

<!-- MAIN GRID -->
<section class="section" style="background:var(--off-white)">
  <div class="container">
    <div class="articles-grid">
      @if($filter === 'files')
        {{-- RENDER STUDENT RESOURCES (FILES & LINKS) --}}
        @forelse($resources as $res)
          <div class="res-card reveal" style="display:flex;flex-direction:column;background:var(--white);border-radius:var(--radius-lg);overflow:hidden;border:1.5px solid var(--gray-light)">
            <div class="res-card-img-wrap" style="position:relative;height:180px;overflow:hidden">
              @if($res->thumbnail)
                <img src="{{ asset('storage/' . $res->thumbnail) }}" alt="{{ $res->title }}" class="res-card-img" style="width:100%;height:100%;object-fit:cover"/>
              @else
                <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:3rem;background:var(--gray-light)">
                  {{ ['events'=>'📅','seminar'=>'🎓','workshop'=>'🛠️','scholarship'=>'💵','competition'=>'🏆'][$res->category] ?? '✨' }}
                </div>
              @endif
              <div class="res-card-badge badge-upcoming" style="position:absolute;top:12px;left:12px">
                {{ ['events'=>'Event','seminar'=>'Seminar','workshop'=>'Workshop','scholarship'=>'Scholarship','competition'=>'Competition'][$res->category] ?? 'Resource' }}
              </div>
            </div>
            <div class="res-card-body" style="padding:20px;display:flex;flex-direction:column;justify-content:space-between;flex-grow:1">
              <div>
                <span class="res-card-tag" style="font-size:0.68rem;font-weight:700;color:var(--gold);text-transform:uppercase;letter-spacing:0.05em">{{ $res->source ?? 'Resource' }}</span>
                <h3 class="res-card-title" style="font-size:1.05rem;font-weight:700;color:var(--dark);margin-top:6px;line-height:1.4">{{ $res->title }}</h3>
                @if($res->description)
                  <p style="font-size:0.8rem;color:var(--gray);line-height:1.5;margin-top:8px">
                    {{ Str::limit($res->description, 100) }}
                  </p>
                @endif
              </div>
              <div style="margin-top:20px">
                @if($res->file_path)
                  <a href="{{ asset('storage/' . $res->file_path) }}" target="_blank" class="btn-apply" style="font-size:0.75rem;padding:8px 12px;display:block;text-align:center;text-decoration:none">
                    📥 Download File
                  </a>
                @elseif($res->external_url)
                  <a href="{{ $res->external_url }}" target="_blank" class="btn-apply" style="font-size:0.75rem;padding:8px 12px;display:block;text-align:center;text-decoration:none">
                    🔗 Open Link / Source
                  </a>
                @endif
              </div>
            </div>
          </div>
        @empty
          <div style="grid-column:1/-1;text-align:center;padding:60px 0;color:var(--gray)">
            <div style="font-size:3rem;margin-bottom:12px">📚</div>
            <p style="font-weight:600">No study materials or links found.</p>
            <p style="font-size:.85rem;margin-top:6px">Try a different filter or check back later.</p>
          </div>
        @endforelse
      @else
        {{-- RENDER EVENTS --}}
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
      @endif
    </div>

    <div style="margin-top:40px">
      @if($filter === 'files')
        {!! $resources->appends(request()->query())->links('partials.pagination') !!}
      @else
        {!! $events->appends(request()->query())->links('partials.pagination') !!}
      @endif
    </div>
  </div>
</section>

@endsection