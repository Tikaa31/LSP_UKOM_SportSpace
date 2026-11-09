<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - SPORTSPACE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #eff6ff;
            --text: #172033;
            --muted: #7b8798;
            --border: #e5eaf1;
            --background: #f4f7fb;
            --card: #ffffff;
            --success: #16a34a;
            --warning: #ea580c;
            --danger: #dc2626;
        }

        body {
            min-width: 320px;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            padding-bottom: 40px;
        }

        .orders-app {
            width: 100%;
            max-width: 850px;
            min-height: 100vh;
            margin: 0 auto;
        }

        /* HEADER SPORTSPACE */
        .page-header {
            position: sticky;
            top: 12px;
            z-index: 20;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            width: calc(100% - 32px);
            margin: 12px auto 0;
            padding: 16px 20px;
            background: rgba(255, 255, 255, .98);
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, .06);
            backdrop-filter: blur(12px);
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 13px;
            min-width: 0;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            object-fit: contain;
        }

        .header-text {
            min-width: 0;
        }

        .brand-name {
            margin-bottom: 3px;
            color: var(--primary);
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1.5px;
        }

        .page-header h1 {
            color: var(--text);
            font-size: clamp(18px, 3vw, 22px);
            line-height: 1.25;
        }

        .header-caption {
            margin-top: 4px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.4;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 42px;
            flex-shrink: 0;
            padding: 0 15px;
            border: 1px solid #dbeafe;
            border-radius: 12px;
            background: var(--primary-light);
            color: var(--primary);
            text-decoration: none;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: .2s ease;
        }

        .back-button:hover {
            background: var(--primary);
            color: #fff;
        }

        .back-button svg {
            width: 18px;
            height: 18px;
        }

        .content {
            width: 100%;
            padding: 20px;
        }

        .page-description {
            margin-bottom: 20px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .alert {
            padding: 13px 15px;
            margin-bottom: 16px;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.5;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .status-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 22px;
            padding-bottom: 4px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .status-tabs::-webkit-scrollbar {
            display: none;
        }

        .status-tab {
            flex-shrink: 0;
            padding: 10px 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--card);
            color: var(--muted);
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        .status-tab.active {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }

        .order-card {
            margin-bottom: 16px;
            overflow: hidden;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
        }

        .order-main {
            display: flex;
            gap: 15px;
            padding: 16px;
        }

        .order-image {
            width: 105px;
            height: 105px;
            flex-shrink: 0;
            overflow: hidden;
            border-radius: 15px;
            background: #e2e8f0;
        }

        .order-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .order-info {
            flex: 1;
            min-width: 0;
        }

        .order-info h2 {
            margin-bottom: 7px;
            overflow-wrap: anywhere;
            font-size: 17px;
            line-height: 1.4;
        }

        .order-location {
            margin-bottom: 10px;
            color: var(--muted);
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
        }

        .status.pending {
            background: #fff7ed;
            color: var(--warning);
        }

        .status.confirmed {
            background: #ecfdf5;
            color: var(--success);
        }

        .status.cancelled {
            background: #fef2f2;
            color: var(--danger);
        }

        .order-details {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .detail-item {
            min-width: 0;
            padding: 14px 12px;
        }

        .detail-item:not(:last-child) {
            border-right: 1px solid var(--border);
        }

        .detail-label {
            margin-bottom: 6px;
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
        }

        .detail-value {
            overflow-wrap: anywhere;
            color: var(--text);
            font-size: 13px;
            font-weight: 800;
        }

        .order-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding: 15px 16px;
        }

        .total-label {
            margin-bottom: 4px;
            color: var(--muted);
            font-size: 11px;
        }

        .total-price {
            color: var(--primary);
            font-size: 18px;
            font-weight: 900;
        }

        .order-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .detail-button,
        .cancel-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 10px 14px;
            border-radius: 11px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 800;
            text-decoration: none;
            cursor: pointer;
            transition: .2s ease;
        }

        .detail-button {
            border: 1px solid var(--primary);
            background: var(--primary-light);
            color: var(--primary);
        }

        .detail-button:hover {
            background: var(--primary);
            color: #fff;
        }

        .cancel-button {
            border: 1px solid #fecaca;
            background: #fef2f2;
            color: var(--danger);
        }

        .cancel-button:hover {
            background: var(--danger);
            color: #fff;
        }

        .cancel-note {
            width: 100%;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.5;
        }

        .empty-orders {
            padding: 55px 20px;
            text-align: center;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
        }

        .empty-icon {
            margin-bottom: 15px;
            font-size: 52px;
        }

        .empty-orders h2 {
            margin-bottom: 9px;
            font-size: 20px;
        }

        .empty-orders p {
            max-width: 400px;
            margin: 0 auto 22px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .home-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            padding: 0 20px;
            border-radius: 13px;
            background: var(--primary);
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
        }

        @media (min-width: 600px) {
            .content {
                padding: 28px;
            }

            .page-header {
                padding: 16px 22px;
            }

            .order-main {
                padding: 18px;
            }
        }

        @media (max-width: 480px) {
            .content {
                padding: 14px;
            }

            .page-header {
                top: 8px;
                width: calc(100% - 20px);
                margin-top: 8px;
                padding: 12px;
                gap: 8px;
                border-radius: 16px;
            }

            .header-brand {
                gap: 9px;
            }

            .brand-logo {
                width: 38px;
                height: 38px;
            }

            .brand-name {
                font-size: 9px;
                letter-spacing: 1px;
            }

            .page-header h1 {
                font-size: 16px;
            }

            .header-caption {
                font-size: 10px;
            }

            .back-button {
                min-height: 38px;
                gap: 5px;
                padding: 0 9px;
                font-size: 11px;
            }

            .back-button svg {
                width: 16px;
                height: 16px;
            }

            .order-main {
                gap: 12px;
                padding: 13px;
            }

            .order-image {
                width: 82px;
                height: 82px;
                border-radius: 13px;
            }

            .order-info h2 {
                font-size: 15px;
            }

            .order-location {
                font-size: 12px;
            }

            .order-details {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .detail-item:nth-child(2) {
                border-right: none;
            }

            .detail-item:nth-child(-n+2) {
                border-bottom: 1px solid var(--border);
            }

            .detail-item:last-child {
                grid-column: span 2;
            }

            .order-footer {
                padding: 13px;
            }

            .total-price {
                font-size: 16px;
            }

            .order-actions {
                width: 100%;
            }

            .order-actions > * {
                flex: 1;
            }

            .cancel-button,
            .detail-button {
                padding: 10px;
                text-align: center;
            }
        }

        @media (max-width: 360px) {
            .order-main {
                flex-direction: column;
            }

            .order-image {
                width: 100%;
                height: 150px;
            }
        }
    </style>
</head>

<body>
<div class="orders-app">

    <header class="page-header">
        <div class="header-brand">
            <img
                src="{{ asset('image/logosportspace.png') }}"
                alt="SPORTSPACE"
                class="brand-logo"
            >

            <div class="header-text">
                <div class="brand-name">SPORTSPACE</div>
                <h1>Pesanan Saya</h1>
                <p class="header-caption">
                    Pantau status dan detail booking kamu
                </p>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="back-button">
            <svg viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 aria-hidden="true">
                <path d="M19 12H5"></path>
                <path d="M12 19l-7-7 7-7"></path>
            </svg>
            <span>Kembali</span>
        </a>
    </header>

    <main class="content">
        <p class="page-description">
            Lihat semua pesanan dan status booking lapangan kamu di sini.
        </p>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="status-tabs">
            <button type="button" class="status-tab active" data-filter="all">
                Semua
            </button>

            <button type="button" class="status-tab" data-filter="pending">
                Menunggu
            </button>

            <button type="button" class="status-tab" data-filter="confirmed">
                Dikonfirmasi
            </button>

            <button type="button" class="status-tab" data-filter="cancelled">
                Dibatalkan
            </button>
        </div>

        <div id="ordersContainer">
            @forelse ($bookings as $booking)
                @php
                    $paymentStatus = $booking->payment_status ?? 'unpaid';

                    $displayStatus = $booking->status;

                    if (
                        $booking->status !== 'cancelled'
                        && $paymentStatus === 'paid'
                    ) {
                        $displayStatus = 'confirmed';
                    }

                    $statusLabels = [
                        'pending' => 'Menunggu Pembayaran',
                        'confirmed' => 'Dikonfirmasi',
                        'cancelled' => 'Dibatalkan',
                    ];

                    $statusLabel = $statusLabels[$displayStatus]
                        ?? ucfirst($displayStatus);

                    $startAt = \Carbon\Carbon::parse(
                        $booking->booking_date
                    )->setTimeFromTimeString($booking->start_time);

                    $now = now();

                    /*
                     * Booking lunas:
                     * hanya bisa dibatalkan lebih dari 24 jam sebelum mulai.
                     *
                     * Booking belum lunas:
                     * bisa dibatalkan sebelum jadwal dimulai.
                     */
                    $canCancel = false;

                    if (
                        $booking->status !== 'cancelled'
                        && $paymentStatus === 'paid'
                        && in_array(
                            $booking->status,
                            ['pending', 'confirmed'],
                            true
                        )
                    ) {
                        $canCancel = $now->lt(
                            $startAt->copy()->subHours(24)
                        );
                    } elseif (
                        $booking->status === 'pending'
                        && in_array(
                            $paymentStatus,
                            [
                                'unpaid',
                                'waiting_verification',
                                'rejected'
                            ],
                            true
                        )
                    ) {
                        $canCancel = $now->lt($startAt);
                    }
                @endphp

                <div class="order-card" data-status="{{ $displayStatus }}">
                    <div class="order-main">
                        <div class="order-image">
                            <img
                                src="{{ asset($booking->venue->image) }}"
                                alt="{{ $booking->venue->name }}"
                                loading="lazy"
                                onerror="this.style.display='none';"
                            >
                        </div>

                        <div class="order-info">
                            <h2>{{ $booking->venue->name }}</h2>

                            <p class="order-location">
                                📍 {{ $booking->venue->location }}
                            </p>

                            <span class="status {{ $displayStatus }}">
                                {{ $statusLabel }}
                            </span>
                        </div>
                    </div>

                    <div class="order-details">
                        <div class="detail-item">
                            <div class="detail-label">TANGGAL</div>
                            <div class="detail-value">
                                {{ \Carbon\Carbon::parse($booking->booking_date)->translatedFormat('d M Y') }}
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-label">JAM</div>
                            <div class="detail-value">
                                {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-label">DURASI</div>
                            <div class="detail-value">
                                {{ $booking->duration }} Jam
                            </div>
                        </div>
                    </div>

                    <div class="order-footer">
                        <div>
                            <div class="total-label">Total Pembayaran</div>
                            <div class="total-price">
                                Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="order-actions">
                            <a
                                href="{{ route('bookings.show', $booking) }}"
                                class="detail-button"
                            >
                                Detail
                            </a>

                            @if ($canCancel)
                                <form
                                    action="{{ route('bookings.cancel', $booking) }}"
                                    method="POST"
                                    class="cancel-form"
                                    onsubmit="return confirm('Yakin ingin membatalkan booking ini?{{ $paymentStatus === 'paid' ? '\n\nPembatalan tidak otomatis mengembalikan dana. Silakan hubungi admin untuk proses pengembalian dana.' : '' }}');"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" class="cancel-button">
                                        Batalkan Booking
                                    </button>
                                </form>
                            @endif
                        </div>

                        @if ($canCancel && $paymentStatus === 'paid')
                            <p class="cancel-note">
                                Pembatalan hanya tersedia lebih dari 24 jam
                                sebelum jadwal. Pengembalian dana diproses terpisah.
                            </p>
                        @elseif ($canCancel)
                            <p class="cancel-note">
                                Booking dapat dibatalkan sebelum jadwal dimulai.
                            </p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="empty-orders">
                    <div class="empty-icon">📋</div>
                    <h2>Belum Ada Pesanan</h2>
                    <p>
                        Kamu belum memiliki pesanan. Yuk cari lapangan
                        dan lakukan booking sekarang!
                    </p>
                    <a href="{{ route('dashboard') }}" class="home-button">
                        Cari Lapangan
                    </a>
                </div>
            @endforelse
        </div>
    </main>
</div>

<script>
    const statusTabs = document.querySelectorAll('.status-tab');
    const orderCards = document.querySelectorAll('.order-card');

    statusTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            statusTabs.forEach(function (item) {
                item.classList.remove('active');
            });

            this.classList.add('active');

            const filter = this.dataset.filter;

            orderCards.forEach(function (card) {
                card.style.display =
                    filter === 'all' || card.dataset.status === filter
                        ? 'block'
                        : 'none';
            });
        });
    });
</script>
</body>
</html>