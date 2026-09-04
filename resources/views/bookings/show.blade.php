<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pesanan - SPORTSPACE</title>

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
            --background: #f4f7fb;
            --card: #ffffff;
            --text: #172033;
            --muted: #7b8798;
            --border: #e5eaf1;
            --success: #16a34a;
            --warning: #ea580c;
            --danger: #dc2626;
        }

        body {
            min-width: 320px;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        .detail-page {
            width: 100%;
            max-width: 850px;
            min-height: 100vh;
            margin: 0 auto;
            padding-bottom: 30px;
        }

        /* HEADER */

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
        }

        .back-button:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .page-header h1 {
            font-size: clamp(19px, 4vw, 22px);
        }

        /* CONTENT */

        .content {
            width: 100%;
            padding: 20px;
        }

        .section {
            margin-bottom: 18px;
            padding: 18px;

            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;

            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.04);
        }

        .section-title {
            margin-bottom: 16px;
            font-size: 17px;
        }

        /* STATUS */

        .status-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .booking-code-label {
            margin-bottom: 5px;
            color: var(--muted);
            font-size: 12px;
        }

        .booking-code {
            font-size: 15px;
            font-weight: 800;
        }

        .status {
            display: inline-flex;
            align-items: center;
            flex-shrink: 0;

            padding: 7px 11px;
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

        /* LAPANGAN */

        .venue-info {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .venue-image {
            width: 105px;
            height: 105px;
            flex-shrink: 0;

            overflow: hidden;
            border-radius: 16px;
            background: #e2e8f0;
        }

        .venue-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .venue-text {
            min-width: 0;
        }

        .venue-text h2 {
            margin-bottom: 8px;
            font-size: 18px;
            line-height: 1.4;
        }

        .venue-location {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.5;
        }

        /* DETAIL BOOKING */

        .detail-list {
            display: flex;
            flex-direction: column;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;

            padding: 14px 0;
            border-bottom: 1px solid var(--border);
        }

        .detail-row:first-child {
            padding-top: 0;
        }

        .detail-row:last-child {
            padding-bottom: 0;
            border-bottom: none;
        }

        .detail-label {
            flex-shrink: 0;
            color: var(--muted);
            font-size: 14px;
        }

        .detail-value {
            text-align: right;
            font-size: 14px;
            font-weight: 700;
            line-height: 1.5;
        }

        /* TOTAL */

        .total-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .total-label {
            color: var(--muted);
            font-size: 14px;
        }

        .total-price {
            color: var(--primary);
            font-size: clamp(20px, 5vw, 26px);
            font-weight: 900;
            text-align: right;
        }

        /* BUTTON */

        .action-button {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 100%;
            min-height: 52px;

            border-radius: 14px;

            background: var(--primary);
            color: #ffffff;

            text-decoration: none;
            font-size: 14px;
            font-weight: 800;

            transition: 0.2s ease;
        }

        .action-button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* TABLET */

        @media (min-width: 600px) {
            .content {
                padding: 28px;
            }

            .page-header {
                padding: 16px 28px;
            }

            .section {
                padding: 22px;
            }
        }

        /* MOBILE */

        @media (max-width: 480px) {
            .content {
                padding: 14px;
            }

            .page-header {
                padding: 13px 14px;
            }

            .section {
                padding: 15px;
                border-radius: 17px;
            }

            .venue-info {
                gap: 12px;
            }

            .venue-image {
                width: 82px;
                height: 82px;
                border-radius: 14px;
            }

            .venue-text h2 {
                font-size: 16px;
            }

            .venue-location {
                font-size: 12px;
            }

            .detail-row {
                gap: 10px;
            }

            .detail-label,
            .detail-value {
                font-size: 13px;
            }
        }

        /* HP KECIL */

        @media (max-width: 360px) {
            .status-box {
                align-items: flex-start;
                flex-direction: column;
            }

            .venue-info {
                align-items: flex-start;
                flex-direction: column;
            }

            .venue-image {
                width: 100%;
                height: 160px;
            }

            .total-box {
                align-items: flex-start;
                flex-direction: column;
            }

            .total-price {
                text-align: left;
            }
        }

    </style>
</head>

<body>

<div class="detail-page">

    {{-- HEADER --}}
    <header class="page-header">

        <a
            href="{{ route('bookings.orders') }}"
            class="back-button"
        >
            ←
        </a>

        <h1>Detail Pesanan</h1>

    </header>


    <main class="content">

        {{-- STATUS --}}
        <section class="section">

            <div class="status-box">

                <div>

                    <div class="booking-code-label">
                        ID Booking
                    </div>

                    <div class="booking-code">
                        #BOOKING-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}
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

        </section>


        {{-- INFORMASI LAPANGAN --}}
        <section class="section">

            <h2 class="section-title">
                Informasi Lapangan
            </h2>

            <div class="venue-info">

                <div class="venue-image">

                    <img
                        src="{{ asset($booking->venue->image) }}"
                        alt="{{ $booking->venue->name }}"
                    >

                </div>

                <div class="venue-text">

                    <h2>
                        {{ $booking->venue->name }}
                    </h2>

                    <p class="venue-location">
                        📍 {{ $booking->venue->location }}
                    </p>

                </div>

            </div>

        </section>


        {{-- DETAIL BOOKING --}}
        <section class="section">

            <h2 class="section-title">
                Detail Booking
            </h2>

            <div class="detail-list">

                <div class="detail-row">

                    <div class="detail-label">
                        Tanggal
                    </div>

                    <div class="detail-value">
                        {{ \Carbon\Carbon::parse($booking->booking_date)->translatedFormat('l, d F Y') }}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="detail-label">
                        Jam Mulai
                    </div>

                    <div class="detail-value">
                        {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="detail-label">
                        Jam Selesai
                    </div>

                    <div class="detail-value">
                        {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="detail-label">
                        Durasi Bermain
                    </div>

                    <div class="detail-value">
                        {{ $booking->duration }} Jam
                    </div>

                </div>


                <div class="detail-row">

                    <div class="detail-label">
                        Harga Lapangan
                    </div>

                    <div class="detail-value">
                        Rp{{ number_format($booking->venue->price_per_hour, 0, ',', '.') }}/jam
                    </div>

                </div>

            </div>

        </section>


        {{-- PEMBAYARAN --}}
        <section class="section">

            <h2 class="section-title">
                Rincian Pembayaran
            </h2>

            <div class="total-box">

                <div class="total-label">
                    Total Pembayaran
                </div>

                <div class="total-price">
                    Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                </div>

            </div>

        </section>


        {{-- TOMBOL --}}
        <a
            href="{{ route('bookings.orders') }}"
            class="action-button"
        >
            Kembali ke Pesanan
        </a>

    </main>

</div>

</body>
</html>