@extends('layouts.app')

@section('title', 'About Himaris Newsletter — Himaris')
@section('meta_description', 'Learn about Himaris Newsletter — the official student publication of the English Department, Politeknik Negeri Bandung.')

@push('styles')
@include('about._styles')
<style>
.abn-hero {
  background: var(--dark);
  border-bottom: 3px solid rgba(212,160,23,.28);
  padding: 72px 32px 60px;
}
.abn-hero-inner {
  max-width: 900px; margin: 0 auto;
  display: grid; grid-template-columns: 1fr auto; gap: 48px; align-items: center;
}
.abn-hero-eyebrow {
  font-size: .72rem; font-weight: 700; letter-spacing: .14em; text-transform: uppercase;
  color: var(--gold); margin-bottom: 10px;
}
.abn-hero-h1 {
  font-size: clamp(2rem,5vw,3rem); font-weight: 800; color: var(--white);
  line-height: 1.1; margin-bottom: 16px;
}
.abn-hero-h1 em { font-style: italic; }
.abn-hero-desc {
  font-size: .95rem; color: rgba(255,255,255,.62); line-height: 1.8; max-width: 580px;
}
.abn-logo-box {
  width: 130px; height: 130px; background: rgba(255,255,255,.98); border-radius: 20px;
  display: flex; align-items: center; justify-content: center;
  border: 3px solid rgba(255,255,255,.1); box-shadow: 6px 6px 0 rgba(0,0,0,.25); flex-shrink: 0;
}
.abn-logo-box img { width: 90px; object-fit: contain; }



.abn-section { padding: 72px 32px; }
.abn-inner { max-width: 900px; margin: 0 auto; }
.abn-h2 {
  font-size: 1.35rem; font-weight: 800; color: var(--black);
  margin-bottom: 20px; position: relative; padding-left: 16px;
}
.abn-h2::before {
  content: ''; position: absolute; left: 0; top: 4px; bottom: 4px;
  width: 4px; background: var(--gold); border-radius: 2px;
}
.abn-body { font-size: .93rem; color: #3a3a3a; line-height: 1.9; }
.abn-body p { margin-bottom: 1.2em; }

.abn-pillars {
  display: grid; grid-template-columns: repeat(3,1fr); gap: 20px; margin-top: 36px;
}
.abn-pillar {
  background: var(--white); border: 1.5px solid var(--gray-light);
  border-radius: var(--radius-lg); padding: 28px 24px;
  transition: border-color var(--transition), transform var(--transition), box-shadow var(--transition);
}
.abn-pillar:hover { border-color: var(--gold); transform: translateY(-3px); box-shadow: var(--shadow); }
.abn-pillar-icon { font-size: 2rem; margin-bottom: 12px; }
.abn-pillar-title { font-size: .9rem; font-weight: 700; color: var(--black); margin-bottom: 8px; }
.abn-pillar-desc { font-size: .8rem; color: var(--gray); line-height: 1.7; }

.abn-team-grid {
  display: grid; grid-template-columns: repeat(4,1fr); gap: 20px; margin-top: 36px;
}
.abn-team-card {
  background: var(--white); border: 1.5px solid var(--gray-light);
  border-radius: var(--radius-lg); padding: 24px 20px; text-align: center;
  transition: border-color var(--transition), transform var(--transition);
}
.abn-team-card:hover { border-color: var(--gold); transform: translateY(-2px); }
.abn-avatar {
  width: 52px; height: 52px; border-radius: 50%;
  background: var(--gold); color: var(--black);
  font-size: .9rem; font-weight: 800;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto 12px;
}
.abn-team-name { font-size: .82rem; font-weight: 700; color: var(--black); line-height: 1.3; }
.abn-team-role { font-size: .72rem; color: var(--gray); margin-top: 4px; }

.abn-cta {
  background: var(--dark); border-radius: var(--radius-lg);
  padding: 48px; text-align: center; margin-top: 48px;
}
.abn-cta h3 { font-size: 1.4rem; font-weight: 800; color: var(--white); margin-bottom: 10px; }
.abn-cta p { font-size: .9rem; color: rgba(255,255,255,.55); margin-bottom: 28px; }
.abn-cta-btns { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }

.socpub-grid {
  display: grid; grid-template-columns: repeat(3,1fr); gap: 20px; margin-top: 32px;
}
.socpub-card {
  background: var(--white); border: 1.5px solid var(--gray-light);
  border-radius: var(--radius-lg); overflow: hidden;
  transition: border-color var(--transition), transform var(--transition), box-shadow var(--transition);
}
.socpub-card:hover { border-color: var(--gold); transform: translateY(-3px); box-shadow: var(--shadow); }
.socpub-thumb {
  width: 100%; aspect-ratio: 4/3; background: var(--gray-light);
  display: flex; align-items: center; justify-content: center; font-size: 2.5rem;
  overflow: hidden;
}
.socpub-thumb img { width: 100%; height: 100%; object-fit: cover; }
.socpub-body { padding: 16px; }
.socpub-platform {
  font-size: .65rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase;
  color: var(--gold); margin-bottom: 6px;
}
.socpub-text { font-size: .82rem; color: #444; line-height: 1.6; margin-bottom: 10px; }
.socpub-link { font-size: .76rem; font-weight: 600; color: var(--black); text-decoration: none; }
.socpub-link:hover { color: var(--gold); }

.socpub-media {
  position: relative;
  width: 100%;
  aspect-ratio: 4 / 3;
  overflow: hidden;
  background: linear-gradient(135deg, rgba(212,160,23,.14), rgba(17,17,17,.06));
  border-bottom: 1px solid var(--gray-light);
}
.socpub-media img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.socpub-media-fallback {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.6rem;
  color: rgba(17,17,17,.28);
}

@media(max-width:900px){
  .abn-tabs { padding-left: 20px; padding-right: 20px; }
  .abn-hero-inner { grid-template-columns: 1fr; }
  .abn-logo-box { display: none; }
  .abn-pillars { grid-template-columns: 1fr 1fr; }
  .abn-team-grid { grid-template-columns: 1fr 1fr; }
  .socpub-grid { grid-template-columns: 1fr 1fr; }
}
@media(max-width:540px){
  .abn-section { padding: 48px 20px; }
  .abn-pillars { grid-template-columns: 1fr; }
  .abn-team-grid { grid-template-columns: 1fr 1fr; }
  .socpub-grid { grid-template-columns: 1fr; }
}
</style>
@endpush

@section('content')

{{-- Spacer below fixed navbar --}}
<div style="height:var(--nav-h)"></div>

<div class="about-bar">
  <div class="about-bar-inner">
    <a href="{{ route('about', 'himaris') }}" class="tab-btn">HIMARIS</a>
    <a href="{{ route('about', 'esaa') }}" class="tab-btn">ESAA</a>
    <a href="{{ route('about', 'english-dept') }}" class="tab-btn">English Department</a>
    <a href="{{ route('about-newsletter') }}" class="tab-btn active">Himaris Newsletter</a>
  </div>
</div>

{{-- HERO --}}
<div class="abn-hero">
  <div class="abn-hero-inner">
    <div>
      <p class="abn-hero-eyebrow">Official Student Publication</p>
      <h1 class="abn-hero-h1"><em>Himaris</em><br>Newsletter</h1>
      <p class="abn-hero-desc">
        The official publication platform of the English Department Student Association
        at Politeknik Negeri Bandung — delivering news, stories, and opportunities
        to the entire HIMARIS community.
      </p>
    </div>
    <div class="abn-logo-box">
      <img src="{{ asset('images/logonewsletter.png') }}" alt="Himaris Newsletter Logo"/>
    </div>
  </div>
</div>

{{-- WHAT IS HIMARIS NEWSLETTER --}}
<div class="abn-section" style="background:var(--off-white)">
  <div class="abn-inner reveal">
    <h2 class="abn-h2">What Is Himaris Newsletter?</h2>
    <div class="abn-body">
      <p>
        <strong>Himaris Newsletter</strong> is the official digital publication platform of HIMARIS — the English Department Student Association of Politeknik Negeri Bandung. Founded to give students a voice, the platform serves as a space where stories, ideas, and achievements of the English Department community can be shared, celebrated, and preserved.
      </p>
      <p>
        Through Himaris Newsletter, we publish articles written by students, cover department events, spotlight alumni journeys, share scholarship and career opportunities, and provide a window into the day-to-day life of the English Department at POLBAN. The platform is managed entirely by HIMARIS student officers.
      </p>
      <p>
        Beyond being a publication, Himaris Newsletter is a training ground — a real environment where students develop writing, editing, design, and digital media skills that go far beyond what a classroom can offer.
      </p>
    </div>
  </div>
</div>

{{-- WHAT WE DO --}}
<div class="abn-section" style="background:var(--white)">
  <div class="abn-inner reveal">
    <h2 class="abn-h2">What We Publish</h2>
    <div class="abn-pillars">
      <div class="abn-pillar reveal">
        <div class="abn-pillar-icon">📰</div>
        <p class="abn-pillar-title">News &amp; Announcements</p>
        <p class="abn-pillar-desc">Campus news, department announcements, and important updates for English Department students.</p>
      </div>
      <div class="abn-pillar reveal">
        <div class="abn-pillar-icon">✍️</div>
        <p class="abn-pillar-title">Student Articles</p>
        <p class="abn-pillar-desc">Opinion pieces, essays, and creative writing submitted by students of the English Department.</p>
      </div>
      <div class="abn-pillar reveal">
        <div class="abn-pillar-icon">🎓</div>
        <p class="abn-pillar-title">Alumni Stories</p>
        <p class="abn-pillar-desc">Inspiring profiles and career journeys from alumni of the English Department, D3 and D4.</p>
      </div>
      <div class="abn-pillar reveal">
        <div class="abn-pillar-icon">🏆</div>
        <p class="abn-pillar-title">Scholarships &amp; Competitions</p>
        <p class="abn-pillar-desc">Curated scholarship listings, writing contests, and academic competition opportunities.</p>
      </div>
      <div class="abn-pillar reveal">
        <div class="abn-pillar-icon">💼</div>
        <p class="abn-pillar-title">Career Opportunities</p>
        <p class="abn-pillar-desc">Internship postings, full-time job openings, and freelance gigs relevant to English graduates.</p>
      </div>
      <div class="abn-pillar reveal">
        <div class="abn-pillar-icon">📷</div>
        <p class="abn-pillar-title">Events &amp; Moments</p>
        <p class="abn-pillar-desc">Photo coverage, event recaps, and visual stories from HIMARIS programmes and activities.</p>
      </div>
    </div>
  </div>
</div>

@include('partials.social-media-publications')

{{-- OUR MOMENTS --}}
<div class="abn-section" style="background:var(--off-white)">
  <div class="abn-inner">
    <h2 class="abn-h2 reveal">&#128247; Our Moments</h2>
    <p class="abn-body reveal" style="margin-bottom:32px;text-align:center">
      A collection of photos capturing the spirit, activities, and memories of HIMARIS.
    </p>

    @if($moments->count())
      <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:10px">
        @foreach($moments as $moment)
          <div class="reveal"
               style="aspect-ratio:1;border-radius:10px;overflow:hidden;border:2px solid transparent;transition:border-color .2s,transform .2s;cursor:default;"
               onmouseover="this.style.borderColor='var(--gold)';this.style.transform='scale(1.03)'"
               onmouseout="this.style.borderColor='transparent';this.style.transform='scale(1)'">
            @if($moment->thumbnail)
              <img src="{{ asset('storage/' . $moment->thumbnail) }}"
                   alt="{{ $moment->title }}"
                   title="{{ $moment->title }}{{ $moment->date ? ' — ' . $moment->date->format('d M Y') : '' }}"
                   style="width:100%;height:100%;object-fit:cover;display:block"/>
            @else
              <div style="width:100%;height:100%;background:var(--gray-light);display:flex;align-items:center;justify-content:center;font-size:2.5rem">📷</div>
            @endif
          </div>
        @endforeach
      </div>
    @else
      <div style="text-align:center;padding:60px 32px;background:var(--white);border-radius:var(--radius-lg);border:1.5px dashed var(--gray-light)">
        <div style="font-size:3rem;margin-bottom:14px">📷</div>
        <p style="font-weight:700;color:var(--dark);margin-bottom:6px">No moments yet</p>
        <p style="font-size:.84rem;color:var(--gray)">Photos will appear here once published from the admin panel.</p>
      </div>
    @endif
  </div>
</div>

{{-- WRITE FOR US CTA --}}
<div class="abn-section" style="background:var(--white)">
  <div class="abn-inner">
    <div class="abn-cta reveal">
      <h3>Write for Himaris Newsletter</h3>
      <p>Have a story to tell? An opinion to share? A campus experience worth documenting?<br>We welcome submissions from all English Department students — articles, essays, and more.</p>
      <div class="abn-cta-btns">
        <a href="{{ route('submission-guidelines') }}"
           style="display:inline-flex;align-items:center;gap:6px;padding:11px 24px;background:var(--gold);color:var(--black);font-weight:700;font-size:.84rem;border-radius:var(--radius);text-decoration:none">
          📋 Submission Guidelines
        </a>
        <a href="{{ route('newsletter.index') }}"
           style="display:inline-flex;align-items:center;gap:6px;padding:11px 24px;background:transparent;color:rgba(255,255,255,.7);font-weight:600;font-size:.84rem;border-radius:var(--radius);border:1.5px solid rgba(255,255,255,.2);text-decoration:none">
          Browse All Articles →
        </a>
      </div>
    </div>
  </div>
</div>

@endsection
