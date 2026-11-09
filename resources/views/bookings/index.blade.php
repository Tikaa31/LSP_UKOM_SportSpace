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

        /* HEADER SPORTSPACE - BAGIAN YANG DIPERBAIKI */
        .page-header {
            position: sticky;
            top: 12px;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin: 14px 14px 0;
            padding: 16px 20px;
            background: rgba(255, 255, 255, .98);
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .06);
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .header-logo {
            display: block;
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            object-fit: contain;
        }

        .header-brand-text {
            min-width: 0;
        }

        .header-brand-name {
            display: block;
            color: #1d4ed8;
            font-size: 16px;
            font-weight: 800;
            letter-spacing: .6px;
        }

        .header-brand-caption {
            display: block;
            margin-top: 4px;
            color: var(--muted);
            font-size: 11px;
        }

        .header-title {
            margin-top: 3px;
            font-size: 20px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 42px;
            flex-shrink: 0;
            padding: 10px 14px;
            border: 1px solid #dbeafe;
            border-radius: 12px;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: .2s ease;
        }

        .back-button:hover {
            background: #2563eb;
            border-color: #2563eb;
            color: #fff;
        }

        .back-button svg {
            width: 18px;
            height: 18px;
        }

        .content {
            padding: 20px;
        }

        .booking-count {
            margin-bottom: 18px;
            color: var(--muted);
            font-size: 14px;
        }

        .alert {
            padding: 13px 15px;
            margin-bottom: 16px;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.6;
        }

        .alert-success {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }

        .alert-error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .booking-card {
            margin-bottom: 16px;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 24px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
        }

        .booking-top {
            display: flex;
            gap: 18px;
            padding: 18px;
        }

        .booking-image {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 105px;
            height: 105px;
            flex-shrink: 0;
            overflow: hidden;
            border-radius: 18px;
            background: #e2e8f0;
            color: #64748b;
            font-size: 28px;
        }

        .booking-image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .booking-info {
            flex: 1;
            min-width: 0;
        }

        .booking-info h2 {
            margin-bottom: 9px;
            font-size: 18px;
            overflow-wrap: anywhere;
        }

        .location {
            margin-bottom: 12px;
            color: var(--muted);
            font-size: 14px;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
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

        .booking-details {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            border-top: 1px solid var(--border);
        }

        .detail-item {
            padding: 15px 18px;
            border-bottom: 1px solid var(--border);
            min-width: 0;
        }

        .detail-item:nth-child(odd) {
            border-right: 1px solid var(--border);
        }

        .detail-label {
            margin-bottom: 6px;
            color: var(--muted);
            font-size: 12px;
        }

        .detail-value {
            font-size: 15px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .booking-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            padding: 17px 18px;
        }

        .total-label {
            color: var(--muted);
            font-size: 13px;
        }

        .total-price {
            margin-top: 5px;
            color: var(--primary);
            font-size: 23px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .actions form {
            margin: 0;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 13px;
            border: none;
            border-radius: 11px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .2s ease;
        }

        .action-button:hover {
            filter: brightness(.96);
        }

        .button-detail {
            background: #eff6ff;
            color: #1d4ed8;
        }

        .button-cancel {
            background: #fff7ed;
            color: #c2410c;
        }

        .button-delete {
            background: #fef2f2;
            color: #b91c1c;
        }

        .empty-booking {
            padding: 50px 20px;
            text-align: center;
            background: #fff;
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
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
        }

        @media (max-width: 480px) {
            .content {
                padding: 14px;
            }

            .page-header {
                top: 8px;
                margin: 8px 8px 0;
                padding: 12px;
                gap: 10px;
                border-radius: 16px;
            }

            .header-logo {
                width: 36px;
                height: 36px;
            }

            .header-brand {
                gap: 8px;
            }

            .header-brand-name {
                font-size: 13px;
            }

            .header-brand-caption {
                font-size: 9px;
            }

            .header-title {
                font-size: 17px;
            }

            .back-button {
                min-height: 38px;
                gap: 5px;
                padding: 9px 10px;
                font-size: 11px;
            }

            .back-button svg {
                width: 16px;
                height: 16px;
            }

            .booking-top {
                gap: 12px;
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

            .booking-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .actions {
                width: 100%;
            }
        }

        @media (max-width: 360px) {
            .content {
                padding: 10px;
            }

            .booking-top {
                gap: 10px;
                padding: 10px;
            }

            .booking-image {
                width: 76px;
                height: 76px;
            }

            .total-price {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>
<div class="booking-app">

    {{-- HEADER: hanya bagian ini yang diperbaiki --}}
    <header class="page-header">
        <div class="header-brand">
            <img
                src="{{ asset('image/logosportspace.png') }}"
                alt="Logo SPORTSPACE"
                class="header-logo"
            >

            <div class="header-brand-text">
                <span class="header-brand-name">SPORTSPACE</span>
                <h1 class="header-title">Booking Saya</h1>
                <span class="header-brand-caption">Kelola pemesanan lapanganmu</span>
            </div>
        </div>

        <a href="{{ route('dashboard') }}"
           class="back-button"
           aria-label="Kembali ke dashboard">
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

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        @if ($bookings->count() > 0)

            <p class="booking-count">
                Kamu memiliki {{ $bookings->count() }} booking.
            </p>

            @foreach ($bookings as $booking)

                <div class="booking-card">

                    <div class="booking-top">

                        <div class="booking-image">

                            @if ($booking->venue && $booking->venue->image)

                                <img
                                    src="{{ asset('storage/' . ltrim($booking->venue->image, '/')) }}"
                                    alt="{{ $booking->venue->name }}"
                                    onerror="this.onerror=null; this.style.display='none'; this.parentElement.textContent='🏟️';"
                                >

                            @else

                                <span aria-label="Gambar lapangan tidak tersedia">
                                    🏟️
                                </span>

                            @endif

                        </div>

                        <div class="booking-info">

                            <h2>
                                {{ $booking->venue->name ?? 'Lapangan tidak tersedia' }}
                            </h2>

                            <p class="location">
                                📍 {{ $booking->venue->location ?? '-' }}
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
                            <div class="detail-label">TANGGAL</div>
                            <div class="detail-value">
                                {{ \Carbon\Carbon::parse($booking->booking_date)->translatedFormat('d M Y') }}
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-label">JAM</div>
                            <div class="detail-value">
                                {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-label">DURASI</div>
                            <div class="detail-value">
                                {{ $booking->duration }} Jam
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-label">STATUS PEMBAYARAN</div>
                            <div class="detail-value">
                                {{ ucfirst(str_replace('_', ' ', $booking->payment_status ?? 'unpaid')) }}
                            </div>
                        </div>

                    </div>

                    <div class="booking-footer">

                        <div>
                            <div class="total-label">Total Pembayaran</div>
                            <div class="total-price">
                                Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="actions">

                            <a href="{{ route('bookings.show', $booking->id) }}"
                               class="action-button button-detail">
                                Detail
                            </a>

                            @php
                                $bookingStart = \Carbon\Carbon::parse(
                                    $booking->booking_date
                                )->setTimeFromTimeString($booking->start_time);

                                $canCancelPaid = $booking->payment_status === 'paid'
                                    && in_array(
                                        $booking->status,
                                        ['pending', 'confirmed'],
                                        true
                                    )
                                    && now()->lt(
                                        $bookingStart->copy()->subHours(24)
                                    );

                                $canCancelUnpaid = $booking->status === 'pending'
                                    && in_array(
                                        $booking->payment_status,
                                        ['unpaid', 'waiting_verification', 'rejected'],
                                        true
                                    )
                                    && now()->lt($bookingStart);

                                $canDelete = $booking->status === 'cancelled'
                                    && $booking->payment_status !== 'paid'
                                    && !$booking->refund()->exists();
                            @endphp

                            @if ($canCancelPaid || $canCancelUnpaid)

                                <form
                                    action="{{ route('bookings.cancel', $booking->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin membatalkan booking ini?')">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="action-button button-cancel">
                                        Batalkan Booking
                                    </button>

                                </form>

                            @endif

                            @if ($canDelete)

                                <form
                                    action="{{ route('bookings.destroy', $booking->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus transaksi yang dibatalkan ini? Data yang dihapus tidak dapat dipulihkan.')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="action-button button-delete">
                                        Hapus Transaksi
                                    </button>

                                </form>

                            @endif

                            @if (
                                $booking->status === 'cancelled' &&
                                $booking->payment_status === 'paid'
                            )

                                <a href="{{ route('refunds.index') }}"
                                   class="action-button button-detail">
                                    Ajukan Refund
                                </a>

                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        @else

            <div class="empty-booking">

                <div class="empty-icon">📅</div>

                <h2>Belum Ada Booking</h2>

                <p>
                    Kamu belum memiliki riwayat booking lapangan.
                    Yuk cari lapangan dan mulai bermain!
                </p>

                <a href="{{ route('dashboard') }}"
                   class="booking-button">
                    Cari Lapangan
                </a>

            </div>

        @endif

    </main>

</div>
</body>
</html>