{{-- PARTIAL — tidak ada @extends, @section, atau @push di sini --}}

<div class="about-hero">
  <div class="about-hero-inner">
    <div>
      <p class="hero-eyebrow">About ESAA</p>
      <h1 class="hero-h1">English Student<br><span>Alumni Association</span></h1>
      <p class="hero-desc">
        ESAA brings together alumni of the English Department of Polban to stay connected,
        contribute, and grow together &mdash; serving as a bridge between alumni, active students,
        and the department, creating opportunities for impactful collaborations.
      </p>
      <div class="stats-row">
        <div><div class="stat-num">POLBAN</div><div class="stat-label">English Dept.</div></div>
        <div><div class="stat-num">7</div><div class="stat-label">Divisions</div></div>
      </div>
    </div>
    <div>
      <div class="hero-logo-box">
        <img src="{{ asset('images/logoesaa.png') }}" alt="ESAA Logo"/>
      </div>
    </div>
  </div>
</div>

{{-- WHAT IS ESAA --}}
<section style="padding:72px 0;background:var(--off-white)">
  <div class="container reveal">
    <h2 class="sec-heading"><span class="underline">What Is ESAA?</span></h2>
    <div style="max-width:800px;margin:0 auto;font-size:.93rem;color:#3a3a3a;line-height:1.9">
      <p style="margin-bottom:1.2em">
        The <strong>English Student Alumni Association (ESAA)</strong> of Politeknik Negeri Bandung aims to bring together alumni of the English Department of Polban to stay connected, contribute, and grow together. ESAA serves as a bridge between alumni, active students, and the department, creating opportunities for impactful collaborations.
      </p>
      <p style="margin-bottom:1.2em">
        ESAA is designed to provide long-term benefits for both alumni and students. For students, ESAA can become a source of support, guidance, and inspiration in navigating their academic journey and preparing for future careers.
      </p>
      <p>
        For alumni, ESAA offers a platform to stay connected, expand networks, share experiences, and continuously develop both personally and professionally.
      </p>
    </div>
  </div>
</section>

{{-- STRUCTURE OF ORGANIZATION --}}
<section style="padding:72px 0;background:var(--white)">
  <div class="container reveal">
    <h2 class="sec-heading"><span class="underline">&#128101; Structure of Organization</span></h2>
    <div class="team-grid">
      @foreach([
        ['Luqman Hakim Gunadibrata',       'President of ESAA'],
        ['Naufal Maulana Dzakwan',          'Vice President & Treasurer'],
        ['Ghifari Nor Amarullah Dirgayusa', 'Secretary & Division Coordinator'],
        ['Rizki Akbar Fatihah',             'Marketing'],
        ['Muhammad Fawwaz Firdaus',         'Marketing'],
        ['Tahir Dzaky Hafidz',              'Operational'],
        ['Gilang Aji Satria',               'Fundraising'],
        ['Raihan Al Ghifari',               'Job Portal'],
        ['Ziyanul Hassan',                  'Job Portal'],
      ] as [$name, $role])
      <div class="team-card reveal">
        <div class="team-avatar">{{ strtoupper(substr($name, 0, 2)) }}</div>
        <p class="team-name">{{ $name }}</p>
        <p class="team-role">{{ $role }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section style="padding:60px 0;background:var(--off-white)">
  <div class="container">
    <div style="text-align:center;padding:40px;background:var(--white);border-radius:var(--radius-lg);border:1.5px dashed var(--gray-light)">
      <div style="font-size:3rem;margin-bottom:16px">&#128679;</div>
      <p style="font-weight:700;color:var(--dark);margin-bottom:8px">More ESAA content coming soon</p>
      <p style="font-size:.84rem;color:var(--gray)">Stay tuned for updates on upcoming ESAA events and activities.</p>
      <a href="https://instagram.com/himaris.newsletter" target="_blank"
         style="display:inline-flex;align-items:center;gap:6px;padding:10px 22px;background:var(--gold);color:var(--black);font-weight:700;font-size:.84rem;border-radius:var(--radius);margin-top:20px;border:2px solid var(--black);box-shadow:3px 3px 0 var(--black);text-decoration:none">
        Follow for Updates
      </a>
    </div>
  </div>
</section>