<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jadwal Lapangan | SPORTSPACE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fc;
            color: #172b4d;
        }

        .page {
            width: min(1100px, 100%);
            margin: auto;
            padding: 30px 20px 50px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .brand {
            color: #174ea6;
            font-size: 23px;
            font-weight: 800;
            text-decoration: none;
        }

        .brand span {
            color: #3984ef;
        }

        .back-link {
            color: #2563eb;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .intro {
            margin-bottom: 25px;
        }

        .intro h1 {
            font-size: clamp(25px, 4vw, 34px);
            margin-bottom: 9px;
        }

        .intro p {
            color: #64748b;
            line-height: 1.6;
        }

        .panel {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 22px;
            box-shadow: 0 5px 20px rgba(15, 50, 100, .04);
        }

        .filters {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            align-items: end;
            gap: 16px;
        }

        .field label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .field select,
        .field input {
            width: 100%;
            min-height: 46px;
            border: 1px solid #d6deeb;
            border-radius: 9px;
            padding: 10px 12px;
            background: white;
            color: #172b4d;
            font-size: 14px;
        }

        .btn {
            min-height: 46px;
            border: 0;
            border-radius: 9px;
            padding: 0 22px;
            background: #2563eb;
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        .btn:hover {
            background: #174ea6;
        }

        .venue-heading {
            margin-bottom: 18px;
        }

        .venue-heading h2 {
            font-size: 20px;
            margin-bottom: 7px;
        }

        .venue-heading p {
            color: #64748b;
            font-size: 14px;
        }

        .legend {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #475569;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .dot {
            width: 11px;
            height: 11px;
            border-radius: 4px;
        }

        .dot-booked {
            background: #ef4444;
        }

        .dot-available {
            background: #16a34a;
        }

        .booking-list {
            display: grid;
            gap: 12px;
        }

        .booking-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 11px;
            padding: 16px;
        }

        .booking-time {
            font-weight: 700;
            font-size: 15px;
        }

        .booking-note {
            margin-top: 5px;
            color: #64748b;
            font-size: 12px;
        }

        .status {
            display: inline-block;
            padding: 7px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-booked {
            background: #fee2e2;
            color: #b91c1c;
        }

        .empty {
            text-align: center;
            padding: 35px 15px;
            background: #f8fafc;
            border-radius: 12px;
            color: #64748b;
            line-height: 1.7;
        }

        .empty strong {
            display: block;
            color: #172b4d;
            margin-bottom: 5px;
        }

        .notice {
            color: #64748b;
            font-size: 12px;
            line-height: 1.7;
            margin-top: 18px;
        }

        .error {
            color: #b91c1c;
            font-size: 12px;
            margin-top: 6px;
        }

        .footer {
            padding-top: 15px;
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
        }

        @media (max-width: 650px) {
            .page {
                padding: 22px 14px 35px;
            }

            .panel {
                padding: 18px;
            }

            .filters {
                grid-template-columns: 1fr;
            }

            .btn {
                width: 100%;
            }

            .booking-item {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
<div class="page">

    <header class="topbar">
        <a href="{{ route('dashboard') }}" class="brand">
            SPORT<span>SPACE</span>
        </a>

        <a href="{{ route('dashboard') }}" class="back-link">
            ← Kembali ke Beranda
        </a>
    </header>

    <section class="intro">
        <h1>Jadwal Lapangan</h1>
        <p>
            Periksa jadwal penggunaan lapangan sebelum melakukan booking.
        </p>
    </section>

    <section class="panel">
        <form action="{{ route('jadwal.index') }}" method="GET" class="filters">

            <div class="field">
                <label for="venue_id">Pilih Lapangan</label>

                <select name="venue_id" id="venue_id" required>
                    @forelse ($venues as $venue)
                        <option
                            value="{{ $venue->id }}"
                            @selected($selectedVenue && $selectedVenue->id == $venue->id)
                        >
                            {{ $venue->name }}
                        </option>
                    @empty
                        <option value="">Belum ada lapangan aktif</option>
                    @endforelse
                </select>

                @error('venue_id')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="date">Tanggal Jadwal</label>

                <input
                    type="date"
                    id="date"
                    name="date"
                    value="{{ $date }}"
                    min="{{ now()->toDateString() }}"
                    required
                >

                @error('date')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn">
                Lihat Jadwal
            </button>

        </form>
    </section>

    <section class="panel">
        <div class="venue-heading">
            <h2>
                {{ $selectedVenue ? $selectedVenue->name : 'Jadwal Lapangan' }}
            </h2>

            <p>
                Tanggal:
                {{ \Carbon\Carbon::parse($date)->translatedFormat('l, d F Y') }}
            </p>
        </div>

        <div class="legend">
            <div class="legend-item">
                <span class="dot dot-booked"></span>
                Sudah dibooking
            </div>

            <div class="legend-item">
                <span class="dot dot-available"></span>
                Slot lain belum tercatat dibooking
            </div>
        </div>

        @if (!$selectedVenue)
            <div class="empty">
                <strong>Belum ada lapangan aktif</strong>
                Lapangan yang tersedia akan muncul di halaman ini.
            </div>
        @elseif ($bookings->isEmpty())
            <div class="empty">
                <strong>Belum ada booking tercatat</strong>
                Belum ada booking berstatus pending atau confirmed
                untuk lapangan ini pada tanggal yang dipilih.
            </div>
        @else
            <div class="booking-list">
                @foreach ($bookings as $booking)
                    <div class="booking-item">
                        <div>
                            <div class="booking-time">
                                {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}
                                –
                                {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}
                            </div>

                            <p class="booking-note">
                                Waktu ini sudah memiliki booking.
                            </p>
                        </div>

                        <span class="status status-booked">
                            Sudah dibooking
                        </span>
                    </div>
                @endforeach
            </div>
        @endif

        <p class="notice">
            Jadwal ini menampilkan waktu booking tanpa informasi pribadi
            pengguna lain. Ketersediaan akhir tetap mengikuti validasi
            pada formulir booking lapangan.
        </p>
    </section>

    <footer class="footer">
        © {{ date('Y') }} SPORTSPACE · PLAY · BOOK · BELONG
    </footer>

</div>
</body>
</html>
