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
            padding-bottom: 90px;
        }

        .orders-app {
            width: 100%;
            max-width: 850px;
            min-height: 100vh;
            margin: 0 auto;
            background: var(--background);
        }

        /* =========================
           HEADER
        ========================= */

        .page-header {
            position: sticky;
            top: 0;
            z-index: 20;

            display: flex;
            align-items: center;
            gap: 14px;

            padding: 14px 20px;

            background: rgba(255, 255, 255, 0.97);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(12px);
        }

        .back-button {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 42px;
            height: 42px;
            flex-shrink: 0;

            border-radius: 13px;
            background: #f1f5f9;

            color: var(--text);
            text-decoration: none;

            font-size: 24px;
            font-weight: bold;

            transition: 0.2s ease;
        }

        .back-button:hover {
            background: var(--primary-light);
            color: var(--primary);
            transform: translateX(-2px);
        }

        .page-header h1 {
            font-size: clamp(19px, 4vw, 22px);
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            width: 100%;
            padding: 20px;
        }

        .page-description {
            margin-bottom: 20px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.5;
        }

        /* =========================
           FILTER STATUS
        ========================= */

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
            transition: 0.2s ease;
        }

        .status-tab:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .status-tab.active {
            background: var(--primary);
            border-color: var(--primary);
            color: #ffffff;
        }

        /* =========================
           ORDER CARD
        ========================= */

        .order-card {
            margin-bottom: 16px;

            overflow: hidden;

            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;

            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.05);
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

        .order-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
        }

        .order-info h2 {
            margin-bottom: 7px;

            overflow: hidden;

            font-size: 17px;
            line-height: 1.4;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .order-location {
            margin-bottom: 10px;

            overflow: hidden;

            color: var(--muted);
            font-size: 13px;

            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* STATUS */

        .status {
            display: inline-flex;
            align-items: center;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 11px;
            font-weight: 800;

            white-space: nowrap;
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

        /* =========================
           DETAIL
        ========================= */

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
            overflow: hidden;

            color: var(--text);
            font-size: 13px;
            font-weight: 800;

            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* =========================
           FOOTER CARD
        ========================= */

        .order-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;

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

        .detail-button {
            flex-shrink: 0;

            padding: 10px 14px;

            border: 1px solid var(--primary);
            border-radius: 11px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 12px;
            font-weight: 800;

            cursor: pointer;
            transition: 0.2s ease;
        }

        .detail-button:hover {
            background: var(--primary);
            color: #ffffff;
        }

        /* =========================
           EMPTY STATE
        ========================= */

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
            color: #ffffff;

            text-decoration: none;

            font-size: 14px;
            font-weight: 800;

            transition: 0.2s ease;
        }

        .home-button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* =========================
           TABLET
        ========================= */

        @media (min-width: 600px) {
            .content {
                padding: 28px;
            }

            .page-header {
                padding: 16px 28px;
            }

            .order-main {
                padding: 18px;
            }
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 480px) {
            .content {
                padding: 14px;
            }

            .page-header {
                padding: 13px 14px;
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

            .status {
                padding: 5px 8px;
                font-size: 10px;
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

            .detail-button {
                padding: 9px 11px;
            }
        }

        /* =========================
           HP KECIL
        ========================= */

        @media (max-width: 360px) {
            .order-main {
                flex-direction: column;
            }

            .order-image {
                width: 100%;
                height: 150px;
            }

            .order-info h2,
            .order-location {
                white-space: normal;
            }

            .order-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .detail-button {
                width: 100%;
            }
        }

    </style>
</head>

<body>

<div class="orders-app">

    {{-- HEADER --}}
    <header class="page-header">

        <a
            href="{{ route('dashboard') }}"
            class="back-button"
        >
            ←
        </a>

        <h1>Pesanan Saya</h1>

    </header>


    <main class="content">

        <p class="page-description">
            Lihat semua pesanan dan status booking lapangan kamu di sini.
        </p>


        {{-- FILTER --}}
        <div class="status-tabs">

            <button
                type="button"
                class="status-tab active"
                data-filter="all"
            >
                Semua
            </button>

            <button
                type="button"
                class="status-tab"
                data-filter="pending"
            >
                Menunggu
            </button>

            <button
                type="button"
                class="status-tab"
                data-filter="confirmed"
            >
                Dikonfirmasi
            </button>

            <button
                type="button"
                class="status-tab"
                data-filter="cancelled"
            >
                Dibatalkan
            </button>

        </div>


        {{-- LIST PESANAN --}}
        <div id="ordersContainer">

            @forelse ($bookings as $booking)

                <div
                    class="order-card"
                    data-status="{{ $booking->status }}"
                >

                    <div class="order-main">

                        <div class="order-image">

                            <img
                                src="{{ asset($booking->venue->image) }}"
                                alt="{{ $booking->venue->name }}"
                            >

                        </div>


                        <div class="order-info">

                            <div class="order-top">

                                <div>

                                    <h2>
                                        {{ $booking->venue->name }}
                                    </h2>

                                    <p class="order-location">
                                        📍 {{ $booking->venue->location }}
                                    </p>

                                </div>

                            </div>


                            <span class="status {{ $booking->status }}">

                                @if ($booking->status === 'pending')
                                    Menunggu Pembayaran
                                @elseif ($booking->status === 'confirmed')
                                    Dikonfirmasi
                                @elseif ($booking->status === 'cancelled')
                                    Dibatalkan
                                @else
                                    {{ ucfirst($booking->status) }}
                                @endif

                            </span>

                        </div>

                    </div>


                    <div class="order-details">

                        <div class="detail-item">

                            <div class="detail-label">
                                TANGGAL
                            </div>

                            <div class="detail-value">
                                {{ \Carbon\Carbon::parse($booking->booking_date)->translatedFormat('d M Y') }}
                            </div>

                        </div>


                        <div class="detail-item">

                            <div class="detail-label">
                                JAM
                            </div>

                            <div class="detail-value">
                                {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}
                            </div>

                        </div>


                        <div class="detail-item">

                            <div class="detail-label">
                                DURASI
                            </div>

                            <div class="detail-value">
                                {{ $booking->duration }} Jam
                            </div>

                        </div>

                    </div>


                    <div class="order-footer">

                        <div>

                            <div class="total-label">
                                Total Pembayaran
                            </div>

                            <div class="total-price">
                                Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                            </div>

                        </div>


                       <a href="{{ route('bookings.show', $booking) }}"
                          class="detail-button"
                          style="text-decoration: none;"
                       >
                         Detail
                       </a>

                    </div>

                </div>

            @empty

                <div class="empty-orders">

                    <div class="empty-icon">
                        📋
                    </div>

                    <h2>Belum Ada Pesanan</h2>

                    <p>
                        Kamu belum memiliki pesanan. Yuk cari lapangan
                        dan lakukan booking sekarang!
                    </p>

                    <a
                        href="{{ route('dashboard') }}"
                        class="home-button"
                    >
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

    statusTabs.forEach(function(tab) {

        tab.addEventListener('click', function() {

            statusTabs.forEach(function(item) {
                item.classList.remove('active');
            });

            this.classList.add('active');

            const filter = this.dataset.filter;

            orderCards.forEach(function(card) {

                if (
                    filter === 'all' ||
                    card.dataset.status === filter
                ) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }

            });

        });

    });
</script>

</body>
</html>