<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CoLoc — Dépenses</title>
  <style>
    :root {
      --noir: #0a0a0a;
      --noir2: #111111;
      --noir3: #1a1a1a;
      --gold: #c9a84c;
      --gold2: #e8c97a;
      --gold-dim: rgba(201, 168, 76, 0.07);
      --gold-border: rgba(201, 168, 76, 0.16);
      --muted: #5a5a5a;
      --text: #e8e8e8;
      --text2: #999;
      --red: #e05252;
      --green: #52c97a;
      --blue: #5b8af5;
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: var(--noir);
      color: var(--text);
      font-family: system-ui, -apple-system, sans-serif;
      min-height: 100vh;
      display: flex;
    }

    /* SIDEBAR */
    .sidebar {
      width: 250px;
      flex-shrink: 0;
      background: var(--noir2);
      border-right: 1px solid #1e1e1e;
      min-height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      display: flex;
      flex-direction: column;
      z-index: 100;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 22px 20px 18px;
      border-bottom: 1px solid #1e1e1e;
      font-size: 1.15rem;
      font-weight: 800;
      letter-spacing: -0.03em;
      color: var(--gold);
      text-decoration: none;
    }

    .logo-icon {
      background: var(--gold);
      color: var(--noir);
      width: 28px;
      height: 28px;
      border-radius: 7px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.85rem;
      font-weight: 800;
      flex-shrink: 0;
    }

    .coloc-chip {
      margin: 14px 14px 4px;
      background: var(--gold-dim);
      border: 1px solid var(--gold-border);
      border-radius: 9px;
      padding: 10px 13px;
      display: flex;
      align-items: center;
      gap: 9px;
    }

    .coloc-chip-dot {
      width: 7px;
      height: 7px;
      background: var(--green);
      border-radius: 50%;
      flex-shrink: 0;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {

      0%,
      100% {
        opacity: 1
      }

      50% {
        opacity: 0.4
      }
    }

    .coloc-chip-name {
      font-size: 0.78rem;
      font-weight: 700;
      color: var(--gold);
    }

    .coloc-chip-role {
      font-size: 0.62rem;
      color: var(--muted);
      margin-top: 1px;
    }

    .nav-section {
      padding: 12px 0;
      border-bottom: 1px solid #1a1a1a;
    }

    .nav-label {
      font-size: 0.58rem;
      letter-spacing: 0.13em;
      text-transform: uppercase;
      color: var(--muted);
      padding: 0 20px 6px;
    }

    .nav-item {
      display: flex;
      align-items: center;
      gap: 9px;
      padding: 9px 20px;
      font-size: 0.82rem;
      color: var(--text2);
      text-decoration: none;
      transition: all 0.12s;
      border-left: 2px solid transparent;
      cursor: pointer;
      width: 100%;
      background: none;
      border-top: none;
      border-right: none;
      border-bottom: none;
      font-family: inherit;
    }

    .nav-item:hover {
      color: var(--text);
      background: rgba(255, 255, 255, 0.025);
    }

    .nav-item.active {
      color: var(--gold);
      background: var(--gold-dim);
      border-left-color: var(--gold);
    }

    .nav-item .ni {
      width: 14px;
      text-align: center;
      font-size: 0.82rem;
      opacity: 0.6;
    }

    .nav-item.active .ni {
      opacity: 1;
    }

    .nav-badge {
      margin-left: auto;
      padding: 1px 7px;
      border-radius: 20px;
      font-size: 0.58rem;
      font-weight: 700;
    }

    .nb-gold {
      background: var(--gold);
      color: var(--noir);
    }

    .nb-red {
      background: var(--red);
      color: #fff;
    }

    .nb-gray {
      background: #222;
      color: var(--muted);
      border: 1px solid #2a2a2a;
    }

    .sidebar-footer {
      margin-top: auto;
      padding: 16px 18px;
      border-top: 1px solid #1a1a1a;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .avatar {
      width: 36px;
      height: 36px;
      border-radius: 9px;
      background: linear-gradient(135deg, #c9a84c, #7a5c1a);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 0.75rem;
      color: var(--noir);
      flex-shrink: 0;
    }

    .av-a {
      background: linear-gradient(135deg, #c9a84c, #7a5c1a);
      color: #0a0a0a;
    }

    .av-b {
      background: linear-gradient(135deg, #5b8af5, #2a4fa0);
      color: #fff;
    }

    .av-c {
      background: linear-gradient(135deg, #c952e0, #7a1a9a);
      color: #fff;
    }

    .av-d {
      background: linear-gradient(135deg, #52c97a, #1a7a42);
      color: #fff;
    }

    .av-e {
      background: linear-gradient(135deg, #f57c5b, #a03a2a);
      color: #fff;
    }

    .av-f {
      background: linear-gradient(135deg, #f5e35b, #a09c2a);
      color: #0a0a0a;
    }

    .av-g {
      background: linear-gradient(135deg, #5bf5d4, #2aa08f);
      color: #0a0a0a;
    }

    .av-h {
      background: linear-gradient(135deg, #f55be3, #a02aa0);
      color: #fff;
    }

    .av-i {
      background: linear-gradient(135deg, #5b95f5, #1a3f7a);
      color: #fff;
    }

    .av-j {
      background: linear-gradient(135deg, #f58f5b, #a03f1a);
      color: #0a0a0a;
    }

    .av-k {
      background: linear-gradient(135deg, #7bf55b, #3fa01a);
      color: #0a0a0a;
    }

    .av-l {
      background: linear-gradient(135deg, #5bf5a1, #1aa072);
      color: #0a0a0a;
    }

    .av-m {
      background: linear-gradient(135deg, #d45bf5, #7a1aa0);
      color: #fff;
    }

    .av-n {
      background: linear-gradient(135deg, #f55b82, #a01a3f);
      color: #fff;
    }

    .av-o {
      background: linear-gradient(135deg, #5bb4f5, #1a4f7a);
      color: #fff;
    }

    .av-p {
      background: linear-gradient(135deg, #f5d45b, #a07a1a);
      color: #0a0a0a;
    }

    .av-q {
      background: linear-gradient(135deg, #8cf55b, #3fa01a);
      color: #0a0a0a;
    }

    .av-r {
      background: linear-gradient(135deg, #5bf5e3, #1aa09a);
      color: #0a0a0a;
    }

    .av-s {
      background: linear-gradient(135deg, #d45bf5, #7a1aa0);
      color: #fff;
    }

    .av-t {
      background: linear-gradient(135deg, #f58fbe, #a03a7a);
      color: #fff;
    }

    .av-u {
      background: linear-gradient(135deg, #5b9cf5, #1a4f7a);
      color: #fff;
    }

    .av-v {
      background: linear-gradient(135deg, #aef55b, #4fa01a);
      color: #0a0a0a;
    }

    .av-w {
      background: linear-gradient(135deg, #5bf5d4, #1aa08f);
      color: #0a0a0a;
    }

    .av-x {
      background: linear-gradient(135deg, #f5b95b, #a0731a);
      color: #0a0a0a;
    }

    .av-y {
      background: linear-gradient(135deg, #d45bf5, #7a1aa0);
      color: #fff;
    }

    .av-z {
      background: linear-gradient(135deg, #5bb4f5, #1a4f7a);
      color: #fff;
    }

    .user-name {
      font-size: 0.8rem;
      font-weight: 700;
    }

    .user-sub {
      font-size: 0.62rem;
      color: var(--muted);
      margin-top: 1px;
    }

    .icon-btn {
      background: transparent;
      border: none;
      color: var(--muted);
      cursor: pointer;
      font-size: 0.9rem;
      padding: 4px 6px;
      border-radius: 5px;
    }

    .icon-btn:hover {
      color: var(--text2);
      background: rgba(255, 255, 255, 0.04);
    }

    /* MAIN */
    .main {
      margin-left: 250px;
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .topbar {
      background: var(--noir2);
      border-bottom: 1px solid #1e1e1e;
      padding: 0 28px;
      height: 54px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 50;
    }

    .topbar-title {
      font-size: 0.95rem;
      font-weight: 700;
    }

    .topbar-right {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 7px 16px;
      border-radius: 7px;
      font-family: system-ui;
      font-size: 0.8rem;
      cursor: pointer;
      transition: all 0.14s;
      border: none;
      outline: none;
      font-weight: 600;
      text-decoration: none;
    }

    .btn-gold {
      background: var(--gold);
      color: var(--noir);
    }

    .btn-gold:hover {
      background: var(--gold2);
      transform: translateY(-1px);
    }

    .btn-ghost {
      background: transparent;
      color: var(--muted);
      font-weight: 400;
      border: none;
      cursor: pointer;
      font-family: inherit;
      font-size: 0.8rem;
    }

    .content {
      padding: 26px 28px;
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    /* STATS MINI */
    .stats-mini {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 10px;
    }

    .sm-card {
      background: var(--noir2);
      border: 1px solid #1e1e1e;
      border-radius: 10px;
      padding: 14px 16px;
      position: relative;
      overflow: hidden;
    }

    .sm-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 2px;
    }

    .sm-gold::before {
      background: var(--gold);
    }

    .sm-green::before {
      background: var(--green);
    }

    .sm-red::before {
      background: var(--red);
    }

    .sm-blue::before {
      background: var(--blue);
      opacity: 0.4;
    }

    .sm-label {
      font-size: 0.58rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 6px;
    }

    .sm-value {
      font-size: 1.45rem;
      font-weight: 800;
      letter-spacing: -0.03em;
    }

    .sm-value.green {
      color: var(--green);
    }

    .sm-value.red {
      color: var(--red);
    }

    .sm-sub {
      font-size: 0.6rem;
      color: var(--muted);
      margin-top: 4px;
    }

    /* SECTION HEADER */
    .section-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .section-title {
      font-size: 0.88rem;
      font-weight: 700;
    }

    .count-tag {
      font-size: 0.62rem;
      color: var(--muted);
      background: #1a1a1a;
      padding: 2px 8px;
      border-radius: 4px;
      border: 1px solid #222;
      margin-left: 8px;
    }

    /* CARDS GRID */
    .cards-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
      gap: 14px;
    }

    /* EXPENSE CARD */
    .exp-card {
      background: var(--noir2);
      border: 1px solid #1e1e1e;
      border-radius: 13px;
      overflow: hidden;
      transition: border-color 0.2s, transform 0.15s;
    }

    .exp-card:hover {
      border-color: #2a2a2a;
      transform: translateY(-1px);
    }

    .exp-card.paid {
      opacity: 0.55;
    }

    .exp-card.paid .exp-top {
      background: rgba(82, 201, 122, 0.03);
    }

    /* Card top stripe by category */
    .exp-top {
      padding: 16px 18px 14px;
      border-bottom: 1px solid #161616;
      position: relative;
    }

    .exp-cat-stripe {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      border-radius: 13px 13px 0 0;
    }

    .stripe-green {
      background: var(--green);
    }

    .stripe-blue {
      background: var(--blue);
    }

    .stripe-gray {
      background: #444;
    }

    .stripe-gold {
      background: var(--gold);
    }

    .exp-header-row {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 10px;
      margin-top: 4px;
    }

    .exp-title {
      font-size: 0.92rem;
      font-weight: 700;
      color: var(--text);
    }

    .exp-date {
      font-size: 0.62rem;
      color: var(--muted);
      margin-top: 3px;
    }

    .exp-amount {
      font-size: 1.3rem;
      font-weight: 800;
      letter-spacing: -0.02em;
      flex-shrink: 0;
    }

    .exp-amount.payer {
      color: var(--green);
    }

    .exp-amount.neutral {
      color: var(--text);
    }

    .exp-meta-row {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-top: 10px;
    }

    .tag {
      display: inline-flex;
      align-items: center;
      padding: 2px 7px;
      border-radius: 4px;
      font-size: 0.6rem;
      font-weight: 500;
      letter-spacing: 0.04em;
    }

    .tg-gold {
      background: var(--gold-dim);
      color: var(--gold);
      border: 1px solid var(--gold-border);
    }

    .tg-green {
      background: rgba(82, 201, 122, 0.08);
      color: var(--green);
      border: 1px solid rgba(82, 201, 122, 0.2);
    }

    .tg-gray {
      background: rgba(255, 255, 255, 0.05);
      color: var(--muted);
    }

    .tg-blue {
      background: rgba(91, 138, 245, 0.08);
      color: var(--blue);
    }

    .tg-paid {
      background: rgba(82, 201, 122, 0.12);
      color: var(--green);
      border: 1px solid rgba(82, 201, 122, 0.25);
    }

    .tg-pending {
      background: rgba(224, 82, 82, 0.08);
      color: var(--red);
      border: 1px solid rgba(224, 82, 82, 0.2);
    }

    /* PAYER ROW */
    .exp-payer-row {
      display: flex;
      align-items: center;
      gap: 7px;
      margin-left: auto;
    }

    .mini-av {
      width: 22px;
      height: 22px;
      border-radius: 5px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.55rem;
      font-weight: 800;
      flex-shrink: 0;
    }

    .payer-label {
      font-size: 0.68rem;
      color: var(--muted);
    }

    .payer-name {
      font-size: 0.75rem;
      font-weight: 600;
      color: var(--text2);
    }

    /* CARD BODY - who owes what */
    .exp-body {
      padding: 14px 18px;
    }

    .owers-label {
      font-size: 0.6rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 10px;
    }

    .ower-row {
      display: flex;
      align-items: center;
      gap: 9px;
      padding: 7px 0;
      border-bottom: 1px solid #141414;
    }

    .ower-row:last-child {
      border-bottom: none;
    }

    .ower-av {
      width: 28px;
      height: 28px;
      border-radius: 7px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.62rem;
      font-weight: 800;
      flex-shrink: 0;
    }

    .ower-info {
      flex: 1;
    }

    .ower-name {
      font-size: 0.78rem;
      color: var(--text);
      font-weight: 500;
    }

    .ower-sub {
      font-size: 0.6rem;
      color: var(--muted);
      margin-top: 1px;
    }

    .ower-right {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .ower-amt {
      font-size: 0.82rem;
      font-weight: 700;
      color: var(--red);
    }

    .ower-amt.paid-amt {
      color: var(--green);
      text-decoration: line-through;
      opacity: 0.6;
    }

    /* MARK AS PAID BTN */
    .btn-mark-paid {
      background: rgba(82, 201, 122, 0.08);
      border: 1px solid rgba(82, 201, 122, 0.2);
      color: var(--green);
      font-size: 0.65rem;
      font-weight: 600;
      padding: 4px 10px;
      border-radius: 6px;
      cursor: pointer;
      font-family: inherit;
      transition: all 0.15s;
      white-space: nowrap;
    }

    .btn-mark-paid:hover {
      background: rgba(82, 201, 122, 0.18);
      transform: scale(1.02);
    }

    .btn-mark-paid.already-paid {
      background: rgba(90, 90, 90, 0.1);
      border-color: #2a2a2a;
      color: var(--muted);
      cursor: default;
    }

    .btn-mark-paid.already-paid:hover {
      transform: none;
      background: rgba(90, 90, 90, 0.1);
    }

    /* CARD FOOTER */
    .exp-footer {
      padding: 12px 18px;
      border-top: 1px solid #141414;
      background: rgba(0, 0, 0, 0.2);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .exp-split-info {
      font-size: 0.65rem;
      color: var(--muted);
    }

    .exp-actions {
      display: flex;
      gap: 6px;
    }

    .btn-sm-edit {
      background: transparent;
      border: 1px solid #222;
      color: var(--muted);
      font-size: 0.65rem;
      padding: 4px 10px;
      border-radius: 6px;
      cursor: pointer;
      font-family: inherit;
      transition: all 0.13s;
    }

    .btn-sm-edit:hover {
      border-color: #333;
      color: var(--text2);
    }

    .btn-sm-del {
      background: transparent;
      border: 1px solid transparent;
      color: var(--muted);
      font-size: 0.65rem;
      padding: 4px 10px;
      border-radius: 6px;
      cursor: pointer;
      font-family: inherit;
      transition: all 0.13s;
    }

    .btn-sm-del:hover {
      border-color: rgba(224, 82, 82, 0.3);
      color: var(--red);
    }

    /* PAID BANNER */
    .paid-banner {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 0.65rem;
      color: var(--green);
      font-weight: 600;
    }

    .paid-check {
      width: 16px;
      height: 16px;
      background: var(--green);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.5rem;
      color: var(--noir);
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(8px)
      }

      to {
        opacity: 1;
        transform: translateY(0)
      }
    }

    .fade-1 {
      animation: fadeUp 0.3s 0.05s both;
    }

    .fade-2 {
      animation: fadeUp 0.3s 0.1s both;
    }

    .fade-3 {
      animation: fadeUp 0.3s 0.15s both;
    }

    ::-webkit-scrollbar {
      width: 4px;
    }

    ::-webkit-scrollbar-track {
      background: var(--noir);
    }

    ::-webkit-scrollbar-thumb {
      background: #282828;
      border-radius: 2px;
    }

    @media(max-width:900px) {
      .stats-mini {
        grid-template-columns: repeat(2, 1fr);
      }

      .cards-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>

  @php
  $categoryColors = [
  'Alimentation' => 'green',
  'Énergie' => 'blue',
  'Loisirs' => 'gray',
  'Loyer' => 'gold',
  ];
  @endphp
  <!-- SIDEBAR -->
  <aside class="sidebar">
    <a class="logo" href="#">
      <div class="logo-icon">C</div>
      CoLoc
    </a>
    <div class="coloc-chip">
      <div class="coloc-chip-dot"></div>
      <div>
        <div class="coloc-chip-name">Les Appartés du {{$infos['currentColocation']}}</div>
        <div class="coloc-chip-role">{{$infos['currentRole']}} · {{$infos['currentColocated']}} membres</div>
      </div>
    </div>
    <nav>
      <div class="nav-section">
        <div class="nav-label">Principal</div>
        <a class="nav-item" href="#"><span class="ni">⬡</span> Dashboard</a>
        <a class="nav-item" href="#"><span class="ni">⌂</span> Ma Colocation <span
            class="nav-badge nb-gold">Active</span></a>
        <a class="nav-item active" href="#"><span class="ni">◈</span> Dépenses</a>
        <a class="nav-item" href="#"><span class="ni">⌂</span> Categories <span class="nav-badge nb-red">3</span></a>
        <a class="nav-item" href="#"><span class="ni">◎</span> Membres</a>
      </div>
      <div class="nav-section">
        <div class="nav-label">Gestion</div>
        <a class="nav-item" href="#"><span class="ni">◻</span> Catégories</a>
        <a class="nav-item" href="#"><span class="ni">✦</span> Invitations <span class="nav-badge nb-gray">1</span></a>
      </div>
      <div class="nav-section">
        <div class="nav-label">Mon profil</div>
        <a class="nav-item" href="#"><span class="ni">⬡</span> Mon profil</a>
        <form action="#" method="POST" style="margin:0;">
          <button type="submit" class="nav-item" style="width:100%;border:none;background:none;">
            <span class="ni">🛡</span> Logout
          </button>
        </form>
      </div>
    </nav>
    <div class="sidebar-footer">
      <div class="avatar">JD</div>
      <div style="flex:1;overflow:hidden;">
        <div class="user-name">Jean Dupont</div>
        <div class="user-sub">Owner · ★★★★☆</div>
      </div>
      <button class="icon-btn">⋮</button>
    </div>
  </aside>


  <!-- MAIN -->
  <main class="main">
    <div class="topbar">
      <div class="topbar-title">Dépenses</div>
      <div class="topbar-right">
        <button class="btn btn-gold">+ Nouvelle dépense</button>
      </div>
    </div>

    <div class="content">

      <!-- STATS MINI -->
      <div class="stats-mini fade-1">
        <div class="sm-card sm-gold">
          <div class="sm-label">Total ce mois</div>
          <div class="sm-value">{{$infos['totalThisMonth']}}€</div>
          <div class="sm-sub">{{$infos['currentMonthName']}}</div>
        </div>
        <div class="sm-card sm-green">
          <div class="sm-label">Mon solde</div>
          <div class="sm-value green">+{{$infos['currentSold']}}€</div>
          <div class="sm-sub">On vous doit</div>
        </div>
        <div class="sm-card sm-red">
          <div class="sm-label">Remboursements dus</div>
          <div class="sm-value red">185€</div>
          <div class="sm-sub">3 en attente</div>
        </div>
        <div class="sm-card sm-blue">
          <div class="sm-label">mes éxpenses</div>
          <div class="sm-value">{{$infos['totalDeponseMonth']}}</div>
          <div class="sm-sub">ce mois-ci</div>
        </div>
        <div class="sm-card sm-gold">
          <div class="sm-label">éxpenses totale</div>
          <div class="sm-value">{{$infos['totalDeponseMonth']}}</div>
          <div class="sm-sub">ce mois-ci</div>
        </div>
        <div class="sm-card sm-red">
          <div class="sm-label">je dois Rembourser</div>
          <div class="sm-value red">4</div>
          <div class="sm-sub">for 4 exponses</div>
        </div>
      </div>

      <!-- SECTION HEADER -->
      <div class="section-header fade-2">
        <div style="display:flex;align-items:center;">
          <span class="section-title">Dépenses récentes</span>
          <span class="count-tag">4 entrées</span>
        </div>
        <select
          style="background:var(--noir3);border:1px solid #222;color:var(--text2);font-family:system-ui;font-size:0.75rem;padding:6px 10px;border-radius:6px;outline:none;">
          <option selected>Février 2026</option>
          <option>Janvier 2026</option>
          <option>Décembre 2025</option>
        </select>
      </div>

      <!-- CARDS GRID -->
      <div class="cards-grid fade-3" id="cardsGrid">

        @foreach($exponses as $exponse)

        @php
        $color = $categoryColors[$exponse->category->name] ?? 'gray';
        @endphp
        <div class="exp-card {{$exponse->nbrPayed==$infos['currentColocated']-1? 'paid' : ''}}"
          id="card-{{$exponse->id}}">
          <div class="exp-top">
            <div class="exp-cat-stripe stripe-{{ $color }}"></div>

            <div class="exp-header-row">
              <div>
                <div class="exp-title">{{ $exponse->title }}</div>
                <div class="exp-date">
                  {{ $exponse->created_at->format('d M Y') }}
                </div>
              </div>

              <div class="exp-amount">{{ $exponse->amount }}€</div>
            </div>

            <div class="exp-meta-row">
              <span class="tag tg-{{ $color }}">
                {{ $exponse->category->name }}
              </span>

              <span id="status-{{$exponse->id}}" class="tag tg-pending">En attente</span>
              <div class="exp-payer-row">
                <span class="payer-label">payé par</span>
                <div class="mini-av av-1">
                  {{strtoupper(substr($user->name, 0, 2))}}</div>
                <span class="payer-name">{{$user->name}}</span>
              </div>
            </div>
          </div>
          <div class="exp-body">
            <div class="owers-label">Qui doit combien</div>
            @foreach($fromUsers as $u)
            @continue($exponse->id!=$u->exponse_id)
            <div class="ower-row">
              <div class="ower-av av-b">{{strtoupper(substr($u->fromUser->name, 0, 2))}}</div>
              <div class="ower-info">
                <div class="ower-name">{{$u->fromUser->name}}</div>
                @if($u->is_payed=='yes')
                <div class="ower-sub">a remboursé {{$user->name}} ✓</div>
                @else
                <div class="ower-sub">doit rembourser {{$user->name}}</div>
                @endif
              </div>
              <div class="ower-right">
                @if($u->is_payed=='yes')
                <span class="ower-amt paid-amt" id="amt-1-ml">{{$u->amount}}€</span>
                <button class="btn-mark-paid already-paid">✓ Payé</button>
                @else
                <span class="ower-amt" id="amt-1-ml">{{$u->amount}}€</span>
                <button class="btn-mark-paid">à payer</button>
                @endif
              </div>
            </div>
            @endforeach
          </div>
          <div class="exp-footer">

            @if($exponse->nbrPayed==$infos['currentColocated']-1)
            <div class="paid-banner">
              <div class="paid-check">✓</div> Tous les remboursements reçus
            </div>
            @else
            <span class="exp-split-info">Divisé entre {{$infos['currentColocated']}}
              membres·{{$exponse->amount_for_one}}€ / pers.</span>
            @endif
            <div class="exp-actions">
              <button class="btn-sm-edit">Modifier</button>
              <button class="btn-sm-del">Supprimer</button>
            </div>
          </div>
        </div>
        @endforeach
        <!-- CARD 1: Courses Carrefour -->
        <div class="exp-card" id="card-1">
          <div class="exp-top">
            <div class="exp-cat-stripe stripe-green"></div>
            <div class="exp-header-row">
              <div>
                <div class="exp-title">Courses Carrefour</div>
                <div class="exp-date">20 fév. 2026</div>
              </div>
              <div class="exp-amount payer">120€</div>
            </div>
            <div class="exp-meta-row">
              <span class="tag tg-green">Alimentation</span>
              <span id="status-1" class="tag tg-pending">En attente</span>
              <div class="exp-payer-row">
                <span class="payer-label">payé par</span>
                <div class="mini-av" style="background:linear-gradient(135deg,#c9a84c,#7a5c1a);color:#0a0a0a;">JD</div>
                <span class="payer-name">Jean</span>
              </div>
            </div>
          </div>

          <div class="exp-body">
            <div class="owers-label">Qui doit combien</div>
            <div class="ower-row">
              <div class="ower-av av-b">ML</div>
              <div class="ower-info">
                <div class="ower-name">Marie Leclerc</div>
                <div class="ower-sub">doit rembourser Jean</div>
              </div>
              <div class="ower-right">
                <span class="ower-amt" id="amt-1-ml">30€</span>
                <button class="btn-mark-paid" onclick="markPaid('1','ml',this)">✓ Payé</button>
              </div>
            </div>
            <div class="ower-row">
              <div class="ower-av av-c">AR</div>
              <div class="ower-info">
                <div class="ower-name">Alex Renaud</div>
                <div class="ower-sub">doit rembourser Jean</div>
              </div>
              <div class="ower-right">
                <span class="ower-amt" id="amt-1-ar">30€</span>
                <button class="btn-mark-paid" onclick="markPaid('1','ar',this)">✓ Payé</button>
              </div>
            </div>
            <div class="ower-row">
              <div class="ower-av av-d">TM</div>
              <div class="ower-info">
                <div class="ower-name">Tom Martin</div>
                <div class="ower-sub">doit rembourser Jean</div>
              </div>
              <div class="ower-right">
                <span class="ower-amt" id="amt-1-tm">30€</span>
                <button class="btn-mark-paid" onclick="markPaid('1','tm',this)">✓ Payé</button>
              </div>
            </div>
          </div>
          <div class="exp-footer">
            <span class="exp-split-info">Divisé entre 4 membres · 30€ / pers.</span>
            <div class="exp-actions">
              <button class="btn-sm-edit">✎ Modifier</button>
              <button class="btn-sm-del">✕ Supprimer</button>
            </div>
          </div>
        </div>

        <!-- CARD 2: EDF -->
        <div class="exp-card" id="card-2">
          <div class="exp-top">
            <div class="exp-cat-stripe stripe-blue"></div>
            <div class="exp-header-row">
              <div>
                <div class="exp-title">EDF Électricité</div>
                <div class="exp-date">18 fév. 2026</div>
              </div>
              <div class="exp-amount neutral">89€</div>
            </div>
            <div class="exp-meta-row">
              <span class="tag tg-blue">Énergie</span>
              <span id="status-2" class="tag tg-pending">En attente</span>
              <div class="exp-payer-row">
                <span class="payer-label">payé par</span>
                <div class="mini-av av-b">ML</div>
                <span class="payer-name">Marie</span>
              </div>
            </div>
          </div>
          <div class="exp-body">
            <div class="owers-label">Qui doit combien</div>
            <div class="ower-row">
              <div class="ower-av" style="background:linear-gradient(135deg,#c9a84c,#7a5c1a);color:#0a0a0a;">JD</div>
              <div class="ower-info">
                <div class="ower-name">Jean Dupont</div>
                <div class="ower-sub">doit rembourser Marie</div>
              </div>
              <div class="ower-right">
                <span class="ower-amt" id="amt-2-jd">22.25€</span>
                <button class="btn-mark-paid" onclick="markPaid('2','jd',this)">✓ Payé</button>
              </div>
            </div>
            <div class="ower-row">
              <div class="ower-av av-c">AR</div>
              <div class="ower-info">
                <div class="ower-name">Alex Renaud</div>
                <div class="ower-sub">doit rembourser Marie</div>
              </div>
              <div class="ower-right">
                <span class="ower-amt" id="amt-2-ar">22.25€</span>
                <button class="btn-mark-paid" onclick="markPaid('2','ar',this)">✓ Payé</button>
              </div>
            </div>
            <div class="ower-row">
              <div class="ower-av av-d">TM</div>
              <div class="ower-info">
                <div class="ower-name">Tom Martin</div>
                <div class="ower-sub">doit rembourser Marie</div>
              </div>
              <div class="ower-right">
                <span class="ower-amt" id="amt-2-tm">22.25€</span>
                <button class="btn-mark-paid" onclick="markPaid('2','tm',this)">✓ Payé</button>
              </div>
            </div>
          </div>
          <div class="exp-footer">
            <span class="exp-split-info">Divisé entre 4 membres · 22.25€ / pers.</span>
            <div class="exp-actions">
              <button class="btn-sm-edit">✎ Modifier</button>
              <button class="btn-sm-del">✕ Supprimer</button>
            </div>
          </div>
        </div>

        <!-- CARD 3: Netflix -->
        <div class="exp-card" id="card-3">
          <div class="exp-top">
            <div class="exp-cat-stripe stripe-gray"></div>
            <div class="exp-header-row">
              <div>
                <div class="exp-title">Netflix</div>
                <div class="exp-date">15 fév. 2026</div>
              </div>
              <div class="exp-amount neutral">17€</div>
            </div>
            <div class="exp-meta-row">
              <span class="tag tg-gray">Loisirs</span>
              <span id="status-3" class="tag tg-paid">✓ Soldé</span>
              <div class="exp-payer-row">
                <span class="payer-label">payé par</span>
                <div class="mini-av av-c">AR</div>
                <span class="payer-name">Alex</span>
              </div>
            </div>
          </div>
          <div class="exp-body">
            <div class="owers-label">Qui doit combien</div>
            <div class="ower-row">
              <div class="ower-av" style="background:linear-gradient(135deg,#c9a84c,#7a5c1a);color:#0a0a0a;">JD</div>
              <div class="ower-info">
                <div class="ower-name">Jean Dupont</div>
                <div class="ower-sub">a remboursé Alex ✓</div>
              </div>
              <div class="ower-right">
                <span class="ower-amt paid-amt">4.25€</span>
                <button class="btn-mark-paid already-paid" disabled>✓ Payé</button>
              </div>
            </div>
            <div class="ower-row">
              <div class="ower-av av-b">ML</div>
              <div class="ower-info">
                <div class="ower-name">Marie Leclerc</div>
                <div class="ower-sub">a remboursé Alex ✓</div>
              </div>
              <div class="ower-right">
                <span class="ower-amt paid-amt">4.25€</span>
                <button class="btn-mark-paid already-paid" disabled>✓ Payé</button>
              </div>
            </div>
            <div class="ower-row">
              <div class="ower-av av-d">TM</div>
              <div class="ower-info">
                <div class="ower-name">Tom Martin</div>
                <div class="ower-sub">a remboursé Alex ✓</div>
              </div>
              <div class="ower-right">
                <span class="ower-amt paid-amt">4.25€</span>
                <button class="btn-mark-paid already-paid" disabled>✓ Payé</button>
              </div>
            </div>
          </div>
          <div class="exp-footer">
            <div class="paid-banner">
              <div class="paid-check">✓</div> Tous les remboursements reçus
            </div>
            <div class="exp-actions">
              <button class="btn-sm-edit">✎ Modifier</button>
              <button class="btn-sm-del">✕ Supprimer</button>
            </div>
          </div>
        </div>

        <!-- CARD 4: Loyer -->
        <div class="exp-card" id="card-4">
          <div class="exp-top">
            <div class="exp-cat-stripe stripe-gold"></div>
            <div class="exp-header-row">
              <div>
                <div class="exp-title">Loyer Février</div>
                <div class="exp-date">01 fév. 2026</div>
              </div>
              <div class="exp-amount payer">2 400€</div>
            </div>
            <div class="exp-meta-row">
              <span class="tag tg-gold">Loyer</span>
              <span id="status-4" class="tag tg-pending">En attente</span>
              <div class="exp-payer-row">
                <span class="payer-label">payé par</span>
                <div class="mini-av" style="background:linear-gradient(135deg,#c9a84c,#7a5c1a);color:#0a0a0a;">JD</div>
                <span class="payer-name">Jean</span>
              </div>
            </div>
          </div>
          <div class="exp-body">
            <div class="owers-label">Qui doit combien</div>
            <div class="ower-row">
              <div class="ower-av av-b">ML</div>
              <div class="ower-info">
                <div class="ower-name">Marie Leclerc</div>
                <div class="ower-sub">doit rembourser Jean</div>
              </div>
              <div class="ower-right">
                <span class="ower-amt" id="amt-4-ml">600€</span>
                <button class="btn-mark-paid" onclick="markPaid('4','ml',this)">✓ Payé</button>
              </div>
            </div>
            <div class="ower-row">
              <div class="ower-av av-c">AR</div>
              <div class="ower-info">
                <div class="ower-name">Alex Renaud</div>
                <div class="ower-sub">doit rembourser Jean</div>
              </div>
              <div class="ower-right">
                <span class="ower-amt" id="amt-4-ar">600€</span>
                <button class="btn-mark-paid" onclick="markPaid('4','ar',this)">✓ Payé</button>
              </div>
            </div>
            <div class="ower-row">
              <div class="ower-av av-d">TM</div>
              <div class="ower-info">
                <div class="ower-name">Tom Martin</div>
                <div class="ower-sub">doit rembourser Jean</div>
              </div>
              <div class="ower-right">
                <span class="ower-amt" id="amt-4-tm">600€</span>
                <button class="btn-mark-paid" onclick="markPaid('4','tm',this)">✓ Payé</button>
              </div>
            </div>
          </div>
          <div class="exp-footer">
            <span class="exp-split-info">Divisé entre 4 membres · 600€ / pers.</span>
            <div class="exp-actions">
              <button class="btn-sm-edit">✎ Modifier</button>
              <button class="btn-sm-del">✕ Supprimer</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>

  <script>
    // Track payment state per card
  const paymentState = {
    '1': { ml: false, ar: false, tm: false },
    '2': { jd: false, ar: false, tm: false },
    '4': { ml: false, ar: false, tm: false }
  };

  function markPaid(cardId, person, btn) {
    if (!paymentState[cardId]) return;
    paymentState[cardId][person] = true;

    // Update button
    btn.classList.add('already-paid');
    btn.disabled = true;
    btn.textContent = '✓ Payé';

    // Update amount display
    const amtEl = document.getElementById(`amt-${cardId}-${person}`);
    if (amtEl) amtEl.classList.add('paid-amt');

    // Update ower sub text
    const owerRow = btn.closest('.ower-row');
    if (owerRow) {
      const sub = owerRow.querySelector('.ower-sub');
      if (sub) sub.textContent = 'a remboursé ✓';
    }

    // Check if all paid
    const state = paymentState[cardId];
    const allPaid = Object.values(state).every(v => v === true);

    if (allPaid) {
      // Update status badge
      const statusEl = document.getElementById(`status-${cardId}`);
      if (statusEl) {
        statusEl.className = 'tag tg-paid';
        statusEl.textContent = '✓ Soldé';
      }

      // Update footer
      const footer = document.querySelector(`#card-${cardId} .exp-footer`);
      if (footer) {
        footer.innerHTML = `<div class="paid-banner"><div class="paid-check">✓</div> Tous les remboursements reçus</div>
        <div class="exp-actions">
          <button class="btn-sm-edit">✎ Modifier</button>
          <button class="btn-sm-del">✕ Supprimer</button>
        </div>`;
      }

      // Dim card
      document.getElementById(`card-${cardId}`).classList.add('paid');
    }
  }

  // Sidebar nav
  document.querySelectorAll('.nav-item').forEach(t => {
    t.addEventListener('click', function() {
      document.querySelectorAll('.nav-item').forEach(x => x.classList.remove('active'));
      this.classList.add('active');
    });
  });
  </script>

</body>

</html>