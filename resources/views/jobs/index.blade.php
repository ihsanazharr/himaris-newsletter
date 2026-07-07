@extends('layouts.app')

@section('title', 'Career Opportunities — Himaris Newsletter')

@push('styles')
<style>
.jobs-filter-bar { background: var(--white); border-bottom: 1.5px solid var(--gray-light); }
.jobs-filter-inner { max-width: 1160px; margin: 0 auto; padding: 0 32px; display: flex; align-items: center; gap: 4px; flex-wrap: wrap; }
</style>
@endpush

@section('content')

<!-- PAGE HEADER -->
<div class="page-header">
  <div class="page-header-inner">
    <h1>Career Opportunities</h1>
    <p>Curated internships, full-time roles, and freelance gigs for English students and fresh graduates.</p>
    <div class="page-header-stats">
      <div class="stat-item">
        <div class="num">{{ $totalOpen }}</div>
        <div class="lbl">Open Positions</div>
      </div>
      <div class="stat-item">
        <div class="num">{{ $totalInternships }}</div>
        <div class="lbl">Internships</div>
      </div>
    </div>
  </div>
</div>

<!-- FILTER BAR -->
<div class="jobs-filter-bar">
  <div class="jobs-filter-inner">
    <span class="filter-label">Type:</span>
    @foreach(['all' => 'All', 'full-time' => 'Full-Time', 'internship' => 'Internship', 'part-time' => 'Part-Time', 'freelance' => 'Freelance'] as $val => $label)
      <a href="{{ route('jobs.index', array_merge(request()->except('page'), ['type' => $val])) }}"
         class="filter-tab {{ $type === $val ? 'active' : '' }}">{{ $label }}</a>
    @endforeach
    <form method="GET" action="{{ route('jobs.index') }}" style="margin-left:auto">
      <input type="hidden" name="type" value="{{ request()->get('type', 'all') }}"/>
      <div class="filter-search">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Search jobs..."/>
      </div>
    </form>
  </div>
</div>

<!-- MAIN CONTENT -->
<div class="main-wrap">
  <div>
    <div class="jobs-header">
      <span class="jobs-count">{{ $jobs->total() }} results found</span>
    </div>

    <div class="job-list">
      @forelse($jobs as $job)
        <a href="{{ route('jobs.show', $job->slug) }}" class="job-card reveal">
          <div class="job-logo">
            @if($job->thumbnail)
              <img src="{{ asset('storage/' . $job->thumbnail) }}" alt=""/>
            @else
              🏢
            @endif
          </div>
          <div class="job-body">
            <div class="job-top">
              <div>
                <div class="job-company">{{ $job->company }}</div>
                <div class="job-title">{{ $job->title }}</div>
              </div>
              <div class="job-tags">
                @php
                  $tagClass = ['full-time'=>'tag-ft','internship'=>'tag-intern','part-time'=>'tag-part','freelance'=>'tag-remote'][$job->type] ?? 'tag-ft';
                  $tagLabel = ['full-time'=>'Full-Time','internship'=>'Internship','part-time'=>'Part-Time','freelance'=>'Freelance'][$job->type] ?? $job->type;
                @endphp
                <span class="job-tag {{ $tagClass }}">{{ $tagLabel }}</span>
                @if($job->created_at->diffInDays(now()) <= 3)
                  <span class="job-tag tag-new">New</span>
                @endif
              </div>
            </div>

            <div class="job-meta">
              @if($job->location)
                <div class="job-meta-item">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                  {{ $job->location }}
                </div>
              @endif
              @if($job->deadline)
                <div class="job-meta-item">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                  Apply by: {{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}
                </div>
              @endif
            </div>

            @if($job->description)
              <div class="job-desc">{{ Str::limit($job->description, 120) }}</div>
            @endif

            <div class="job-foot">
              <div class="job-posted">Posted {{ $job->created_at->diffForHumans() }}</div>
              <span class="job-apply">
                Apply Now
                <svg viewBox="0 0 14 14" fill="none" style="width:12px;height:12px"><path d="M3 11L11 3M11 3H6M11 3v5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
              </span>
            </div>
          </div>
        </a>
      @empty
        <div style="text-align:center;padding:60px 0;color:var(--gray)">
          <div style="font-size:3rem;margin-bottom:12px">🔍</div>
          <p style="font-weight:600">No job opportunities found.</p>
          <p style="font-size:.85rem;margin-top:6px">Try a different filter or check back later.</p>
        </div>
      @endforelse
    </div>

    <div style="margin-top:32px">
      {!! $jobs->appends(request()->query())->links() !!}
    </div>
  </div>

  <aside class="sidebar">
    <div class="sidebar-card">
      <h3>🏷️ Browse by Field</h3>
      <div class="tag-cloud">
        @foreach(['Content Writing','Translation','English Teaching','Public Relations','Digital Marketing','Editing','Copywriting','Journalism'] as $tag)
          <a href="{{ route('jobs.index', ['search' => $tag]) }}" class="tag-cloud-item">{{ $tag }}</a>
        @endforeach
      </div>
    </div>

    <div class="sidebar-card">
      <h3>💡 Application Tips</h3>
      <div class="tip-list">
        <div class="tip-item"><div class="tip-num">1</div><p class="tip-text">Tailor your resume — highlight relevant English skills.</p></div>
        <div class="tip-item"><div class="tip-num">2</div><p class="tip-text">Write a compelling cover letter that shows your personality.</p></div>
        <div class="tip-item"><div class="tip-num">3</div><p class="tip-text">Follow up politely after 5–7 business days.</p></div>
        <div class="tip-item"><div class="tip-num">4</div><p class="tip-text">Keep your LinkedIn profile updated and active.</p></div>
      </div>
    </div>

    <div class="sidebar-card sidebar-dark">
      <h3>Have a Job to Post?</h3>
      <p>Hiring English-proficient talent? Submit your vacancy and reach hundreds of qualified students.</p>
      <a href="mailto:himaris@polban.ac.id" class="btn-subscribe" style="text-decoration:none;text-align:center">Submit a Job</a>
    </div>
  </aside>
</div>

@endsection