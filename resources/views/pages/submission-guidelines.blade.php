@extends('layouts.app')

@section('title', 'Submission Guidelines — Himaris Newsletter')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet"/>
<style>
.sub-header{margin-top:var(--nav-h);background:var(--gold);padding:48px 32px 40px;border-bottom:3px solid var(--black);}
.sub-header-inner{max-width:1160px;margin:0 auto;}
.sub-header h1{font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.8rem,4vw,2.6rem);font-weight:700;color:var(--black);}
.sub-header p{font-size:.92rem;color:rgba(0,0,0,.62);margin-top:8px;font-style:italic;}

.sub-main{max-width:960px;margin:0 auto;padding:56px 32px 80px;}

.intro-box {
  background: var(--off-white);
  border-left: 4px solid var(--gold);
  padding: 24px;
  border-radius: 0 var(--radius-lg) var(--radius-lg) 0;
  font-size: .95rem;
  line-height: 1.8;
  color: #333;
  margin-bottom: 48px;
}

.guidelines-section {
  margin-bottom: 48px;
}
.section-title {
  font-size: 1.35rem;
  font-weight: 800;
  color: var(--black);
  margin-bottom: 24px;
  padding-bottom: 8px;
  border-bottom: 2px solid var(--gray-light);
}

.guidelines-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 28px;
  margin-bottom: 40px;
}
.guide-card {
  background: var(--white);
  border: 1.5px solid var(--gray-light);
  border-radius: var(--radius-lg);
  padding: 28px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.guide-card-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 20px;
  border-bottom: 1.5px solid var(--gray-light);
  padding-bottom: 12px;
}
.guide-card-icon {
  font-size: 1.8rem;
}
.guide-card-title {
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--dark);
}

.guide-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.guide-item {
  font-size: .88rem;
  line-height: 1.65;
  color: #444;
}
.guide-item strong {
  color: var(--black);
  display: block;
  font-size: .9rem;
  margin-bottom: 3px;
}
.guide-item ul {
  padding-left: 16px;
  margin-top: 6px;
  list-style-type: disc;
}
.guide-item li {
  margin-bottom: 4px;
}

.rules-box {
  background: var(--white);
  border: 1.5px solid var(--gray-light);
  border-radius: var(--radius-lg);
  padding: 32px;
  margin-bottom: 52px;
}
.rules-list {
  display: flex;
  flex-direction: column;
  gap: 14px;
  padding-left: 20px;
  margin: 0;
}
.rules-list li {
  font-size: .9rem;
  line-height: 1.7;
  color: #333;
}

/* CTA Cards */
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
  .guidelines-grid{grid-template-columns:1fr;}
  .sub-header,.sub-main{padding-left:20px;padding-right:20px;}
  .cta-grid{grid-template-columns:1fr;}
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

  {{-- INTRO --}}
  <div class="intro-box reveal">
    <p>
      Contributors are welcome to submit their articles (e.g. review articles, opinion articles, and news reports) and artworks (e.g. photography, drawing, painting, and digital art) to be published in the newsletter main sections. Before submitting, contributors are encouraged to read all the requirements to ensure that their article fits the theme and content of the selected section. All submissions will be reviewed by the editorial team before being published on the website.
    </p>
  </div>

  {{-- GUIDELINES GRID --}}
  <div class="guidelines-grid">
    
    {{-- ARTICLES GUIDELINES --}}
    <div class="guide-card reveal">
      <div class="guide-card-header">
        <span class="guide-card-icon">📝</span>
        <h2 class="guide-card-title">Guidelines for Articles</h2>
      </div>
      
      <ul class="guide-list">
        <li class="guide-item">
          <strong>1) Accepted Forms</strong>
          <ul>
            <li>News Report</li>
            <li>Review Article</li>
            <li>Opinion Article</li>
          </ul>
        </li>
        <li class="guide-item">
          <strong>2) Title</strong>
          <ul>
            <li>The title consists of a maximum of 10-15 words.</li>
            <li>The first word and proper nouns are capitalized.</li>
            <li>The title should be relevant to the topic.</li>
          </ul>
        </li>
        <li class="guide-item">
          <strong>3) Short Description</strong>
          <ul>
            <li>The short description consists of 50-75 words (3-5 sentences).</li>
            <li>It highlights the key points of the article.</li>
          </ul>
        </li>
        <li class="guide-item">
          <strong>4) Featured Image</strong>
          <ul>
            <li>The image size is 1200 × 630 px.</li>
            <li>The format is JPG or PNG.</li>
            <li>The source must be included if using someone else’s pictures or free copyright sources such as Freepik, Unsplash, and Pexels.</li>
          </ul>
        </li>
        <li class="guide-item">
          <strong>5) Author</strong>
          <ul>
            <li>The format follows “By (Full Name)”.<br><span style="font-style:italic;color:var(--gray)">Example: By Deviani Putri Azzahra</span></li>
          </ul>
        </li>
        <li class="guide-item">
          <strong>6) Published Date</strong>
          <ul>
            <li>The format follows “Month Day, Year”<br><span style="font-style:italic;color:var(--gray)">Example: October 8, 2025</span></li>
          </ul>
        </li>
        <li class="guide-item">
          <strong>7) Article Structure</strong>
          <ul>
            <li>The introduction presents the topic clearly.</li>
            <li>The body paragraphs explain ideas with examples or evidence.</li>
            <li>The conclusion summarizes the main points and gives a final insight.</li>
          </ul>
        </li>
        <li class="guide-item">
          <strong>8) Additional Notes</strong>
          <ul>
            <li>The article is written in English.</li>
            <li>The article must be original.</li>
            <li>The submission is in Word document format (.docx).</li>
            <li>The font used is Times New Roman Typeface (size 12 Font).</li>
            <li>The text uses justified alignment.</li>
            <li>The margins are 4cm (top and left) and 3cm (bottom and right).</li>
            <li>The document uses double spacing.</li>
          </ul>
        </li>
      </ul>
    </div>

    {{-- ARTWORKS GUIDELINES --}}
    <div class="guide-card reveal">
      <div class="guide-card-header">
        <span class="guide-card-icon">🎨</span>
        <h2 class="guide-card-title">Guidelines for Artworks</h2>
      </div>

      <ul class="guide-list">
        <li class="guide-item">
          <strong>1) Accepted Forms</strong>
          <ul>
            <li>Illustration</li>
            <li>Photography</li>
            <li>Drawing</li>
            <li>Painting</li>
            <li>Digital art</li>
          </ul>
        </li>
        <li class="guide-item">
          <strong>2) Requirements</strong>
          <ul>
            <li>The format is JPG or PNG.</li>
            <li>The resolution is at least 1080 px.</li>
            <li>The artwork must be original.</li>
          </ul>
        </li>
        <li class="guide-item">
          <strong>3) Additional Information</strong>
          <ul>
            <li>The submission includes the title of the artwork.</li>
            <li>The submission includes the artist’s name.</li>
            <li>You may tell the story of your artwork in a Word document format (250-750 words, Times New Roman, size 12).</li>
            <li>The year of creation must be included.</li>
          </ul>
        </li>
      </ul>
    </div>

  </div>

  {{-- RULES SECTION --}}
  <div class="rules-box reveal">
    <h2 class="section-title" style="margin-top:0"><span style="border-bottom: 3px solid var(--gold); padding-bottom: 6px">Acceptance &amp; Rejection of Articles</span></h2>
    <ul class="rules-list">
      <li><strong>a.</strong> The project team will select the content of the article whether it is sensitive or not.</li>
      <li><strong>b.</strong> The article will be published if the author revises the article and if the content is acceptable by the editor in chief.</li>
      <li><strong>c.</strong> The submission after the deadline will not be accepted.</li>
      <li><strong>d.</strong> The author will be given one week to revise his/her article.</li>
      <li><strong>e.</strong> The article will not be published if the author does not send the revised article in accordance with the due date and the suggestions from the editors.</li>
    </ul>
  </div>

  {{-- CTA BOXES --}}
  <div class="cta-grid">

    {{-- Article Submission --}}
    <div class="cta-box dark reveal">
      <div class="cta-box-icon">📝</div>
      <div class="cta-box-tag">Article Submission</div>
      <h3>Got a Story to Tell?</h3>
      <p>Submit your article — from What's New to student profiles, reviews, and sponsored content. Fill in the form and our editors will get back to you within 3-5 days.</p>
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

  {{-- small contact info --}}
  <p style="text-align:center;font-size:.76rem;color:var(--gray);margin-top:24px;">
    Need help? Contact us via
    <a href="mailto:himaris@polban.ac.id" style="color:var(--gold);font-weight:600;">himaris@polban.ac.id</a>
    or DM Instagram
    <a href="https://instagram.com/himaris.newsletter" target="_blank" style="color:var(--gold);font-weight:600;">@himaris.newsletter</a>
  </p>

</div>
@endsection