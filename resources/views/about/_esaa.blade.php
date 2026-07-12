{{-- PARTIAL — no @extends, @section, or @push here --}}

{{-- LOGO EMBLEM --}}
<div style="background:var(--off-white);padding:48px 32px 0;display:flex;flex-direction:column;align-items:center;text-align:center">
  <div style="width:110px;height:110px;border-radius:50%;background:var(--white);border:2px solid rgba(212,160,23,.3);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 20px rgba(0,0,0,.07);margin-bottom:14px">
    <img src="{{ asset('images/logoesaa.png') }}" alt="ESAA Logo" style="width:76%;height:76%;object-fit:contain"/>
  </div>
  <p style="font-size:.68rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:6px">About ESAA</p>
  <h1 style="font-size:clamp(1.4rem,3vw,2rem);font-weight:700;color:var(--dark);line-height:1.2;margin-bottom:0">English Student Alumni Association</h1>
</div>

{{-- WHAT IS ESAA --}}
<section style="padding:64px 0;background:var(--off-white)">
  <div class="container reveal">
    <h2 class="sec-heading"><span class="underline">What Is ESAA?</span></h2>
    <div style="max-width:800px;margin:0 auto;font-size:.93rem;color:#3a3a3a;line-height:1.9">
      <p style="margin-bottom:16px">
        The <strong>English Student Alumni Association (ESAA)</strong> of Politeknik Negeri Bandung aims to bring together alumni of the English Department of Polban to stay connected, contribute, and grow together. ESAA serves as a bridge between alumni, active students, and the department, creating opportunities for impactful collaborations.
      </p>
      <p style="margin-bottom:16px">
        ESAA is designed to provide long-term benefits for both alumni and students. For students, ESAA can become a source of support, guidance, and inspiration in navigating their academic journey and preparing for future careers. For alumni, ESAA offers a platform to stay connected, expand networks, share experiences, and continuously develop both personally and professionally.
      </p>
    </div>
  </div>
</section>

{{-- STRUCTURE OF ORGANIZATION --}}
<section style="padding:64px 0;background:var(--white)">
  <div class="container reveal">
    <h2 class="sec-heading"><span class="underline">Structure of Organization</span></h2>
    <p style="text-align:center;font-size:.88rem;color:var(--gray);margin-bottom:28px;max-width:760px;margin-left:auto;margin-right:auto">
      The ESAA organizational structure consists of several roles that work together to manage programs, maintain communication, and support the organization's objectives.
    </p>

    {{-- Structure Image --}}
        <div style="text-align:center;margin-bottom:36px;display:flex;justify-content:center">
      <img src="{{ asset('images/strukturesaa.png') }}"
           alt="ESAA Organizational Structure"
          style="display:block;max-width:100%;margin:0 auto;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,.08);border:1.5px solid var(--gray-light)"/>
    </div>

    {{-- Member List --}}
    <div style="max-width:700px;margin:0 auto;background:var(--off-white);border-radius:12px;padding:28px 32px;border:1.5px solid var(--gray-light);margin-bottom:36px">
      <p style="font-size:.68rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--gold);margin-bottom:16px">ESAA Team</p>
      <div style="display:flex;flex-direction:column;gap:10px">
        @foreach([
          ['President of ESAA',                        'Luqman Hakim Gunadibrata'],
          ['Vice President & Treasurer',               'Naufal Maulana Dzakwan'],
          ['Secretary & Division Coordinator',         'Ghifari Nor Amarullah Dirgayusa'],
          ['Marketing',                                'Rizki Akbar Fatihah & Muhammad Fawwaz Firdaus'],
          ['Operational Coordinator',                  'Tahir Dzaky Hafidz'],
          ['Fundraising Coordinator',                  'Gilang Aji Satria'],
          ['Job Portal Coordinator',                   'Raihan Al Ghifari & Ziyanul Hassan'],
        ] as [$role, $name])
          <div style="display:flex;justify-content:space-between;align-items:baseline;gap:12px;padding:8px 0;border-bottom:1px solid var(--gray-light)">
            <span style="font-size:.82rem;color:var(--gray)">{{ $role }}</span>
            <span style="font-size:.86rem;font-weight:600;color:var(--dark);white-space:nowrap">{{ $name }}</span>
          </div>
        @endforeach
      </div>
    </div>

    {{-- Role Descriptions --}}
    <div style="max-width:800px;margin:0 auto;font-size:.88rem;color:#3a3a3a;line-height:1.85">
      <p>The <strong>President of ESAA</strong> leads the organization by setting its vision and ensuring all activities align with its goals, as well as forming the organizational structure and programs to achieve its objectives. The <strong>Vice President</strong> supports the management of the organization and also handles budgeting as <strong>Treasurer</strong>. The <strong>Secretary</strong> manages administrative tasks and also acts as <strong>Division Coordinator</strong> to coordinate communication across all roles. The <strong>Marketing</strong> team is responsible for managing social media, promoting programs and alumni achievements, and maintaining relationships with alumni and external partners. The <strong>Operational</strong> team organizes events such as reunions, seminars, and social activities, as well as managing volunteer and scholarship programs. The <strong>Fundraising</strong> team manages finances, seeks sponsorships, and supports funding for various programs. Meanwhile, the <strong>Job Portal</strong> team manages a platform that provides job opportunities and career information for alumni.</p>
    </div>
  </div>
</section>