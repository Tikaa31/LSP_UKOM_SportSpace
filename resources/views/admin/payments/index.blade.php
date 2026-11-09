
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pembayaran | SPORTSPACE</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;
            color: #172033;
        }

        a {
            color: inherit;
        }

        /* HEADER */
        .header {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 20px;
            padding: 16px 28px;
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            min-height: 100px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            justify-self: start;
            color: #172033;
            font-size: 26px;
            font-weight: 800;
            text-decoration: none;
            white-space: nowrap;
            min-width: 0;
        }

        .brand img {
            display: block;
            width: 52px;
            height: 52px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .header h1 {
            margin: 0;
            text-align: center;
            font-size: 30px;
            line-height: 1.3;
            font-weight: 700;
        }

        .back-button {
            justify-self: end;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            padding: 0 22px;
            border: 1px solid #dbe4f0;
            border-radius: 12px;
            background: #fff;
            color: #172033;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            transition: background 0.2s ease, border-color 0.2s ease;
        }

        .back-button:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
        }

        /* KONTEN */
        .container {
            width: 100%;
            max-width: 1100px;
            margin: 28px auto;
            padding: 0 20px 40px;
        }

        .intro {
            margin-bottom: 22px;
        }

        .intro h2 {
            margin: 0 0 8px;
            font-size: 23px;
        }

        .intro p {
            margin: 0;
            color: #64748b;
            line-height: 1.7;
        }

        /* ALERT */
        .alert {
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 18px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .empty {
            padding: 40px 20px;
            text-align: center;
            background: #fff;
            border-radius: 16px;
            color: #64748b;
        }

        /* KARTU PEMBAYARAN */
        .payment-card {
            background: #fff;
            padding: 24px;
            border-radius: 18px;
            margin-bottom: 20px;
            box-shadow: 0 4px 18px rgba(15, 23, 42, .04);
        }

        .payment-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
        }

        .payment-top h3 {
            margin: 0 0 8px;
            font-size: 20px;
        }

        .muted {
            color: #64748b;
            font-size: 14px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .badge {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 999px;
            background: #fef3c7;
            color: #92400e;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        /* DETAIL PEMBAYARAN */
        .details {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 24px;
        }

        .detail-item {
            min-width: 0;
            padding: 15px;
            border-radius: 12px;
            background: #f8fafc;
        }

        .detail-label {
            display: block;
            color: #64748b;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .detail-value {
            font-size: 15px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .amount {
            color: #2563eb;
            font-size: 20px;
        }

        /* BUKTI PEMBAYARAN */
        .proof-title {
            margin: 0 0 12px;
            font-size: 17px;
        }

        .proof-image {
            display: block;
            width: 100%;
            max-width: 420px;
            max-height: 480px;
            object-fit: contain;
            object-position: left center;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            margin-bottom: 12px;
        }

        .proof-link {
            display: inline-block;
            margin-bottom: 22px;
            color: #2563eb;
            font-weight: 700;
            text-decoration: none;
        }

        .proof-link:hover {
            text-decoration: underline;
        }

        /* TOMBOL AKSI */
        .actions {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            gap: 12px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 13px 17px;
            border: 0;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .verify-button {
            background: #16a34a;
            color: #fff;
        }

        .verify-button:hover {
            background: #15803d;
        }

        .reject-button {
            background: #dc2626;
            color: #fff;
        }

        .reject-button:hover {
            background: #b91c1c;
        }

        .reject-form {
            display: flex;
            flex: 1 1 300px;
            flex-direction: column;
            gap: 10px;
        }

        .reason {
            width: 100%;
            min-height: 78px;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            resize: vertical;
        }

        .pagination {
            margin-top: 24px;
        }

        /* RESPONSIVE TABLET */
        @media (max-width: 1000px) {
            .header {
                grid-template-columns: 1fr auto;
                gap: 14px;
                padding: 16px 20px;
            }

            .header h1 {
                grid-column: 1 / -1;
                grid-row: 2;
                text-align: left;
                font-size: 27px;
            }

            .back-button {
                grid-column: 2;
                grid-row: 1;
            }
        }

        /* RESPONSIVE HP */
        @media (max-width: 640px) {
            .header {
                padding: 14px 12px;
                gap: 12px;
            }

            .brand {
                gap: 7px;
                font-size: 17px;
            }

            .brand img {
                width: 38px;
                height: 38px;
            }

            .back-button {
                min-height: 40px;
                padding: 0 13px;
                font-size: 14px;
            }

            .header h1 {
                font-size: 23px;
            }

            .container {
                margin-top: 20px;
                padding: 0 12px 30px;
            }

            .payment-card {
                padding: 18px;
            }

            .payment-top {
                flex-direction: column;
            }

            .details {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
            }

            .actions form {
                width: 100%;
            }

            .actions .button {
                width: 100%;
            }

            .reject-form {
                flex-basis: auto;
            }
        }

        @media (max-width: 380px) {
            .brand {
                font-size: 15px;
            }

            .brand img {
                width: 32px;
                height: 32px;
            }

            .back-button {
                padding: 0 10px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

<header class="header">
    <a href="{{ route('admin.dashboard') }}" class="brand">
        <img src="{{ asset('image/logosportspace.png') }}" alt="Logo SPORTSPACE">
        <span>SPORTSPACE</span>
    </a>

    <h1>Verifikasi Pembayaran</h1>

    <a href="{{ route('admin.dashboard') }}" class="back-button">
        Kembali
    </a>
</header>

<main class="container">

    <div class="intro">
        <h2>Daftar Pembayaran QRIS</h2>
        <p>
            Periksa bukti transaksi dan nominal pesanan sebelum
            melakukan verifikasi.
        </p>
    </div>

    @if (session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert error">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert error">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @forelse ($bookings as $booking)

        @php
            /*
             * File berada di storage/app/public.
             * URL publiknya diakses melalui public/storage.
             */
            $proofUrl = $booking->payment_proof
                ? asset('storage/' . ltrim($booking->payment_proof, '/'))
                : null;
        @endphp

        <article class="payment-card">

            <div class="payment-top">
                <div>
                    <h3>Pesanan #{{ $booking->id }}</h3>

                    <div class="muted">
                        Pengguna:
                        {{ $booking->user->name ?? 'Pengguna tidak tersedia' }}
                        <br>

                        Email:
                        {{ $booking->user->email ?? '-' }}
                        <br>

                        Tanggal booking:
                        {{ \Carbon\Carbon::parse($booking->booking_date)->format('d-m-Y') }}
                    </div>
                </div>

                <span class="badge {{ $booking->payment_status === 'rejected' ? 'badge-rejected' : '' }}">
                    {{ $booking->payment_status === 'rejected' ? 'Bukti Ditolak' : 'Menunggu Verifikasi' }}
                </span>
            </div>

            <div class="details">

                <div class="detail-item">
                    <span class="detail-label">Lapangan</span>
                    <span class="detail-value">
                        {{ $booking->venue->name ?? '-' }}
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Metode Pembayaran</span>
                    <span class="detail-value">QRIS</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Waktu Booking</span>
                    <span class="detail-value">
                        {{ substr((string) $booking->start_time, 0, 5) }}
                        –
                        {{ substr((string) $booking->end_time, 0, 5) }}
                        ({{ $booking->duration }} jam)
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Total Pembayaran</span>
                    <span class="detail-value amount">
                        Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                    </span>
                </div>

            </div>

            <h4 class="proof-title">Bukti Pembayaran</h4>

            @if ($proofUrl)

                <a
                    href="{{ $proofUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <img
                        src="{{ $proofUrl }}"
                        alt="Bukti pembayaran pesanan {{ $booking->id }}"
                        class="proof-image"
                        loading="lazy"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                    >

                    <span style="display:none; color:#991b1b; margin-bottom:12px;">
                        Gambar tidak dapat ditampilkan. Gunakan tautan di bawah untuk mencoba membukanya.
                    </span>
                </a>

                <a
                    href="{{ $proofUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="proof-link"
                >
                    Buka bukti ukuran penuh
                </a>

            @else

                <div class="alert error">
                    Bukti pembayaran belum tersedia.
                </div>

            @endif

            @if (
                $booking->payment_status === 'waiting_verification'
                && $booking->payment_proof
            )

                <div class="actions">

                    <form
                        action="{{ route('admin.payments.verify', $booking->id) }}"
                        method="POST"
                        onsubmit="return confirm('Pastikan pembayaran benar-benar telah diterima. Verifikasi pembayaran ini?')"
                    >
                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="button verify-button"
                        >
                            Verifikasi Pembayaran
                        </button>
                    </form>

                    <form
                        action="{{ route('admin.payments.reject', $booking->id) }}"
                        method="POST"
                        class="reject-form"
                        onsubmit="return confirm('Yakin ingin menolak bukti pembayaran ini?')"
                    >
                        @csrf
                        @method('PATCH')

                        <textarea
                            name="rejection_reason"
                            class="reason"
                            placeholder="Tuliskan alasan penolakan..."
                            maxlength="1000"
                            required
                        ></textarea>

                        <button
                            type="submit"
                            class="button reject-button"
                        >
                            Tolak Bukti Pembayaran
                        </button>
                    </form>

                </div>

            @elseif ($booking->payment_status === 'rejected')

                <div class="alert error">
                    Bukti sebelumnya ditolak. Pengguna perlu mengunggah
                    bukti baru melalui halaman detail pesanan.

                    @if ($booking->rejection_reason)
                        <div style="margin-top:10px;">
                            <strong>Alasan penolakan:</strong>
                            <p style="margin-bottom:0; white-space:pre-line;">
                                {{ $booking->rejection_reason }}
                            </p>
                        </div>
                    @endif
                </div>

            @endif

        </article>

    @empty

        <div class="empty">
            <h3>Belum ada pembayaran untuk diperiksa</h3>
            <p>
                Pesanan akan muncul setelah pengguna mengunggah
                bukti pembayaran.
            </p>
        </div>

    @endforelse

    <div class="pagination">
        {{ $bookings->links() }}
    </div>

</main>

</body>
</html>
