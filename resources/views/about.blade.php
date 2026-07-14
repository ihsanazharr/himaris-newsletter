@extends('layouts.app')

@section('title', 'About Us — Himaris Newsletter')
@section('meta_description', 'Learn about Himaris, ESAA, and the English Department at Politeknik Negeri Bandung.')

@push('styles')
@include('about._styles')
<style>
.tab-panel { display: none; }
.tab-panel.active { display: block; }
</style>
@endpush

@section('content')

{{-- Spacer so content starts below fixed navbar --}}
<div style="height:var(--nav-h)"></div>

{{-- TAB BAR (sits right below navbar) --}}
<div class="about-bar">
  <div class="about-bar-inner">
    <button class="tab-btn {{ $tab === 'himaris' ? 'active' : '' }}" data-tab="himaris">Himaris</button>
    <button class="tab-btn {{ $tab === 'esaa' ? 'active' : '' }}" data-tab="esaa">ESAA</button>
    <button class="tab-btn {{ $tab === 'english-dept' ? 'active' : '' }}" data-tab="english-dept">English Department</button>
    <a href="{{ route('about-newsletter') }}"
       class="tab-btn"
       style="text-decoration:none">
      Himaris Newsletter
    </a>
    <a href="{{ route('about.editorial-team') }}"
       class="tab-btn"
       style="text-decoration:none">
      Editorial Team
    </a>
  </div>
</div>

{{-- PANELS --}}
<div id="panel-himaris" class="tab-panel {{ $tab === 'himaris' ? 'active' : '' }}">
  @include('about._himaris')
</div>
<div id="panel-esaa" class="tab-panel {{ $tab === 'esaa' ? 'active' : '' }}">
  @include('about._esaa')
</div>
<div id="panel-english-dept" class="tab-panel {{ $tab === 'english-dept' ? 'active' : '' }}">
  @include('about._engdept')
</div>

@include('partials.social-media-publications')

@endsection

@push('scripts')
<script>
  document.querySelectorAll('.tab-btn[data-tab]').forEach(btn => {
    btn.addEventListener('click', () => {
      const tab = btn.dataset.tab;
      document.querySelectorAll('.tab-btn[data-tab]').forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById('panel-' + tab).classList.add('active');
      history.replaceState(null, '', '/about/' + tab);
    });
  });
</script>
@endpush