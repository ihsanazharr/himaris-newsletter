{{-- SOCIAL MEDIA PUBLICATIONS — @himarispolban --}}
@php
  use Illuminate\Support\Facades\Cache;
  use Illuminate\Support\Facades\Http;
  use Illuminate\Support\Facades\Log;
  use Illuminate\Support\Str;

  $beholdUrl = config('services.behold.feed_url');
  $socialPosts = [];

  // Fetch from Behold.so API if configured, cached for 3 hours to stay within free tier limits
  if ($beholdUrl) {
      $socialPosts = Cache::remember('instagram_feed_posts_v3', now()->addHours(3), function() use ($beholdUrl) {
          try {
              $response = Http::timeout(10)->get($beholdUrl);
              if ($response->successful()) {
                  $data = $response->json();

                  // Behold API returns an object with a 'posts' key wrapping the actual posts array
                  $posts = $data['posts'] ?? (is_array($data) && isset($data[0]) ? $data : []);

                  $mapped = [];
                  foreach (array_slice($posts, 0, 3) as $post) {
                      // For carousel albums, use children[0].mediaUrl as the thumbnail
                      $mediaUrl = $post['mediaUrl'] ?? '';
                      if (empty($mediaUrl) && !empty($post['children'][0]['mediaUrl'])) {
                          $mediaUrl = $post['children'][0]['mediaUrl'];
                      }

                      // Prefer prunedCaption (shorter, clean) over full caption
                      $caption = $post['prunedCaption'] ?? $post['caption'] ?? '';

                      $mapped[] = [
                          'media_url' => $mediaUrl,
                          'caption'   => $caption,
                          'url'       => $post['permalink'] ?? 'https://instagram.com/himarispolban',
                      ];
                  }
                  return $mapped;
              }
          } catch (\Exception $e) {
              Log::error('Instagram Behold Feed API error: ' . $e->getMessage());
          }
          return [];
      });
  }
@endphp

<section style="padding:64px 0;background:var(--off-white)">
  <div style="max-width:1160px;margin:0 auto;padding:0 32px">

    {{-- Heading --}}
    <h2 style="display:flex;align-items:center;justify-content:center;gap:12px;font-size:1.4rem;font-weight:700;margin-bottom:12px;color:var(--dark);text-align:center">
      <span style="text-decoration:underline;text-underline-offset:5px">&#128241; Social Media Publications</span>
    </h2>
    <p style="text-align:center;font-size:.82rem;color:var(--gray);margin-bottom:36px">
      Latest posts from
      <a href="https://instagram.com/himarispolban" target="_blank"
         style="color:var(--gold);font-weight:700;text-decoration:none">@himarispolban</a>
      on Instagram
    </p>

    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;align-items:start">

      @if(!empty($socialPosts))
        {{-- Real-Time Cards from Behold.so --}}
        @foreach($socialPosts as $post)
          <div class="reveal" style="background:var(--white);border:1.5px solid var(--gray-light);border-radius:14px;overflow:hidden;transition:border-color .2s,box-shadow .2s"
               onmouseover="this.style.borderColor='var(--gold)';this.style.boxShadow='0 8px 24px rgba(0,0,0,.09)'"
               onmouseout="this.style.borderColor='var(--gray-light)';this.style.boxShadow=''">
            <div style="width:100%;aspect-ratio:1;overflow:hidden;background:#fafafa;border-bottom:1px solid var(--gray-light)">
              @if(!empty($post['media_url']))
                <img src="{{ $post['media_url'] }}" alt="Instagram post" style="width:100%;height:100%;object-fit:cover;display:block"/>
              @else
                <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:3rem">📸</div>
              @endif
            </div>
            <div style="padding:16px 18px 18px">
              <p style="font-size:.65rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:var(--gold);margin-bottom:8px">📸 @himarispolban</p>
              <p style="font-size:.82rem;color:#3a3a3a;line-height:1.65;margin-bottom:12px">
                {{ Str::limit($post['caption'], 150) }}
              </p>
              <a href="{{ $post['url'] }}" target="_blank"
                 style="font-size:.73rem;font-weight:700;color:var(--gold);text-decoration:none;display:inline-flex;align-items:center;gap:4px">
                View on Instagram →
              </a>
            </div>
          </div>
        @endforeach
      @else
        {{-- Fallback Cards with Iframes (if Behold API not set or failed) --}}
        {{-- Fallback 1 --}}
        <div class="reveal" style="background:var(--white);border:1.5px solid var(--gray-light);border-radius:14px;overflow:hidden;transition:border-color .2s,box-shadow .2s"
             onmouseover="this.style.borderColor='var(--gold)';this.style.boxShadow='0 8px 24px rgba(0,0,0,.09)'"
             onmouseout="this.style.borderColor='var(--gray-light)';this.style.boxShadow=''">
          <iframe
            src="https://www.instagram.com/reel/DNz5Xh10tZl/embed/"
            width="100%" height="380" frameborder="0" scrolling="no"
            allowtransparency="true" allowfullscreen="true" loading="lazy"
            style="display:block;border:none;background:#fafafa">
          </iframe>
          <div style="padding:16px 18px 18px">
            <p style="font-size:.65rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);margin-bottom:8px">📸 @himarispolban</p>
            <p style="font-size:.82rem;color:#3a3a3a;line-height:1.65;margin-bottom:12px">
              🎓 Let's give a big applause to this year's graduates! After years of hard work, you have finally reached an important milestone. Your journey in Polban is now coming to a close — but when one journey ends, another one begins.
            </p>
            <a href="https://www.instagram.com/reel/DNz5Xh10tZl/" target="_blank"
               style="font-size:.73rem;font-weight:700;color:var(--gold);text-decoration:none;display:inline-flex;align-items:center;gap:4px">
              View on Instagram →
            </a>
          </div>
        </div>

        {{-- Fallback 2 --}}
        <div class="reveal" style="background:var(--white);border:1.5px solid var(--gray-light);border-radius:14px;overflow:hidden;transition:border-color .2s,box-shadow .2s"
             onmouseover="this.style.borderColor='var(--gold)';this.style.boxShadow='0 8px 24px rgba(0,0,0,.09)'"
             onmouseout="this.style.borderColor='var(--gray-light)';this.style.boxShadow=''">
          <iframe
            src="https://www.instagram.com/reel/DMhujAUJtDE/embed/"
            width="100%" height="380" frameborder="0" scrolling="no"
            allowtransparency="true" allowfullscreen="true" loading="lazy"
            style="display:block;border:none;background:#fafafa">
          </iframe>
          <div style="padding:16px 18px 18px">
            <p style="font-size:.65rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);margin-bottom:8px">📸 @himarispolban</p>
            <p style="font-size:.82rem;color:#3a3a3a;line-height:1.65;margin-bottom:12px">
              📚 <em>English for Learning #2</em> — 10 Destination-Related Words You Need to Know! Make a travel itinerary and use these words when you have the chance.
            </p>
            <a href="https://www.instagram.com/reel/DMhujAUJtDE/" target="_blank"
               style="font-size:.73rem;font-weight:700;color:var(--gold);text-decoration:none;display:inline-flex;align-items:center;gap:4px">
              View on Instagram →
            </a>
          </div>
        </div>

        {{-- Fallback 3 --}}
        <div class="reveal" style="background:var(--white);border:1.5px solid var(--gray-light);border-radius:14px;overflow:hidden;transition:border-color .2s,box-shadow .2s"
             onmouseover="this.style.borderColor='var(--gold)';this.style.boxShadow='0 8px 24px rgba(0,0,0,.09)'"
             onmouseout="this.style.borderColor='var(--gray-light)';this.style.boxShadow=''">
          <iframe
            src="https://www.instagram.com/reel/DNNqsvfpmZf/embed/"
            width="100%" height="380" frameborder="0" scrolling="no"
            allowtransparency="true" allowfullscreen="true" loading="lazy"
            style="display:block;border:none;background:#fafafa">
          </iframe>
          <div style="padding:16px 18px 18px">
            <p style="font-size:.65rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);margin-bottom:8px">📸 @himarispolban</p>
            <p style="font-size:.82rem;color:#3a3a3a;line-height:1.65;margin-bottom:12px">
              🦁 <em>TOUR JURUSAN 2025</em> — Say hello to the new fresh lions of HIMARIS! Freshmen just finished their academic major tour to learn more about college life in Polban.
            </p>
            <a href="https://www.instagram.com/reel/DNNqsvfpmZf/" target="_blank"
               style="font-size:.73rem;font-weight:700;color:var(--gold);text-decoration:none;display:inline-flex;align-items:center;gap:4px">
              View on Instagram →
            </a>
          </div>
        </div>
      @endif

    </div>

    <div style="text-align:center;margin-top:32px">
      <a href="https://instagram.com/himarispolban" target="_blank"
         style="display:inline-flex;align-items:center;gap:8px;padding:11px 24px;background:var(--gold);color:var(--black);font-weight:700;font-size:.84rem;border-radius:var(--radius);border:2px solid var(--black);box-shadow:3px 3px 0 var(--black);text-decoration:none">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
          <rect x="2" y="2" width="20" height="20" rx="5"/>
          <circle cx="12" cy="12" r="4"/>
          <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
        </svg>
        Follow @himarispolban
      </a>
    </div>

  </div>
</section>
