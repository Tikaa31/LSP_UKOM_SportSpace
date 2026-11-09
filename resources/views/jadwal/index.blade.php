<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jadwal Lapangan - SPORTSPACE</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --background: #f3f6fb;
            --text: #172033;
            --muted: #718096;
            --border: #e5eaf1;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* HEADER SPORTSPACE */
        .header {
            position: sticky;
            top: 12px;
            z-index: 10;
            max-width: 1000px;
            margin: 14px auto 0;
            padding: 0 14px;
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
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

        .logo {
            display: block;
            color: var(--primary);
            font-size: 16px;
            font-weight: 800;
            letter-spacing: .7px;
        }

        .header-title {
            margin: 4px 0 0;
            color: var(--text);
            font-size: 20px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .header-caption {
            display: block;
            margin-top: 4px;
            color: var(--muted);
            font-size: 11px;
        }

        .back-link {
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
            transition: .2s ease;
        }

        .back-link:hover {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }

        .back-link svg {
            width: 18px;
            height: 18px;
        }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px 50px;
        }

        .page-title {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .subtitle {
            margin: 0 0 25px;
            color: var(--muted);
            line-height: 1.6;
        }

        .panel {
            padding: 22px;
            margin-bottom: 22px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 20px;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: 14px;
            align-items: end;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
        }

        .form-group select,
        .form-group input {
            width: 100%;
            min-height: 46px;
            padding: 10px 12px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fff;
            font: inherit;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            padding: 12px 18px;
            border: none;
            border-radius: 12px;
            background: var(--primary);
            color: #fff;
            font-weight: 700;
            cursor: pointer;
        }

        .btn:hover {
            background: var(--primary-dark);
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 18px;
        }

        .section-heading h2 {
            margin: 0;
            font-size: 20px;
        }

        .date-label {
            color: var(--muted);
            font-size: 14px;
        }

        .legend {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-bottom: 18px;
            font-size: 13px;
            color: var(--muted);
        }

        .legend span {
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
        }

        .dot.available {
            background: #16a34a;
        }

        .dot.booked {
            background: #dc2626;
        }

        .dot.past {
            background: #94a3b8;
        }

        .slot-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }

        .slot {
            padding: 17px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: #fff;
        }

        .slot.available {
            border-color: #bbf7d0;
            background: #f0fdf4;
        }

        .slot.booked {
            border-color: #fecaca;
            background: #fef2f2;
        }

        .slot.past {
            background: #f1f5f9;
            color: #64748b;
        }

        .slot-time {
            margin-bottom: 9px;
            font-size: 21px;
            font-weight: 800;
        }

        .slot-status {
            margin-bottom: 14px;
            font-size: 13px;
            font-weight: 700;
        }

        .slot.available .slot-status {
            color: #15803d;
        }

        .slot.booked .slot-status {
            color: #b91c1c;
        }

        .slot.past .slot-status {
            color: #64748b;
        }

        .slot .btn {
            width: 100%;
            min-height: 40px;
            padding: 10px;
            font-size: 13px;
        }

        .btn-disabled {
            display: block;
            width: 100%;
            padding: 11px;
            border-radius: 10px;
            background: #e2e8f0;
            color: #64748b;
            text-align: center;
            font-size: 13px;
            font-weight: 700;
        }

        .empty-state {
            padding: 30px 15px;
            text-align: center;
            color: var(--muted);
            line-height: 1.7;
        }

        .booking-list {
            display: grid;
            gap: 12px;
        }

        .booking-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 15px;
            border: 1px solid var(--border);
            border-radius: 14px;
        }

        .booking-item strong {
            display: block;
            margin-bottom: 5px;
        }

        .booking-item small {
            color: var(--muted);
        }

        .status-badge {
            padding: 7px 10px;
            border-radius: 20px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        @media (max-width: 700px) {
            .header {
                top: 8px;
                margin-top: 8px;
                padding: 0 8px;
            }

            .header-inner {
                padding: 12px;
                gap: 10px;
                border-radius: 16px;
            }

            .header-brand {
                gap: 8px;
            }

            .header-logo {
                width: 36px;
                height: 36px;
            }

            .logo {
                font-size: 13px;
            }

            .header-title {
                font-size: 17px;
            }

            .header-caption {
                font-size: 9px;
            }

            .back-link {
                min-height: 38px;
                gap: 5px;
                padding: 9px 10px;
                font-size: 11px;
            }

            .back-link svg {
                width: 16px;
                height: 16px;
            }

            .container {
                margin-top: 22px;
                padding: 0 14px 35px;
            }

            .page-title {
                font-size: 24px;
            }

            .panel {
                padding: 16px;
                border-radius: 16px;
            }

            .filter-grid {
                grid-template-columns: 1fr;
            }

            .slot-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .slot {
                padding: 13px;
            }

            .slot-time {
                font-size: 18px;
            }

            .booking-item {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 380px) {
            .header-inner {
                gap: 6px;
                padding: 10px;
            }

            .header-logo {
                width: 30px;
                height: 30px;
            }

            .logo {
                font-size: 12px;
            }

            .header-title {
                font-size: 15px;
            }

            .header-caption {
                font-size: 8px;
            }

            .back-link {
                padding: 8px;
                font-size: 10px;
            }

            .slot-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<header class="header">
    <div class="header-inner">

        <div class="header-brand">
            <img
                src="{{ asset('image/logosportspace.png') }}"
                alt="Logo SPORTSPACE"
                class="header-logo"
            >

            <div class="header-brand-text">
                <span class="logo">SPORTSPACE</span>
                <h1 class="header-title">Jadwal Lapangan</h1>
                <span class="header-caption">
                    Periksa dan pilih jadwal lapangan
                </span>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="back-link">
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <path d="M19 12H5"></path>
                <path d="M12 19l-7-7 7-7"></path>
            </svg>
            <span>Kembali</span>
        </a>

    </div>
</header>

<main class="container">

    <h1 class="page-title">Jadwal Lapangan</h1>
    <p class="subtitle">
        Periksa jam yang tersedia sebelum melakukan booking lapangan favoritmu.
    </p>

    <section class="panel">
        <form action="{{ route('jadwal.index') }}" method="GET">
            <div class="filter-grid">

                <div class="form-group">
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
                </div>

                <div class="form-group">
                    <label for="date">Pilih Tanggal</label>
                    <input
                        type="date"
                        name="date"
                        id="date"
                        value="{{ $date }}"
                        min="{{ now()->toDateString() }}"
                        required
                    >
                </div>

                <button class="btn" type="submit">
                    Lihat Jadwal
                </button>

            </div>
        </form>
    </section>

    @if ($selectedVenue)

        <section class="panel">
            <div class="section-heading">
                <h2>{{ $selectedVenue->name }}</h2>
                <span class="date-label">
                    {{ \Carbon\Carbon::parse($date)->translatedFormat('l, d F Y') }}
                </span>
            </div>

            <div class="legend">
                <span><i class="dot available"></i> Tersedia</span>
                <span><i class="dot booked"></i> Sudah dibooking</span>
                <span><i class="dot past"></i> Waktu berlalu</span>
            </div>

            <div class="slot-grid">
                @foreach ($slots as $slot)
                    <article class="slot
                        {{ $slot['available'] ? 'available' : ($slot['past'] ? 'past' : 'booked') }}">

                        <div class="slot-time">
                            {{ $slot['time'] }}
                        </div>

                        @if ($slot['available'])
                            <div class="slot-status">● Tersedia</div>

                            <a
                                class="btn"
                                href="{{ route('bookings.create', $selectedVenue) }}?booking_date={{ $date }}&start_time={{ $slot['time'] }}"
                            >
                                Booking Sekarang
                            </a>

                        @elseif ($slot['past'])
                            <div class="slot-status">● Waktu berlalu</div>
                            <span class="btn-disabled">Tidak tersedia</span>

                        @else
                            <div class="slot-status">● Sudah dibooking</div>
                            <span class="btn-disabled">Pilih jam lain</span>
                        @endif

                    </article>
                @endforeach
            </div>
        </section>

        <section class="panel">
            <div class="section-heading">
                <h2>Booking pada Tanggal Ini</h2>
                <span class="date-label">
                    {{ $bookings->count() }} booking aktif
                </span>
            </div>

            @if ($bookings->isNotEmpty())
                <div class="booking-list">
                    @foreach ($bookings as $booking)
                        <div class="booking-item">
                            <div>
                                <strong>
                                    {{ substr((string) $booking->start_time, 0, 5) }}
                                    –
                                    {{ substr((string) $booking->end_time, 0, 5) }}
                                </strong>

                                <small>
                                    Booking #{{ $booking->id }}
                                </small>
                            </div>

                            <span class="status-badge">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    Belum ada booking aktif pada tanggal ini.
                    <br>
                    Silakan pilih jam yang tersedia di atas.
                </div>
            @endif
        </section>

    @else

        <section class="panel empty-state">
            <h2>Lapangan belum tersedia</h2>
            Belum ada lapangan aktif yang bisa ditampilkan.
        </section>

    @endif

</main>

</body>
</html>