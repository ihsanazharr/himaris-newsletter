<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <title>Himaris Newsletter</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #f4f4f4; font-family: Arial, Helvetica, sans-serif; color: #222; }
    a { color: #D4A017; text-decoration: none; }
    img { display: block; max-width: 100%; }
  </style>
</head>
<body style="background:#f4f4f4; padding: 24px 0;">

<!-- WRAPPER -->
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f4f4f4;">
  <tr>
    <td align="center">
      <table width="640" cellpadding="0" cellspacing="0" border="0"
             style="max-width:640px; width:100%; background:#ffffff; border-radius:4px; overflow:hidden; box-shadow:0 2px 12px rgba(0,0,0,0.08);">

        <!-- ===== LOGO HEADER ===== -->
        <tr>
          <td align="center" style="padding: 28px 32px 20px; background:#ffffff; border-bottom: 1px solid #f0f0f0;">
            <img src="{{ config('app.url') }}/images/logohimaris.png"
                 alt="Himaris POLBAN"
                 width="90" height="90"
                 style="object-fit:contain; margin: 0 auto;"/>
          </td>
        </tr>

        <!-- ===== GOLD TITLE BAR ===== -->
        <tr>
          <td align="center" style="background:#D4A017; padding: 22px 32px;">
            <h1 style="font-family: Arial, sans-serif; font-size: 26px; font-weight: 800; color: #111111; letter-spacing: -0.01em; margin-bottom: 4px;">
              Himaris Newsletter
            </h1>
            <p style="font-size: 13px; color: #111111; font-style: italic; font-weight: 400;">
              Come and take the experience with us
            </p>
          </td>
        </tr>

        <!-- ===== GREETING BODY ===== -->
        <tr>
          <td style="padding: 30px 36px 20px;">
            <p style="font-size: 15px; line-height: 1.7; color: #222; margin-bottom: 14px;">
              Dear Members/Alumni of Himaris,
            </p>
            <p style="font-size: 15px; line-height: 1.7; color: #444; margin-bottom: 6px;">
              Greetings! We hope you're doing great.
              We're excited to bring you the latest update from Himaris — straight to your inbox.
            </p>
          </td>
        </tr>

        <!-- ===== DIVIDER ===== -->
        <tr>
          <td style="padding: 0 36px;">
            <hr style="border:none; border-top: 1px solid #e0e0e0;"/>
          </td>
        </tr>

        <!-- ===== "WHAT'S NEW?" SECTION HEADER ===== -->
        <tr>
          <td style="padding: 0 36px; padding-top: 24px;">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td style="background: #D4A017; padding: 12px 20px; border-radius: 3px;">
                  <p style="font-size: 16px; font-weight: 800; color: #111111;">What's New?</p>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- ===== CONTENT BLOCK ===== -->
        <tr>
          <td style="padding: 24px 36px 0;">

            {{-- Type badge --}}
            @php
              $badgeColor = match($content['type']) {
                'event' => '#1565C0',
                'job'   => '#2E7D32',
                default => '#7A5C00',
              };
              $badgeBg = match($content['type']) {
                'event' => '#E8F4FD',
                'job'   => '#E8F5E9',
                default => '#FFF8DC',
              };
              $typeLabel = match($content['type']) {
                'event' => '📅 Event',
                'job'   => '💼 Job Opportunity',
                default => '📰 ' . ($content['category'] ?? 'Article'),
              };
            @endphp
            <p style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;
                       background: {{ $badgeBg }}; color: {{ $badgeColor }};
                       display: inline-block; padding: 4px 12px; border-radius: 20px; margin-bottom: 12px;">
              {{ $typeLabel }}
            </p>

            {{-- Title --}}
            <h2 style="font-size: 22px; font-weight: 800; color: #111111; line-height: 1.3; margin-bottom: 16px;">
              {{ $content['title'] }}
            </h2>

            {{-- Thumbnail image --}}
            @if(!empty($content['thumbnail']))
              <img src="{{ config('app.url') }}/storage/{{ $content['thumbnail'] }}"
                   alt="{{ $content['title'] }}"
                   width="568"
                   style="width:100%; border-radius: 6px; margin-bottom: 18px; object-fit:cover; max-height:320px;"/>
            @endif

            {{-- Excerpt --}}
            @if(!empty($content['excerpt']))
              <p style="font-size: 14px; line-height: 1.75; color: #444; margin-bottom: 14px;">
                {{ $content['excerpt'] }}
              </p>
            @endif

            {{-- Date / meta --}}
            <p style="font-size: 12px; color: #888; margin-bottom: 18px;">
              🗓️ {{ $content['date'] }}
              @if(!empty($content['category'])) &nbsp;·&nbsp; {{ $content['category'] }} @endif
            </p>

            {{-- Read More button --}}
            <a href="{{ $content['url'] }}"
               style="display:inline-block; padding: 12px 28px;
                      background: #D4A017; color: #111111;
                      font-size: 14px; font-weight: 700;
                      border-radius: 4px; border: 2px solid #111111;
                      text-decoration: none; margin-bottom: 8px;">
              Read More →
            </a>

            <p style="font-size: 11px; color: #aaa; margin-top: 8px; margin-bottom: 0;">
              Or copy this link: <a href="{{ $content['url'] }}" style="color:#D4A017; word-break:break-all;">{{ $content['url'] }}</a>
            </p>
          </td>
        </tr>

        <!-- ===== DIVIDER ===== -->
        <tr>
          <td style="padding: 28px 36px;">
            <hr style="border:none; border-top: 1px solid #e0e0e0;"/>
          </td>
        </tr>

        <!-- ===== CLOSING ===== -->
        <tr>
          <td style="padding: 0 36px 28px;">
            <p style="font-size: 14px; line-height: 1.7; color: #444; margin-bottom: 10px;">
              Wishing you an enjoyful week fulfilled with love and peace.<br/>
              Enjoy the experience!
            </p>
            <p style="font-size: 14px; font-weight: 600; color: #222;">
              Best wishes,<br/>
              <span style="color: #D4A017;">Himaris Newsletter Team</span>
            </p>
          </td>
        </tr>

        <!-- ===== FOOTER ===== -->
        <tr>
          <td style="background: #1A1A1A; padding: 20px 36px; text-align: center;">
            <p style="font-size: 12px; color: rgba(255,255,255,0.45); line-height: 1.6;">
              You're receiving this email because you subscribed to Himaris Newsletter.<br/>
              English Department &mdash; Politeknik Negeri Bandung
            </p>
            <p style="margin-top: 10px;">
              <a href="{{ route('unsubscribe', $unsubscribeToken) }}"
                 style="font-size: 11px; color: rgba(255,255,255,0.3); text-decoration: underline;">
                Unsubscribe
              </a>
            </p>
          </td>
        </tr>

      </table>
    </td>
  </tr>
</table>

</body>
</html>
