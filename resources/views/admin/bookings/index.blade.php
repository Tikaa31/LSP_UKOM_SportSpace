
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Booking - SPORTSPACE Admin</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f6fb;
            color: #172033;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 24px;
            background: #fff;
            border-bottom: 1px solid #e5eaf1;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #2563eb;
            font-size: 21px;
            font-weight: 900;
            letter-spacing: .5px;
        }

        .brand img {
            width: 45px;
            height: 45px;
            object-fit: contain;
        }

        .topbar small {
            color: #718096;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px 40px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 22px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 27px;
        }

        .subtitle {
            margin: 0;
            color: #718096;
            line-height: 1.6;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 15px;
            border: 1px solid #e5eaf1;
            border-radius: 11px;
            background: #fff;
            font-weight: 700;
            font-size: 14px;
            transition: background .2s;
        }

        .back-link:hover {
            background: #f8fafc;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 22px;
        }

        .stat-card {
            padding: 20px;
            background: #fff;
            border: 1px solid #e5eaf1;
            border-radius: 16px;
        }

        .stat-label {
            margin-bottom: 12px;
            color: #718096;
            font-size: 13px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 900;
        }

        .panel {
            margin-bottom: 22px;
            padding: 22px;
            background: #fff;
            border: 1px solid #e5eaf1;
            border-radius: 18px;
        }

        .panel h2 {
            margin: 0 0 18px;
            font-size: 19px;
        }

        .filters {
            display: grid;
            grid-template-columns: minmax(200px, 2fr) 1fr 1fr auto auto;
            gap: 10px;
            align-items: end;
        }

        .field label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 700;
        }

        .field input,
        .field select {
            width: 100%;
            min-height: 43px;
            padding: 10px 12px;
            border: 1px solid #dce3ed;
            border-radius: 10px;
            background: #fff;
            font: inherit;
            font-size: 13px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 43px;
            padding: 10px 15px;
            border: 0;
            border-radius: 10px;
            background: #2563eb;
            color: #fff;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .btn-reset {
            border: 1px solid #e5eaf1;
            background: #fff;
            color: #334155;
        }

        .btn-reset:hover {
            background: #f8fafc;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        th,
        td {
            padding: 14px 12px;
            border-bottom: 1px solid #edf0f5;
            text-align: left;
            vertical-align: middle;
            font-size: 13px;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        td strong {
            display: block;
            margin-bottom: 5px;
        }

        .muted {
            color: #718096;
            line-height: 1.5;
        }

        .badge {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }

        .confirmed,
        .paid {
            background: #dcfce7;
            color: #166534;
        }

        .completed {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .cancelled,
        .rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .unpaid,
        .unknown {
            background: #f1f5f9;
            color: #475569;
        }

        .empty {
            padding: 35px 15px;
            color: #718096;
            text-align: center;
            line-height: 1.7;
        }

        .pagination {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 18px;
        }

        .pagination-info {
            color: #718096;
            font-size: 13px;
        }

        .pagination-links {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .pagination-links a,
        .pagination-links span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            min-height: 36px;
            padding: 8px 11px;
            border: 1px solid #e5eaf1;
            border-radius: 9px;
            background: #fff;
            font-size: 13px;
        }

        .pagination-links .active {
            background: #2563eb;
            border-color: #2563eb;
            color: #fff;
        }

        .pagination-links .disabled {
            color: #94a3b8;
            background: #f8fafc;
        }

        @media (max-width: 900px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .filters {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .field-search {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 520px) {
            .topbar {
                padding: 15px;
            }

            .container {
                margin-top: 22px;
                padding: 0 14px 30px;
            }

            h1 {
                font-size: 23px;
            }

            .stats {
                gap: 10px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-number {
                font-size: 24px;
            }

            .panel {
                padding: 15px;
            }

            .filters {
                grid-template-columns: 1fr;
            }

            .field-search {
                grid-column: auto;
            }

            .filters .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<header class="topbar">
    <a href="{{ route('admin.dashboard') }}" class="brand">
        <img
            src="{{ asset('image/logosportspace.png') }}"
            alt="Logo SPORTSPACE"
        >
        <span>SPORTSPACE</span>
    </a>

    <small>Panel Administrator</small>
</header>

<main class="container">

    <div class="page-heading">
        <div>
            <h1>Kelola Booking</h1>
            <p class="subtitle">
                Pantau jadwal pemesanan dan status pembayaran pengguna.
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="back-link">
            Kembali
        </a>
    </div>

    <section class="stats">
        <div class="stat-card">
            <div class="stat-label">Total Booking</div>
            <div class="stat-number">{{ $totalBookings }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Menunggu</div>
            <div class="stat-number">{{ $pendingBookings }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Dikonfirmasi</div>
            <div class="stat-number">{{ $confirmedBookings }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Selesai</div>
            <div class="stat-number">{{ $completedBookings }}</div>
        </div>
    </section>

    <section class="panel">
        <h2>Filter Booking</h2>

        <form action="{{ route('admin.bookings.index') }}" method="GET">
            <div class="filters">

                <div class="field field-search">
                    <label for="search">Cari pengguna atau lapangan</label>
                    <input
                        type="text"
                        name="search"
                        id="search"
                        value="{{ request('search') }}"
                        placeholder="Nama, email, atau nama lapangan"
                    >
                </div>

                <div class="field">
                    <label for="status">Status Booking</label>
                    <select name="status" id="status">
                        <option value="">Semua status</option>
                        <option value="pending" @selected(request('status') === 'pending')>
                            Menunggu
                        </option>
                        <option value="confirmed" @selected(request('status') === 'confirmed')>
                            Dikonfirmasi
                        </option>
                        <option value="completed" @selected(request('status') === 'completed')>
                            Selesai
                        </option>
                        <option value="cancelled" @selected(request('status') === 'cancelled')>
                            Dibatalkan
                        </option>
                    </select>
                </div>

                <div class="field">
                    <label for="payment_status">Pembayaran</label>
                    <select name="payment_status" id="payment_status">
                        <option value="">Semua status</option>
                        <option value="unpaid" @selected(request('payment_status') === 'unpaid')>
                            Belum dibayar
                        </option>
                        <option value="paid" @selected(request('payment_status') === 'paid')>
                            Dibayar
                        </option>
                        <option value="rejected" @selected(request('payment_status') === 'rejected')>
                            Ditolak
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn">Terapkan</button>

                <a href="{{ route('admin.bookings.index') }}" class="btn btn-reset">
                    Reset
                </a>

            </div>
        </form>
    </section>

    <section class="panel">
        <h2>Data Booking</h2>

        @if ($bookings->count() > 0)
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pengguna</th>
                            <th>Lapangan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Durasi</th>
                            <th>Total</th>
                            <th>Status Booking</th>
                            <th>Pembayaran</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($bookings as $booking)
                            @php
                                $bookingStatus = $booking->status ?? 'unknown';
                                $paymentStatus = $booking->payment_status ?? 'unknown';
                            @endphp

                            <tr>
                                <td>
                                    <strong>#{{ $booking->id }}</strong>
                                </td>

                                <td>
                                    <strong>
                                        {{ $booking->user?->name ?? 'Pengguna tidak tersedia' }}
                                    </strong>
                                    <span class="muted">
                                        {{ $booking->user?->email ?? '-' }}
                                    </span>
                                </td>

                                <td>
                                    {{ $booking->venue?->name ?? 'Lapangan tidak tersedia' }}
                                </td>

                                <td>
                                    {{ $booking->booking_date
                                        ? \Carbon\Carbon::parse($booking->booking_date)->format('d-m-Y')
                                        : '-' }}
                                </td>

                                <td>
                                    {{ substr((string) $booking->start_time, 0, 5) }}
                                    –
                                    {{ substr((string) $booking->end_time, 0, 5) }}
                                </td>

                                <td>{{ $booking->duration }} jam</td>

                                <td>
                                    <strong>
                                        Rp{{ number_format((float) $booking->total_price, 0, ',', '.') }}
                                    </strong>
                                </td>

                                <td>
                                    <span class="badge {{ $bookingStatus }}">
                                        @switch($bookingStatus)
                                            @case('pending')
                                                Menunggu
                                                @break
                                            @case('confirmed')
                                                Dikonfirmasi
                                                @break
                                            @case('completed')
                                                Selesai
                                                @break
                                            @case('cancelled')
                                                Dibatalkan
                                                @break
                                            @default
                                                {{ ucfirst($bookingStatus) }}
                                        @endswitch
                                    </span>
                                </td>

                                <td>
                                    <span class="badge {{ $paymentStatus }}">
                                        @switch($paymentStatus)
                                            @case('unpaid')
                                                Belum dibayar
                                                @break
                                            @case('paid')
                                                Dibayar
                                                @break
                                            @case('rejected')
                                                Ditolak
                                                @break
                                            @default
                                                {{ ucfirst($paymentStatus) }}
                                        @endswitch
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                <div class="pagination-info">
                    Menampilkan {{ $bookings->firstItem() }}–{{ $bookings->lastItem() }}
                    dari {{ $bookings->total() }} booking
                </div>

                <div class="pagination-links">
                    @if ($bookings->onFirstPage())
                        <span class="disabled">‹</span>
                    @else
                        <a href="{{ $bookings->previousPageUrl() }}" aria-label="Halaman sebelumnya">
                            ‹
                        </a>
                    @endif

                    @foreach ($bookings->getUrlRange(1, $bookings->lastPage()) as $page => $url)
                        @if ($page === $bookings->currentPage())
                            <span class="active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($bookings->hasMorePages())
                        <a href="{{ $bookings->nextPageUrl() }}" aria-label="Halaman berikutnya">
                            ›
                        </a>
                    @else
                        <span class="disabled">›</span>
                    @endif
                </div>
            </div>

        @else
            <div class="empty">
                <strong>Data booking tidak ditemukan.</strong>
                <br>
                Coba ubah kata pencarian atau filter yang digunakan.
            </div>
        @endif
    </section>

</main>

</body>
</html>
