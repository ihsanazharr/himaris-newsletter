<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="@yield('meta_description', 'Himaris Newsletter — Campus news, events, scholarships, and opportunities.')"/>
  <title>@yield('title', 'Himaris Newsletter')</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logonewsletter.png') }}"/>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
  @stack('styles')
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar" id="mainNav">
  <a href="{{ route('home') }}" class="nav-brand">
    <div class="nav-logo">
      <img src="{{ asset('images/logonewsletter.png') }}" alt="Himaris Newsletter Logo"/>
    </div>
    Himaris Newsletter
  </a>

  <ul class="nav-links" id="navLinks">
    <li>
      <a href="{{ route('home') }}"
         class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
    </li>
    <li class="nav-dropdown">
      <a href="#" class="{{ request()->routeIs('about') || request()->routeIs('about-newsletter') || request()->routeIs('about.editorial-team') ? 'active' : '' }}">
        About Us
        <svg class="nav-chevron" viewBox="0 0 12 12" fill="none">
          <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
      <div class="dropdown-menu">
        <a href="{{ route('about', 'himaris') }}">Himaris</a>
        <a href="{{ route('about', 'esaa') }}">ESAA</a>
        <a href="{{ route('about', 'english-dept') }}">English Department</a>
        <a href="{{ route('about-newsletter') }}">Himaris Newsletter</a>
        <a href="{{ route('about.editorial-team') }}">Editorial Team</a>
      </div>
    </li>
    <li>
      <a href="{{ route('archive') }}"
         class="{{ request()->routeIs('archive') ? 'active' : '' }}">2026</a>
    </li>
    <li>
      <a href="{{ route('newsletter.index') }}"
         class="{{ request()->routeIs('newsletter.index') || request()->routeIs('newsletter.show') ? 'active' : '' }}">Articles</a>
    </li>
    <li>
      <a href="{{ route('student-resources.index') }}"
         class="{{ request()->routeIs('student-resources.*') ? 'active' : '' }}">Student Resources</a>
    </li>
    <li>
      <a href="{{ route('jobs.index') }}"
         class="{{ request()->routeIs('jobs.*') ? 'active' : '' }}">Career Opportunities</a>
    </li>
  </ul>

  <a href="{{ route('support') }}" class="btn-support">
    Support Us
    <svg width="12" height="12" viewBox="0 0 14 14" fill="none">
      <path d="M3 11L11 3M11 3H6M11 3v5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </a>

  <button class="nav-toggle" id="navToggle" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>
</nav>

@yield('content')

<!-- ===== FOOTER ===== -->
<footer>
  <div class="footer-inner">
    <div class="footer-brand-row">
      <div class="footer-logo">
        <img src="{{ asset('images/logonewsletter.png') }}" alt="Himaris Newsletter Logo"/>
      </div>
      <span class="footer-brand-name">Himaris Newsletter</span>
    </div>

    <div>
      <div class="footer-col-title">Contact</div>
      <div style="margin-bottom:12px">
        <div class="footer-label">Email</div>
        <a href="mailto:contact@himarisnewsletter.com" class="footer-val">digital.newsletter24@gmail.com</a>
      </div>
      <div style="margin-bottom:8px">
        <div class="footer-label">WhatsApp</div>
        <a href="https://wa.me/6285524970194" target="_blank" class="footer-val">+62 855-2497-0194 <span style="font-size:.7rem;color:rgba(255,255,255,.4)">(Aditya)</span></a>
      </div>
      <div style="margin-bottom:12px">
        <div class="footer-label"></div>
        <a href="https://wa.me/6281223815724" target="_blank" class="footer-val">+62 812-2381-5724 <span style="font-size:.7rem;color:rgba(255,255,255,.4)">(Deviani)</span></a>
      </div>
      <p class="footer-meta">Stay connected with us for updates.</p>
      <div class="footer-socials">
        <a href="https://instagram.com/himaris.newsletter" target="_blank" aria-label="Instagram">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
            <rect x="2" y="2" width="20" height="20" rx="5"/>
            <circle cx="12" cy="12" r="4"/>
            <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
          </svg>
        </a>
        <a href="#" aria-label="TikTok">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.27 6.27 0 00-.79-.05 6.34 6.34 0 000 12.68 6.34 6.34 0 006.33-6.34V8.69a8.19 8.19 0 004.79 1.54V6.79a4.85 4.85 0 01-1.02-.1z"/>
          </svg>
        </a>
        <a href="#" aria-label="YouTube">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
            <rect x="2" y="5" width="20" height="14" rx="4"/>
            <polygon points="10,9 16,12 10,15" fill="currentColor" stroke="none"/>
          </svg>
        </a>
      </div>
    </div>

    <div>
      <div class="footer-col-title">Stay in the Loop</div>
      <p class="footer-sub-desc">Get notified when new articles drop. No spam, ever.</p>
      @if(session('subscribe_message'))
        <p style="font-size:0.82rem;color:#6fcf97;font-weight:600;margin-bottom:10px;line-height:1.4;">
          ✓ {{ session('subscribe_message') }}
        </p>
      @endif
      <form class="footer-sub-form" action="{{ route('subscribe') }}" method="POST">
        @csrf
        <label class="footer-sub-label" for="femail">Your Email</label>
        <input class="footer-sub-input" type="email" id="femail" name="email"
               placeholder="you@example.com" required
               value="{{ old('email') }}"/>
        @error('email')
          <p style="font-size:0.76rem;color:#EB5757;margin-top:-4px;">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn-subscribe">Subscribe</button>
      </form>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; {{ date('Y') }} Himaris Newsletter &middot; Aditya Ependi Putra&middot; Deviani Putri Azzahra &middot; Dra. Esti Sugiharti, MA., Ph.D.</p>
    <p>English Department, Politeknik Negeri Bandung</p>
  </div>
</footer>

<script>
  const nav = document.getElementById('mainNav');
  window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 40));
  document.getElementById('navToggle').addEventListener('click', () => document.getElementById('navLinks').classList.toggle('open'));

  const obs = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) { setTimeout(() => e.target.classList.add('visible'), i * 90); obs.unobserve(e.target); }
    });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

  const progressFill = document.getElementById('progressFill');
  if (progressFill) {
    window.addEventListener('scroll', () => {
      const pct = window.scrollY / (document.documentElement.scrollHeight - window.innerHeight) * 100;
      progressFill.style.width = pct + '%';
    });
  }
</script>
@stack('scripts')
</body>
</html>
