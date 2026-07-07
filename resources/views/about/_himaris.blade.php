{{-- PARTIAL — tidak ada @extends, @section, atau @push di sini --}}

<div class="about-hero">
  <div class="about-hero-inner">
    <div>
      <p class="hero-eyebrow">About HIMARIS</p>
      <h1 class="hero-h1">Himpunan Mahasiswa<br><span>Jurusan Bahasa Inggris</span></h1>
      <p class="hero-desc">
        Established in <strong>2006</strong> by the first cohort of English Department students,
        HIMARIS is the official student organisation of the English Department at
        <strong>Politeknik Negeri Bandung</strong> &mdash; providing a platform to channel aspirations
        and organise activities that enhance both academic and non-academic skills.
      </p>
      <div class="stats-row">
        <div><div class="stat-num">2006</div><div class="stat-label">Founded</div></div>
        <div><div class="stat-num">20+</div><div class="stat-label">Proker Terjalani</div></div>
        <div><div class="stat-num">3</div><div class="stat-label">Departemen Aktif</div></div>
        <div><div class="stat-num">10+</div><div class="stat-label">Unit Kerja</div></div>
      </div>
    </div>
    <div>
      <div class="hero-logo-box">
        <img src="{{ asset('images/logohimaris.png') }}" alt="HIMARIS POLBAN Logo"/>
      </div>
    </div>
  </div>
</div>

{{-- WHAT IS HIMARIS --}}
<section style="padding:72px 0;background:var(--off-white)">
  <div class="container reveal">
    <h2 class="sec-heading"><span class="underline">What Is Himaris?</span></h2>
    <div style="max-width:800px;margin:0 auto;font-size:.93rem;color:#3a3a3a;line-height:1.9">
      <p style="margin-bottom:1.2em">
        The English Department Student Association (Himaris) was founded in 2006 by the first generation of students in the English Department. As the department's official student organisation, HIMARIS provides a space for students to express their ideas, represent their aspirations, and take part in programmes that support both academic and personal development.
      </p>
      <p style="margin-bottom:1.2em">
        Himaris organises a wide range of activities that help students improve their communication, leadership, teamwork, and organisational skills while encouraging personal growth beyond the classroom. Through these programmes, students gain valuable experience that prepares them for future academic and professional challenges.
      </p>
      <p style="margin-bottom:1.2em">
        In addition to supporting student development, Himaris is committed to serving the community. One of its regular initiatives is teaching English to children at local elementary schools. During the month of Ramadan, the organisation also holds social activities, including <em>buka bersama</em> (breaking the fast) with children at nearby orphanages.
      </p>
      <p>
        For English Department students, becoming a member of Himaris offers an excellent opportunity to broaden their experience, develop practical skills, and contribute actively to both the department and the wider community.
      </p>
    </div>
  </div>
</section>

{{-- VISION & MISSION --}}
<section style="padding:72px 0;background:var(--white)">
  <div class="container reveal">
    <h2 class="sec-heading"><span class="underline">Vision &amp; Mission</span></h2>
    <div class="vismis-grid">
      <div class="vismis-card visi">
        <p class="vismis-label">Vision</p>
        <p>To optimize Himaris Polban as an inclusive platform for English students of Polban in order to develop dynamic members who contribute positively to society.</p>
      </div>
      <div class="vismis-card misi">
        <p class="vismis-label">Mission</p>
        <ul class="misi-list">
          <li>To foster a supportive organizational environment for all members;</li>
          <li>To encourage active member participation through programs that align with their needs and interests;</li>
          <li>To create programs that provide tangible benefits to the community.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- LOGO PHILOSOPHY --}}
<section style="padding:72px 0;background:var(--off-white)">
  <div class="container reveal">
    <h2 class="sec-heading"><span class="underline">&#128300; Logo Philosophy</span></h2>
    <p style="text-align:center;font-size:.88rem;color:var(--gray);font-style:italic;margin-bottom:36px;max-width:640px;margin-left:auto;margin-right:auto">
      The Himaris logo is not merely an emblem &mdash; it is a visual representation of the organisation's identity, values, and aspirations.
    </p>

    {{-- Color meanings --}}
    <div style="display:flex;gap:16px;justify-content:center;margin-bottom:36px;flex-wrap:wrap">
      <div style="text-align:center;padding:20px 24px;background:var(--white);border:1.5px solid var(--gray-light);border-radius:10px;min-width:140px">
        <div style="font-size:1.5rem;margin-bottom:8px">&#11036;</div>
        <p style="font-size:.78rem;font-weight:700;color:var(--dark);margin-bottom:4px">White</p>
        <p style="font-size:.72rem;color:var(--gray);line-height:1.5">Purity &mdash; a pure and sincere intention in the pursuit of knowledge, organisational activities, and creative work.</p>
      </div>
      <div style="text-align:center;padding:20px 24px;background:var(--black);border-radius:10px;color:var(--white);min-width:140px">
        <div style="font-size:1.5rem;margin-bottom:8px">&#11035;</div>
        <p style="font-size:.78rem;font-weight:700;color:var(--gold);margin-bottom:4px">Black</p>
        <p style="font-size:.72rem;color:rgba(255,255,255,.6);line-height:1.5">Courage and chivalry.</p>
      </div>
      <div style="text-align:center;padding:20px 24px;background:var(--gold);border-radius:10px;color:var(--black);min-width:140px">
        <div style="font-size:1.5rem;margin-bottom:8px">&#128998;</div>
        <p style="font-size:.78rem;font-weight:700;margin-bottom:4px">Yellow / Gold</p>
        <p style="font-size:.72rem;line-height:1.5">Hope and the bright future of Himaris.</p>
      </div>
    </div>

    {{-- Symbol cards grid --}}
    <div class="logo-symbol-grid">
      <div class="logo-symbol-card">
        <div class="logo-symbol-icon">&#127963;</div>
        <p class="logo-symbol-title">Polban</p>
        <p class="logo-symbol-desc">Represents the institution under which the organization operates.</p>
      </div>
      <div class="logo-symbol-card">
        <div class="logo-symbol-icon">&#128218;</div>
        <p class="logo-symbol-title">Book</p>
        <p class="logo-symbol-desc">The open book symbolises education and knowledge. As the "window of the world," the book is the primary foundation and infinite source of insight for students.</p>
      </div>
      <div class="logo-symbol-card">
        <div class="logo-symbol-icon">&#127807;</div>
        <p class="logo-symbol-title">Leaves</p>
        <p class="logo-symbol-desc">The leaves symbolise the organisation that shelters and supports its members.</p>
      </div>
      <div class="logo-symbol-card">
        <div class="logo-symbol-icon">&#129409;</div>
        <p class="logo-symbol-title">Lion</p>
        <p class="logo-symbol-desc">The lion symbolises power, strength, and leadership &mdash; the characters that are expected from the members of Himaris.</p>
      </div>
      <div class="logo-symbol-card">
        <div class="logo-symbol-icon">&#129718;</div>
        <p class="logo-symbol-title">Quill Pen</p>
        <p class="logo-symbol-desc">The quill pen symbolises perseverance and diligence.</p>
      </div>
      <div class="logo-symbol-card">
        <div class="logo-symbol-icon">&#10134;</div>
        <p class="logo-symbol-title">Diagonal Line</p>
        <p class="logo-symbol-desc">Symbolises balance between two pillars: <strong>Organisational Life</strong> (represented by the Lion) and <strong>Academic Life</strong> (represented by the Pen).</p>
      </div>
      <div class="logo-symbol-card">
        <div class="logo-symbol-icon">&#128737;</div>
        <p class="logo-symbol-title">Shield</p>
        <p class="logo-symbol-desc">Symbolises strength, resilience, and courage. It reflects the unyielding spirit of Himaris in facing challenges and protecting the organisation's values.</p>
      </div>
      <div class="logo-symbol-card">
        <div class="logo-symbol-icon">&#127872;</div>
        <p class="logo-symbol-title">Ribbon</p>
        <p class="logo-symbol-desc">The ribbon bearing represents unity and solidarity among all members.</p>
      </div>
      <div class="logo-symbol-card">
        <div class="logo-symbol-icon">&#128279;</div>
        <p class="logo-symbol-title">Himaris</p>
        <p class="logo-symbol-desc">Represents the name of the organisation.</p>
      </div>
    </div>
  </div>
</section>

{{-- STRUCTURE OF ORGANIZATION --}}
<section style="padding:72px 0;background:var(--white)">
  <div class="container reveal">
    <h2 class="sec-heading"><span class="underline">&#128101; Structure of Organization</span></h2>
    <div class="team-grid">
      @foreach([
        ['Nurfalidza Nisrina',                          'President of Himaris'],
        ['Muhammad Syafiq Abdallah',                    'Vice President'],
        ['Oktavia Najwa Naila',                         'Secretary General'],
        ['Alia Artika Safwa',                           'Assets & Secretarial Bureau'],
        ['Arifah Ghina Yusriyyah',                      'Finance & Business Bureau'],
        ['Revalina Az-zahra',                           'Special Unit of Regeneration'],
        ['Raden Vidya Meyisha Syevilla Putri',          'Special Unit of Cabinet Personnel Management'],
        ['Aurellia Annisa Abrar Pata',                  'Social Department'],
        ['Zahra Zanisya',                               'Student Development Department'],
        ['Shilma Maudini',                              'Media Creative & Information Department'],
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

{{-- OUR MOMENTS --}}
<section style="padding:72px 0;background:var(--off-white)">
  <div class="container reveal">
    <h2 class="sec-heading"><span class="underline">&#128247; Our Moments</span></h2>
    <p style="text-align:center;font-size:.88rem;color:var(--gray);margin-bottom:32px">
      A glimpse into the activities and memories that define HIMARIS.
    </p>
    @if($moments->count())
      <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px">
        @foreach($moments as $moment)
          <a href="{{ route('gallery.show', $moment) }}"
             style="display:block;border-radius:10px;overflow:hidden;aspect-ratio:1;border:2px solid transparent;transition:border-color .2s,transform .2s;text-decoration:none"
             onmouseover="this.style.borderColor='var(--gold)';this.style.transform='scale(1.03)'"
             onmouseout="this.style.borderColor='transparent';this.style.transform='scale(1)'">
            @if($moment->image)
              <img src="{{ asset('storage/' . $moment->image) }}"
                   alt="{{ $moment->title }}"
                   style="width:100%;height:100%;object-fit:cover;display:block"/>
            @else
              <div style="width:100%;height:100%;background:var(--gray-light);display:flex;align-items:center;justify-content:center;font-size:2rem">📷</div>
            @endif
          </a>
        @endforeach
      </div>
      <div style="text-align:center;margin-top:28px">
        <a href="{{ route('gallery.index') }}"
           style="display:inline-flex;align-items:center;gap:6px;padding:10px 22px;background:var(--gold);color:var(--black);font-weight:700;font-size:.84rem;border-radius:var(--radius);border:2px solid var(--black);box-shadow:3px 3px 0 var(--black);text-decoration:none">
          View All in Our Moments →
        </a>
      </div>
    @else
      <div style="text-align:center;padding:48px;background:var(--white);border-radius:var(--radius-lg);border:1.5px dashed var(--gray-light)">
        <div style="font-size:3rem;margin-bottom:12px">📷</div>
        <p style="color:var(--gray);font-size:.88rem">Moments gallery coming soon.</p>
      </div>
    @endif
  </div>
</section>

{{-- LATEST FROM HIMARIS --}}
<section style="padding:72px 0;background:var(--white)">
  <div class="container reveal">
    <h2 class="sec-heading"><span class="underline">&#128241; Latest from HIMARIS</span></h2>
    <p style="text-align:center;font-size:.8rem;color:var(--gray);margin-bottom:28px">
      Via <a href="https://instagram.com/himarispolban" target="_blank" style="color:var(--gold);font-weight:700">@himarispolban</a>
    </p>
    <div class="socmed-grid">
      @php
        $socialPosts = [
          [
            'title' => 'Graduation Post',
            'emoji' => '🎓',
            'thumb' => 'https://www.instagram.com/reel/DNz5Xh10tZl/media/?size=l',
            'text' => "Let's give a big applause to this year's graduates! After years of hard work, you have finally reached an important milestone. Your journey in Polban is now coming to a close. But when one journey ends, another one begins.",
            'url' => 'https://www.instagram.com/reel/DNz5Xh10tZl/',
          ],
          [
            'title' => 'English for Learning #2',
            'emoji' => '📚',
            'thumb' => 'https://www.instagram.com/reel/DMhujAUJtDE/media/?size=l',
            'text' => '<em>English for Learning #2</em> &mdash; 10 Destination-Related Words You Need to Know! Make a travel itinerary and use these words when you have the chance.',
            'url' => 'https://www.instagram.com/reel/DMhujAUJtDE/',
          ],
          [
            'title' => 'Tour Jurusan 2025',
            'emoji' => '🦁',
            'thumb' => 'https://www.instagram.com/reel/DNNqsvfpmZf/media/?size=l',
            'text' => '<em>TOUR JURUSAN 2025</em> &mdash; Say hello to the new fresh lions of HIMARIS! This year, freshmen just finished their academic major tour to learn more about their new college life in Polban.',
            'url' => 'https://www.instagram.com/reel/DNNqsvfpmZf/',
          ],
        ];
      @endphp
      @foreach($socialPosts as $post)
        <div class="socmed-card">
          <div class="socmed-media">
            <img src="{{ $post['thumb'] }}"
                 alt="{{ $post['title'] }}"
                 loading="lazy"
                 onerror="this.remove();this.parentElement.classList.add('is-fallback');"/>
            <div class="socmed-fallback">{{ $post['emoji'] }}</div>
          </div>
          <div class="socmed-copy">
            <p class="socmed-platform">📸 Instagram</p>
            <p>{!! $post['text'] !!}</p>
            <a href="{{ $post['url'] }}" target="_blank" class="socmed-link">View on Instagram &rarr;</a>
          </div>
        </div>
      @endforeach
    </div>
    <div style="text-align:center;margin-top:28px">
      <a href="https://instagram.com/himarispolban" target="_blank"
         style="display:inline-flex;align-items:center;gap:6px;padding:10px 22px;background:var(--gold);color:var(--black);font-weight:700;font-size:.84rem;border-radius:var(--radius);border:2px solid var(--black);box-shadow:3px 3px 0 var(--black)">
        Follow @himarispolban
      </a>
    </div>
  </div>
</section>