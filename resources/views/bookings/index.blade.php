<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking Saya - SPORTSPACE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #2563eb;
            --primary-light: #eff6ff;
            --text: #172033;
            --muted: #7b8798;
            --border: #e5eaf1;
            --background: #f4f7fb;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            padding-bottom: 90px;
        }

        .booking-app {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            min-height: 100vh;
        }

        /* HEADER */
        .page-header {
            position: sticky;
            top: 0;
            z-index: 10;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.97);
            border-bottom: 1px solid var(--border);
        }

        .back-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #f1f5f9;
            color: var(--text);
            text-decoration: none;
            font-size: 25px;
            font-weight: bold;
        }

        .page-header h1 {
            font-size: 21px;
        }

        /* CONTENT */
        .content {
            padding: 20px;
        }

        .booking-count {
            margin-bottom: 18px;
            color: var(--muted);
            font-size: 14px;
        }

        /* BOOKING CARD */
        .booking-card {
            margin-bottom: 16px;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.05);
        }

        .booking-top {
            display: flex;
            gap: 14px;
            padding: 14px;
        }

        .booking-image {
            width: 105px;
            height: 105px;
            flex-shrink: 0;
            overflow: hidden;
            border-radius: 15px;
            background: #e2e8f0;
        }

        .booking-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .booking-info {
            flex: 1;
            min-width: 0;
        }

        .booking-info h2 {
            margin-bottom: 7px;
            font-size: 17px;
        }

        .location {
            margin-bottom: 10px;
            color: var(--muted);
            font-size: 13px;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .status.pending {
            background: #fff7ed;
            color: #ea580c;
        }

        .status.confirmed {
            background: #ecfdf5;
            color: #059669;
        }

        .status.cancelled {
            background: #fef2f2;
            color: #dc2626;
        }

        /* DETAIL BOOKING */
        .booking-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            border-top: 1px solid var(--border);
        }

        .detail-item {
            padding: 14px;
            border-bottom: 1px solid var(--border);
        }

        .detail-item:nth-child(odd) {
            border-right: 1px solid var(--border);
        }

        .detail-label {
            margin-bottom: 5px;
            color: var(--muted);
            font-size: 11px;
        }

        .detail-value {
            font-size: 14px;
            font-weight: 700;
        }

        .booking-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 15px;
        }

        .total-label {
            color: var(--muted);
            font-size: 12px;
        }

        .total-price {
            margin-top: 3px;
            color: var(--primary);
            font-size: 18px;
            font-weight: 800;
        }

        /* EMPTY */
        .empty-booking {
            padding: 50px 20px;
            text-align: center;
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 20px;
        }

        .empty-icon {
            margin-bottom: 15px;
            font-size: 50px;
        }

        .empty-booking h2 {
            margin-bottom: 8px;
            font-size: 20px;
        }

        .empty-booking p {
            margin-bottom: 20px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .booking-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 20px;
            border-radius: 13px;
            background: var(--primary);
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
        }

        /* MOBILE */
        @media (max-width: 480px) {
            .content {
                padding: 14px;
            }

            .page-header {
                padding: 14px;
            }

            .booking-image {
                width: 88px;
                height: 88px;
            }

            .booking-info h2 {
                font-size: 16px;
            }

            .booking-details {
                grid-template-columns: 1fr;
            }

            .detail-item:nth-child(odd) {
                border-right: none;
            }
        }
    </style>
</head>

<body>

<div class="booking-app">

    {{-- HEADER --}}
    <header class="page-header">

        <a
            href="{{ route('dashboard') }}"
            class="back-button"
        >
            ←
        </a>

        <h1>Booking Saya</h1>

    </header>


    <main class="content">

        @if ($bookings->count() > 0)

            <p class="booking-count">
                Kamu memiliki {{ $bookings->count() }} booking.
            </p>


            @foreach ($bookings as $booking)

                <div class="booking-card">

                    <div class="booking-top">

                        <div class="booking-image">

                            <img
                                src="{{ asset($booking->venue->image) }}"
                                alt="{{ $booking->venue->name }}"
                            >

                        </div>


                        <div class="booking-info">

                            <h2>
                                {{ $booking->venue->name }}
                            </h2>

                            <p class="location">
                                📍 {{ $booking->venue->location }}
                            </p>


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


                    <div class="booking-details">

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
                                -
                                {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}
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


                        <div class="detail-item">

                            <div class="detail-label">
                                STATUS
                            </div>

                            <div class="detail-value">
                                {{ ucfirst($booking->status) }}
                            </div>

                        </div>

                    </div>


                    <div class="booking-footer">

                        <div>

                            <div class="total-label">
                                Total Pembayaran
                            </div>

                            <div class="total-price">
                                Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                            </div>

                        </div>

                    </div>

                </div>

            @endforeach


        @else

            <div class="empty-booking">

                <div class="empty-icon">
                    📅
                </div>

                <h2>Belum Ada Booking</h2>

                <p>
                    Kamu belum memiliki riwayat booking lapangan.
                    Yuk cari lapangan dan mulai bermain!
                </p>

                <a
                    href="{{ route('dashboard') }}"
                    class="booking-button"
                >
                    Cari Lapangan
                </a>

            </div>

        @endif

    </main>

</div>

</body>
</html>