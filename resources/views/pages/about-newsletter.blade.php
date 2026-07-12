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

/* Newsletter sections two-column list */
.newsletter-sections-grid {
  display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-top: 12px;
}
/* Moments photo grid */
.moments-grid {
  display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px;
}

@media(max-width:900px){
  .abn-tabs { padding-left: 20px; padding-right: 20px; }
  .abn-hero-inner { grid-template-columns: 1fr; }
  .abn-logo-box { display: none; }
  .abn-pillars { grid-template-columns: 1fr 1fr; }
  .abn-team-grid { grid-template-columns: 1fr 1fr; }
  .socpub-grid { grid-template-columns: 1fr 1fr; }
  .newsletter-sections-grid { grid-template-columns: 1fr; }
  .moments-grid { grid-template-columns: repeat(2, 1fr); }
}
@media(max-width:540px){
  .abn-section { padding: 48px 20px; }
  .abn-pillars { grid-template-columns: 1fr; }
  .abn-team-grid { grid-template-columns: 1fr 1fr; }
  .socpub-grid { grid-template-columns: 1fr; }
  .newsletter-sections-grid { grid-template-columns: 1fr; }
  .moments-grid { grid-template-columns: repeat(2, 1fr); }
  .abn-cta { padding: 32px 20px; }
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
        to the entire Himaris community.
      </p>
    </div>
    <div class="abn-logo-box">
      <img src="{{ asset('images/logonewsletter.png') }}" alt="Himaris Newsletter Logo"/>
    </div>
  </div>
</div>

{{-- WHAT IS Himaris NEWSLETTER --}}
<div class="abn-section" style="background:var(--off-white)">
  <div class="abn-inner reveal">
    <h2 class="abn-h2">What Is Himaris Newsletter?</h2>
    <div class="abn-body">
      <p>
        <strong>Himaris Newsletter</strong> is a digital newsletter that aims to provide a creative space for English students of Politeknik Negeri Bandung to practice and improve their writings and accommodate students’ creative expressions. Furthermore, it also aims to connect students and alumni and maintain the connection in the long run.
      </p>
      <p>
        Previously, the newsletter was distributed through students’ emails and included several sections that highlighted student activities and creative works. Now, for the second volume, the newsletter is developed into a website-based platform so that the content can be accessed more easily by people all around the world. This updated version also introduces new main sections such as Gallery section and Sponsored Content Section, and supporting sections such as Student Resources and Social Media Publication.
      </p>
      <p>
        Moreover, Himaris Newsletter now opens opportunities for undergraduate English students from other institutions to contribute their work. By expanding its contributors, the newsletter hopes to create a broader creative community among English students from different universities. It also welcomes collaborations with companies or organizations that would like to be featured in the newsletter, for example through sponsored content that covers product or place reviews and event promotions. Through these collaborations, the newsletter becomes a platform that connects students, alumni, institutions, and external partners in a meaningful way.
      </p>
      <p>
        In its second volume, Himaris Newsletter is presented with the theme <strong>“English emerges as a medium for self-expression and personal growth,”</strong> which reflects how English becomes a medium for English students to freely express their thoughts and ideas without limitations. Through this theme, the second volume of the newsletter highlights how students are able to navigate challenges, break through barriers, and grow into their fullest potentials.
      </p>

      <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--dark); margin: 36px 0 16px; border-bottom: 2px solid var(--gold); padding-bottom: 6px">Newsletter Sections</h3>
      
      <div class="newsletter-sections-grid">
        <div>
          <p style="margin-bottom: 8px; font-weight: 700; color: var(--black)">Newsletter Main Sections:</p>
          <ul style="list-style-type: lower-alpha; padding-left: 20px; line-height: 1.75">
            <li>What’s New?</li>
            <li>Inspirational Alumni and Current Student</li>
            <li>Self-Improvement</li>
            <li>Entertainment</li>
            <li>Reviews</li>
            <li>Miscellaneous</li>
            <li>Upcoming Events</li>
            <li>Gallery Section</li>
          </ul>
        </div>
        <div>
          <p style="margin-bottom: 8px; font-weight: 700; color: var(--black)">Newsletter Supporting Sections:</p>
          <ul style="list-style-type: lower-alpha; padding-left: 20px; line-height: 1.75">
            <li><strong>Student Resources:</strong> Competition and scholarship information</li>
            <li><strong>Career & Opportunities:</strong> Job vacancies and freelance opportunities</li>
            <li><strong>Social Media Publication:</strong> Digital contents from Instagram, YouTube, TikTok @himarispolban and @himarisnewsletter</li>
          </ul>
        </div>
      </div>
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
        <p class="abn-pillar-desc">Inspiring profiles and career journeys from alumni of the English Department, Diploma III and Diploma IV.</p>
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
        <p class="abn-pillar-desc">Photo coverage, event recaps, and visual stories from Himaris programmes and activities.</p>
      </div>
    </div>
  </div>
</div>

{{-- OUR MOMENTS --}}
<div class="abn-section" style="background:var(--off-white)">
  <div class="abn-inner">
    <h2 class="abn-h2 reveal">&#128247; Our Moments</h2>
    <p class="abn-body reveal" style="margin-bottom:32px;text-align:center">
      A collection of photos capturing the spirit, activities, and memories of Himaris.
    </p>

    @if($moments->count())
      <div class="moments-grid">
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

@include('partials.social-media-publications')

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
