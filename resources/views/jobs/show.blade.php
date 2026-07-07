@extends('layouts.app')

@section('title', $job->title . ' — Career Opportunities — Himaris Newsletter')

@section('content')

<!-- JOB DETAIL HEADER -->
<div class="job-detail-header">
  <div class="job-detail-inner">
    <div class="job-detail-logo">
      @if($job->thumbnail)
        <img src="{{ asset('storage/' . $job->thumbnail) }}" alt="{{ $job->company }}"/>
      @else
        🏢
      @endif
    </div>
    <div class="job-detail-info">
      <div class="job-detail-company">{{ $job->company }}</div>
      <h1 class="job-detail-title">{{ $job->title }}</h1>
      <div class="job-detail-tags">
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
  </div>
</div>

<!-- JOB BODY -->
<div class="job-detail-body">
  <div>
    <div class="job-desc-card">
      <h2>Job Description</h2>
      <div class="job-desc-content">
        {!! nl2br(e($job->description)) !!}
      </div>
    </div>
  </div>

  <aside style="display:flex;flex-direction:column;gap:22px">
    <div class="quick-info-card">
      <h3>Quick Info</h3>
      <div class="qi-item">
        <div class="qi-label">Company</div>
        <p class="qi-val">{{ $job->company }}</p>
      </div>
      @if($job->location)
      <div class="qi-item">
        <div class="qi-label">Location</div>
        <p class="qi-val">{{ $job->location }}</p>
      </div>
      @endif
      <div class="qi-item">
        <div class="qi-label">Type</div>
        <p class="qi-val">{{ $tagLabel }}</p>
      </div>
      @if($job->deadline)
      <div class="qi-item">
        <div class="qi-label">Deadline</div>
        <p class="qi-val">{{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}</p>
      </div>
      @endif
      <div class="qi-item">
        <div class="qi-label">Posted</div>
        <p class="qi-val">{{ $job->created_at->diffForHumans() }}</p>
      </div>
    </div>

    @if($job->apply_url)
      <a href="{{ $job->apply_url }}" target="_blank" class="btn-apply" style="text-decoration:none;justify-content:center">
        Apply Now →
      </a>
    @endif

    <a href="{{ route('jobs.index') }}" class="btn-outline" style="justify-content:center">← Back to Career Opportunities</a>
  </aside>
</div>

<!-- RELATED JOBS -->
@if($related->count())
<section class="section" style="background:var(--off-white)">
  <div class="container">
    <h2 class="sec-heading"><span>💼</span><span class="underline">Related Jobs</span><span>💼</span></h2>
    <div class="job-list" style="max-width:800px;margin:0 auto">
      @foreach($related as $rJob)
        <a href="{{ route('jobs.show', $rJob->slug) }}" class="job-card reveal">
          <div class="job-logo">
            @if($rJob->thumbnail)
              <img src="{{ asset('storage/' . $rJob->thumbnail) }}" alt=""/>
            @else
              🏢
            @endif
          </div>
          <div class="job-body">
            <div class="job-top">
              <div>
                <div class="job-company">{{ $rJob->company }}</div>
                <div class="job-title">{{ $rJob->title }}</div>
              </div>
            </div>
            @if($rJob->location)
              <div class="job-meta">
                <div class="job-meta-item">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                  {{ $rJob->location }}
                </div>
              </div>
            @endif
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection
