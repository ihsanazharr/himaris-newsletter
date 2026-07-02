@extends('layouts.app')

@section('title', 'About Us — Himaris Newsletter')
@section('meta_description', 'Learn about HIMARIS, ESAA, and the English Department at Politeknik Negeri Bandung.')

@push('styles')
@include('about._styles')
<style>
.tab-panel { display: none; }
.tab-panel.active { display: block; }
</style>
@endpush

@section('content')

{{-- TAB BAR --}}
<div class="about-bar">
  <div class="about-bar-inner">
    <button class="tab-btn {{ $tab === 'himaris' ? 'active' : '' }}" data-tab="himaris">HIMARIS</button>
    <button class="tab-btn {{ $tab === 'esaa' ? 'active' : '' }}" data-tab="esaa">ESAA</button>
    <button class="tab-btn {{ $tab === 'english-dept' ? 'active' : '' }}" data-tab="english-dept">English Department</button>
  </div>
</div>

{{-- HIMARIS PANEL --}}
<div class="tab-panel {{ $tab === 'himaris' ? 'active' : '' }}" id="panel-himaris">
  @include('about._himaris')
</div>

{{-- ESAA PANEL --}}
<div class="tab-panel {{ $tab === 'esaa' ? 'active' : '' }}" id="panel-esaa">
  @include('about._esaa')
</div>

{{-- ENGLISH DEPT PANEL --}}
<div class="tab-panel {{ $tab === 'english-dept' ? 'active' : '' }}" id="panel-english-dept">
  @include('about._engdept')
</div>

@endsection

@push('scripts')
<script>
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const tab = btn.dataset.tab;
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById('panel-' + tab).classList.add('active');
      history.replaceState(null, '', '/about/' + tab);
    });
  });
</script>
@endpush