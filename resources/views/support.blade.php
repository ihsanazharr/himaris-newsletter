@extends('layouts.app')

@section('title', 'Support Us — Himaris Newsletter')

@push('styles')
<style>
.page-hero{margin-top:var(--nav-h);background:var(--dark);padding:60px 32px 52px;text-align:center;position:relative;overflow:hidden;border-bottom:3px solid var(--gold);}
.page-hero::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(212,160,23,.18) 0%,transparent 65%);}
.page-hero-inner{position:relative;z-index:1;max-width:680px;margin:0 auto;}
.hero-eyebrow{display:inline-flex;align-items:center;gap:6px;background:rgba(212,160,23,.15);border:1px solid rgba(212,160,23,.35);color:var(--gold);font-size:.7rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;padding:5px 14px;border-radius:20px;margin-bottom:20px;}
.page-hero h1{font-size:clamp(1.8rem,4vw,2.6rem);font-weight:700;color:var(--white);line-height:1.2;margin-bottom:14px;}
.page-hero h1 em{color:var(--gold);font-style:italic;}
.page-hero p{font-size:.95rem;color:rgba(255,255,255,.58);max-width:520px;margin:0 auto;line-height:1.7;}
.hero-stats{display:flex;justify-content:center;gap:40px;margin-top:32px;flex-wrap:wrap;}
.hero-stat .num{font-size:1.6rem;font-weight:700;color:var(--gold);}
.hero-stat .lbl{font-size:.7rem;color:rgba(255,255,255,.45);text-transform:uppercase;letter-spacing:.07em;margin-top:2px;}
.main{max-width:1160px;margin:0 auto;padding:56px 32px 80px;}
.sec-title-row{text-align:center;margin-bottom:36px;}
.sec-title-row .eyebrow{font-size:.68rem;font-weight:700;color:var(--gold);text-transform:uppercase;letter-spacing:.1em;margin-bottom:8px;}
.sec-title-row h2{font-size:1.4rem;font-weight:700;color:var(--dark);}
.sec-title-row p{font-size:.88rem;color:var(--gray);margin-top:6px;}
.why-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-bottom:64px;}
.why-card{background:var(--white);border:1.5px solid var(--gray-light);border-radius:var(--radius-lg);padding:24px;text-align:center;transition:border-color var(--transition),transform var(--transition),box-shadow var(--transition);}
.why-card:hover{border-color:var(--gold);transform:translateY(-3px);box-shadow:0 10px 28px rgba(0,0,0,.08);}
.why-icon{font-size:2.2rem;margin-bottom:14px;}
.why-title{font-size:.92rem;font-weight:700;color:var(--dark);margin-bottom:6px;}
.why-desc{font-size:.8rem;color:var(--gray);line-height:1.6;}
.methods-wrap{display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-bottom:64px;}
.qris-card{background:var(--white);border:2px solid var(--gold);border-radius:var(--radius-lg);padding:28px;display:flex;flex-direction:column;align-items:center;text-align:center;position:relative;overflow:hidden;}
.qris-card::before{content:'RECOMMENDED';position:absolute;top:14px;right:-22px;background:var(--gold);color:var(--black);font-size:.55rem;font-weight:700;letter-spacing:.1em;padding:4px 36px;transform:rotate(45deg);}
.method-label{font-size:.68rem;font-weight:700;color:var(--gold);text-transform:uppercase;letter-spacing:.1em;margin-bottom:8px;}
.method-title{font-size:1.05rem;font-weight:700;color:var(--dark);margin-bottom:4px;}
.method-desc{font-size:.8rem;color:var(--gray);margin-bottom:20px;line-height:1.55;}
.qris-img-wrap{width:220px;height:220px;border:2px solid var(--gray-light);border-radius:12px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;background:var(--off-white);margin-bottom:14px;overflow:hidden;}
.qris-img-wrap img{width:100%;height:100%;object-fit:contain;}
.qris-placeholder{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;color:var(--gray-mid);font-size:.75rem;font-weight:500;text-align:center;}
.qris-name{font-size:.82rem;font-weight:700;color:var(--dark);margin-top:4px;}
.qris-via{font-size:.72rem;color:var(--gray);}
.bank-card{background:var(--white);border:1.5px solid var(--gray-light);border-radius:var(--radius-lg);padding:28px;display:flex;flex-direction:column;}
.bank-list{display:flex;flex-direction:column;gap:14px;margin-bottom:16px;}
.bank-item{background:var(--off-white);border:1.5px solid var(--gray-light);border-radius:10px;padding:16px 18px;display:flex;align-items:center;gap:16px;transition:border-color var(--transition);}
.bank-item:hover{border-color:var(--gold);}
.bank-logo{width:48px;height:48px;border-radius:10px;background:var(--white);border:1.5px solid var(--gray-light);display:flex;align-items:center;justify-content:center;font-size:.6rem;font-weight:700;flex-shrink:0;color:var(--dark);text-align:center;line-height:1.3;}
.bank-name{font-size:.72rem;font-weight:700;color:var(--gray);text-transform:uppercase;letter-spacing:.06em;margin-bottom:2px;}
.bank-number{font-size:1.05rem;font-weight:700;color:var(--dark);letter-spacing:.04em;}
.bank-holder{font-size:.76rem;color:var(--gray);}
.btn-copy{padding:6px 12px;background:transparent;border:1.5px solid var(--gray-light);border-radius:6px;font-family:var(--font);font-size:.7rem;font-weight:600;color:var(--gray);cursor:pointer;transition:all var(--transition);white-space:nowrap;flex-shrink:0;}
.btn-copy:hover{border-color:var(--gold);color:var(--gold);background:var(--gold-light);}
.btn-copy.copied{background:var(--gold);border-color:var(--gold);color:var(--black);}
.bank-note{font-size:.76rem;color:var(--gray);line-height:1.6;background:var(--gold-light);border-radius:8px;padding:12px 14px;border-left:3px solid var(--gold);}
.faq-list{display:flex;flex-direction:column;gap:10px;max-width:720px;margin:0 auto 64px;}
.faq-item{background:var(--white);border:1.5px solid var(--gray-light);border-radius:var(--radius-lg);overflow:hidden;}
.faq-q{display:flex;align-items:center;justify-content:space-between;padding:16px 20px;cursor:pointer;font-size:.9rem;font-weight:600;color:var(--dark);width:100%;background:none;border:none;font-family:var(--font);text-align:left;transition:background var(--transition);}
.faq-q:hover{background:var(--gold-light);}
.faq-chevron{width:16px;height:16px;flex-shrink:0;transition:transform var(--transition);color:var(--gray);}
.faq-item.open .faq-q{background:var(--gold-light);}
.faq-item.open .faq-chevron{transform:rotate(180deg);}
.faq-a{font-size:.84rem;color:var(--gray);line-height:1.7;padding:0 20px;max-height:0;overflow:hidden;transition:max-height .35s ease,padding .25s ease;}
.faq-item.open .faq-a{max-height:200px;padding:0 20px 16px;}
@media(max-width:900px){
  .why-grid{grid-template-columns:1fr 1fr;}
  .methods-wrap{grid-template-columns:1fr;}
  .page-hero,.main{padding-left:20px;padding-right:20px;}
}
@media(max-width:540px){ .why-grid{grid-template-columns:1fr;} }
</style>
@endpush

@section('content')
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="hero-eyebrow">&#10084;&#65039; Support Us</div>
    <h1>Help Us Keep <em>Himaris</em><br>Growing for Everyone.</h1>
    <p>Every contribution — big or small — goes directly toward running events, producing content, and creating more opportunities for English students at POLBAN.</p>
    <div class="hero-stats">
      <div class="hero-stat"><div class="num">120+</div><div class="lbl">Supporters</div></div>
      <div class="hero-stat"><div class="num">18</div><div class="lbl">Events Funded</div></div>
      <div class="hero-stat"><div class="num">35+</div><div class="lbl">Articles Published</div></div>
    </div>
  </div>
</div>

<div class="main">

  <div class="sec-title-row reveal">
    <div class="eyebrow">Why It Matters</div>
    <h2>Your Support Makes This Possible</h2>
    <p>Himaris Newsletter runs on volunteerism and community support. Here's what your donation funds:</p>
  </div>
  <div class="why-grid">
    <div class="why-card reveal">
      <div class="why-icon">&#128240;</div>
      <div class="why-title">Quality Content</div>
      <div class="why-desc">Funding research, writing tools, and design resources to produce informative articles, interviews, and reviews.</div>
    </div>
    <div class="why-card reveal">
      <div class="why-icon">&#127908;</div>
      <div class="why-title">Events &amp; Talks</div>
      <div class="why-desc">Covering venue costs, speaker honorariums, and logistics for career talks, workshops, and campus events.</div>
    </div>
    <div class="why-card reveal">
      <div class="why-icon">&#127891;</div>
      <div class="why-title">Student Resources</div>
      <div class="why-desc">Maintaining our scholarship database, job boards, and campus event listings — keeping them accurate and up to date.</div>
    </div>
  </div>

  <div class="sec-title-row reveal">
    <div class="eyebrow">How to Donate</div>
    <h2>Choose Your Preferred Method</h2>
    <p>Both methods are safe and reach us directly.</p>
  </div>

  <div class="methods-wrap">
    <div class="qris-card reveal">
      <div class="method-label">Scan &amp; Pay</div>
      <div class="method-title">QRIS — All E-Wallets &amp; Banking Apps</div>
      <div class="method-desc">Scan the QR code using GoPay, OVO, Dana, ShopeePay, BCA Mobile, BSI Mobile, and more.</div>
      <div class="qris-img-wrap">
        {{-- Ganti dengan: <img src="{{ asset('images/qris.png') }}" alt="QRIS HIMARIS"/> --}}
        <div class="qris-placeholder">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="width:52px;height:52px;opacity:.3">
            <rect x="3" y="3" width="8" height="8"/><rect x="13" y="3" width="8" height="8"/>
            <rect x="3" y="13" width="8" height="8"/><rect x="13" y="13" width="3" height="3"/>
            <rect x="18" y="13" width="3" height="3"/><rect x="13" y="18" width="3" height="3"/>
            <rect x="18" y="18" width="3" height="3"/>
          </svg>
          <span>Your QRIS code will<br>appear here</span>
        </div>
      </div>
      <p class="qris-name">HIMARIS — English Dept POLBAN</p>
      <p class="qris-via">Scan via any QRIS-supported app</p>
    </div>

    <div class="bank-card reveal">
      <div class="method-label">Bank Transfer</div>
      <div class="method-title">Direct Bank Transfer</div>
      <div class="method-desc">Transfer to any of the accounts below. Include your name and "HIMARIS" in the transfer notes.</div>
      <div class="bank-list">
        <div class="bank-item">
          <div class="bank-logo">BCA</div>
          <div style="flex:1">
            <p class="bank-name">Bank Central Asia</p>
            <p class="bank-number">1393728713</p>
            <p class="bank-holder">BCA A/N DEVIANI PUTRI AZZAHRA</p>
          </div>
          <button class="btn-copy" data-num="1393728713" onclick="copyNum(this)">Copy</button>
        </div>
      </div>
      <p class="bank-note"><strong>Important:</strong> QRIS menyusul.</p>
    </div>
  </div>

  <div class="sec-title-row reveal">
    <div class="eyebrow">Questions?</div>
    <h2>Frequently Asked Questions</h2>
  </div>
  <div class="faq-list">
    @foreach([
      ['Is my donation tax-deductible?', 'At this time, Himaris Newsletter is a student organisation and donations are not formally tax-deductible. However, we provide a digital receipt for all contributions.'],
      ['How will my donation be used?', 'All donations go directly toward event production, content creation tools, and maintaining this platform. We publish a transparency report at the end of each semester.'],
      ['Can I donate anonymously?', 'Absolutely! If you would like to remain anonymous, simply note "Anonymous" in your transfer message and we will respect your privacy.'],
      ['What is the minimum donation?', 'There is no minimum — every amount, no matter how small, is genuinely appreciated and goes toward our mission.'],
    ] as [$q, $a])
    <div class="faq-item reveal">
      <button class="faq-q" onclick="this.closest('.faq-item').classList.toggle('open')">
        {{ $q }}
        <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
      </button>
      <div class="faq-a">{{ $a }}</div>
    </div>
    @endforeach
  </div>

</div>

@push('scripts')
<script>
function copyNum(btn) {
  const num = btn.dataset.num;
  navigator.clipboard?.writeText(num).then(() => {
    btn.textContent = '&#10003; Copied!';
    btn.classList.add('copied');
    setTimeout(() => { btn.textContent = 'Copy'; btn.classList.remove('copied'); }, 2000);
  }).catch(() => {
    btn.textContent = 'Failed';
    setTimeout(() => { btn.textContent = 'Copy'; }, 2000);
  });
}
</script>
@endpush

@endsection