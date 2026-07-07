@extends('layouts.app')

@section('title', 'Submission Guidelines — Himaris Newsletter')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet"/>
<style>
.sub-header{margin-top:var(--nav-h);background:var(--gold);padding:48px 32px 40px;border-bottom:3px solid var(--black);}
.sub-header-inner{max-width:1160px;margin:0 auto;}
.sub-header h1{font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.8rem,4vw,2.6rem);font-weight:700;color:var(--black);}
.sub-header p{font-size:.92rem;color:rgba(0,0,0,.62);margin-top:8px;font-style:italic;}
.sub-main{max-width:1160px;margin:0 auto;padding:56px 32px 80px;}
.spec-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:52px;}
.spec-card{background:var(--white);border:1.5px solid var(--gray-light);border-radius:var(--radius-lg);padding:22px 20px;text-align:center;transition:border-color var(--transition),transform var(--transition);}
.spec-card:hover{border-color:var(--gold);transform:translateY(-2px);}
.spec-icon{font-size:1.8rem;margin-bottom:10px;}
.spec-label{font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:var(--gray);margin-bottom:5px;}
.spec-value{font-size:1.05rem;font-weight:700;color:var(--dark);}
.spec-note{font-size:.72rem;color:var(--gray);margin-top:3px;}
.cats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:52px;}
.cat-item{background:var(--white);border:1.5px solid var(--gray-light);border-radius:10px;padding:18px 20px;display:flex;align-items:flex-start;gap:12px;transition:border-color var(--transition);}
.cat-item:hover{border-color:var(--gold);}
.cat-item-icon{font-size:1.4rem;flex-shrink:0;}
.cat-item-name{font-size:.88rem;font-weight:700;color:var(--dark);margin-bottom:3px;}
.cat-item-desc{font-size:.76rem;color:var(--gray);line-height:1.55;}
.process-list{display:flex;flex-direction:column;gap:0;position:relative;margin-bottom:52px;}
.process-list::before{content:'';position:absolute;left:20px;top:0;bottom:0;width:2px;background:var(--gray-light);}
.process-step{display:flex;gap:20px;padding-bottom:28px;}
.step-dot{width:40px;height:40px;border-radius:50%;background:var(--gold);border:3px solid var(--white);box-shadow:0 0 0 2px var(--gold);display:flex;align-items:center;justify-content:center;font-size:.85rem;font-weight:700;color:var(--black);flex-shrink:0;z-index:1;}
.step-title{font-size:.95rem;font-weight:700;color:var(--dark);margin-bottom:4px;}
.step-desc{font-size:.84rem;color:var(--gray);line-height:1.6;}

/* CTA Cards — dua kartu berdampingan */
.cta-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:0;}
.cta-box{border-radius:var(--radius-lg);padding:36px 32px;text-align:center;}
.cta-box.dark{background:var(--dark);}
.cta-box.gold{background:var(--gold);border:2px solid var(--black);}
.cta-box-icon{font-size:2.4rem;margin-bottom:14px;}
.cta-box h3{font-size:1.1rem;font-weight:700;margin-bottom:6px;}
.cta-box.dark h3{color:var(--white);}
.cta-box.gold h3{color:var(--black);}
.cta-box p{font-size:.84rem;line-height:1.65;margin-bottom:22px;}
.cta-box.dark p{color:rgba(255,255,255,.5);}
.cta-box.gold p{color:rgba(0,0,0,.6);}
.cta-box-tag{display:inline-block;font-size:.62rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:3px 10px;border-radius:3px;margin-bottom:12px;}
.cta-box.dark .cta-box-tag{background:rgba(212,160,23,.18);color:var(--gold);border:1px solid rgba(212,160,23,.3);}
.cta-box.gold .cta-box-tag{background:rgba(0,0,0,.1);color:rgba(0,0,0,.65);}
.btn-gform{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:13px 26px;font-family:var(--font);font-weight:700;font-size:.88rem;border-radius:var(--radius);transition:background var(--transition),transform var(--transition),box-shadow var(--transition);text-decoration:none;width:100%;}
.btn-gform:hover{transform:translateY(-2px);}
.btn-gform.primary{background:var(--gold);color:var(--black);border:2px solid var(--black);box-shadow:3px 3px 0 var(--black);}
.btn-gform.primary:hover{background:var(--gold-bright);box-shadow:4px 4px 0 var(--black);}
.btn-gform.secondary{background:var(--black);color:var(--white);border:2px solid var(--black);}
.btn-gform.secondary:hover{background:#222;}
.btn-gform svg{width:16px;height:16px;flex-shrink:0;}

@media(max-width:900px){
  .spec-grid{grid-template-columns:1fr 1fr;}
  .cats-grid{grid-template-columns:1fr 1fr;}
  .sub-header,.sub-main{padding-left:20px;padding-right:20px;}
  .cta-grid{grid-template-columns:1fr;}
}
@media(max-width:540px){
  .spec-grid,.cats-grid{grid-template-columns:1fr;}
}
</style>
@endpush

@section('content')

<div class="sub-header">
  <div class="sub-header-inner">
    <h1>Submission Guidelines</h1>
    <p>Everything you need to know before submitting your article or artwork to Himaris Newsletter.</p>
  </div>
</div>

<div class="sub-main">

  {{-- SPESIFIKASI --}}
  <div class="spec-grid">
    @foreach([
      ['📝', 'Word Count', '600 – 1,500', 'Per article'],
      ['📄', 'Format', 'Google Form', 'Link tersedia di bawah'],
      ['🖼️', 'Images', 'Min. 1 image', 'Min. 800×600px'],
      ['⏱️', 'Review Time', '3 – 5 Days', 'Weekdays only'],
    ] as [$icon, $label, $value, $note])
    <div class="spec-card reveal">
      <div class="spec-icon">{{ $icon }}</div>
      <div class="spec-label">{{ $label }}</div>
      <div class="spec-value">{{ $value }}</div>
      <div class="spec-note">{{ $note }}</div>
    </div>
    @endforeach
  </div>

  {{-- KATEGORI --}}
  <h2 style="font-size:1.2rem;font-weight:700;margin-bottom:20px">Article Categories</h2>
  <div class="cats-grid">
    @foreach([
      ['☕', 'Cafe Review',      'Share your experience visiting cafes near campus — perfect study spots, ambience, menu, and vibe.'],
      ['👤', 'Alumni Profile',   'Interview a POLBAN English Dept alumni and share their inspiring career journey.'],
      ['📰', 'News Report',      'Cover important campus events, faculty announcements, or student achievements.'],
      ['🌱', 'Self-Improvement', 'Tips, habits, study strategies, and personal development content for students.'],
      ['✨', 'Miscellaneous',    "Creative pieces, opinion articles, essays, or content that doesn't fit other categories."],
      ['📅', 'Upcoming Event',   'Preview or announce an upcoming HIMARIS or campus event with all the key details.'],
    ] as [$icon, $name, $desc])
    <div class="cat-item reveal">
      <div class="cat-item-icon">{{ $icon }}</div>
      <div>
        <div class="cat-item-name">{{ $name }}</div>
        <div class="cat-item-desc">{{ $desc }}</div>
      </div>
    </div>
    @endforeach
  </div>

  {{-- PROSES --}}
  <h2 style="font-size:1.2rem;font-weight:700;margin-bottom:24px">Submission Process</h2>
  <div class="process-list">
    @foreach([
      ['Fill the Form',       'Open the submission form below. Choose the type of submission — Article or Artwork — and fill in all required fields.'],
      ['Attach Your Work',    'For articles: paste your Google Doc link (set to "Anyone with link can comment"). For artwork: upload your file directly in the form.'],
      ['Editorial Review',    'Our editorial team will review your submission within 3–5 business days. We may contact you if edits are needed.'],
      ['Revision (if needed)','If revisions are requested, you\'ll have 3 days to update your work.'],
      ['Publication',         'Once approved, your article or artwork will be published on the Himaris Newsletter website with full credit to you.'],
    ] as $i => [$title, $desc])
    <div class="process-step reveal">
      <div class="step-dot">{{ $i + 1 }}</div>
      <div>
        <div class="step-title">{{ $title }}</div>
        <div class="step-desc">{{ $desc }}</div>
      </div>
    </div>
    @endforeach
  </div>

  {{-- CTA — DUA GFORM --}}
  <div class="cta-grid">

    {{-- Article Submission --}}
    <div class="cta-box dark reveal">
      <div class="cta-box-icon">📝</div>
      <div class="cta-box-tag">Article Submission</div>
      <h3>Got a Story to Tell?</h3>
      <p>Submit your article — news, cafe reviews, alumni profiles, self-improvement, and more. Fill in the form and our editors will get back to you within 3–5 days.</p>
      <a href="https://forms.gle/XkAYYbgfQCLkJznS8"
         target="_blank"
         rel="noopener noreferrer"
         class="btn-gform primary">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
          <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
        </svg>
        Submit an Article
      </a>
    </div>

    {{-- Artwork Submission --}}
    <div class="cta-box gold reveal">
      <div class="cta-box-icon">🎨</div>
      <div class="cta-box-tag">Artwork Submission</div>
      <h3>Share Your Creative Work</h3>
      <p>Illustrations, photography, digital art, or any visual creation — we'd love to feature your artwork in our newsletter. Fill in the form to get started.</p>
      <a href="https://forms.gle/CAqSS6x6wE1rbUHX6"
         target="_blank"
         rel="noopener noreferrer"
         class="btn-gform secondary">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
          <circle cx="12" cy="12" r="10"/>
          <path d="M8 12s1.5-3 4-3 4 3 4 3-1.5 3-4 3-4-3-4-3z"/>
          <circle cx="12" cy="12" r="1" fill="currentColor"/>
        </svg>
        Submit Artwork
      </a>
    </div>

  </div>

  {{-- Catatan kecil di bawah CTA --}}
  <p style="text-align:center;font-size:.76rem;color:var(--gray);margin-top:18px;">
    Butuh bantuan? Hubungi kami via
    <a href="mailto:himaris@polban.ac.id" style="color:var(--gold);font-weight:600;">himaris@polban.ac.id</a>
    atau DM Instagram
    <a href="https://instagram.com/himaris.newsletter" target="_blank" style="color:var(--gold);font-weight:600;">@himaris.newsletter</a>
  </p>

</div>
@endsection