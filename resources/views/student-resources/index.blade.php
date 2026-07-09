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
  <div class="sr-filter-inner" style="flex-wrap:wrap;padding:12px 32px;gap:8px;">
    @foreach([
      'all'         => '📂 All',
      'events'      => '📅 Events',
      'seminar'     => '🎓 Seminar',
      'workshop'    => '🛠️ Workshop',
      'scholarship' => '💵 Scholarship',
      'competition' => '🏆 Competition'
    ] as $val => $label)
      <a href="{{ route('student-resources.index', $val === 'all' ? [] : ['filter' => $val]) }}"
         class="filter-tab {{ $filter === $val ? 'active' : '' }}" style="margin: 0; white-space: nowrap;">{{ $label }}</a>
    @endforeach
  </div>
</div>

<!-- MAIN GRID -->
<section class="section" style="background:var(--off-white)">
  <div class="container">
    <div class="articles-grid">
      @forelse($paginatedItems as $item)
        <div class="res-card reveal" style="display:flex;flex-direction:column;background:var(--white);border-radius:var(--radius-lg);overflow:hidden;border:1.5px solid var(--gray-light)">
          <div class="res-card-img-wrap" style="position:relative;height:180px;overflow:hidden">
            @if($item['thumbnail'])
              <img src="{{ asset('storage/' . $item['thumbnail']) }}" alt="{{ $item['title'] }}" class="res-card-img" style="width:100%;height:100%;object-fit:cover"/>
            @else
              <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:3rem;background:var(--gray-light)">
                {{ ['events'=>'📅','seminar'=>'🎓','workshop'=>'🛠️','scholarship'=>'💵','competition'=>'🏆'][$item['category']] ?? '✨' }}
              </div>
            @endif
            <div class="res-card-badge {{ $item['category'] === 'events' ? 'badge-upcoming' : 'badge-past' }}" style="position:absolute;top:12px;left:12px;text-transform:uppercase;font-size:0.65rem;letter-spacing:0.05em;">
              {{ ['events'=>'Event','seminar'=>'Seminar','workshop'=>'Workshop','scholarship'=>'Scholarship','competition'=>'Competition'][$item['category']] ?? 'Resource' }}
            </div>
          </div>
          <div class="res-card-body" style="padding:20px;display:flex;flex-direction:column;justify-content:space-between;flex-grow:1">
            <div>
              <span class="res-card-tag" style="font-size:0.68rem;font-weight:700;color:var(--gold);text-transform:uppercase;letter-spacing:0.05em">{{ $item['source'] }}</span>
              <h3 class="res-card-title" style="font-size:1.05rem;font-weight:700;color:var(--dark);margin-top:6px;line-height:1.4">
                @if($item['type'] === 'event')
                  <a href="{{ $item['url'] }}" style="color:inherit;text-decoration:none" onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='inherit'">{{ $item['title'] }}</a>
                @else
                  {{ $item['title'] }}
                @endif
              </h3>
              @if($item['description'])
                <p style="font-size:0.8rem;color:var(--gray);line-height:1.5;margin-top:8px">
                  {{ Str::limit($item['description'], 100) }}
                </p>
              @endif
            </div>
            <div style="margin-top:20px">
              @if($item['type'] === 'event')
                <a href="{{ $item['url'] }}" class="btn-apply" style="font-size:0.75rem;padding:8px 12px;display:block;text-align:center;text-decoration:none">
                  📅 View Event Details
                </a>
              @elseif($item['file_path'])
                <a href="{{ asset('storage/' . $item['file_path']) }}" target="_blank" class="btn-apply" style="font-size:0.75rem;padding:8px 12px;display:block;text-align:center;text-decoration:none">
                  📥 Download File
                </a>
              @elseif($item['external_url'])
                <a href="{{ $item['external_url'] }}" target="_blank" class="btn-apply" style="font-size:0.75rem;padding:8px 12px;display:block;text-align:center;text-decoration:none">
                  🔗 Open Link / Source
                </a>
              @endif
            </div>
          </div>
        </div>
      @empty
        <div style="grid-column:1/-1;text-align:center;padding:60px 0;color:var(--gray)">
          <div style="font-size:3rem;margin-bottom:12px">📚</div>
          <p style="font-weight:600">No resources found.</p>
          <p style="font-size:.85rem;margin-top:6px">Try a different category or check back later.</p>
        </div>
      @endforelse
    </div>

    <div style="margin-top:40px">
      {!! $paginatedItems->appends(request()->query())->links('partials.pagination') !!}
    </div>
  </div>
</section>

@endsection