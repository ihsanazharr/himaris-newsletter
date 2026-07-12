<style>
.about-bar{background:linear-gradient(180deg,rgba(17,17,17,.98) 0%,rgba(17,17,17,.94) 100%);border-bottom:1px solid rgba(212,160,23,.16);box-shadow:0 8px 24px rgba(0,0,0,.12);position:relative;z-index:2;}
.about-bar-inner{max-width:1160px;margin:0 auto;padding:8px 32px;display:flex;gap:8px;flex-wrap:wrap;align-items:center;overflow-x:auto;scrollbar-width:none;}
.about-bar-inner::-webkit-scrollbar{display:none;}
.tab-btn,.tab-link{flex-shrink:0;padding:8px 14px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);border-radius:999px;font-family:var(--font);font-size:.78rem;font-weight:600;color:rgba(255,255,255,.66);cursor:pointer;transition:transform var(--transition),color var(--transition),background var(--transition),border-color var(--transition),box-shadow var(--transition);text-decoration:none;display:inline-flex;align-items:center;justify-content:center;white-space:nowrap;line-height:1.1;}
.tab-btn.active,.tab-link.active{color:var(--black);background:var(--gold);border-color:var(--gold);box-shadow:0 8px 18px rgba(212,160,23,.18);}
.tab-btn:hover,.tab-link:hover{color:var(--white);border-color:rgba(212,160,23,.3);transform:translateY(-1px);}
.about-hero{background:var(--dark);padding:60px 0 72px;}
.about-hero-inner{max-width:1160px;margin:0 auto;padding:0 32px;display:grid;grid-template-columns:1fr 260px;gap:56px;align-items:center;}
.hero-eyebrow{font-size:.75rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--gold);margin-bottom:10px;}
.hero-h1{font-size:clamp(1.5rem,3.2vw,2.4rem);font-weight:700;color:var(--white);line-height:1.2;}
.hero-h1 span{color:var(--gold);}
.hero-desc{font-size:.92rem;font-style:italic;color:rgba(255,255,255,.62);line-height:1.8;margin-top:14px;}
.hero-desc strong{color:rgba(255,255,255,.88);font-style:normal;font-weight:600;}
.stats-row{display:flex;gap:36px;margin-top:32px;flex-wrap:wrap;}
.stat-num{font-size:2rem;font-weight:700;color:var(--gold);line-height:1;}
.stat-label{font-size:.75rem;font-weight:500;color:rgba(255,255,255,.45);margin-top:4px;text-transform:uppercase;letter-spacing:.06em;}
.hero-logo-box{width:190px;height:190px;border:2px solid rgba(212,160,23,.28);border-radius:50%;background:rgba(212,160,23,.06);display:flex;align-items:center;justify-content:center;margin:0 auto;overflow:hidden;}
.hero-logo-box img{width:80%;height:80%;object-fit:contain;}
.vismis-grid{display:grid;grid-template-columns:1fr 1fr;gap:24px;}
.vismis-card{border-radius:12px;padding:28px;}
.vismis-card.visi{background:var(--dark);color:var(--white);}
.vismis-card.misi{background:var(--white);border:1.5px solid var(--gray-light);}
.vismis-label{font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.12em;margin-bottom:12px;color:var(--gold);}
.vismis-card.visi p{font-size:1rem;font-weight:600;color:var(--white);line-height:1.65;font-style:italic;}
.misi-list{list-style:none;display:flex;flex-direction:column;gap:12px;}
.misi-list li{display:flex;gap:10px;align-items:flex-start;font-size:.84rem;color:#3a3a3a;line-height:1.7;}
.misi-list li::before{content:'';width:6px;height:6px;background:var(--gold);border-radius:50%;flex-shrink:0;margin-top:9px;}
.team-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;}
.team-card{text-align:center;padding:26px 16px;border:1.5px solid var(--gray-light);border-radius:10px;background:var(--white);transition:border-color var(--transition),transform var(--transition),box-shadow var(--transition);}
.team-card:hover{border-color:var(--gold);transform:translateY(-3px);box-shadow:0 8px 20px rgba(0,0,0,.08);}
.team-avatar{width:68px;height:68px;border-radius:50%;margin:0 auto 14px;background:var(--gold-light);display:flex;align-items:center;justify-content:center;font-size:1.15rem;font-weight:700;color:#7A5C00;}
.team-name{font-size:.92rem;font-weight:600;margin-bottom:4px;}
.team-role{font-size:.72rem;font-weight:600;color:var(--gold);text-transform:uppercase;letter-spacing:.07em;}
.sec-heading{display:flex;align-items:center;justify-content:center;gap:12px;font-size:1.4rem;font-weight:700;margin-bottom:38px;color:var(--black);}
.sec-heading .underline{text-decoration:underline;text-underline-offset:5px;}
.logo-symbol-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:18px;}
.logo-symbol-card{background:var(--white);border:1.5px solid var(--gray-light);border-radius:10px;padding:20px 22px;transition:border-color var(--transition);}
.logo-symbol-card:hover{border-color:var(--gold);}
.logo-symbol-icon{font-size:1.8rem;margin-bottom:8px;}
.logo-symbol-title{font-size:.82rem;font-weight:700;color:var(--dark);margin-bottom:4px;}
.logo-symbol-desc{font-size:.77rem;color:var(--gray);line-height:1.6;}
.timeline{position:relative;padding-left:28px;}
.timeline::before{content:'';position:absolute;left:7px;top:0;bottom:0;width:2px;background:var(--gold);}
.timeline-item{position:relative;margin-bottom:24px;}
.timeline-dot{position:absolute;left:-28px;top:4px;width:16px;height:16px;background:var(--gold);border-radius:50%;border:3px solid var(--white);box-shadow:0 0 0 2px var(--gold);}
.timeline-year{font-size:.68rem;font-weight:700;color:var(--gold);text-transform:uppercase;letter-spacing:.08em;margin-bottom:3px;}
.timeline-text{font-size:.82rem;color:#3a3a3a;line-height:1.65;}
.socmed-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;}
.socmed-card{background:var(--white);border:1.5px solid var(--gray-light);border-radius:10px;padding:18px;transition:border-color var(--transition),transform var(--transition);}
.socmed-card:hover{border-color:var(--gold);transform:translateY(-2px);}
.socmed-media{position:relative;width:100%;aspect-ratio:4/3;border-radius:8px;overflow:hidden;background:linear-gradient(135deg,rgba(212,160,23,.14),rgba(17,17,17,.06));margin-bottom:14px;border:1px solid var(--gray-light);}
.socmed-media img{width:100%;height:100%;object-fit:cover;display:block;}
.socmed-fallback{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-size:2.4rem;color:rgba(17,17,17,.28);}
.socmed-copy{display:flex;flex-direction:column;gap:10px;}
.socmed-platform{font-size:.65rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--gold);margin-bottom:0;}
.socmed-card p{font-size:.8rem;color:#3a3a3a;line-height:1.65;margin-bottom:12px;}
.socmed-link{font-size:.72rem;font-weight:600;color:var(--gold);}
@media(max-width:900px){
  .about-hero-inner{grid-template-columns:1fr;gap:32px;}
  .hero-logo-box{display:none;}
  .vismis-grid{grid-template-columns:1fr;}
  .team-grid{grid-template-columns:1fr 1fr;}
  .about-bar-inner{padding:8px 20px;}
  .logo-symbol-grid{grid-template-columns:1fr;}
  .socmed-grid{grid-template-columns:1fr;}
}
@media(max-width:600px){
  .about-hero-inner{padding:0 16px;}
  .about-hero{padding:40px 0 52px;}
  .hero-h1{font-size:clamp(1.4rem,6vw,2rem);}
  .vismis-grid{grid-template-columns:1fr;}
  .team-grid{grid-template-columns:1fr 1fr;}
  .socmed-grid{grid-template-columns:1fr;}
  .sec-heading{font-size:1.15rem;margin-bottom:24px;}
}
</style>