<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SPORTSPACE</title>

    <style>
        :root {
            --navy: #102448;
            --navy-dark: #0b1b36;
            --blue: #2563eb;
            --bg: #f3f6fc;
            --text: #14213d;
            --muted: #71809d;
            --border: #e5ebf5;
            --white: #fff;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        a { color: inherit; text-decoration: none; }

        .layout { min-height: 100vh; }

        .sidebar {
            width: 296px;
            position: fixed;
            inset: 0 auto 0 0;
            background: linear-gradient(180deg, var(--navy), var(--navy-dark));
            color: white;
            padding: 24px 16px;
            overflow-y: auto;
            z-index: 20;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 68px;
            padding: 0 12px;
            margin-bottom: 30px;
        }

        .brand img {
            width: 52px;
            height: 52px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 25px;
            font-weight: 900;
            letter-spacing: -.8px;
            white-space: nowrap;
        }

        .brand-name span { color: #60a5fa; }

        .nav-label {
            color: #8fa9d0;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1px;
            margin: 28px 14px 12px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            min-height: 54px;
            padding: 12px 15px;
            margin-bottom: 7px;
            border-radius: 13px;
            color: #eaf0ff;
            font-size: 14px;
            font-weight: 650;
            transition: .2s;
        }

        .nav-link:hover { background: #203b65; }

        .nav-link.active {
            background: var(--blue);
            color: white;
            box-shadow: 0 7px 18px #0002;
        }

        .nav-icon {
            width: 23px;
            height: 23px;
            flex-shrink: 0;
        }

        .nav-divider {
            border: 0;
            border-top: 1px solid #2a4267;
            margin: 24px 12px;
        }

        .main { margin-left: 296px; min-width: 0; }

        .topbar {
            min-height: 88px;
            padding: 18px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            background: white;
            border-bottom: 1px solid var(--border);
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 12px;
            width: min(600px, 65%);
            padding: 14px 18px;
            background: #f5f8fe;
            border: 1px solid #e4ebf6;
            border-radius: 13px;
            color: var(--muted);
        }

        .search-box svg { width: 20px; height: 20px; flex-shrink: 0; }

        .search-box input {
            width: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            font-size: 14px;
            color: var(--text);
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 12px;
            white-space: nowrap;
        }

        .avatar {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 18px;
            font-weight: 800;
        }

        .admin-name { font-weight: 800; font-size: 14px; }
        .admin-role { margin-top: 4px; color: var(--muted); font-size: 12px; }

        .content { padding: 30px 32px 40px; max-width: 1700px; margin: auto; }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            flex-wrap: wrap;
            margin-bottom: 26px;
        }

        h1 { font-size: 32px; margin: 0 0 8px; letter-spacing: -.7px; }
        .subtitle { color: var(--muted); margin: 0; font-size: 15px; }

        .date-pill {
            padding: 13px 16px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            color: #425577;
            font-size: 13px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card, .panel, .quick-link {
            background: white;
            border: 1px solid var(--border);
            border-radius: 19px;
            box-shadow: 0 4px 16px #18345a05;
        }

        .stat-card { padding: 22px 24px; min-width: 0; }

        .stat-icon {
            width: 51px;
            height: 51px;
            border-radius: 15px;
            display: grid;
            place-items: center;
            margin-bottom: 15px;
        }

        .stat-icon svg { width: 25px; height: 25px; }
        .icon-blue { background: #e2edff; color: #2563eb; }
        .icon-green { background: #d9fbe7; color: #059669; }
        .icon-yellow { background: #fff3c4; color: #d97706; }
        .icon-red { background: #ffe3e3; color: #dc2626; }
        .icon-purple { background: #eee7ff; color: #7c3aed; }

        .stat-label { color: var(--muted); font-size: 14px; margin-bottom: 9px; }
        .stat-number { font-size: 34px; font-weight: 850; letter-spacing: -1px; }
        .stat-note { margin-top: 8px; font-size: 12px; color: var(--muted); }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 24px;
        }

        .quick-link {
            min-height: 70px;
            padding: 15px 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 14px;
            font-weight: 750;
            transition: transform .2s, box-shadow .2s;
        }

        .quick-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px #18345a0d;
        }

        .quick-icon {
            width: 43px;
            height: 43px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
        }

        .quick-icon svg { width: 23px; height: 23px; }
        .quick-arrow { margin-left: auto; color: #61728f; font-size: 23px; }

        .analytics-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.65fr) minmax(290px, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        .panel { padding: 24px; min-width: 0; }
        .panel-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 25px;
        }

        .panel-heading h2 { font-size: 18px; margin: 0; }

        .small-label {
            padding: 8px 11px;
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--blue);
            font-size: 12px;
        }

        .chart {
            height: 235px;
            display: flex;
            align-items: stretch;
            gap: 12px;
            padding-top: 10px;
        }

        .chart-column {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
        }

        .chart-value {
            font-size: 11px;
            color: var(--muted);
            margin-bottom: 7px;
        }

        .chart-track {
            width: 100%;
            height: 175px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            border-bottom: 1px solid #dce5f2;
            background: repeating-linear-gradient(
                to bottom,
                transparent 0,
                transparent 42px,
                #edf2fa 43px,
                transparent 44px
            );
        }

        .chart-bar {
            width: min(48px, 68%);
            min-height: 4px;
            background: linear-gradient(180deg, #60a5fa, #2563eb);
            border-radius: 8px 8px 0 0;
        }

        .chart-label {
            font-size: 11px;
            color: var(--muted);
            margin-top: 10px;
            white-space: nowrap;
        }

        .payment-item { margin-bottom: 23px; }
        .payment-label {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .payment-name { display: flex; align-items: center; gap: 9px; }
        .dot { width: 10px; height: 10px; border-radius: 50%; }
        .dot-green { background: #16a34a; }
        .dot-yellow { background: #f59e0b; }
        .dot-red { background: #ef4444; }

        .progress {
            height: 8px;
            background: #edf1f7;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-bar { height: 100%; border-radius: 20px; }
        .progress-green { background: #16a34a; }
        .progress-yellow { background: #f59e0b; }
        .progress-red { background: #ef4444; }

        .active-venues {
            margin-top: 24px;
            padding: 14px;
            border-radius: 12px;
            background: #f2f7ff;
            color: #2563eb;
            font-size: 12px;
        }

        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 650px; }
        th, td {
            padding: 15px 12px;
            text-align: left;
            border-bottom: 1px solid #edf1f7;
            font-size: 13px;
        }

        th {
            color: var(--muted);
            background: #f8faff;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        td strong { display: block; margin-bottom: 4px; }
        .muted { color: var(--muted); font-size: 12px; }

        .badge {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 750;
            background: #eef2f7;
            color: #475569;
        }

        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-confirmed, .badge-paid { background: #dcfce7; color: #166534; }
        .badge-completed { background: #dbeafe; color: #1d4ed8; }
        .badge-cancelled, .badge-rejected { background: #fee2e2; color: #991b1b; }

        .venue-list { display: grid; gap: 16px; }
        .venue-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding-bottom: 14px;
            border-bottom: 1px solid #edf1f7;
        }

        .venue-item:last-child { border-bottom: 0; padding-bottom: 0; }
        .venue-name { font-weight: 750; font-size: 13px; }
        .venue-count { color: var(--blue); font-weight: 800; font-size: 13px; }

        .empty-state { padding: 28px 10px; text-align: center; color: var(--muted); font-size: 13px; }

        @media (max-width: 1200px) {
            .sidebar { width: 250px; }
            .main { margin-left: 250px; }
            .brand-name { font-size: 21px; }
            .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .analytics-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 760px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 14px;
            }

            .brand { margin-bottom: 15px; min-height: 55px; }
            .brand img { width: 43px; height: 43px; }
            .brand-name { font-size: 22px; }
            .sidebar nav { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 5px; }
            .nav-label { grid-column: 1 / -1; margin: 15px 8px 6px; }
            .nav-link { min-height: 46px; padding: 10px; font-size: 12px; gap: 8px; margin: 0; }
            .nav-icon { width: 19px; height: 19px; }
            .nav-divider { display: none; }
            .main { margin-left: 0; }
            .topbar { padding: 14px; }
            .search-box { width: 100%; }
            .admin-user { display: none; }
            .content { padding: 22px 14px 30px; }
            h1 { font-size: 27px; }
            .stats-grid { gap: 10px; }
            .stat-card { padding: 16px; border-radius: 15px; }
            .stat-number { font-size: 28px; }
            .stat-icon { width: 43px; height: 43px; }
            .quick-grid { grid-template-columns: 1fr; gap: 10px; }
            .panel { padding: 17px; }
            .chart { gap: 5px; }
            .chart-label { font-size: 9px; }
        }
    </style>
</head>
<body>
<div class="layout">

    <aside class="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <img
                src="{{ asset('image/logosportspace.png') }}"
                alt="Logo SPORTSPACE"
                onerror="this.style.display='none'"
            >
            <span class="brand-name">SPORT<span>SPACE</span></span>
        </a>

        <nav>
            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                Dashboard
            </a>

            <a href="{{ route('admin.bookings.index') }}" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18M8 14h3M8 17h6"/></svg>
                Kelola Booking
            </a>

            <a href="{{ route('admin.payments.index') }}" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 9h20M6 15h4"/></svg>
                Verifikasi Pembayaran
            </a>

            <a href="{{ route('admin.refunds.index') }}" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 11a9 9 0 1 1 2.6 6.4"/><path d="M3 4v7h7"/></svg>
                Kelola Refund
            </a>

            <div class="nav-label">DATA MASTER</div>

            <a href="{{ route('admin.venues.index') }}" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V7l7-4 7 4v14M9 10h2M9 14h2M14 10h2M14 14h2"/></svg>
                Kelola Lapangan
            </a>

            <a href="{{ route('admin.sports.index') }}" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="m12 3 3 5-3 4-5-1-3-5M12 12l5 6-2 3M12 12l9-2M7 11l-2 8"/></svg>
                Kelola Olahraga
            </a>

            <hr class="nav-divider">

            <div class="nav-label">LAINNYA</div>


            <a href="{{ route('profile.edit') }}" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="m19.4 15 .1.1 1.4 1.1-1.5 2.6-1.7-.6a8 8 0 0 1-1.8 1l-.3 1.8h-3l-.3-1.8a8 8 0 0 1-1.8-1l-1.7.6-1.5-2.6 1.4-1.1a8 8 0 0 1 0-2l-1.4-1.1 1.5-2.6 1.7.6a8 8 0 0 1 1.8-1l.3-1.8h3l.3 1.8a8 8 0 0 1 1.8 1l1.7-.6 1.5 2.6-1.4 1.1a8 8 0 0 1 0 2Z"/></svg>
                Pengaturan Profil
            </a>
        </nav>
    </aside>

    <main class="main">
        <header class="topbar">
            <form class="search-box" action="{{ route('admin.bookings.index') }}" method="GET">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m16 16 5 5"/></svg>
                <input type="search" name="search" placeholder="Cari booking, pengguna, atau lapangan...">
            </form>

            <div class="admin-user">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div>
                    <div class="admin-name">{{ auth()->user()->name ?? 'Administrator' }}</div>
                    <div class="admin-role">Administrator</div>
                </div>
            </div>
        </header>

        <div class="content">
            <div class="page-heading">
                <div>
                    <h1>Dashboard</h1>
                    <p class="subtitle">Selamat datang di panel administrator SPORTSPACE.</p>
                </div>
                <div class="date-pill">
                    ◷ {{ now()->translatedFormat('l, d F Y') }}
                </div>
            </div>

            <section class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon icon-blue">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/></svg>
                    </div>
                    <div class="stat-label">Total Booking</div>
                    <div class="stat-number">{{ $totalBookings }}</div>
                    <div class="stat-note">Seluruh data booking</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon icon-green">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>
                    </div>
                    <div class="stat-label">Booking Dikonfirmasi</div>
                    <div class="stat-number">{{ $confirmedBookings }}</div>
                    <div class="stat-note">Status confirmed</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon icon-yellow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                    </div>
                    <div class="stat-label">Menunggu</div>
                    <div class="stat-number">{{ $pendingBookings }}</div>
                    <div class="stat-note">Perlu diperiksa</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon icon-red">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m6 6 12 12M18 6 6 18"/></svg>
                    </div>
                    <div class="stat-label">Booking Dibatalkan</div>
                    <div class="stat-number">{{ $cancelledBookings }}</div>
                    <div class="stat-note">Status cancelled</div>
                </div>
            </section>

            <section class="quick-grid">
                <a href="{{ route('admin.venues.index') }}" class="quick-link">
                    <span class="quick-icon icon-green">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M12 3v18M3 12h18M7 7h2M15 17h2"/></svg>
                    </span>
                    Kelola Lapangan <span class="quick-arrow">›</span>
                </a>

                <a href="{{ route('admin.sports.index') }}" class="quick-link">
                    <span class="quick-icon icon-purple">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 21h8M12 17v4M5 3h14v7a7 7 0 0 1-14 0V3ZM5 6H2v3a5 5 0 0 0 5 5M19 6h3v3a5 5 0 0 1-5 5"/></svg>
                    </span>
                    Kelola Olahraga <span class="quick-arrow">›</span>
                </a>

                <a href="{{ route('admin.payments.index') }}" class="quick-link">
                    <span class="quick-icon icon-blue">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 9h20M6 15h5"/></svg>
                    </span>
                    Verifikasi Pembayaran <span class="quick-arrow">›</span>
                </a>

                <a href="{{ route('admin.refunds.index') }}" class="quick-link">
                    <span class="quick-icon icon-red">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 11a9 9 0 1 1 2.6 6.4"/><path d="M3 4v7h7"/></svg>
                    </span>
                    Kelola Refund <span class="quick-arrow">›</span>
                </a>

                <a href="{{ route('admin.bookings.index') }}" class="quick-link">
                    <span class="quick-icon icon-blue">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>
                    </span>
                    Lihat Semua Booking <span class="quick-arrow">›</span>
                </a>

                <a href="{{ route('dashboard') }}" class="quick-link">
                    <span class="quick-icon icon-purple">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="8" r="4"/><path d="M2 21v-2a7 7 0 0 1 14 0v2M16 4a4 4 0 0 1 0 8"/></svg>
                    </span>
                    Dashboard Pengguna <span class="quick-arrow">›</span>
                </a>
            </section>

            <section class="analytics-grid">
                <div class="panel">
                    <div class="panel-heading">
                        <h2>Statistik Booking 7 Hari Terakhir</h2>
                        <span class="small-label">Per hari</span>
                    </div>

                    <div class="chart">
                        @php
                            $maxChartValue = max(1, max($chartValues ?: [0]));
                        @endphp

                        @foreach ($chartLabels as $index => $label)
                            @php
                                $value = (int) ($chartValues[$index] ?? 0);
                                $height = ($value / $maxChartValue) * 100;
                            @endphp
                            <div class="chart-column">
                                <div class="chart-value">{{ $value }}</div>
                                <div class="chart-track">
                                    <div class="chart-bar" style="height: {{ max(2, $height) }}%;"></div>
                                </div>
                                <div class="chart-label">{{ $label }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <h2>Status Pembayaran</h2>
                    </div>

                    @php
                        $paidCount = $paidBookings;
                        $unpaidCount = $unpaidBookings;
                        $rejectedCount = $rejectedPayments;
                        $paymentTotal = max(1, $paidCount + $unpaidCount + $rejectedCount);
                    @endphp

                    <div class="payment-item">
                        <div class="payment-label">
                            <span class="payment-name"><span class="dot dot-green"></span>Dibayar</span>
                            <strong>{{ $paidCount }}</strong>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-green" style="width: {{ ($paidCount / $paymentTotal) * 100 }}%"></div>
                        </div>
                    </div>

                    <div class="payment-item">
                        <div class="payment-label">
                            <span class="payment-name"><span class="dot dot-yellow"></span>Belum dibayar</span>
                            <strong>{{ $unpaidCount }}</strong>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-yellow" style="width: {{ ($unpaidCount / $paymentTotal) * 100 }}%"></div>
                        </div>
                    </div>

                    <div class="payment-item">
                        <div class="payment-label">
                            <span class="payment-name"><span class="dot dot-red"></span>Ditolak</span>
                            <strong>{{ $rejectedCount }}</strong>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-red" style="width: {{ ($rejectedCount / $paymentTotal) * 100 }}%"></div>
                        </div>
                    </div>

                    <div class="active-venues">
                        ♧ Lapangan aktif: {{ $activeVenues }} dari {{ $totalVenues }} lapangan
                    </div>
                </div>
            </section>

            <section class="panel" style="margin-bottom:24px">
                <div class="panel-heading">
                    <h2>Booking Terbaru</h2>
                    <a href="{{ route('admin.bookings.index') }}" class="small-label">Lihat semua </a>
                </div>

                @if ($latestBookings->isNotEmpty())
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID Booking</th>
                                    <th>Pengguna</th>
                                    <th>Lapangan</th>
                                    <th>Status Booking</th>
                                    <th>Pembayaran</th>
                                    <th>Tanggal Dibuat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestBookings as $booking)
                                    @php
                                        $status = strtolower($booking->status ?? 'unknown');
                                        $payment = strtolower($booking->payment_status ?? 'unknown');
                                    @endphp
                                    <tr>
                                        <td><strong>#{{ $booking->id }}</strong></td>
                                        <td>
                                            <strong>{{ $booking->user?->name ?? 'Pengguna' }}</strong>
                                            <span class="muted">{{ $booking->user?->email ?? '-' }}</span>
                                        </td>
                                        <td>{{ $booking->venue?->name ?? 'Lapangan' }}</td>
                                        <td>
                                            <span class="badge badge-{{ in_array($status, ['pending','confirmed','completed','cancelled']) ? $status : 'unknown' }}">
                                                {{ ucfirst($status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ in_array($payment, ['paid','rejected']) ? $payment : 'pending' }}">
                                                {{ ucfirst($payment) }}
                                            </span>
                                        </td>
                                        <td>{{ $booking->created_at?->format('d-m-Y') ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">Belum ada data booking.</div>
                @endif
            </section>

            <section class="panel">
                <div class="panel-heading">
                    <h2>Lapangan Populer</h2>
                    <a href="{{ route('admin.venues.index') }}" class="small-label">Kelola lapangan </a>
                </div>

                @if ($popularVenues->isNotEmpty())
                    <div class="venue-list">
                        @foreach ($popularVenues as $venue)
                            <div class="venue-item">
                                <div>
                                    <div class="venue-name">{{ $venue->name }}</div>
                                    <div class="muted">{{ $venue->location ?? 'Lokasi tidak tersedia' }}</div>
                                </div>
                                <div class="venue-count">{{ $venue->bookings_count }} booking</div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">Belum ada data lapangan.</div>
                @endif
            </section>
        </div>
    </main>
</div>
</body>
</html>
