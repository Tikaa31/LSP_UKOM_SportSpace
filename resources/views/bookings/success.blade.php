<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking Berhasil - SPORTSPACE</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-width: 320px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #172033;
        }

        .page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 520px;
            padding: 30px;
            background: white;
            border-radius: 24px;
            box-shadow: 0 15px 50px rgba(15, 23, 42, 0.10);
            text-align: center;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #dcfce7;
            color: #16a34a;
            font-size: 42px;
            font-weight: bold;
        }

        h1 {
            margin: 0 0 10px;
            font-size: 26px;
        }

        .subtitle {
            margin: 0 0 25px;
            color: #64748b;
            line-height: 1.6;
        }

        .details {
            text-align: left;
            border-top: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
        }

        .row:last-child {
            border-bottom: none;
        }

        .label {
            color: #64748b;
        }

        .value {
            font-weight: 700;
            text-align: right;
        }

        .total {
            margin-top: 20px;
            padding: 18px;
            border-radius: 16px;
            background: #eff6ff;
        }

        .total p {
            margin: 0 0 6px;
            color: #64748b;
            font-size: 13px;
        }

        .total strong {
            color: #2563eb;
            font-size: 24px;
        }

        .button {
            display: block;
            width: 100%;
            margin-top: 25px;
            padding: 15px;
            border-radius: 14px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        @media (max-width: 480px) {
            .page {
                padding: 14px;
                align-items: flex-start;
            }

            .card {
                margin-top: 20px;
                padding: 22px 17px;
            }

            h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<div class="page">
    <div class="card">

        <div class="success-icon">✓</div>

        <h1>Booking Berhasil!</h1>

        <p class="subtitle">
            Booking lapangan kamu berhasil dibuat.
        </p>

        <div class="details">

            <div class="row">
                <span class="label">Lapangan</span>
                <span class="value">{{ $booking->venue->name }}</span>
            </div>

            <div class="row">
                <span class="label">Lokasi</span>
                <span class="value">{{ $booking->venue->location }}</span>
            </div>

            <div class="row">
                <span class="label">Tanggal</span>
                <span class="value">
                    {{ $booking->booking_date->translatedFormat('l, d F Y') }}
                </span>
            </div>

            <div class="row">
                <span class="label">Jam Mulai</span>
                <span class="value">
                    {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}
                </span>
            </div>

            <div class="row">
                <span class="label">Durasi</span>
                <span class="value">{{ $booking->duration }} Jam</span>
            </div>

            <div class="row">
                <span class="label">Status</span>
                <span class="value">Menunggu Konfirmasi</span>
            </div>

        </div>

        <div class="total">
            <p>Total Pembayaran</p>

            <strong>
                Rp{{ number_format($booking->total_price, 0, ',', '.') }}
            </strong>
        </div>

        <a href="{{ route('dashboard') }}" class="button">
            Kembali ke Dashboard
        </a>

    </div>
</div>

</body>
</html>