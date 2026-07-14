@extends('layouts.app')
@section('title', 'Editorial Team — Himaris Newsletter')
@section('meta_description', 'Meet the creative minds behind Himaris Newsletter. Explore the editorial team, writers, editors, developers, and designers for Volume 1 and Volume 2.')

@push('styles')
@include('about._styles')
<style>
.edt-hero {
  margin-top: var(--nav-h);
  background: var(--dark);
  border-bottom: 3px solid var(--gold);
  padding: 56px 0 52px;
  position: relative;
  overflow: hidden;
  text-align: center;
}
.edt-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(212,160,23,.16) 0%, transparent 65%);
  pointer-events: none;
}
.edt-hero-inner {
  max-width: 800px;
  margin: 0 auto;
  padding: 0 32px;
  position: relative;
  z-index: 1;
}
.edt-hero-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(212,160,23,.15);
  border: 1px solid rgba(212,160,23,.35);
  color: var(--gold);
  font-size: .7rem;
  font-weight: 700;
  letter-spacing: .12em;
  text-transform: uppercase;
  padding: 5px 14px;
  border-radius: 20px;
  margin-bottom: 18px;
}
.edt-hero h1 {
  font-size: clamp(1.8rem, 4vw, 2.6rem);
  font-weight: 700;
  color: var(--white);
  line-height: 1.2;
  margin-bottom: 14px;
}
.edt-hero h1 em { color: var(--gold); font-style: italic; }
.edt-hero p {
  font-size: .95rem;
  color: rgba(255,255,255,.58);
  max-width: 520px;
  margin: 0 auto;
  line-height: 1.7;
}

.edt-main {
  max-width: 1160px;
  margin: 0 auto;
  padding: 60px 32px 80px;
}

/* ===== VOLUME SECTION ===== */
.vol-section {
  margin-bottom: 64px;
}
.vol-section:last-child {
  margin-bottom: 0;
}
.vol-header {
  border-bottom: 2px solid var(--gold);
  padding-bottom: 12px;
  margin-bottom: 32px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 12px;
}
.vol-title {
  font-size: 1.35rem;
  font-weight: 700;
  color: var(--dark);
}
.vol-badge {
  background: var(--dark);
  color: var(--gold);
  font-size: .72rem;
  font-weight: 700;
  padding: 4px 12px;
  border-radius: 20px;
  border: 1px solid var(--gold);
}

.edt-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}
.edt-card {
  background: var(--white);
  border: 1.5px solid var(--gray-light);
  border-radius: 12px;
  padding: 24px 20px;
  text-align: center;
  transition: border-color var(--transition), transform var(--transition), box-shadow var(--transition);
}
.edt-card:hover {
  border-color: var(--gold);
  transform: translateY(-3px);
  box-shadow: 0 8px 24px rgba(0,0,0,.06);
}
.edt-avatar {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  margin: 0 auto 16px;
  background: var(--gold-light);
  color: #7A5C00;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
  font-weight: 700;
  border: 1.5px solid rgba(212,160,23,.2);
}
.edt-name {
  font-size: .92rem;
  font-weight: 700;
  color: var(--dark);
  margin-bottom: 4px;
}
.edt-role {
  font-size: .74rem;
  font-weight: 600;
  color: var(--gold);
  text-transform: uppercase;
  letter-spacing: .05em;
}

@media(max-width:960px) {
  .edt-grid { grid-template-columns: repeat(3, 1fr); }
  .edt-main { padding-left: 20px; padding-right: 20px; }
}
@media(max-width:680px) {
  .edt-grid { grid-template-columns: repeat(2, 1fr); gap: 16px; }
}
@media(max-width:440px) {
  .edt-grid { grid-template-columns: 1fr; gap: 14px; }
  .edt-main { padding-left: 16px; padding-right: 16px; }
}
</style>
@endpush

@section('content')

{{-- Spacer below fixed navbar --}}
<div style="height:var(--nav-h)"></div>

<div class="about-bar">
  <div class="about-bar-inner">
    <a href="{{ route('about', 'himaris') }}" class="tab-btn">Himaris</a>
    <a href="{{ route('about', 'esaa') }}" class="tab-btn">ESAA</a>
    <a href="{{ route('about', 'english-dept') }}" class="tab-btn">English Department</a>
    <a href="{{ route('about-newsletter') }}" class="tab-btn">Himaris Newsletter</a>
    <a href="{{ route('about.editorial-team') }}" class="tab-btn active">Editorial Team</a>
  </div>
</div>

{{-- ===== HERO ===== --}}
<div class="edt-hero" style="margin-top:0">
  <div class="edt-hero-inner">
    <div class="edt-hero-eyebrow">👥 Creative Minds</div>
    <h1>Meet Our <em>Editorial Team</em></h1>
    <p>The dedicated crew and contributors behind the creation, writing, design, and publication of the Himaris Newsletter volumes.</p>
  </div>
</div>

<div style="background: var(--off-white); min-height: 400px;">
  <div class="edt-main">

    {{-- ===== VOLUME 1 ===== --}}
    <div class="vol-section reveal">
      <div class="vol-header">
        <h2 class="vol-title">Himaris Newsletter Vol. 1</h2>
        <span class="vol-badge">Volume 1 (2024)</span>
      </div>

      <div class="edt-grid">
        <div class="edt-card">
          <div class="edt-avatar">AM</div>
          <div class="edt-name">Aquilla Maha Fortuna &amp; Fadlin Rizqi</div>
          <div class="edt-role">Writers of the Blueprint</div>
        </div>

        <div class="edt-card">
          <div class="edt-avatar">AM</div>
          <div class="edt-name">Aquilla Maha Fortuna &amp; Fadlin Rizqi</div>
          <div class="edt-role">Writers of the Articles</div>
        </div>

        <div class="edt-card">
          <div class="edt-avatar">AM</div>
          <div class="edt-name">Aquilla Maha Fortuna &amp; Fadlin Rizqi</div>
          <div class="edt-role">Editors</div>
        </div>

        <div class="edt-card">
          <div class="edt-avatar">FF</div>
          <div class="edt-name">Fadlin Rizqi Fadilah</div>
          <div class="edt-role">Newsletter Developer</div>
        </div>
      </div>
    </div>

    {{-- ===== VOLUME 2 ===== --}}
    <div class="vol-section reveal" style="margin-top:56px">
      <div class="vol-header">
        <h2 class="vol-title">Himaris Newsletter Vol. 2</h2>
        <span class="vol-badge">Active (2026)</span>
      </div>

      <div class="edt-grid">
        <div class="edt-card">
          <div class="edt-avatar">DP</div>
          <div class="edt-name">Deviani Putri Azzahra</div>
          <div class="edt-role">Editor in Chief</div>
        </div>

        <div class="edt-card">
          <div class="edt-avatar">AE</div>
          <div class="edt-name">Aditya Ependi Putra &amp; Deviani</div>
          <div class="edt-role">Writers of Updated Blueprint</div>
        </div>

        <div class="edt-card">
          <div class="edt-avatar">AE</div>
          <div class="edt-name">Aditya Ependi Putra &amp; Deviani</div>
          <div class="edt-role">Writers of Articles</div>
        </div>

        <div class="edt-card">
          <div class="edt-avatar">AE</div>
          <div class="edt-name">Aditya Ependi Putra &amp; Deviani</div>
          <div class="edt-role">Editors</div>
        </div>

        <div class="edt-card">
          <div class="edt-avatar">AE</div>
          <div class="edt-name">Aditya Ependi Putra</div>
          <div class="edt-role">Graphic Designer</div>
        </div>

        <div class="edt-card">
          <div class="edt-avatar">AE</div>
          <div class="edt-name">Aditya Ependi Putra</div>
          <div class="edt-role">Photographer</div>
        </div>

        <div class="edt-card">
          <div class="edt-avatar">AE</div>
          <div class="edt-name">Aditya Ependi Putra</div>
          <div class="edt-role">Website Developer</div>
        </div>

        <div class="edt-card">
          <div class="edt-avatar">AE</div>
          <div class="edt-name">Aditya &amp; Deviani</div>
          <div class="edt-role">Website Administrators</div>
        </div>

        <div class="edt-card">
          <div class="edt-avatar">AA</div>
          <div class="edt-name">Alifia Adeila &amp; Labib Akbar</div>
          <div class="edt-role">Contributors</div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection
