<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>MentorChai — Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet"/>
{{-- Inline admin shell styles; colours mirror resources/css/app.css MentorChai tokens --}}
<style>
*{box-sizing:border-box;margin:0;padding:0}
.h-icon{width:1.125rem;height:1.125rem;flex-shrink:0;display:inline-block;vertical-align:middle}
.h-icon--sm{width:0.75rem;height:0.75rem}
.h-icon--md{width:0.9375rem;height:0.9375rem}
.h-icon--lg{width:1rem;height:1rem}
.btn .h-icon,.tb-btn .h-icon,.searchbar .h-icon{vertical-align:middle}
html.dark .btn-danger:hover{background:rgba(185,28,28,0.22)}
html.dark .btn-success:hover{background:rgba(21,128,61,0.22)}
html.dark .btn-warning:hover{background:rgba(194,65,12,0.2)}
.b-online{background:var(--green-bg);color:var(--green);border:1px solid rgba(21,128,61,0.25)}


/* ─── DESIGN TOKENS (MentorChai) ───────────────────────
   Light = :root. Dark = html.dark (matches app.css class-based dark).
──────────────────────────────────────────────────────── */
:root{
  /* MentorChai — aligned with resources/css/app.css */
  --bg:        #eef7f8;
  --surface:   #ffffff;
  --surface2:  #f8fffe;
  --border:    #e5e7eb;
  --border2:   #99d4d8;
  --text:      #111827;
  --text2:     #374151;
  --text3:     #6b7280;

  --accent:     #28666e;
  --accent-bg:  #f0fdfe;
  --accent-txt: #0f766e;
  --green-bg:   #f0fdf4;
  --green:      #15803d;
  --red-bg:     #fef2f2;
  --red:        #b91c1c;
  --amber-bg:   #fffbeb;
  --amber:      #d97706;

  --sidebar-w: 224px;
  --topbar-h:  54px;
}

html.dark{
  --bg:        #0f1f2e;
  --surface:   #1a2e3b;
  --surface2:  #243d4d;
  --border:    #374151;
  --border2:   #1f4f54;
  --text:      #f3f4f6;
  --text2:     #d1d5db;
  --text3:     #9ca3af;

  --accent:     #4db6c1;
  --accent-bg:  rgba(13, 148, 136, 0.15);
  --accent-txt: #5eead4;
  --green-bg:   rgba(21, 128, 61, 0.15);
  --green:      #86efac;
  --red-bg:     rgba(185, 28, 28, 0.15);
  --red:        #fca5a5;
  --amber-bg:   rgba(194, 65, 12, 0.15);
  --amber:      #fdba74;
}

body{font-family:'Instrument Sans',ui-sans-serif,system-ui,sans-serif;background:var(--bg);color:var(--text);display:flex;min-height:100vh;font-size:14px}
*{transition:background .18s,border-color .18s,color .12s}
::-webkit-scrollbar{width:4px;height:4px}
::-webkit-scrollbar-thumb{background:var(--border2);border-radius:4px}

/* ─── SIDEBAR ─── */
#sidebar{
  width:var(--sidebar-w);min-height:100vh;background:var(--surface);
  border-right:1px solid var(--border);display:flex;flex-direction:column;
  position:fixed;top:0;left:0;z-index:40;
}
.logo-wrap{padding:15px 16px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:10px}
a.logo-wrap{text-decoration:none;color:inherit;cursor:pointer}
a.logo-wrap:hover{opacity:.92}
.logo-icon{width:32px;height:32px;background:var(--accent);border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;flex-shrink:0}
.logo-name{font-size:15px;font-weight:600}
.logo-role{font-size:10.5px;color:var(--text3);margin-top:1px}

.nav-section{padding:14px 14px 3px;font-size:10px;font-weight:600;letter-spacing:.11em;text-transform:uppercase;color:var(--text3)}
.nav-item{display:flex;align-items:center;gap:9px;padding:8px 10px;margin:1px 6px;border-radius:7px;cursor:pointer;color:var(--text2);font-size:13.5px;font-weight:500;text-decoration:none;position:relative}
.nav-item:hover{background:var(--bg);color:var(--text)}
.nav-item.active{background:var(--accent-bg);color:var(--accent-txt)}
.nav-item svg,.nav-item .h-icon{width:20px;height:20px;flex-shrink:0}
.n-badge{margin-left:auto;font-size:10px;font-weight:600;padding:1px 7px;border-radius:10px;background:var(--red-bg);color:var(--red)}
.n-badge.amber{background:var(--amber-bg);color:var(--amber)}

.sidebar-bottom{padding:10px 12px;border-top:1px solid var(--border);margin-top:auto}
.admin-row{display:flex;align-items:center;gap:9px;padding:7px 8px;border-radius:8px}
.admin-av{width:30px;height:30px;border-radius:50%;background:var(--accent);color:#fff;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;flex-shrink:0}

/* ─── TOPBAR ─── */
#topbar{
  height:var(--topbar-h);background:var(--surface);border-bottom:1px solid var(--border);
  display:flex;align-items:center;padding:0 20px;gap:10px;
  position:sticky;top:0;z-index:30;
}
.topbar-title{font-size:15px;font-weight:600;flex:1}
.searchbar{display:flex;align-items:center;gap:7px;background:var(--bg);border:1px solid var(--border);border-radius:8px;padding:6px 11px;width:210px}
.searchbar input{background:transparent;border:none;outline:none;color:var(--text);font-size:13px;width:100%;font-family:inherit}
.searchbar input::placeholder{color:var(--text3)}
.tb-btn{width:34px;height:34px;border-radius:7px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--text2);background:var(--bg);border:1px solid var(--border);font-size:17px}
.tb-btn:hover{background:var(--border)}
.tb-av{width:32px;height:32px;border-radius:50%;background:var(--accent);color:#fff;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;cursor:pointer}

/* ─── MAIN AREA ─── */
#main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh}
.page{display:none;padding:22px;flex-direction:column;gap:18px}
.page.active{display:flex}

/* ─── PAGE HEADER ─── */
.pg-hd{display:flex;align-items:flex-end;gap:10px;flex-wrap:wrap}
.pg-hd h2{font-size:18px;font-weight:600;letter-spacing:-.3px}
.pg-hd-sub{font-size:12.5px;color:var(--text3);margin-bottom:2px}
.pg-hd-actions{margin-left:auto;display:flex;gap:8px}

/* ─── STAT CARDS ─── */
.sgrid{display:grid;gap:12px}
.g4{grid-template-columns:repeat(4,1fr)}
.g3{grid-template-columns:repeat(3,1fr)}
.g5{grid-template-columns:repeat(5,1fr)}
.g2{grid-template-columns:1fr 1fr}
@media(max-width:1100px){.g5{grid-template-columns:repeat(3,1fr)}.g4{grid-template-columns:repeat(2,1fr)}}
@media(max-width:680px){.g5,.g4,.g3,.g2{grid-template-columns:1fr}}

.stat-card{background:var(--surface);border:1px solid var(--border);border-radius:10px;padding:16px 18px}
.stat-head{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:7px}
.stat-icon{display:inline-flex;align-items:center;justify-content:center;width:26px;height:26px;border-radius:999px;background:var(--accent-bg);color:var(--accent-txt)}
.s-label{font-size:10.5px;font-weight:600;letter-spacing:.09em;text-transform:uppercase;color:var(--text3);margin-bottom:7px}
.s-val{font-size:24px;font-weight:600;letter-spacing:-.5px;font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace}
.s-sub{font-size:11.5px;color:var(--text3);margin-top:4px}
.live-dot{display:inline-block;width:7px;height:7px;border-radius:50%;background:var(--red);margin-right:4px;animation:blink 1.6s infinite}
@keyframes blink{0%,100%{opacity:1}50%{opacity:.25}}

/* ─── CARD ─── */
.card{background:var(--surface);border:1px solid var(--border);border-radius:10px;overflow:hidden}
.card-head{padding:12px 18px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:8px;flex-wrap:wrap;min-height:48px}
.card-head h3{font-size:13.5px;font-weight:600;flex:1}
.card-foot{padding:11px 16px;border-top:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;gap:10px}

/* ─── TABLE ─── */
.tbl{overflow-x:auto}
table{width:100%;border-collapse:collapse;font-size:13px}
thead th{padding:9px 14px;text-align:left;font-size:10.5px;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:var(--text3);border-bottom:1px solid var(--border);white-space:nowrap;background:var(--surface2)}
tbody tr{border-bottom:1px solid var(--border)}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:var(--surface2)}
td{padding:11px 14px;vertical-align:middle}
.td-mono{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace;font-size:12px;color:var(--text3)}
.td-link{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace;font-size:12px;color:var(--accent);cursor:pointer;font-weight:500}
.td-link:hover{text-decoration:underline}
.td-pos{color:var(--green);font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace}
.td-neg{color:var(--red);font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace}

/* ─── BUTTONS ─── */
.btn{display:inline-flex;align-items:center;gap:5px;padding:7px 14px;border-radius:7px;font-size:13px;font-weight:500;cursor:pointer;border:1px solid transparent;font-family:inherit;white-space:nowrap}
.btn-sm{padding:4px 10px;font-size:12px;border-radius:6px}
.btn-primary{background:var(--accent);color:#fff;border-color:var(--accent)}
.btn-primary:hover{opacity:.87}
.btn-ghost{background:transparent;color:var(--text2);border:1px solid var(--border)}
.btn-ghost:hover{background:var(--bg)}
.btn-danger{background:var(--red-bg);color:var(--red);border-color:#fecaca}
.btn-danger:hover{background:#fee2e2}
.btn-success{background:var(--green-bg);color:var(--green);border-color:#bbf7d0}
.btn-success:hover{background:#dcfce7}
.btn-warning{background:var(--amber-bg);color:var(--amber);border-color:#fde68a}
.btn-warning:hover{background:#fef3c7}
.btn-neutral{background:var(--bg);color:var(--text2);border:1px solid var(--border)}
.btn-neutral:hover{background:var(--border)}
.row-acts{display:flex;gap:5px;align-items:center}

/* ─── BADGES ─── */
.badge{display:inline-flex;align-items:center;padding:2px 8px;border-radius:20px;font-size:11px;font-weight:600;white-space:nowrap}
.b-active{background:var(--green-bg);color:var(--green)}
.b-offline{background:var(--bg);color:var(--text3);border:1px solid var(--border)}
.b-banned{background:var(--red-bg);color:var(--red)}
.b-pending{background:var(--amber-bg);color:var(--amber)}
.b-ongoing{background:var(--green-bg);color:var(--green);border:1px solid #bbf7d0}
.b-completed{background:var(--bg);color:var(--text3)}
.b-cancelled{background:var(--red-bg);color:var(--red)}

/* ─── FILTERS ─── */
.filters{display:flex;gap:7px;flex-wrap:wrap;align-items:center}
.fi{background:var(--bg);border:1px solid var(--border);border-radius:7px;padding:6px 11px;font-size:13px;color:var(--text);font-family:inherit;outline:none}
.fi:focus{border-color:var(--accent)}
select.fi option{background:var(--surface)}

/* ─── TABS ─── */
.tab-bar{display:flex;gap:0;border-bottom:1px solid var(--border);overflow-x:auto}
.tab{padding:9px 16px;font-size:13px;font-weight:500;background:transparent;border:none;border-bottom:2px solid transparent;color:var(--text3);cursor:pointer;white-space:nowrap;font-family:inherit;margin-bottom:-1px}
.tab:hover{color:var(--text)}
.tab.active{border-bottom-color:var(--accent);color:var(--accent)}
.t-count{display:inline-flex;padding:1px 6px;border-radius:10px;font-size:10px;margin-left:5px;background:var(--bg);color:var(--text3)}
.tab.active .t-count{background:var(--accent-bg);color:var(--accent-txt)}
.tab-panel{display:none;flex-direction:column;gap:14px;padding-top:2px}
.tab-panel.active{display:flex}

/* ─── MINI LIST CARDS (dashboard) ─── */
.mini-card{background:var(--surface);border:1px solid var(--border);border-radius:10px;overflow:hidden}
.mini-head{padding:12px 16px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:8px}
.mini-head h4{font-size:13.5px;font-weight:600;flex:1}
.mini-count{font-size:11px;font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace;color:var(--text3);background:var(--bg);padding:2px 8px;border-radius:10px;border:1px solid var(--border)}
.mini-row{display:flex;align-items:center;gap:10px;padding:9px 16px;border-bottom:1px solid var(--border)}
.mini-foot{padding:9px 16px;border-top:1px solid var(--border)}

.av{width:30px;height:30px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;flex-shrink:0}
.av-blue{background:var(--accent-bg);color:var(--accent-txt)}
.av-green{background:var(--green-bg);color:var(--green)}
.av-red{background:var(--red-bg);color:var(--red)}
.av-amber{background:var(--amber-bg);color:var(--amber)}
.av-gray{background:var(--bg);color:var(--text3)}

.mini-name{font-size:13px;font-weight:500}
.mini-sub{font-size:11.5px;color:var(--text3);margin-top:1px}

/* ─── APPROVAL CARDS ─── */
.appr-card{background:var(--surface);border:1px solid var(--border);border-radius:10px;padding:16px;display:flex;gap:14px;align-items:flex-start}
.appr-av{width:44px;height:44px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:700;flex-shrink:0}
.appr-info{flex:1;min-width:0}
.appr-info h4{font-size:14px;font-weight:600;margin-bottom:5px}
.meta-row{display:flex;gap:12px;flex-wrap:wrap;margin:4px 0}
.meta-it{font-size:12px;color:var(--text2);display:flex;align-items:center;gap:4px}
.chips{display:flex;gap:4px;flex-wrap:wrap;margin-top:7px}
.chip{font-size:11px;padding:2px 8px;border-radius:4px;background:var(--accent-bg);color:var(--accent-txt);font-weight:500}
.appr-actions{display:flex;flex-direction:column;gap:6px;flex-shrink:0}
.photo-box{width:68px;height:82px;border:1px solid var(--border);border-radius:8px;display:flex;align-items:center;justify-content:center;background:var(--bg);font-size:11px;color:var(--text3);text-align:center;line-height:1.4}

/* ─── BAN CARDS ─── */
.ban-card{background:var(--surface);border:1px solid var(--border);border-radius:10px;padding:14px 16px;display:flex;gap:13px;align-items:flex-start}
.ban-av{width:38px;height:38px;border-radius:9px;background:var(--red-bg);color:var(--red);display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:700;flex-shrink:0}
.ban-uid{font-size:11px;font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace;color:var(--text3)}
.ban-name{font-size:13.5px;font-weight:600;margin:2px 0 3px}
.ban-date{font-size:12px;color:var(--text3)}
.ban-reason{font-size:12.5px;color:var(--text2);background:var(--red-bg);border-left:2px solid #fca5a5;padding:6px 10px;border-radius:0 6px 6px 0;margin-top:7px;line-height:1.5}

/* ─── PAGINATION ─── */
.pager{display:flex;gap:3px;align-items:center}
.pg{width:30px;height:30px;border-radius:6px;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:12.5px;font-weight:500;border:1px solid var(--border);color:var(--text2);background:var(--surface)}
.pg:hover,.pg.on{background:var(--accent);border-color:var(--accent);color:#fff}

/* ─── MODAL ─── */
.modal-ov{display:none;position:fixed;inset:0;background:rgba(0,0,0,.3);z-index:100;align-items:center;justify-content:center;backdrop-filter:blur(2px)}
.modal-ov.open{display:flex}
.modal{background:var(--surface);border:1px solid var(--border);border-radius:12px;width:92%;max-width:490px;max-height:90vh;overflow-y:auto}
.modal-hd{padding:15px 19px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:9px}
.modal-hd h3{flex:1;font-size:15px;font-weight:600}
.modal-bd{padding:18px 19px}
.modal-ft{padding:12px 19px;border-top:1px solid var(--border);display:flex;gap:8px;justify-content:flex-end}
.fg{margin-bottom:13px}
.fg label{display:block;font-size:10.5px;font-weight:600;color:var(--text3);letter-spacing:.08em;text-transform:uppercase;margin-bottom:5px}
.fc{width:100%;background:var(--bg);border:1px solid var(--border);border-radius:7px;padding:8px 11px;font-size:13px;color:var(--text);font-family:inherit;outline:none}
.fc:focus{border-color:var(--accent)}
textarea.fc{resize:vertical;min-height:80px}

/* ─── SESSION STAT ─── */
.s-stat{background:var(--surface);border:1px solid var(--border);border-radius:10px;padding:18px 20px}
.ss-label{font-size:10.5px;font-weight:600;text-transform:uppercase;letter-spacing:.09em;color:var(--text3);margin-bottom:8px;display:flex;align-items:center;gap:6px}
.ss-val{font-size:28px;font-weight:700;font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace}

/* ─── MISC ─── */
.info-tip{font-size:11.5px;color:var(--text3);display:flex;align-items:center;gap:5px;padding:8px 14px;border-top:1px solid var(--border)}
.divider-label{font-size:12px;color:var(--text3);padding:4px 0;border-bottom:1px solid var(--border);margin-bottom:4px}
</style>
</head>
<body>

{{-- ═══════════════════ SIDEBAR ═══════════════════ --}}
<aside id="sidebar">
  <a href="{{ route('home') }}" class="logo-wrap" title="Go to homepage">
    <div class="logo-icon"><x-heroicon name="academic-cap" class="h-icon" style="width:17px;height:17px" /></div>
    <div>
      <div class="logo-name">MentorChai</div>
      <div class="logo-role">অ্যাডমিন কনসোল</div>
    </div>
  </a>
  <div style="flex:1;overflow-y:auto;padding:6px 0">
    <div class="nav-section">ওভারভিউ</div>
    <a class="nav-item active" onclick="nav('dashboard',this)"><x-heroicon name="squares-2x2" class="h-icon" style="width:20px;height:20px" />ড্যাশবোর্ড</a>
    <div class="nav-section">ম্যানেজমেন্ট</div>
    {{-- Badge counts can be passed from controller: $pendingUsers, $pendingMentors --}}
    <a class="nav-item" onclick="nav('users',this)"><x-heroicon name="users" class="h-icon" style="width:20px;height:20px" />শিক্ষার্থী<span class="n-badge amber">{{ $pendingUsersCount ?? 32 }}</span></a>
    <a class="nav-item" onclick="nav('mentors',this)"><x-heroicon name="user-group" class="h-icon" style="width:20px;height:20px" />মেন্টর<span class="n-badge">{{ $pendingMentorsCount ?? 8 }}</span></a>
    <a class="nav-item" onclick="nav('topics',this)"><x-heroicon name="book-open" class="h-icon" style="width:20px;height:20px" />টপিকগুলো</a>
    <a class="nav-item" onclick="nav('sessions',this)"><x-heroicon name="video-camera" class="h-icon" style="width:20px;height:20px" />সেশনগুলো</a>
    <a class="nav-item" onclick="nav('payments',this)"><x-heroicon name="credit-card" class="h-icon" style="width:20px;height:20px" />পেমেন্টস</a>
    <div class="nav-section">সিস্টেম</div>
    <a class="nav-item" onclick="nav('settings',this)"><x-heroicon name="cog-6-tooth" class="h-icon" style="width:20px;height:20px" />সেটিংস</a>
  </div>
  <div class="sidebar-bottom">
    <div class="admin-row">
      <div class="admin-av">{{ strtoupper(substr(auth()->user()->name ?? 'Admin', 0, 2)) }}</div>
      <div>
        <div style="font-size:13px;font-weight:600">{{ auth()->user()->name ?? 'Mr. Admin' }}</div>
        <div style="font-size:11px;color:var(--text3)">সুপার অ্যাডমিন</div>
      </div>
    </div>
  </div>
</aside>

{{-- ═══════════════════ MAIN ═══════════════════ --}}
<div id="main">

  {{-- TOPBAR --}}
  <div id="topbar">
    <span class="topbar-title" id="pg-title">ড্যাশবোর্ড</span>
    <div class="searchbar">
      <x-heroicon name="magnifying-glass" class="h-icon h-icon--md" style="color:var(--text3)" />
      <input type="text" placeholder="যেকোনো কিছু খুঁজুন…"/>
    </div>
    <button class="tb-btn" title="Notifications"><x-heroicon name="bell" class="h-icon" /></button>
    <button class="tb-btn" id="theme-btn" onclick="toggleTheme()" title="Toggle dark mode"><span id="theme-icon-moon"><x-heroicon name="moon" class="h-icon" /></span><span id="theme-icon-sun" style="display:none"><x-heroicon name="sun" class="h-icon" /></span></button>
    <div class="tb-av">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: DASHBOARD
  ═══════════════════════════════════ --}}
  <div class="page active" id="p-dashboard">
    <div class="pg-hd">
      <div>
        <h2>ড্যাশবোর্ড</h2>
        <div class="pg-hd-sub">স্বাগতম, {{ auth()->user()->name ?? ' অ্যাডমিন সাহেব ' }}</div>
      </div>
    </div>

    {{-- Top stats --}}
    <div class="sgrid g4">
      <div class="stat-card">
        <div class="stat-head"><div class="s-label" style="margin-bottom:0">মোট শিক্ষার্থী</div><span class="stat-icon"><x-heroicon name="users" class="h-icon h-icon--md" /></span></div>
        <div class="s-val">{{ number_format($stats['totalStudents'] ?? 3841) }}</div>
        <div class="s-sub">রেজিস্টার্ড শিক্ষার্থী</div>
      </div>
      <div class="stat-card">
        <div class="stat-head"><div class="s-label" style="margin-bottom:0">মোট মেন্টর</div><span class="stat-icon"><x-heroicon name="user-group" class="h-icon h-icon--md" /></span></div>
        <div class="s-val">{{ number_format($stats['totalMentors'] ?? 248) }}</div>
        <div class="s-sub">অনুমোদিত টিচার </div>
      </div>
      <div class="stat-card">
        <div class="stat-head"><div class="s-label" style="margin-bottom:0">লাইভ সেশন</div><span class="stat-icon" style="background:var(--red-bg);color:var(--red)"><x-heroicon name="video-camera" class="h-icon h-icon--md" /></span></div>
        <div class="s-val" style="color:var(--red)">{{ $stats['liveSessions'] ?? 143 }}</div>
        <div class="s-sub"><span class="live-dot"></span>এইমূহুর্তে অ্যাক্টিভ</div>
      </div>
      <div class="stat-card">
        <div class="stat-head"><div class="s-label" style="margin-bottom:0">মোট লাভ</div><span class="stat-icon"><x-heroicon name="currency-bangladeshi" class="h-icon h-icon--md" /></span></div>
        <div class="s-val">{{ $stats['totalRevenue'] ?? '৳29.8L' }}</div>
        <div class="s-sub">প্ল্যাটফর্ম ট্রাঞ্জ্যাকশন</div>
      </div>
    </div>

    {{-- Mini preview grids --}}
    <div class="sgrid g2">

      {{-- Pending User Approvals --}}
      <div class="mini-card">
        <div class="mini-head">
          <x-heroicon name="user-plus" class="h-icon h-icon--lg" style="color:var(--amber)" />
          <h4>শিক্ষার্থী - অ্যাপ্রুভালের অপেক্ষায়</h4>
          <span class="mini-count">{{ $pendingUsersCount ?? 32 }}</span>
        </div>
        @foreach($dashboardPendingUsers ?? [] as $user)
        <div class="mini-row">
          <div class="av av-amber">{{ strtoupper(substr($user['name'], 0, 1)).strtoupper(substr(strstr($user['name'], ' '), 1, 1)) }}</div>
          <div style="flex:1">
            <div class="mini-name">{{ $user['name'] }}</div>
            <div class="mini-sub">{{ $user['dept'] }} · আবেদনের তারিখ: {{ $user['applied_date'] }}</div>
          </div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        @endforeach
        {{-- Fallback static rows if no data passed --}}
        @if(empty($dashboardPendingUsers))
        <div class="mini-row">
          <div class="av av-amber">RA</div>
          <div style="flex:1">
            <div class="mini-name">Rafiqul Alam</div>
            <div class="mini-sub">CSE · আবেদনের তারিখ: ২/৫/২৬</div>
          </div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        <div class="mini-row">
          <div class="av av-amber">NJ</div>
          <div style="flex:1">
            <div class="mini-name">Nusrat Jahan</div>
            <div class="mini-sub">EEE · আবেদনের তারিখ: ৩/৫/২৬</div>
          </div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        <div class="mini-row">
          <div class="av av-amber">TH</div>
          <div style="flex:1">
            <div class="mini-name">Tanvir Hossain</div>
            <div class="mini-sub">Mathematics · আবেদনের তারিখ: ৫/৫/২৬</div>
          </div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        @endif
        <div class="mini-foot">
          <button class="btn btn-ghost btn-sm" style="width:100%" onclick="nav('users',qs('[onclick*=users]'));later(()=>switchTab('users','pending-users'))">
          সব দেখুন <x-heroicon name="arrow-right" class="h-icon h-icon--sm" />
          </button>
        </div>
      </div>

      {{-- All Students --}}
      <div class="mini-card">
        <div class="mini-head">
          <x-heroicon name="users" class="h-icon h-icon--lg" style="color:var(--accent)" />
          <h4>সকল শিক্ষার্থী</h4>
          <span class="mini-count">{{ number_format($stats['totalStudents'] ?? 3841) }}</span>
        </div>
        @foreach($dashboardStudents ?? [] as $student)
        <div class="mini-row">
          <div class="av av-blue">{{ strtoupper(substr($student['name'], 0, 1)).strtoupper(substr(strstr($student['name'], ' '), 1, 1)) }}</div>
          <div style="flex:1">
            <div class="mini-name">{{ $student['name'] }}</div>
            <div class="mini-sub">{{ $student['uid'] }} · {{ $student['dept'] }}</div>
          </div>
          <span class="badge b-active">অ্যাক্টিভ</span>
        </div>
        @endforeach
        @if(empty($dashboardStudents))
        <div class="mini-row">
          <div class="av av-blue">MR</div>
          <div style="flex:1"><div class="mini-name">Mehedi Rahman</div><div class="mini-sub">U1041 · Physics</div></div>
          <span class="badge b-active">অ্যাক্টিভ</span>
        </div>
        <div class="mini-row">
          <div class="av av-blue">SR</div>
          <div style="flex:1"><div class="mini-name">Sumaya Rani</div><div class="mini-sub">U1042 · CSE</div></div>
          <span class="badge b-active">অ্যাক্টিভ</span>
        </div>
        <div class="mini-row">
          <div class="av av-blue">FK</div>
          <div style="flex:1"><div class="mini-name">Farhan Khan</div><div class="mini-sub">U1043 · NFE</div></div>
          <span class="badge b-active">অ্যাক্টিভ</span>
        </div>
        @endif
        <div class="mini-foot">
          <button class="btn btn-ghost btn-sm" style="width:100%" onclick="nav('users',qs('[onclick*=users]'));later(()=>switchTab('users','all-students'))">
            সব দেখুন <x-heroicon name="arrow-right" class="h-icon h-icon--sm" />
          </button>
        </div>
      </div>

      {{-- Mentor Pending Approvals --}}
      <div class="mini-card">
        <div class="mini-head">
          <x-heroicon name="user-group" class="h-icon h-icon--lg" style="color:var(--amber)" />
          <h4>মেন্টর - অ্যাপ্রুভালের অপেক্ষায়</h4>
          <span class="mini-count">{{ $pendingMentorsCount ?? 8 }}</span>
        </div>
        @foreach($dashboardPendingMentors ?? [] as $mentor)
        <div class="mini-row">
          <div class="av av-amber">{{ strtoupper(substr($mentor['name'], 0, 1)).strtoupper(substr(strstr($mentor['name'], ' '), 1, 1)) }}</div>
          <div style="flex:1">
            <div class="mini-name">{{ $mentor['name'] }}</div>
            <div class="mini-sub">{{ $mentor['institution'] }} · {{ $mentor['dept'] }}</div>
          </div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        @endforeach
        @if(empty($dashboardPendingMentors))
        <div class="mini-row">
          <div class="av av-amber">KI</div>
          <div style="flex:1"><div class="mini-name">Kamrul Islam</div><div class="mini-sub">BUET · EEE</div></div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        <div class="mini-row">
          <div class="av av-amber">PB</div>
          <div style="flex:1"><div class="mini-name">Priya Biswas</div><div class="mini-sub">DU · CSE</div></div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        <div class="mini-row">
          <div class="av av-amber">ZA</div>
          <div style="flex:1"><div class="mini-name">Zahid Al-Amin</div><div class="mini-sub">RU · Mathematics</div></div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        @endif
        <div class="mini-foot">
          <button class="btn btn-ghost btn-sm" style="width:100%" onclick="nav('mentors',qs('[onclick*=mentors]'));later(()=>switchTab('mentors','pending-mentors'))">
            সব দেখুন <x-heroicon name="arrow-right" class="h-icon h-icon--sm" />
          </button>
        </div>
      </div>

      {{-- Banned accounts --}}
      <div class="mini-card">
        <div class="mini-head">
          <x-heroicon name="no-symbol" class="h-icon h-icon--lg" style="color:var(--red)" />
          <h4>সাম্প্রতিক ব্যান</h4>
          <span class="mini-count">{{ $bannedCount ?? 61 }}</span>
        </div>
        @foreach($dashboardBanned ?? [] as $banned)
        <div class="mini-row">
          <div class="av av-red">{{ strtoupper(substr($banned['name'], 0, 1)).strtoupper(substr(strstr($banned['name'], ' '), 1, 1)) }}</div>
          <div style="flex:1">
            <div class="mini-name">{{ $banned['name'] }}</div>
            <div class="mini-sub">{{ $banned['role'] }} · ব্যানড {{ $banned['date'] }}</div>
          </div>
          <span class="badge b-banned">ব্যানড</span>
        </div>
        @endforeach
        @if(empty($dashboardBanned))
        <div class="mini-row">
          <div class="av av-red">RK</div>
          <div style="flex:1"><div class="mini-name">Rahim Karim</div><div class="mini-sub">শিক্ষার্থী · ব্যানড ৮/৫/২৬</div></div>
          <span class="badge b-banned">ব্যানড</span>
        </div>
        <div class="mini-row">
          <div class="av av-red">SA</div>
          <div style="flex:1"><div class="mini-name">Sajjad Ali</div><div class="mini-sub">মেন্টর · ব্যানড ৭/৫/২৬</div></div>
          <span class="badge b-banned">ব্যানড</span>
        </div>
        <div class="mini-row">
          <div class="av av-red">MP</div>
          <div style="flex:1"><div class="mini-name">Mitu Parvin</div><div class="mini-sub">শিক্ষার্থী · ব্যানড ৬/৫/২৬</div></div>
          <span class="badge b-banned">ব্যানড</span>
        </div>
        @endif
        <div class="mini-foot">
          <button class="btn btn-ghost btn-sm" style="width:100%">
            সব দেখুন <x-heroicon name="arrow-right" class="h-icon h-icon--sm" />
          </button>
        </div>
      </div>
    </div>

    {{-- Active Mentors preview --}}
    <div class="mini-card">
      <div class="mini-head">
        <x-heroicon name="check-circle" class="h-icon h-icon--lg" style="color:var(--green)" />
        <h4>এইমূহুর্তে সক্রিয় মেন্টর</h4>
        <span class="mini-count">{{ $onlineMentorsCount ?? 25 }} অনলাইন</span>
      </div>
      <div class="tbl">
        <table>
          <thead><tr><th>আইডি</th><th>নাম</th><th>ডিপার্টমেন্ট</th><th>আজকের সেশন</th><th>রেটিং</th><th>স্ট্যাটাস</th></tr></thead>
          <tbody>
            @foreach($onlineMentors ?? [] as $mentor)
            <tr>
              <td class="td-mono">{{ $mentor['id'] }}</td>
              <td>{{ $mentor['name'] }}</td>
              <td>{{ $mentor['dept'] }}</td>
              <td>{{ $mentor['sessions_today'] }}</td>
              <td>{{ $mentor['rating'] }} ★</td>
              <td><span class="badge b-ongoing">অনলাইন</span></td>
            </tr>
            @endforeach
            @if(empty($onlineMentors))
            <tr><td class="td-mono">T101</td><td>Dr. Anisur Rahman</td><td>CSE</td><td>4</td><td>4.9 ★</td><td><span class="badge b-ongoing">অনলাইন</span></td></tr>
            <tr><td class="td-mono">T112</td><td>Prof. Shirin Akter</td><td>Mathematics</td><td>3</td><td>4.7 ★</td><td><span class="badge b-ongoing">অনলাইন</span></td></tr>
            <tr><td class="td-mono">T097</td><td>Md. Faisal Hoque</td><td>Physics</td><td>2</td><td>4.5 ★</td><td><span class="badge b-ongoing">অনলাইন</span></td></tr>
            <tr><td class="td-mono">T044</td><td>Aminul Islam</td><td>CSE</td><td>5</td><td>4.8 ★</td><td><span class="badge b-ongoing">অনলাইন</span></td></tr>
            <tr><td class="td-mono">T063</td><td>Rubina Yasmin</td><td>EEE</td><td>2</td><td>4.6 ★</td><td><span class="badge b-ongoing">অনলাইন</span></td></tr>
            @endif
          </tbody>
        </table>
      </div>
      <div class="mini-foot">
        <button class="btn btn-ghost btn-sm" onclick="nav('mentors',qs('[onclick*=mentors]'));later(()=>switchTab('mentors','active-mentors'))">
          সব দেখুন <x-heroicon name="arrow-right" class="h-icon h-icon--sm" />
        </button>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: USERS
  ═══════════════════════════════════ --}}
  <div class="page" id="p-users">
    <div class="pg-hd"><h2>শিক্ষার্থী ব্যবস্থাপনা</h2></div>

    <div class="tab-bar" id="tbar-users">
      <button class="tab active" onclick="switchTab('users','all-students',this)">সকল শিক্ষার্থী<span class="t-count">{{ number_format($stats['totalStudents'] ?? 3841) }}</span></button>
      <button class="tab" onclick="switchTab('users','pending-users',this)">অ্যাপ্রুভালের অপেক্ষায়<span class="t-count">{{ $pendingUsersCount ?? 32 }}</span></button>
      <button class="tab" onclick="switchTab('users','banned-users',this)">ব্যানকৃত<span class="t-count">{{ $bannedUsersCount ?? 47 }}</span></button>
    </div>

    {{-- All Students --}}
    <div class="tab-panel active" id="tp-all-students">
      <div class="card">
        <div class="card-head">
          <h3>সকল শিক্ষার্থী</h3>
          <div class="filters">
            <input type="text" class="fi" placeholder="Name or ID…" style="width:185px"/>
            <select class="fi">
              <option value="">ডিপার্টমেন্টসমূহ</option>
              @foreach($departments ?? ['CSE','EEE','NFE','Physics','Mathematics','English','ME'] as $dept)
              <option>{{ $dept }}</option>
              @endforeach
            </select>
            <select class="fi"><option value="">স্ট্যাট্যাস</option><option>অ্যাক্টিভ</option><option>ইন্যাক্টিভ</option></select>
          </div>
        </div>
        <div class="tbl">
          <table>
            <thead><tr><th>ইউজার আইডি</th><th>নাম</th><th>ডিপার্টমেন্ট</th><th>যোগদানের তারিখ</th><th>মোট সেশন</th><th>স্ট্যাটাস</th><th>অ্যাকশন</th></tr></thead>
            <tbody>
              @foreach($students ?? [] as $student)
              <tr>
                <td class="td-mono">{{ $student['uid'] }}</td>
                <td>{{ $student['name'] }}</td>
                <td>{{ $student['dept'] }}</td>
                <td>{{ $student['joined'] }}</td>
                <td>{{ $student['sessions'] }}</td>
                <td><span class="badge b-{{ $student['status'] === 'Active' ? 'active' : 'offline' }}">{{ $student['status'] === 'Active' ? 'অ্যাক্টিভ' : 'ইন্যাক্টিভ' }}</span></td>
                <td><button class="btn btn-danger btn-sm" onclick="openBan('{{ $student['name'] }}','{{ $student['uid'] }}')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></td>
              </tr>
              @endforeach
              @if(empty($students))
              <tr><td class="td-mono">U1001</td><td>Arif Hossain</td><td>CSE</td><td>3/1/25</td><td>12</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><button class="btn btn-danger btn-sm" onclick="openBan('Arif Hossain','U1001')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></td></tr>
              <tr><td class="td-mono">U1002</td><td>Rima Begum</td><td>EEE</td><td>5/1/25</td><td>8</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><button class="btn btn-danger btn-sm" onclick="openBan('Rima Begum','U1002')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></td></tr>
              <tr><td class="td-mono">U1003</td><td>Shakil Mahmud</td><td>Mathematics</td><td>7/1/25</td><td>20</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><button class="btn btn-danger btn-sm" onclick="openBan('Shakil Mahmud','U1003')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></td></tr>
              <tr><td class="td-mono">U1004</td><td>Puja Saha</td><td>Physics</td><td>10/1/25</td><td>5</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><button class="btn btn-danger btn-sm" onclick="openBan('Puja Saha','U1004')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></td></tr>
              <tr><td class="td-mono">U1005</td><td>Kamal Uddin</td><td>NFE</td><td>12/1/25</td><td>3</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><button class="btn btn-danger btn-sm" onclick="openBan('Kamal Uddin','U1005')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></td></tr>
              <tr><td class="td-mono">U1006</td><td>Fatema Khatun</td><td>CSE</td><td>15/1/25</td><td>17</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><button class="btn btn-danger btn-sm" onclick="openBan('Fatema Khatun','U1006')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></td></tr>
              <tr><td class="td-mono">U1007</td><td>Rasel Miah</td><td>ME</td><td>18/1/25</td><td>9</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><button class="btn btn-danger btn-sm" onclick="openBan('Rasel Miah','U1007')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></td></tr>
              <tr><td class="td-mono">U1008</td><td>Nadia Islam</td><td>English</td><td>20/1/25</td><td>6</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><button class="btn btn-danger btn-sm" onclick="openBan('Nadia Islam','U1008')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></td></tr>
              <tr><td class="td-mono">U1009</td><td>Borhan Ali</td><td>EEE</td><td>22/1/25</td><td>14</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><button class="btn btn-danger btn-sm" onclick="openBan('Borhan Ali','U1009')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></td></tr>
              <tr><td class="td-mono">U1010</td><td>Sharmin Akter</td><td>CSE</td><td>25/1/25</td><td>11</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><button class="btn btn-danger btn-sm" onclick="openBan('Sharmin Akter','U1010')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></td></tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="card-foot">
          <span style="font-size:12px;color:var(--text3)">Showing {{ count($students ?? []) ?: 10 }} of {{ number_format($stats['totalStudents'] ?? 3841) }} students</span>
          <div class="pager"><div class="pg on">1</div><div class="pg">2</div><div class="pg">3</div><div class="pg">4</div><div class="pg">5</div><div class="pg" style="padding:0 4px">…</div><div class="pg">{{ ceil(($stats['totalStudents'] ?? 3841)/10) }}</div></div>
        </div>
      </div>
    </div>

    {{-- Pending Users --}}
    <div class="tab-panel" id="tp-pending-users">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px">
        <span style="font-size:13px;color:var(--text3)">{{ $pendingUsersCount ?? 32 }} জন অ্যাপ্রুভালের অপেক্ষায়</span>
        <input type="text" class="fi" placeholder="ইউজার আইডি দিয়ে খুঁজুন…" style="width:210px"/>
      </div>
      @foreach($pendingUsers ?? [] as $user)
      <div class="appr-card">
        <div class="appr-av av-amber">{{ strtoupper(substr($user['name'], 0, 1)).strtoupper(substr(strstr($user['name'], ' '), 1, 1)) }}</div>
        <div class="appr-info">
          <h4>{{ $user['name'] }}</h4>
          <div class="meta-row">
            <span class="meta-it"><x-heroicon name="building-office-2" class="h-icon h-icon--md" />{{ $user['institution'] }}</span>
            <span class="meta-it"><x-heroicon name="academic-cap" class="h-icon h-icon--md" />{{ $user['dept'] }}</span>
            <span class="meta-it"><x-heroicon name="calendar-days" class="h-icon h-icon--md" />{{ $user['applied_date'] }}</span>
            <span class="meta-it"><x-heroicon name="envelope" class="h-icon h-icon--md" />{{ $user['email'] }}</span>
          </div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        <div class="appr-actions">
          <button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button>
          <button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button>
        </div>
      </div>
      @endforeach
      @if(empty($pendingUsers))
      <div class="appr-card">
        <div class="appr-av av-amber">RA</div>
        <div class="appr-info">
          <h4>Rafiqul Alam</h4>
          <div class="meta-row">
            <span class="meta-it"><x-heroicon name="building-office-2" class="h-icon h-icon--md" />Rajshahi University</span>
            <span class="meta-it"><x-heroicon name="academic-cap" class="h-icon h-icon--md" />CSE</span>
            <span class="meta-it"><x-heroicon name="calendar-days" class="h-icon h-icon--md" />2/5/26</span>
            <span class="meta-it"><x-heroicon name="envelope" class="h-icon h-icon--md" />rafiq.alam@gmail.com</span>
          </div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        <div class="appr-actions">
          <button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button>
          <button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button>
        </div>
      </div>
      <div class="appr-card">
        <div class="appr-av av-amber">NJ</div>
        <div class="appr-info">
          <h4>Nusrat Jahan</h4>
          <div class="meta-row">
            <span class="meta-it"><x-heroicon name="building-office-2" class="h-icon h-icon--md" />BUET</span>
            <span class="meta-it"><x-heroicon name="academic-cap" class="h-icon h-icon--md" />EEE</span>
            <span class="meta-it"><x-heroicon name="calendar-days" class="h-icon h-icon--md" />3/5/26</span>
            <span class="meta-it"><x-heroicon name="envelope" class="h-icon h-icon--md" />nusrat.j@gmail.com</span>
          </div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        <div class="appr-actions">
          <button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button>
          <button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button>
        </div>
      </div>
      <div class="appr-card">
        <div class="appr-av av-amber">TH</div>
        <div class="appr-info">
          <h4>Tanvir Hossain</h4>
          <div class="meta-row">
            <span class="meta-it"><x-heroicon name="building-office-2" class="h-icon h-icon--md" />Dhaka University</span>
            <span class="meta-it"><x-heroicon name="academic-cap" class="h-icon h-icon--md" />Mathematics</span>
            <span class="meta-it"><x-heroicon name="calendar-days" class="h-icon h-icon--md" />5/5/26</span>
            <span class="meta-it"><x-heroicon name="envelope" class="h-icon h-icon--md" />tanvir.h@gmail.com</span>
          </div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        <div class="appr-actions">
          <button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button>
          <button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button>
        </div>
      </div>
      <div class="appr-card">
        <div class="appr-av av-amber">SK</div>
        <div class="appr-info">
          <h4>Sadia Khanam</h4>
          <div class="meta-row">
            <span class="meta-it"><x-heroicon name="building-office-2" class="h-icon h-icon--md" />CUET</span>
            <span class="meta-it"><x-heroicon name="academic-cap" class="h-icon h-icon--md" />ME</span>
            <span class="meta-it"><x-heroicon name="calendar-days" class="h-icon h-icon--md" />6/5/26</span>
            <span class="meta-it"><x-heroicon name="envelope" class="h-icon h-icon--md" />sadia.k@gmail.com</span>
          </div>
          <span class="badge b-pending">পেন্ডিং</span>
        </div>
        <div class="appr-actions">
          <button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button>
          <button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button>
        </div>
      </div>
      @endif
      <div style="display:flex;justify-content:space-between;align-items:center">
        <span style="font-size:12px;color:var(--text3)">Showing {{ count($pendingUsers ?? []) ?: 4 }} of {{ $pendingUsersCount ?? 32 }}</span>
        <div class="pager"><div class="pg on">1</div><div class="pg">2</div><div class="pg">3</div><div class="pg" style="padding:0 4px">…</div><div class="pg">{{ ceil(($pendingUsersCount ?? 32)/4) }}</div></div>
      </div>
    </div>

    {{-- Banned Users --}}
    <div class="tab-panel" id="tp-banned-users">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px">
        <span style="font-size:13px;color:var(--text3)">{{ $bannedUsersCount ?? 47 }} ব্যানকৃত অ্যাকাউন্ট</span>
        <input type="text" class="fi" placeholder="ইউজার আইডি দিয়ে খুঁজুন…" style="width:210px"/>
      </div>
      @foreach($bannedUsers ?? [] as $user)
      <div class="ban-card">
        <div class="ban-av">{{ strtoupper(substr($user['name'], 0, 1)).strtoupper(substr(strstr($user['name'], ' '), 1, 1)) }}</div>
        <div style="flex:1">
          <div class="ban-uid">ইউজার আইডিঃ {{ $user['uid'] }}</div>
          <div class="ban-name">{{ $user['name'] }}</div>
          <div class="ban-date"><x-heroicon name="calendar-days" class="h-icon h-icon--sm" /> ব্যান করার তারিখঃ {{ $user['banned_date'] }}</div>
          <div class="ban-reason">{{ $user['reason'] }}</div>
        </div>
        <button class="btn btn-warning btn-sm" style="flex-shrink:0"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />আনব্যান</button>
      </div>
      @endforeach
      @if(empty($bannedUsers))
      <div class="ban-card">
        <div class="ban-av">RK</div>
        <div style="flex:1">
          <div class="ban-uid">ইউজার আইডিঃ U2341</div>
          <div class="ban-name">Rahim Karim</div>
          <div class="ban-date"><x-heroicon name="calendar-days" class="h-icon h-icon--sm" /> ব্যান করার তারিখঃ 8/5/26</div>
          <div class="ban-reason">প্ল্যাটফর্মের বাইরে সেশন আয়োজন করতে মেন্টরকে ব্যক্তিগত যোগাযোগ নম্বর দেওয়ার চেষ্টা করেছেন</div>
        </div>
        <button class="btn btn-warning btn-sm" style="flex-shrink:0"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />আনব্যান</button>
      </div>
      <div class="ban-card">
        <div class="ban-av">MP</div>
        <div style="flex:1">
          <div class="ban-uid">ইউজার আইডিঃ U2298</div>
          <div class="ban-name">Mitu Parvin</div>
          <div class="ban-date"><x-heroicon name="calendar-days" class="h-icon h-icon--sm" /> ব্যান করার তারিখঃ 6/5/26</div>
          <div class="ban-reason">লাইভ সেশনে বারবার মেন্টরের প্রতি অপমানজনক ভাষা ব্যবহার করেছেন</div>
        </div>
        <button class="btn btn-warning btn-sm" style="flex-shrink:0"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />আনব্যান</button>
      </div>
      <div class="ban-card">
        <div class="ban-av">SK</div>
        <div style="flex:1">
          <div class="ban-uid">ইউজার আইডিঃ U2156</div>
          <div class="ban-name">Sumon Khan</div>
          <div class="ban-date"><x-heroicon name="calendar-days" class="h-icon h-icon--sm" /> ব্যান করার তারিখঃ 4/5/26</div>
          <div class="ban-reason">শর্তাবলী লঙ্ঘন করেছেন — সম্পন্ন সেশনে চার্জব্যাক শুরু করেছেন</div>
        </div>
        <button class="btn btn-warning btn-sm" style="flex-shrink:0"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />আনব্যান</button>
      </div>
      <div class="ban-card">
        <div class="ban-av">LB</div>
        <div style="flex:1">
          <div class="ban-uid">ইউজার আইডিঃ U2100</div>
          <div class="ban-name">Liton Babu</div>
          <div class="ban-date"><x-heroicon name="calendar-days" class="h-icon h-icon--sm" /> ব্যান করার তারিখঃ 1/5/26</div>
          <div class="ban-reason">ট্রায়াল সেশন ক্রেডিট শোষণ করতে একাধিক অ্যাকাউন্ট তৈরি করেছেন — প্ল্যাটফর্ম নীতি লঙ্ঘন</div>
        </div>
        <button class="btn btn-warning btn-sm" style="flex-shrink:0"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />আনব্যান</button>
      </div>
      <div class="ban-card">
        <div class="ban-av">JA</div>
        <div style="flex:1">
          <div class="ban-uid">ইউজার আইডিঃ U2045</div>
          <div class="ban-name">Jahirul Alam</div>
          <div class="ban-date"><x-heroicon name="calendar-days" class="h-icon h-icon--sm" /> ব্যান করার তারিখঃ 28/4/26</div>
          <div class="ban-reason">সম্মতি ছাড়াই সেশন রেকর্ডিং শেয়ার করেছেন, প্ল্যাটফর্মের গোপনীয়তা নীতি লঙ্ঘন করেছেন</div>
        </div>
        <button class="btn btn-warning btn-sm" style="flex-shrink:0"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />আনব্যান</button>
      </div>
      @endif
      <div style="display:flex;justify-content:space-between;align-items:center">
        <span style="font-size:12px;color:var(--text3)">Showing {{ count($bannedUsers ?? []) ?: 5 }} of {{ $bannedUsersCount ?? 47 }}</span>
        <div class="pager"><div class="pg on">1</div><div class="pg">2</div><div class="pg">3</div><div class="pg" style="padding:0 4px">…</div><div class="pg">{{ ceil(($bannedUsersCount ?? 47)/5) }}</div></div>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: MENTORS
  ═══════════════════════════════════ --}}
  <div class="page" id="p-mentors">
    <div class="pg-hd"><h2>মেন্টর ব্যবস্থাপনা</h2></div>

    <div class="tab-bar" id="tbar-mentors">
      <button class="tab active" onclick="switchTab('mentors','all-mentors',this)">সকল মেন্টর<span class="t-count">{{ $stats['totalMentors'] ?? 248 }}</span></button>
      <button class="tab" onclick="switchTab('mentors','pending-mentors',this)">অ্যাপ্রুভালের অপেক্ষায়<span class="t-count">{{ $pendingMentorsCount ?? 8 }}</span></button>
      <button class="tab" onclick="switchTab('mentors','banned-mentors',this)">ব্যানকৃত<span class="t-count">{{ $bannedMentorsCount ?? 14 }}</span></button>
      <button class="tab" onclick="switchTab('mentors','active-mentors',this)">এইমূহুর্তে সক্রিয়<span class="t-count">{{ $onlineMentorsCount ?? 25 }}</span></button>
    </div>

    {{-- All Mentors --}}
    <div class="tab-panel active" id="tp-all-mentors">
      <div class="card">
        <div class="card-head">
          <h3>সকল মেন্টর/শিক্ষক</h3>
          <div class="filters">
            <input type="text" class="fi" placeholder="আইডি বা নাম দিয়ে খুঁজুন…" style="width:175px"/>
            <select class="fi"><option value="">ডিপার্টমেন্টসমূহ</option><option>CSE</option><option>EEE</option><option>Physics</option><option>Mathematics</option><option>ME</option><option>SWE</option></select>
            <select class="fi"><option value="">স্ট্যাটাস</option><option>অ্যাক্টিভ</option><option>ব্যানড</option></select>
          </div>
        </div>
        <div class="tbl">
          <table>
            <thead><tr><th>ইউজার আইডি</th><th>নাম</th><th>প্রতিষ্ঠান</th><th>ডিপার্টমেন্ট</th><th>মোট সেশন</th><th>অনলাইন/অফলাইন</th><th>অ্যাকাউন্ট স্ট্যাটাস</th><th>অ্যাকশন</th></tr></thead>
            <tbody>
              @foreach($mentors ?? [] as $mentor)
              <tr>
                <td class="td-link" onclick="openMentor('{{ $mentor['id'] }}','{{ $mentor['name'] }}','{{ $mentor['institution'] }}','{{ $mentor['dept'] }}','{{ $mentor['email'] }}','{{ $mentor['phone'] }}',{{ $mentor['total_sessions'] }})">{{ $mentor['id'] }}</td>
                <td>{{ $mentor['name'] }}</td>
                <td>{{ $mentor['institution'] }}</td>
                <td>{{ $mentor['dept'] }}</td>
                <td>{{ $mentor['total_sessions'] }}</td>
                <td><span class="badge {{ $mentor['online'] ? 'b-ongoing' : 'b-offline' }}">{{ $mentor['online'] ? 'অনলাইন' : 'অফলাইন' }}</span></td>
                <td><span class="badge {{ $mentor['status'] === 'Active' ? 'b-active' : 'b-banned' }}">{{ $mentor['status'] === 'Active' ? 'অ্যাক্টিভ' : 'ব্যানড' }}</span></td>
                <td>
                  <div class="row-acts">
                    @if($mentor['status'] === 'Active')
                    <button class="btn btn-danger btn-sm" onclick="openBan('{{ $mentor['name'] }}','{{ $mentor['id'] }}')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button>
                    @else
                    <button class="btn btn-warning btn-sm"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />আনব্যান</button>
                    @endif
                  </div>
                </td>
              </tr>
              @endforeach
              @if(empty($mentors))
              <tr><td class="td-link" onclick="openMentor('T101','Dr. Anisur Rahman','BUET','CSE','anisur@buet.ac.bd','01711000001',142)">T101</td><td>Dr. Anisur Rahman</td><td>BUET</td><td>CSE</td><td>142</td><td><span class="badge b-ongoing">অনলাইন</span></td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-danger btn-sm" onclick="openBan('Dr. Anisur Rahman','T101')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></div></td></tr>
              <tr><td class="td-link" onclick="openMentor('T112','Prof. Shirin Akter','Dhaka Univ.','Mathematics','shirin@du.ac.bd','01711000002',98)">T112</td><td>Prof. Shirin Akter</td><td>Dhaka Univ.</td><td>Mathematics</td><td>98</td><td><span class="badge b-ongoing">অনলাইন</span></td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-danger btn-sm" onclick="openBan('Prof. Shirin Akter','T112')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></div></td></tr>
              <tr><td class="td-link">T087</td><td>Md. Yusuf Ali</td><td>KUET</td><td>EEE</td><td>210</td><td><span class="badge b-offline">অফলাইন</span></td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-danger btn-sm" onclick="openBan('Md. Yusuf Ali','T087')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></div></td></tr>
              <tr><td class="td-link">T055</td><td>Fatema Tuz Zuhra</td><td>RUET</td><td>Physics</td><td>57</td><td><span class="badge b-offline">অফলাইন</span></td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-danger btn-sm" onclick="openBan('Fatema Tuz Zuhra','T055')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></div></td></tr>
              <tr><td class="td-link">T039</td><td>Hasanuzzaman Babu</td><td>DU</td><td>SWE</td><td>33</td><td><span class="badge b-offline">অফলাইন</span></td><td><span class="badge b-banned">ব্যানড</span></td><td><div class="row-acts"><button class="btn btn-warning btn-sm"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />আনব্যান</button></div></td></tr>
              <tr><td class="td-link">T022</td><td>Nazma Khanam</td><td>CU</td><td>CSE</td><td>74</td><td><span class="badge b-offline">অফলাইন</span></td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-danger btn-sm" onclick="openBan('Nazma Khanam','T022')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></div></td></tr>
              <tr><td class="td-link">T018</td><td>Imran Hossain</td><td>NSTU</td><td>ME</td><td>19</td><td><span class="badge b-ongoing">অনলাইন</span></td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-danger btn-sm" onclick="openBan('Imran Hossain','T018')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></div></td></tr>
              <tr><td class="td-link">T009</td><td>Sumaiya Nahar</td><td>IU</td><td>Mathematics</td><td>88</td><td><span class="badge b-offline">অফলাইন</span></td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-danger btn-sm" onclick="openBan('Sumaiya Nahar','T009')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></div></td></tr>
              <tr><td class="td-link">T004</td><td>Rafiqul Hasan</td><td>BUET</td><td>CSE</td><td>312</td><td><span class="badge b-online">অনলাইন</span></td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-danger btn-sm" onclick="openBan('Rafiqul Hasan','T004')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></div></td></tr>
              <tr><td class="td-link">T002</td><td>Lubna Sultana</td><td>DU</td><td>Physics</td><td>176</td><td><span class="badge b-offline">অফলাইন</span></td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-danger btn-sm" onclick="openBan('Lubna Sultana','T002')"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান</button></div></td></tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="info-tip"><x-heroicon name="information-circle" class="h-icon h-icon--md" />মেন্টরের পূর্ণাঙ্গ প্রোফাইল দেখতে ইউজার আইডি (User ID) এর উপরে ক্লিক করুন</div>
        <div class="card-foot">
          <span style="font-size:12px;color:var(--text3)">Showing {{ count($mentors ?? []) ?: 10 }} of {{ $stats['totalMentors'] ?? 248 }} mentors</span>
          <div class="pager"><div class="pg on">1</div><div class="pg">2</div><div class="pg">3</div><div class="pg" style="padding:0 4px">…</div><div class="pg">{{ ceil(($stats['totalMentors'] ?? 248)/10) }}</div></div>
        </div>
      </div>
    </div>

    {{-- Pending Mentors --}}
    <div class="tab-panel" id="tp-pending-mentors">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px">
        <span style="font-size:13px;color:var(--text3)">{{ $pendingMentorsCount ?? 8 }} জন মেন্টরের আবেদন রিভিউয়ের অপেক্ষায়</span>
        <input type="text" class="fi" placeholder="ইউজার আইডি দিয়ে খুঁজুন…" style="width:210px"/>
      </div>
      @foreach($pendingMentors ?? [] as $mentor)
      <div class="appr-card">
        <div class="appr-av av-amber">{{ strtoupper(substr($mentor['name'], 0, 1)).strtoupper(substr(strstr($mentor['name'], ' '), 1, 1)) }}</div>
        <div class="appr-info">
          <h4>{{ $mentor['name'] }}</h4>
          <div class="meta-row">
            <span class="meta-it"><x-heroicon name="building-office-2" class="h-icon h-icon--md" />{{ $mentor['institution'] }}</span>
            <span class="meta-it"><x-heroicon name="academic-cap" class="h-icon h-icon--md" />{{ $mentor['dept'] }}</span>
            <span class="meta-it"><x-heroicon name="phone" class="h-icon h-icon--md" />{{ $mentor['phone'] }}</span>
            <span class="meta-it"><x-heroicon name="envelope" class="h-icon h-icon--md" />{{ $mentor['email'] }}</span>
          </div>
          <div style="font-size:11.5px;color:var(--text3);margin:6px 0 3px">নিম্নোক্ত টপিকগুলো পড়াতে আগ্রহীঃ</div>
          <div class="chips">
            @foreach($mentor['topics'] as $topic)
            <span class="chip">{{ $topic }}</span>
            @endforeach
          </div>
        </div>
        <div class="appr-actions">
          <div class="photo-box">ছবি</div>
          <button class="btn btn-neutral btn-sm"><x-heroicon name="document-text" class="h-icon h-icon--sm" />ডকুমেন্ট</button>
          <button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button>
          <button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button>
        </div>
      </div>
      @endforeach
      @if(empty($pendingMentors))
      <div class="appr-card">
        <div class="appr-av av-amber">KI</div>
        <div class="appr-info">
          <h4>Kamrul Islam</h4>
          <div class="meta-row">
            <span class="meta-it"><x-heroicon name="building-office-2" class="h-icon h-icon--md" />BUET</span>
            <span class="meta-it"><x-heroicon name="academic-cap" class="h-icon h-icon--md" />EEE</span>
            <span class="meta-it"><x-heroicon name="phone" class="h-icon h-icon--md" />01812345678</span>
            <span class="meta-it"><x-heroicon name="envelope" class="h-icon h-icon--md" />kamrul@gmail.com</span>
          </div>
          <div style="font-size:11.5px;color:var(--text3);margin:6px 0 3px">নিম্নোক্ত টপিকগুলো পড়াতে আগ্রহীঃ</div>
          <div class="chips"><span class="chip">Circuit Theory</span><span class="chip">Kirchhoff's Laws</span><span class="chip">Power Systems</span><span class="chip">Signal Processing</span></div>
        </div>
        <div class="appr-actions">
          <div class="photo-box">ছবি</div>
          <button class="btn btn-neutral btn-sm"><x-heroicon name="document-text" class="h-icon h-icon--sm" />ডকুমেন্ট</button>
          <button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button>
          <button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button>
        </div>
      </div>
      <div class="appr-card">
        <div class="appr-av av-amber">PB</div>
        <div class="appr-info">
          <h4>Priya Biswas</h4>
          <div class="meta-row">
            <span class="meta-it"><x-heroicon name="building-office-2" class="h-icon h-icon--md" />Dhaka University</span>
            <span class="meta-it"><x-heroicon name="academic-cap" class="h-icon h-icon--md" />CSE</span>
            <span class="meta-it"><x-heroicon name="phone" class="h-icon h-icon--md" />01912345679</span>
            <span class="meta-it"><x-heroicon name="envelope" class="h-icon h-icon--md" />priya.b@gmail.com</span>
          </div>
          <div style="font-size:11.5px;color:var(--text3);margin:6px 0 3px">নিম্নোক্ত টপিকগুলো পড়াতে আগ্রহীঃ</div>
          <div class="chips"><span class="chip">Data Structures</span><span class="chip">Algorithms</span><span class="chip">OOP in Java</span><span class="chip">Database Systems</span><span class="chip">OS</span></div>
        </div>
        <div class="appr-actions">
          <div class="photo-box">ছবি</div>
          <button class="btn btn-neutral btn-sm"><x-heroicon name="document-text" class="h-icon h-icon--sm" />ডকুমেন্ট</button>
          <button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button>
          <button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button>
        </div>
      </div>
      <div class="appr-card">
        <div class="appr-av av-amber">ZA</div>
        <div class="appr-info">
          <h4>Zahid Al-Amin</h4>
          <div class="meta-row">
            <span class="meta-it"><x-heroicon name="building-office-2" class="h-icon h-icon--md" />Rajshahi University</span>
            <span class="meta-it"><x-heroicon name="academic-cap" class="h-icon h-icon--md" />Mathematics</span>
            <span class="meta-it"><x-heroicon name="phone" class="h-icon h-icon--md" />01612345670</span>
            <span class="meta-it"><x-heroicon name="envelope" class="h-icon h-icon--md" />zahid.amin@ru.ac.bd</span>
          </div>
          <div style="font-size:11.5px;color:var(--text3);margin:6px 0 3px">নিম্নোক্ত টপিকগুলো পড়াতে আগ্রহীঃ</div>
          <div class="chips"><span class="chip">Calculus</span><span class="chip">Linear Algebra</span><span class="chip">Discrete Math</span><span class="chip">Probability & Stats</span></div>
        </div>
        <div class="appr-actions">
          <div class="photo-box">ছবি</div>
          <button class="btn btn-neutral btn-sm"><x-heroicon name="document-text" class="h-icon h-icon--sm" />ডকুমেন্ট</button>
          <button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button>
          <button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button>
        </div>
      </div>
      <div class="appr-card">
        <div class="appr-av av-amber">MN</div>
        <div class="appr-info">
          <h4>Morshed Nawaz</h4>
          <div class="meta-row">
            <span class="meta-it"><x-heroicon name="building-office-2" class="h-icon h-icon--md" />SUST</span>
            <span class="meta-it"><x-heroicon name="academic-cap" class="h-icon h-icon--md" />Physics</span>
            <span class="meta-it"><x-heroicon name="phone" class="h-icon h-icon--md" />01712345671</span>
            <span class="meta-it"><x-heroicon name="envelope" class="h-icon h-icon--md" />morshed.n@sust.edu</span>
          </div>
          <div style="font-size:11.5px;color:var(--text3);margin:6px 0 3px">নিম্নোক্ত টপিকগুলো পড়াতে আগ্রহীঃ</div>
          <div class="chips"><span class="chip">Thermodynamics</span><span class="chip">Quantum Mechanics</span><span class="chip">Optics</span><span class="chip">Wave Mechanics</span></div>
        </div>
        <div class="appr-actions">
          <div class="photo-box">ছবি</div>
          <button class="btn btn-neutral btn-sm"><x-heroicon name="document-text" class="h-icon h-icon--sm" />ডকুমেন্ট</button>
          <button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button>
          <button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button>
        </div>
      </div>
      @endif
      <div style="display:flex;justify-content:space-between;align-items:center">
        <span style="font-size:12px;color:var(--text3)">Showing {{ count($pendingMentors ?? []) ?: 4 }} of {{ $pendingMentorsCount ?? 8 }}</span>
        <div class="pager"><div class="pg on">1</div><div class="pg">2</div></div>
      </div>
    </div>

    {{-- Banned Mentors --}}
    <div class="tab-panel" id="tp-banned-mentors">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px">
        <span style="font-size:13px;color:var(--text3)">{{ $bannedMentorsCount ?? 14 }} টি ব্যানকৃত মেন্টর অ্যাকাউন্ট</span>
        <input type="text" class="fi" placeholder="Search by User ID…" style="width:210px"/>
      </div>
      @foreach($bannedMentors ?? [] as $mentor)
      <div class="ban-card">
        <div class="ban-av">{{ strtoupper(substr($mentor['name'], 0, 1)).strtoupper(substr(strstr($mentor['name'], ' '), 1, 1)) }}</div>
        <div style="flex:1">
          <div class="ban-uid">ইউজার আইডিঃ {{ $mentor['uid'] }}</div>
          <div class="ban-name">{{ $mentor['name'] }}</div>
          <div class="ban-date"><x-heroicon name="calendar-days" class="h-icon h-icon--sm" /> ব্যান করার তারিখঃ {{ $mentor['banned_date'] }}</div>
          <div class="ban-reason">{{ $mentor['reason'] }}</div>
        </div>
        <button class="btn btn-warning btn-sm" style="flex-shrink:0"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />আনব্যান</button>
      </div>
      @endforeach
      @if(empty($bannedMentors))
      <div class="ban-card">
        <div class="ban-av">SA</div>
        <div style="flex:1">
          <div class="ban-uid">ইউজার আইডিঃ T039</div>
          <div class="ban-name">Sajjad Ali</div>
          <div class="ban-date"><x-heroicon name="calendar-days" class="h-icon h-icon--sm" /> ব্যান করার তারিখঃ 7/5/26</div>
          <div class="ban-reason">শিক্ষার্থীদের সাথে ব্যক্তিগত WhatsApp নম্বর শেয়ার করে প্ল্যাটফর্মের বাইরে সেশন করার চেষ্টা করেছেন</div>
        </div>
        <button class="btn btn-warning btn-sm" style="flex-shrink:0"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />আনব্যান</button>
      </div>
      <div class="ban-card">
        <div class="ban-av">MH</div>
        <div style="flex:1">
          <div class="ban-uid">ইউজার আইডিঃ T031</div>
          <div class="ban-name">Monir Hossain</div>
          <div class="ban-date"><x-heroicon name="calendar-days" class="h-icon h-icon--sm" /> ব্যান করার তারিখঃ 2/5/26</div>
          <div class="ban-reason">নেতিবাচক রেটিং পাওয়ার পর একজন শিক্ষার্থীর প্রতি অপমানজনক ভাষা ব্যবহার করেছেন</div>
        </div>
        <button class="btn btn-warning btn-sm" style="flex-shrink:0"><x-heroicon name="lock-open" class="h-icon h-icon--sm" />আনব্যান</button>
      </div>
      @endif
    </div>

    {{-- Active Mentors --}}
    <div class="tab-panel" id="tp-active-mentors">
      <div class="card">
        <div class="card-head"><h3>এইমূহুর্তে সক্রিয়</h3></div>
        <div class="tbl">
          <table>
            <thead><tr><th>ইউজার আইডি</th><th>নাম</th><th>প্রতিষ্ঠান</th><th>ডিপার্টমেন্ট</th><th>আজকের সেশন</th><th>রেটিং</th><th>স্ট্যাটাস</th></tr></thead>
            <tbody>
              @foreach($onlineMentors ?? [] as $mentor)
              <tr>
                <td class="td-mono">{{ $mentor['id'] }}</td>
                <td>{{ $mentor['name'] }}</td>
                <td>{{ $mentor['institution'] ?? '—' }}</td>
                <td>{{ $mentor['dept'] }}</td>
                <td>{{ $mentor['sessions_today'] }}</td>
                <td>{{ $mentor['rating'] }} ★</td>
                <td><span class="badge b-ongoing">অনলাইন</span></td>
              </tr>
              @endforeach
              @if(empty($onlineMentors))
              <tr><td class="td-mono">T101</td><td>Dr. Anisur Rahman</td><td>BUET</td><td>CSE</td><td>4</td><td>4.9 ★</td><td><span class="badge b-ongoing">অনলাইন</span></td></tr>
              <tr><td class="td-mono">T112</td><td>Prof. Shirin Akter</td><td>DU</td><td>Mathematics</td><td>3</td><td>4.7 ★</td><td><span class="badge b-ongoing">অনলাইন</span></td></tr>
              <tr><td class="td-mono">T097</td><td>Md. Faisal Hoque</td><td>RUET</td><td>Physics</td><td>2</td><td>4.5 ★</td><td><span class="badge b-ongoing">অনলাইন</span></td></tr>
              <tr><td class="td-mono">T044</td><td>Aminul Islam</td><td>BUET</td><td>CSE</td><td>5</td><td>4.8 ★</td><td><span class="badge b-ongoing">অনলাইন</span></td></tr>
              <tr><td class="td-mono">T063</td><td>Rubina Yasmin</td><td>KUET</td><td>EEE</td><td>2</td><td>4.6 ★</td><td><span class="badge b-ongoing">অনলাইন</span></td></tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: TOPICS
  ═══════════════════════════════════ --}}
  <div class="page" id="p-topics">
    <div class="pg-hd">
      <h2>টপিক এবং ক্যাটাগরি</h2>
      <div class="pg-hd-actions">
        <button class="btn btn-primary" onclick="openModal('m-add-topic')"><x-heroicon name="plus" class="h-icon h-icon--sm" />টপিক যোগ করুন</button>
      </div>
    </div>

    <div class="sgrid g3">
      @foreach($topicCategories ?? [] as $cat)
      <div class="stat-card">
        <div class="s-label">{{ $cat['name'] }}</div>
        <div class="s-val">{{ $cat['topic_count'] }}</div>
        <div class="s-sub">{{ $cat['subtopics'] ?? '' }}</div>
      </div>
      @endforeach
      @if(empty($topicCategories))
      <div class="stat-card"><div class="s-label">Programming</div><div class="s-val">24</div><div class="s-sub">Python, Java, C++, JS…</div></div>
      <div class="stat-card"><div class="s-label">Physics</div><div class="s-val">18</div><div class="s-sub">Mechanics, Optics, Quantum…</div></div>
      <div class="stat-card"><div class="s-label">Mathematics</div><div class="s-val">21</div><div class="s-sub">Calculus, Algebra, Stats…</div></div>
      <div class="stat-card"><div class="s-label">Electronics</div><div class="s-val">15</div><div class="s-sub">Circuit, Signals, Arduino…</div></div>
      <div class="stat-card"><div class="s-label">Mech. Eng.</div><div class="s-val">12</div><div class="s-sub">Thermo, Fluid Mech…</div></div>
      <div class="stat-card"><div class="s-label">Chemistry</div><div class="s-val">9</div><div class="s-sub">Organic, Inorganic…</div></div>
      @endif
    </div>

    <div class="card">
      <div class="card-head"><h3>সকল টপিক</h3></div>
      <div class="tbl">
        <table>
          <thead><tr><th>ক্যাটাগরি</th><th>টপিক</th><th>প্রযোজ্য ডিপার্টমেন্টসমূহ</th><th>সম্পন্ন সেশন</th><th>স্ট্যাটাস</th><th>অ্যাকশন</th></tr></thead>
          <tbody>
            @foreach($topics ?? [] as $topic)
            <tr>
              <td>{{ $topic['category'] }}</td>
              <td>{{ $topic['name'] }}</td>
              <td>{{ $topic['depts'] }}</td>
              <td>{{ $topic['sessions'] }}</td>
              <td><span class="badge b-active">অ্যাক্টিভ</span></td>
              <td><div class="row-acts"><button class="btn btn-neutral btn-sm"><x-heroicon name="pencil-square" class="h-icon h-icon--sm" />এডিট</button><button class="btn btn-danger btn-sm"><x-heroicon name="trash" class="h-icon h-icon--sm" />ডিলিট</button></div></td>
            </tr>
            @endforeach
            @if(empty($topics))
            <tr><td>Programming</td><td>Data Structures & Algorithms</td><td>CSE, SWE</td><td>847</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-neutral btn-sm"><x-heroicon name="pencil-square" class="h-icon h-icon--sm" />এডিট</button><button class="btn btn-danger btn-sm"><x-heroicon name="trash" class="h-icon h-icon--sm" />ডিলিট</button></div></td></tr>
            <tr><td>Programming</td><td>OOP in Python</td><td>CSE, SWE, EEE</td><td>612</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-neutral btn-sm"><x-heroicon name="pencil-square" class="h-icon h-icon--sm" />এডিট</button><button class="btn btn-danger btn-sm"><x-heroicon name="trash" class="h-icon h-icon--sm" />ডিলিট</button></div></td></tr>
            <tr><td>Mathematics</td><td>Calculus II</td><td>CSE, EEE, ME, Physics</td><td>534</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-neutral btn-sm"><x-heroicon name="pencil-square" class="h-icon h-icon--sm" />এডিট</button><button class="btn btn-danger btn-sm"><x-heroicon name="trash" class="h-icon h-icon--sm" />ডিলিট</button></div></td></tr>
            <tr><td>Physics</td><td>Optics & Waves</td><td>Physics, EEE</td><td>289</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-neutral btn-sm"><x-heroicon name="pencil-square" class="h-icon h-icon--sm" />এডিট</button><button class="btn btn-danger btn-sm"><x-heroicon name="trash" class="h-icon h-icon--sm" />ডিলিট</button></div></td></tr>
            <tr><td>Electronics</td><td>Circuit Analysis</td><td>EEE, CSE</td><td>401</td><td><span class="badge b-active">অ্যাক্টিভ</span></td><td><div class="row-acts"><button class="btn btn-neutral btn-sm"><x-heroicon name="pencil-square" class="h-icon h-icon--sm" />এডিট</button><button class="btn btn-danger btn-sm"><x-heroicon name="trash" class="h-icon h-icon--sm" />ডিলিট</button></div></td></tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>

    <div class="card">
      <div class="card-head"><h3>নতুন টপিকের আবেদন</h3><span style="font-size:12px;color:var(--amber)">{{ $pendingTopicsCount ?? 12 }} জন রিভিউয়ের অপেক্ষায়</span></div>
      <div class="tbl">
        <table>
          <thead><tr><th>ক্যাটাগরি</th><th>আবেদনকৃত টপিক</th><th>আবেদনকারী (ইউজার আইডি)</th><th>তারিখ</th><th>অ্যাকশন</th></tr></thead>
          <tbody>
            @foreach($pendingTopics ?? [] as $topic)
            <tr>
              <td>{{ $topic['category'] }}</td>
              <td>{{ $topic['name'] }}</td>
              <td><span class="td-link">{{ $topic['uid'] }}</span></td>
              <td>{{ $topic['date'] }}</td>
              <td><div class="row-acts"><button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button><button class="btn btn-neutral btn-sm"><x-heroicon name="pencil-square" class="h-icon h-icon--sm" />এডিট</button><button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button></div></td>
            </tr>
            @endforeach
            @if(empty($pendingTopics))
            <tr><td>Programming</td><td>OOP in Python</td><td><span class="td-link">U1041</span></td><td>1/5/26</td><td><div class="row-acts"><button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button><button class="btn btn-neutral btn-sm"><x-heroicon name="pencil-square" class="h-icon h-icon--sm" />এডিট</button><button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button></div></td></tr>
            <tr><td>Physics</td><td>Quantum Mechanics Basics</td><td><span class="td-link">U0988</span></td><td>2/5/26</td><td><div class="row-acts"><button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button><button class="btn btn-neutral btn-sm"><x-heroicon name="pencil-square" class="h-icon h-icon--sm" />এডিট</button><button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button></div></td></tr>
            <tr><td>Mathematics</td><td>Number Theory</td><td><span class="td-link">U1102</span></td><td>3/5/26</td><td><div class="row-acts"><button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button><button class="btn btn-neutral btn-sm"><x-heroicon name="pencil-square" class="h-icon h-icon--sm" />এডিট</button><button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button></div></td></tr>
            <tr><td>Electronics</td><td>Arduino & IoT Basics</td><td><span class="td-link">U0871</span></td><td>4/5/26</td><td><div class="row-acts"><button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button><button class="btn btn-neutral btn-sm"><x-heroicon name="pencil-square" class="h-icon h-icon--sm" />এডিট</button><button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button></div></td></tr>
            <tr><td>Programming</td><td>Competitive Programming</td><td><span class="td-link">U1205</span></td><td>5/5/26</td><td><div class="row-acts"><button class="btn btn-success btn-sm"><x-heroicon name="check" class="h-icon h-icon--sm" />অ্যাপ্রুভ</button><button class="btn btn-neutral btn-sm"><x-heroicon name="pencil-square" class="h-icon h-icon--sm" />এডিট</button><button class="btn btn-danger btn-sm"><x-heroicon name="x-mark" class="h-icon h-icon--sm" />ডিলিট</button></div></td></tr>
            @endif
          </tbody>
        </table>
      </div>
      <div class="card-foot">
        <span style="font-size:12px;color:var(--text3)">Showing {{ count($pendingTopics ?? []) ?: 5 }} of {{ $pendingTopicsCount ?? 12 }} requests</span>
        <button class="btn btn-ghost btn-sm">সকল আবেদন দেখুন <x-heroicon name="arrow-right" class="h-icon h-icon--sm" /></button>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: SESSIONS
  ═══════════════════════════════════ --}}
  <div class="page" id="p-sessions">
    <div class="pg-hd"><h2>সেশন পর্যবেক্ষণ</h2></div>

    <div class="sgrid g3">
      <div class="s-stat">
        <div class="stat-head"><div class="ss-label" style="margin-bottom:0"><span class="live-dot"></span>এইমূহুর্তে সক্রিয়</div><span class="stat-icon" style="background:var(--red-bg);color:var(--red)"><x-heroicon name="video-camera" class="h-icon h-icon--md" /></span></div>
        <div class="ss-val" style="color:var(--red)">{{ $stats['liveSessions'] ?? 143 }}</div>
      </div>
      <div class="s-stat">
        <div class="stat-head"><div class="ss-label" style="margin-bottom:0">মোট সেশন</div><span class="stat-icon"><x-heroicon name="clipboard-document-list" class="h-icon h-icon--md" /></span></div>
        <div class="ss-val">{{ number_format($stats['totalSessions'] ?? 11247) }}</div>
      </div>
      <div class="s-stat">
        <div class="stat-head"><div class="ss-label" style="margin-bottom:0">বাতিলকৃত</div><span class="stat-icon" style="background:var(--red-bg);color:var(--red)"><x-heroicon name="no-symbol" class="h-icon h-icon--md" /></span></div>
        <div class="ss-val" style="color:var(--amber)">{{ $stats['cancelledSessions'] ?? 389 }}</div>
      </div>
    </div>

    <div class="card">
      <div class="card-head">
        <h3>সকল সেশন</h3>
        <div class="filters" style="margin-left:auto">
          <select class="fi"><option value="">স্ট্যাটাস</option><option>চলমান</option><option>সম্পন্ন</option><option>বাতিলকৃত</option></select>
          <select class="fi"><option value="">টপিকগুলো</option><option>Programming</option><option>Physics</option><option>Mathematics</option><option>Electronics</option></select>
          <input type="text" class="fi" placeholder="Search…" style="width:155px"/>
        </div>
      </div>
      <div class="tbl">
        <table>
          <thead><tr><th>সেশন আইডি</th><th>টিচার/মেন্টর</th><th>শিক্ষার্থী</th><th>টপিক</th><th>তারিখ ও সময়</th><th>স্থায়িত্বকাল</th><th>পরিমাণ</th><th>স্ট্যাটাস</th><th>অ্যাকশন</th></tr></thead>
          <tbody>
            @foreach($sessions ?? [] as $session)
            <tr>
              <td class="td-mono">{{ $session['id'] }}</td>
              <td>{{ $session['teacher'] }}</td>
              <td>{{ $session['student'] }}</td>
              <td>{{ $session['topic'] }}</td>
              <td>{{ $session['datetime'] }}</td>
              <td>{{ $session['duration'] }}</td>
              <td class="{{ $session['status'] === 'Cancelled' ? 'td-neg' : 'td-pos' }}">{{ $session['amount'] }}</td>
              <td><span class="badge b-{{ strtolower($session['status']) }}">{{ $session['status'] }}</span></td>
              <td>
                @if($session['status'] === 'Ongoing')
                  <button class="btn btn-danger btn-sm">শেষ করুন</button>
                @elseif($session['status'] === 'Cancelled')
                  <button class="btn btn-warning btn-sm"><x-heroicon name="arrow-path" class="h-icon h-icon--sm" />রিফান্ড</button>
                @else
                  <button class="btn btn-ghost btn-sm"><x-heroicon name="eye" class="h-icon h-icon--sm" />দেখুন</button>
                @endif
              </td>
            </tr>
            @endforeach
            @if(empty($sessions))
            <tr><td class="td-mono">#SS-4201</td><td>Dr. Anisur Rahman</td><td>Arif Hossain</td><td>Data Structures</td><td>10 May, 14:00</td><td>1 hr</td><td class="td-pos">৳480</td><td><span class="badge b-ongoing">চলমান</span></td><td><button class="btn btn-danger btn-sm">শেষ করুন</button></td></tr>
            <tr><td class="td-mono">#SS-4200</td><td>Prof. Shirin Akter</td><td>Rima Begum</td><td>Calculus II</td><td>10 May, 13:30</td><td>1.5 hr</td><td class="td-pos">৳620</td><td><span class="badge b-ongoing">চলমান</span></td><td><button class="btn btn-danger btn-sm">শেষ করুন</button></td></tr>
            <tr><td class="td-mono">#SS-4199</td><td>Md. Faisal Hoque</td><td>Puja Saha</td><td>Optics & Waves</td><td>10 May, 12:00</td><td>1 hr</td><td class="td-pos">৳400</td><td><span class="badge b-completed">সম্পন্ন</span></td><td><button class="btn btn-ghost btn-sm"><x-heroicon name="eye" class="h-icon h-icon--sm" />দেখুন</button></td></tr>
            <tr><td class="td-mono">#SS-4198</td><td>Imran Hossain</td><td>Kamal Uddin</td><td>Thermodynamics</td><td>10 May, 11:00</td><td>2 hr</td><td class="td-neg">৳750</td><td><span class="badge b-cancelled">বাতিলকৃত</span></td><td><button class="btn btn-warning btn-sm"><x-heroicon name="arrow-path" class="h-icon h-icon--sm" />রিফান্ড</button></td></tr>
            <tr><td class="td-mono">#SS-4197</td><td>Rubina Yasmin</td><td>Nadia Islam</td><td>Circuit Analysis</td><td>9 May, 18:00</td><td>1 hr</td><td class="td-pos">৳450</td><td><span class="badge b-completed">সম্পন্ন</span></td><td><button class="btn btn-ghost btn-sm"><x-heroicon name="eye" class="h-icon h-icon--sm" />দেখুন</button></td></tr>
            <tr><td class="td-mono">#SS-4196</td><td>Aminul Islam</td><td>Borhan Ali</td><td>OOP in Java</td><td>9 May, 16:00</td><td>1 hr</td><td class="td-pos">৳480</td><td><span class="badge b-completed">সম্পন্ন</span></td><td><button class="btn btn-ghost btn-sm"><x-heroicon name="eye" class="h-icon h-icon--sm" />দেখুন</button></td></tr>
            <tr><td class="td-mono">#SS-4195</td><td>Nazma Khanam</td><td>Sharmin Akter</td><td>Database Design</td><td>9 May, 14:00</td><td>1.5 hr</td><td class="td-pos">৳580</td><td><span class="badge b-completed">সম্পন্ন</span></td><td><button class="btn btn-ghost btn-sm"><x-heroicon name="eye" class="h-icon h-icon--sm" />দেখুন</button></td></tr>
            <tr><td class="td-mono">#SS-4194</td><td>Sumaiya Nahar</td><td>Rasel Miah</td><td>Linear Algebra</td><td>8 May, 20:00</td><td>1 hr</td><td class="td-neg">৳420</td><td><span class="badge b-cancelled">বাতিলকৃত</span></td><td><button class="btn btn-warning btn-sm"><x-heroicon name="arrow-path" class="h-icon h-icon--sm" />রিফান্ড</button></td></tr>
            @endif
          </tbody>
        </table>
      </div>
      <div class="card-foot">
        <span style="font-size:12px;color:var(--text3)">Showing {{ count($sessions ?? []) ?: 8 }} of {{ number_format($stats['totalSessions'] ?? 11247) }} sessions</span>
        <div class="pager"><div class="pg on">1</div><div class="pg">2</div><div class="pg">3</div><div class="pg">4</div><div class="pg">5</div><div class="pg" style="padding:0 4px">…</div><div class="pg">{{ ceil(($stats['totalSessions'] ?? 11247)/8) }}</div></div>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: PAYMENTS
  ═══════════════════════════════════ --}}
  <div class="page" id="p-payments">
    <div class="pg-hd"><h2>পেমেন্ট ম্যানেজমেন্ট</h2></div>

    <div class="sgrid g5">
      <div class="stat-card"><div class="stat-head"><div class="s-label" style="margin-bottom:0">মোট ট্রাঞ্জ্যাকশন</div><span class="stat-icon"><x-heroicon name="arrows-up-down" class="h-icon h-icon--md" /></span></div><div class="s-val" style="font-size:20px">{{ $payments['total'] ?? '৳29,85,678' }}</div></div>
      <div class="stat-card"><div class="stat-head"><div class="s-label" style="margin-bottom:0">প্ল্যাটফর্মের মুনাফা</div><span class="stat-icon" style="background:var(--green-bg);color:var(--green)"><x-heroicon name="currency-bangladeshi" class="h-icon h-icon--md" /></span></div><div class="s-val" style="font-size:20px;color:var(--green)">{{ $payments['profit'] ?? '৳5,66,780' }}</div></div>
      <div class="stat-card"><div class="stat-head"><div class="s-label" style="margin-bottom:0">অপেক্ষমান পেমেন্ট</div><span class="stat-icon" style="background:var(--amber-bg);color:var(--amber)"><x-heroicon name="calendar-days" class="h-icon h-icon--md" /></span></div><div class="s-val" style="font-size:20px;color:var(--amber)">{{ $payments['pending'] ?? '৳1,56,780' }}</div></div>
      <div class="stat-card"><div class="stat-head"><div class="s-label" style="margin-bottom:0">প্রদানকৃত রিফান্ড</div><span class="stat-icon" style="background:var(--red-bg);color:var(--red)"><x-heroicon name="arrow-path" class="h-icon h-icon--md" /></span></div><div class="s-val" style="font-size:20px;color:var(--red)">{{ $payments['refunds'] ?? '৳56,780' }}</div></div>
      <div class="stat-card"><div class="stat-head"><div class="s-label" style="margin-bottom:0">মেন্টর পেমেন্ট</div><span class="stat-icon"><x-heroicon name="user-group" class="h-icon h-icon--md" /></span></div><div class="s-val" style="font-size:20px">{{ $payments['payouts'] ?? '৳13,45,640' }}</div></div>
    </div>

    <div class="card">
      <div class="card-head">
        <h3>সকল ট্রাঞ্জ্যাকশন</h3>
        <div class="filters" style="margin-left:auto">
          <select class="fi"><option value="">ট্রাঞ্জ্যাকশনের ধরণ</option><option>সেশন ফী</option><option>মেন্টর পেমেন্ট</option><option>রিফান্ড</option><option>জয়েনিং ফী</option></select>
          <input type="text" class="fi" placeholder="Search Trx ID…" style="width:155px"/>
        </div>
      </div>
      <div class="tbl">
        <table>
          <thead><tr><th>ট্রাঞ্জ্যাকশন আইডি</th><th>ট্রাঞ্জ্যাকশনের ধরণ</th><th>পরিমাণ</th><th>তারিখ</th><th>সময়</th><th>নোট</th></tr></thead>
          <tbody>
            @foreach($transactions ?? [] as $txn)
            <tr>
              <td class="td-mono">{{ $txn['id'] }}</td>
              <td><button class="btn btn-ghost btn-sm" onclick="openTxn('{{ $txn['id'] }}','{{ $txn['type'] }}','{{ addslashes($txn['detail']) }}')">{{ $txn['type'] }} <x-heroicon name="arrow-top-right-on-square" class="h-icon" style="width:11px;height:11px" /></button></td>
              <td class="{{ str_starts_with($txn['amount'], '+') ? 'td-pos' : 'td-neg' }}">{{ $txn['amount'] }}</td>
              <td>{{ $txn['date'] }}</td>
              <td>{{ $txn['time'] }}</td>
              <td style="font-size:12px;color:var(--text3)">{{ $txn['note'] }}</td>
            </tr>
            @endforeach
            @if(empty($transactions))
            <tr><td class="td-mono">TRX-9841</td><td><button class="btn btn-ghost btn-sm" onclick="openTxn('TRX-9841','Session Fee','Session: #SS-4199\nStudent: Puja Saha (U1004)\nMentor: Md. Faisal Hoque (T097)\nTopic: Optics & Waves\nDuration: 1 hr\n\nSession fee collected: ৳400\nPlatform commission (20%): ৳80\nMentor payout: ৳320')">সেশন ফী <x-heroicon name="arrow-top-right-on-square" class="h-icon" style="width:11px;height:11px" /></button></td><td class="td-pos">+৳400</td><td>10/5/26</td><td>12:00</td><td style="font-size:12px;color:var(--text3)">Completed session</td></tr>
            <tr><td class="td-mono">TRX-9840</td><td><button class="btn btn-ghost btn-sm" onclick="openTxn('TRX-9840','Mentor Payout','Payout for session: #SS-4199\nMentor: Md. Faisal Hoque (T097)\n\nGross session fee: ৳400\nPlatform deduction (20%): ৳80\nNet payout to mentor: ৳320')">মেন্টর পেমেন্ট <x-heroicon name="arrow-top-right-on-square" class="h-icon" style="width:11px;height:11px" /></button></td><td class="td-neg">−৳320</td><td>10/5/26</td><td>12:45</td><td style="font-size:12px;color:var(--text3)">Mentor disbursement</td></tr>
            <tr><td class="td-mono">TRX-9839</td><td><button class="btn btn-ghost btn-sm" onclick="openTxn('TRX-9839','Refund','Refund for cancelled session: #SS-4198\nStudent: Kamal Uddin (U1005)\nMentor: Imran Hossain (T018)\nReason: Student cancelled before session start\n\nFull refund issued: ৳750\nProcessing fee: ৳0')">রিফান্ড <x-heroicon name="arrow-top-right-on-square" class="h-icon" style="width:11px;height:11px" /></button></td><td class="td-neg">−৳750</td><td>10/5/26</td><td>11:30</td><td style="font-size:12px;color:var(--text3)">Cancelled session refund</td></tr>
            <tr><td class="td-mono">TRX-9838</td><td><button class="btn btn-ghost btn-sm" onclick="openTxn('TRX-9838','Mentor Joining Fee','New mentor registration\nMentor: Kamrul Islam (pending)\nInstitution: BUET\nDepartment: EEE\n\nOne-time platform joining fee: ৳350')">জয়েনিং ফী <x-heroicon name="arrow-top-right-on-square" class="h-icon" style="width:11px;height:11px" /></button></td><td class="td-pos">+৳350</td><td>9/5/26</td><td>09:15</td><td style="font-size:12px;color:var(--text3)">New mentor registration</td></tr>
            <tr><td class="td-mono">TRX-9837</td><td><button class="btn btn-ghost btn-sm" onclick="openTxn('TRX-9837','Session Fee','Session: #SS-4197\nStudent: Nadia Islam (U1008)\nMentor: Rubina Yasmin (T063)\nTopic: Circuit Analysis\nDuration: 1 hr\n\nSession fee collected: ৳450\nPlatform commission (20%): ৳90\nMentor payout: ৳360')">সেশন ফী <x-heroicon name="arrow-top-right-on-square" class="h-icon" style="width:11px;height:11px" /></button></td><td class="td-pos">+৳450</td><td>9/5/26</td><td>18:00</td><td style="font-size:12px;color:var(--text3)">Completed session</td></tr>
            <tr><td class="td-mono">TRX-9836</td><td><button class="btn btn-ghost btn-sm" onclick="openTxn('TRX-9836','Session Fee','Session: #SS-4196\nStudent: Borhan Ali (U1009)\nMentor: Aminul Islam (T044)\nTopic: OOP in Java\nDuration: 1 hr\n\nSession fee collected: ৳480\nPlatform commission (20%): ৳96\nMentor payout: ৳384')">সেশন ফী <x-heroicon name="arrow-top-right-on-square" class="h-icon" style="width:11px;height:11px" /></button></td><td class="td-pos">+৳480</td><td>9/5/26</td><td>16:00</td><td style="font-size:12px;color:var(--text3)">Completed session</td></tr>
            <tr><td class="td-mono">TRX-9835</td><td><button class="btn btn-ghost btn-sm" onclick="openTxn('TRX-9835','Mentor Payout','Payout for session: #SS-4197\nMentor: Rubina Yasmin (T063)\n\nGross session fee: ৳450\nPlatform deduction (20%): ৳90\nNet payout to mentor: ৳360')">মেন্টর পেমেন্ট <x-heroicon name="arrow-top-right-on-square" class="h-icon" style="width:11px;height:11px" /></button></td><td class="td-neg">−৳360</td><td>9/5/26</td><td>18:50</td><td style="font-size:12px;color:var(--text3)">Mentor disbursement</td></tr>
            <tr><td class="td-mono">TRX-9834</td><td><button class="btn btn-ghost btn-sm" onclick="openTxn('TRX-9834','Refund','Refund for cancelled session: #SS-4194\nStudent: Rasel Miah (U1007)\nMentor: Sumaiya Nahar (T009)\nReason: Mentor unavailable — session auto-cancelled\n\nFull refund issued: ৳420\nProcessing fee: ৳0')">রিফান্ড <x-heroicon name="arrow-top-right-on-square" class="h-icon" style="width:11px;height:11px" /></button></td><td class="td-neg">−৳420</td><td>8/5/26</td><td>20:30</td><td style="font-size:12px;color:var(--text3)">Auto-cancelled refund</td></tr>
            @endif
          </tbody>
        </table>
      </div>
      <div class="card-foot">
        <span style="font-size:12px;color:var(--text3)">Showing {{ count($transactions ?? []) ?: 8 }} of {{ number_format($stats['totalTransactions'] ?? 9841) }} transactions</span>
        <div class="pager"><div class="pg on">1</div><div class="pg">2</div><div class="pg">3</div><div class="pg" style="padding:0 4px">…</div><div class="pg">{{ ceil(($stats['totalTransactions'] ?? 9841)/8) }}</div></div>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════
       PAGE: SETTINGS
  ═══════════════════════════════════ --}}
  <div class="page" id="p-settings">
    <div class="pg-hd"><h2>সেটিংস</h2></div>
    <div class="sgrid g2">
      <div class="card">
        <div class="card-head"><h3>্প্ল্যাটফর্ম সেটিংস</h3></div>
        <div style="padding:18px;display:flex;flex-direction:column;gap:13px">
          {{-- In real Laravel: wrap in <form> with @csrf and action="{{ route('admin.settings.update') }}" --}}
          <div class="fg"><label>্প্ল্যাটফর্মের নাম</label><input type="text" class="fc" name="platform_name" value="{{ $settings['platform_name'] ?? 'MentorChai' }}"/></div>
          <div class="fg"><label>সেশনপ্রতি কমিশন (%)</label><input type="number" class="fc" name="commission" value="{{ $settings['commission'] ?? 20 }}"/></div>
          <div class="fg"><label>মেন্টর জয়েনিং ফী (৳)</label><input type="number" class="fc" name="joining_fee" value="{{ $settings['joining_fee'] ?? 350 }}"/></div>
          <div class="fg"><label>সাপোর্ট ইমেইল</label><input type="email" class="fc" name="support_email" value="{{ $settings['support_email'] ?? 'support@eduflow.com' }}"/></div>
          <div class="fg"><label>সেশনের সর্বোচ্চ স্থায়ীত্বকাল (ঘন্টা)</label><input type="number" class="fc" name="max_duration" value="{{ $settings['max_duration'] ?? 3 }}"/></div>
          <div class="fg" style="margin:0"><label>রিফান্ড উইন্ডো (ঘন্টা)</label><input type="number" class="fc" name="refund_window" value="{{ $settings['refund_window'] ?? 24 }}"/></div>
          <button class="btn btn-primary"><x-heroicon name="document-arrow-down" class="h-icon h-icon--sm" />সংরক্ষণ করুন</button>
        </div>
      </div>
      <div class="card">
        <div class="card-head"><h3>অ্যাডমিন অ্যাকাউন্ট</h3></div>
        <div style="padding:18px;display:flex;flex-direction:column;gap:13px">
          <div class="fg"><label>সম্পূর্ণ নাম</label><input type="text" class="fc" name="name" value="{{ auth()->user()->name ?? 'Mr. Admin' }}"/></div>
          <div class="fg"><label>ইমেইল</label><input type="email" class="fc" name="email" value="{{ auth()->user()->email ?? 'admin@eduflow.com' }}"/></div>
          <div class="fg"><label>বর্তমান পাসওয়ার্ড</label><input type="password" class="fc" name="current_password" placeholder="••••••••"/></div>
          <div class="fg"><label>নতুন পাসওয়ার্ড</label><input type="password" class="fc" name="password" placeholder="••••••••"/></div>
          <div class="fg" style="margin:0"><label>নতুন পাসওয়ার্ড নিশ্চিত করুন</label><input type="password" class="fc" name="password_confirmation" placeholder="••••••••"/></div>
          <button class="btn btn-primary"><x-heroicon name="document-arrow-down" class="h-icon h-icon--sm" />অ্যাকাউন্ট আপডেট করুন</button>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- ═══════════════ MODALS ═══════════════ --}}

{{-- Ban Modal --}}
<div class="modal-ov" id="m-ban">
  <div class="modal">
    <div class="modal-hd">
      <x-heroicon name="no-symbol" class="h-icon" style="width:18px;height:18px;color:var(--red)" />
      <h3>অ্যাকাউন্ট ব্যান করুন</h3>
      <button style="background:none;border:none;cursor:pointer;color:var(--text3);font-size:20px;line-height:1" onclick="closeModal('m-ban')"><x-heroicon name="x-mark" class="h-icon h-icon--sm" /></button>
    </div>
    <div class="modal-bd">
      <p style="font-size:13px;color:var(--text2);margin-bottom:14px;line-height:1.6"><strong id="ban-name"></strong> (<span id="ban-uid" style="font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace;color:var(--text3)"></span>) কে ব্যান করলে তাৎক্ষণিকভাবে প্ল্যাটফর্মে তাদের প্রবেশাধিকার বাতিল হয়ে যাবে।</p>
      <div class="fg">
        <label>ব্যানের কারণ</label>
        <select class="fc">
          <option value="">একটি কারণ বেছে নিন…</option>
          <option>প্ল্যাটফর্মের বাইরে যোগাযোগের চেষ্টা</option>
          <option>অপমানজনক বা অশালীন ভাষার ব্যবহার</option>
          <option>শর্তাবলী ও নীতিমালা লঙ্ঘন</option>
          <option>প্রতারণামূলক কার্যকলাপ</option>
          <option>বারবার সেশনে অনুপস্থিত থাকা</option>
          <option>মিথ্যা তথ্য বা সনদ প্রদান</option>
          <option>অন্যান্য</option>
        </select>
      </div>
      <div class="fg" style="margin:0">
        <label>অতিরিক্ত নোট (ঐচ্ছিক)</label>
        <textarea class="fc" placeholder="অতিরিক্ত প্রেক্ষাপট, প্রমাণের রেফারেন্স ইত্যাদি…"></textarea>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-ghost" onclick="closeModal('m-ban')">বাতিল</button>
      <button class="btn btn-danger"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />ব্যান নিশ্চিত করুন</button>
    </div>
  </div>
</div>

{{-- Mentor Detail Modal --}}
<div class="modal-ov" id="m-mentor">
  <div class="modal" style="max-width:520px">
    <div class="modal-hd">
      <x-heroicon name="user-group" class="h-icon" style="width:18px;height:18px;color:var(--accent)" />
      <h3>মেন্টর প্রোফাইল</h3>
      <button style="background:none;border:none;cursor:pointer;color:var(--text3);font-size:20px;line-height:1" onclick="closeModal('m-mentor')"><x-heroicon name="x-mark" class="h-icon h-icon--sm" /></button>
    </div>
    <div class="modal-bd">
      <div style="display:flex;align-items:center;gap:12px;padding:12px;background:var(--bg);border-radius:8px;margin-bottom:14px;border:1px solid var(--border)">
        <div style="width:46px;height:46px;border-radius:10px;background:var(--accent-bg);color:var(--accent-txt);display:flex;align-items:center;justify-content:center;font-size:17px;font-weight:700" id="m-av"></div>
        <div><div style="font-size:15px;font-weight:600" id="m-name"></div><div style="font-size:12px;color:var(--text3);margin-top:2px" id="m-meta"></div></div>
        <span class="badge b-active" style="margin-left:auto">অ্যাক্টিভ</span>
      </div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px" id="m-details"></div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-ghost" onclick="closeModal('m-mentor')">বন্ধ করুন</button>
      <button class="btn btn-danger btn-sm"><x-heroicon name="no-symbol" class="h-icon h-icon--sm" />মেন্টর ব্যান করুন</button>
    </div>
  </div>
</div>

{{-- Transaction Detail Modal --}}
<div class="modal-ov" id="m-txn">
  <div class="modal">
    <div class="modal-hd">
      <x-heroicon name="clipboard-document-list" class="h-icon" style="width:18px;height:18px;color:var(--accent)" />
      <h3>ট্রাঞ্জ্যাকশনের বিস্তারিত</h3>
      <button style="background:none;border:none;cursor:pointer;color:var(--text3);font-size:20px;line-height:1" onclick="closeModal('m-txn')"><x-heroicon name="x-mark" class="h-icon h-icon--sm" /></button>
    </div>
    <div class="modal-bd">
      <div style="font-size:11px;font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace;color:var(--text3);margin-bottom:5px" id="txn-id"></div>
      <div style="font-size:14px;font-weight:600;margin-bottom:12px" id="txn-type"></div>
      <div style="font-size:13px;color:var(--text2);line-height:1.9;background:var(--bg);padding:12px 14px;border-radius:8px;border:1px solid var(--border);white-space:pre-line" id="txn-detail"></div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-ghost" onclick="closeModal('m-txn')">বন্ধ করুন</button>
    </div>
  </div>
</div>

{{-- Add Topic Modal --}}
<div class="modal-ov" id="m-add-topic">
  <div class="modal">
    <div class="modal-hd">
      <x-heroicon name="book-open" class="h-icon" style="width:18px;height:18px;color:var(--accent)" />
      <h3>নতুন টপিক যোগ করুন</h3>
      <button style="background:none;border:none;cursor:pointer;color:var(--text3);font-size:20px;line-height:1" onclick="closeModal('m-add-topic')"><x-heroicon name="x-mark" class="h-icon h-icon--sm" /></button>
    </div>
    <div class="modal-bd">
      <div class="fg">
        <label>ক্যাটাগরি</label>
        <select class="fc">
          <option value="">ক্যাটাগরি বেছে নিন…</option>
          @foreach($topicCategoryNames ?? ['Programming','Physics','Mathematics','Electronics','Mechanical Eng.','Chemistry'] as $cat)
          <option>{{ $cat }}</option>
          @endforeach
          <option>+ নতুন ক্যাটাগরি তৈরি করুন</option>
        </select>
      </div>
      <div class="fg"><label>টপিকের নাম</label><input type="text" class="fc" placeholder="যেমনঃ Binary Search Trees"/></div>
      <div class="fg" style="margin:0"><label>প্রযোজ্য ডিপার্টমেন্টসমূহ</label><input type="text" class="fc" placeholder="CSE, SWE, EEE…"/></div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-ghost" onclick="closeModal('m-add-topic')">বাতিল</button>
      <button class="btn btn-primary"><x-heroicon name="plus" class="h-icon h-icon--sm" />টপিক যোগ করুন</button>
    </div>
  </div>
</div>

<script>
/* ── helpers ── */
const qs = s => document.querySelector(s);
const later = fn => setTimeout(fn, 60);

/* ── navigation ── */
const titles = {dashboard:'ড্যাশবোর্ড',users:'শিক্ষার্থী ব্যবস্থাপনা',mentors:'মেন্টর ব্যবস্থাপনা',topics:'টপিক এবং ক্যাটাগরি',sessions:'সেশন পর্যবেক্ষণ',payments:'পেমেন্ট ম্যানেজমেন্ট',settings:'সেটিংস'};
function nav(id, el){
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.getElementById('p-'+id).classList.add('active');
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  if(el) el.classList.add('active');
  document.getElementById('pg-title').textContent = titles[id] || id;
}

/* ── tabs ── */
function switchTab(section, tabId, btn){
  document.querySelectorAll('#p-'+section+' .tab-panel').forEach(p => p.classList.remove('active'));
  const target = document.getElementById('tp-'+tabId);
  if(target) target.classList.add('active');
  document.querySelectorAll('#tbar-'+section+' .tab').forEach(t => t.classList.remove('active'));
  if(btn){
    btn.classList.add('active');
  } else {
    document.querySelectorAll('#tbar-'+section+' .tab').forEach(t => {
      const oc = t.getAttribute('onclick') || '';
      if(oc.includes("'"+tabId+"'") || oc.includes('"'+tabId+'"')) t.classList.add('active');
    });
  }
}

/* ── modals ── */
function openModal(id){ document.getElementById(id).classList.add('open') }
function closeModal(id){ document.getElementById(id).classList.remove('open') }
document.querySelectorAll('.modal-ov').forEach(o => o.addEventListener('click', function(e){ if(e.target===this) this.classList.remove('open') }));

/* ── ban ── */
function openBan(name, uid){
  document.getElementById('ban-name').textContent = name;
  document.getElementById('ban-uid').textContent = uid;
  openModal('m-ban');
}

/* ── mentor detail ── */
function openMentor(id, name, inst, dept, email, phone, sessions){
  const initials = name.split(' ').map(w=>w[0]).slice(0,2).join('');
  document.getElementById('m-av').textContent = initials;
  document.getElementById('m-name').textContent = name;
  document.getElementById('m-meta').textContent = id + ' · ' + dept;
  document.getElementById('m-details').innerHTML = `
    <div style="padding:10px;background:var(--bg);border-radius:7px;border:1px solid var(--border)"><div style="font-size:10px;color:var(--text3);text-transform:uppercase;font-weight:600;letter-spacing:.08em;margin-bottom:3px">প্রতিষ্ঠান</div><div style="font-size:13px">${inst}</div></div>
    <div style="padding:10px;background:var(--bg);border-radius:7px;border:1px solid var(--border)"><div style="font-size:10px;color:var(--text3);text-transform:uppercase;font-weight:600;letter-spacing:.08em;margin-bottom:3px">ডিপার্টমেন্ট</div><div style="font-size:13px">${dept}</div></div>
    <div style="padding:10px;background:var(--bg);border-radius:7px;border:1px solid var(--border)"><div style="font-size:10px;color:var(--text3);text-transform:uppercase;font-weight:600;letter-spacing:.08em;margin-bottom:3px">ইমেইল</div><div style="font-size:12.5px;word-break:break-all">${email}</div></div>
    <div style="padding:10px;background:var(--bg);border-radius:7px;border:1px solid var(--border)"><div style="font-size:10px;color:var(--text3);text-transform:uppercase;font-weight:600;letter-spacing:.08em;margin-bottom:3px">ফোন</div><div style="font-size:13px">${phone}</div></div>
    <div style="padding:10px;background:var(--bg);border-radius:7px;border:1px solid var(--border);grid-column:span 2"><div style="font-size:10px;color:var(--text3);text-transform:uppercase;font-weight:600;letter-spacing:.08em;margin-bottom:5px">মোট পরিচালিত সেশন</div><div style="font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace;font-size:22px;font-weight:700">${sessions}</div></div>
  `;
  openModal('m-mentor');
}

/* ── transaction detail ── */
function openTxn(id, type, detail){
  document.getElementById('txn-id').textContent = id;
  document.getElementById('txn-type').textContent = type;
  document.getElementById('txn-detail').textContent = detail;
  openModal('m-txn');
}

/* ── dark mode ── */
function syncThemeIcons(){
  var d = document.documentElement.classList.contains('dark');
  var m = document.getElementById('theme-icon-moon');
  var u = document.getElementById('theme-icon-sun');
  if(m) m.style.display = d ? 'none' : '';
  if(u) u.style.display = d ? '' : 'none';
}
function toggleTheme(){
  document.documentElement.classList.toggle('dark');
  try { localStorage.setItem('mc-admin-dark', document.documentElement.classList.contains('dark') ? '1' : ''); } catch(e) {}
  syncThemeIcons();
}
(function(){
  try { if(localStorage.getItem('mc-admin-dark')) document.documentElement.classList.add('dark'); } catch(e) {}
  if(document.readyState === 'loading') document.addEventListener('DOMContentLoaded', syncThemeIcons);
  else syncThemeIcons();
})();

/* ── deep-link: /admin/dashboard/sessions, /users, etc. ── */
(function(){
  var section = @json($adminInitialSection ?? 'dashboard');
  function go(){
    if(!section || section === 'dashboard') return;
    var items = document.querySelectorAll('#sidebar a.nav-item');
    for(var i = 0; i < items.length; i++){
      var a = items[i];
      var oc = a.getAttribute('onclick') || '';
      var m = oc.match(/nav\(\s*'([^']+)'/);
      if(m && m[1] === section){ nav(section, a); break; }
    }
  }
  if(document.readyState === 'loading') document.addEventListener('DOMContentLoaded', go);
  else go();
})();
</script>
</body>
</html>
