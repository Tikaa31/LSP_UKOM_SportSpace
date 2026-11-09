
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - SPORTSPACE</title>

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

        .page-header {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 20px;
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
        }

        .back-button {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #f1f5f9;
            color: #172033;
            text-decoration: none;
            transition: background .2s ease;
        }

        .back-button:hover {
            background: #e2e8f0;
        }

        .back-button svg {
            width: 24px;
            height: 24px;
        }

        .page-header h1 {
            margin: 0;
            font-size: 26px;
            line-height: 1.2;
            font-weight: 700;
            color: #172033;
        }

        .container {
            width: 100%;
            max-width: 900px;
            margin: 28px auto;
            padding: 0 20px 40px;
        }

        .card {
            background: #fff;
            border-radius: 20px;
            padding: 28px;
            margin-bottom: 22px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, .04);
        }

        .section-title {
            font-size: 22px;
            font-weight: 700;
            margin: 0 0 22px;
            color: #172033;
        }

        .venue-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .venue-image {
            width: 140px;
            height: 110px;
            flex-shrink: 0;
            border-radius: 14px;
            object-fit: cover;
            background: #e2e8f0;
        }

        .venue-name {
            font-size: 21px;
            font-weight: 700;
            margin: 0 0 9px;
            text-transform: capitalize;
        }

        .venue-location {
            color: #64748b;
            font-size: 15px;
            line-height: 1.6;
            margin: 0 0 5px;
        }

        .detail-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            padding: 16px 0;
            border-bottom: 1px solid #edf2f7;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #64748b;
            font-size: 15px;
        }

        .detail-value {
            text-align: right;
            font-weight: 600;
            font-size: 15px;
            overflow-wrap: anywhere;
        }

        .total-box {
            margin-top: 22px;
            padding: 24px;
            border-radius: 16px;
            background: #eff6ff;
            text-align: center;
        }

        .total-label {
            color: #64748b;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .total-price {
            font-size: 32px;
            font-weight: 800;
            color: #2563eb;
            overflow-wrap: anywhere;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
        }

        .status-pending,
        .status-waiting {
            background: #fef3c7;
            color: #92400e;
        }

        .status-confirmed,
        .status-paid {
            background: #dcfce7;
            color: #166534;
        }

        .status-cancelled,
        .status-unpaid,
        .status-rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .qris-wrapper {
            text-align: center;
        }

        .qris-description {
            color: #64748b;
            line-height: 1.7;
            font-size: 15px;
            margin: 0 0 20px;
        }

        .qris-image {
            display: block;
            width: 100%;
            max-width: 330px;
            height: auto;
            margin: 0 auto 20px;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 10px;
            background: #fff;
        }

        .qris-amount {
            padding: 16px;
            border-radius: 12px;
            background: #f8fafc;
            margin-bottom: 20px;
        }

        .qris-amount-label {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .qris-amount-value {
            color: #2563eb;
            font-size: 25px;
            font-weight: 800;
        }

        .alert {
            padding: 15px 17px;
            border-radius: 12px;
            margin-bottom: 20px;
            line-height: 1.6;
            font-size: 14px;
            overflow-wrap: anywhere;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .alert-info {
            background: #eff6ff;
            color: #1d4ed8;
        }

        .alert-warning {
            background: #fff7ed;
            color: #9a3412;
        }

        .rejection-reason {
            margin-top: 12px;
            padding: 12px;
            background: rgba(255, 255, 255, .7);
            border-radius: 8px;
            border: 1px solid rgba(154, 52, 18, .15);
        }

        .rejection-reason p {
            margin: 6px 0 0;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .error-list {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .upload-form {
            margin-top: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .file-input {
            display: block;
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            background: #fff;
            font-size: 14px;
        }

        .file-help {
            margin-top: 9px;
            color: #64748b;
            font-size: 12px;
            line-height: 1.6;
        }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            width: 100%;
            min-height: 50px;
            padding: 14px 20px;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: background .2s ease;
        }

        .button-primary {
            background: #2563eb;
            color: #fff;
        }

        .button-primary:hover {
            background: #1d4ed8;
        }

        .button-secondary {
            background: #f1f5f9;
            color: #172033;
        }

        .button-secondary:hover {
            background: #e2e8f0;
        }

        .proof-section {
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid #edf2f7;
            text-align: center;
        }

        .proof-title {
            font-size: 18px;
            margin: 0 0 8px;
        }

        .proof-description {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
            margin: 0 0 16px;
        }

        .proof-preview {
            display: block;
            width: 100%;
            max-width: 400px;
            max-height: 500px;
            height: auto;
            object-fit: contain;
            margin: 16px auto;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
        }

        .proof-link {
            display: inline-block;
            color: #2563eb;
            font-weight: 700;
            text-decoration: none;
            margin-top: 8px;
        }

        .proof-link:hover {
            text-decoration: underline;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        @media (max-width: 640px) {
            .page-header {
                gap: 12px;
                padding: 14px 12px;
            }

            .back-button {
                width: 44px;
                height: 44px;
                border-radius: 12px;
            }

            .page-header h1 {
                font-size: 23px;
            }

            .container {
                margin-top: 18px;
                padding: 0 12px 28px;
            }

            .card {
                padding: 20px;
                border-radius: 16px;
            }

            .section-title {
                font-size: 19px;
            }

            .venue-info {
                align-items: flex-start;
                gap: 14px;
            }

            .venue-image {
                width: 105px;
                height: 95px;
            }

            .venue-name {
                font-size: 17px;
            }

            .detail-row {
                gap: 12px;
            }

            .detail-label,
            .detail-value {
                font-size: 13px;
            }

            .total-price {
                font-size: 27px;
            }

            .qris-amount-value {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

@php
    /*
     * Status pembayaran dan status booking adalah dua hal berbeda.
     * Jika pembayaran lunas, booking pending lama ditampilkan
     * sebagai dikonfirmasi. Status cancelled tetap dipertahankan.
     */
    $paymentStatus = $booking->payment_status ?? 'unpaid';
    $originalBookingStatus = $booking->status ?? 'pending';

    $bookingStatus = (
        $paymentStatus === 'paid'
        && $originalBookingStatus === 'pending'
    )
        ? 'confirmed'
        : $originalBookingStatus;

    $bookingStatusLabels = [
        'pending' => 'Menunggu Konfirmasi',
        'confirmed' => 'Dikonfirmasi',
        'cancelled' => 'Dibatalkan',
    ];

    $bookingStatusClasses = [
        'pending' => 'status-pending',
        'confirmed' => 'status-confirmed',
        'cancelled' => 'status-cancelled',
    ];

    $paymentStatusLabels = [
        'unpaid' => 'Belum Bayar',
        'waiting_verification' => 'Menunggu Verifikasi',
        'rejected' => 'Bukti Ditolak',
        'paid' => 'Lunas',
    ];

    $paymentStatusClasses = [
        'unpaid' => 'status-unpaid',
        'waiting_verification' => 'status-waiting',
        'rejected' => 'status-rejected',
        'paid' => 'status-paid',
    ];

    $canUploadProof = (
        in_array($paymentStatus, ['unpaid', 'rejected'], true)
        && $bookingStatus !== 'cancelled'
    );

    $proofUrl = $booking->payment_proof
        ? asset('storage/' . ltrim($booking->payment_proof, '/'))
        : null;
@endphp

<header class="page-header">
    <a
        href="{{ route('bookings.orders') }}"
        class="back-button"
        aria-label="Kembali ke Pesanan Saya"
        title="Kembali ke Pesanan Saya"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="M19 12H5"></path>
            <path d="m12 19-7-7 7-7"></path>
        </svg>
    </a>

    <h1>Detail Pesanan</h1>
</header>

<main class="container">

    {{-- NOTIFIKASI --}}
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
            <strong>Terjadi kesalahan:</strong>

            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- INFORMASI LAPANGAN --}}
    <section class="card">
        <h2 class="section-title">Informasi Lapangan</h2>

        <div class="venue-info">
            @if ($booking->venue && $booking->venue->image)
                <img
                    class="venue-image"
                    src="{{ asset('storage/' . ltrim($booking->venue->image, '/')) }}"
                    alt="{{ $booking->venue->name }}"
                    onerror="this.style.display='none'"
                >
            @endif

            <div>
                <h3 class="venue-name">
                    {{ $booking->venue->name ?? 'Lapangan tidak tersedia' }}
                </h3>

                <p class="venue-location">
                    {{ $booking->venue->location ?? '-' }}
                </p>

                @if ($booking->venue)
                    <p class="venue-location">
                        Harga per jam:
                        Rp{{ number_format($booking->venue->price_per_hour, 0, ',', '.') }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    {{-- RINCIAN PESANAN --}}
    <section class="card">
        <h2 class="section-title">Rincian Pesanan</h2>

        <div class="detail-row">
            <span class="detail-label">Kode Pesanan</span>
            <span class="detail-value">#{{ $booking->id }}</span>
        </div>

        <div class="detail-row">
            <span class="detail-label">Tanggal Booking</span>
            <span class="detail-value">
                {{ \Carbon\Carbon::parse($booking->booking_date)->translatedFormat('l, d F Y') }}
            </span>
        </div>

        <div class="detail-row">
            <span class="detail-label">Jam Mulai</span>
            <span class="detail-value">
                {{ substr((string) $booking->start_time, 0, 5) }}
            </span>
        </div>

        <div class="detail-row">
            <span class="detail-label">Jam Selesai</span>
            <span class="detail-value">
                {{ substr((string) $booking->end_time, 0, 5) }}
            </span>
        </div>

        <div class="detail-row">
            <span class="detail-label">Durasi</span>
            <span class="detail-value">{{ $booking->duration }} Jam</span>
        </div>

        <div class="detail-row">
            <span class="detail-label">Status Booking</span>
            <span class="detail-value">
                <span class="status-badge {{ $bookingStatusClasses[$bookingStatus] ?? 'status-pending' }}">
                    {{ $bookingStatusLabels[$bookingStatus] ?? ucfirst($bookingStatus) }}
                </span>
            </span>
        </div>

        <div class="total-box">
            <div class="total-label">Total Pembayaran</div>
            <div class="total-price">
                Rp{{ number_format($booking->total_price, 0, ',', '.') }}
            </div>
        </div>
    </section>

    {{-- PEMBAYARAN --}}
    <section class="card">
        <h2 class="section-title">Pembayaran QRIS</h2>

        <div class="detail-row">
            <span class="detail-label">Metode Pembayaran</span>
            <span class="detail-value">
                {{ strtoupper($booking->payment_method ?? 'QRIS') }}
            </span>
        </div>

        <div class="detail-row">
            <span class="detail-label">Status Pembayaran</span>
            <span class="detail-value">
                <span class="status-badge {{ $paymentStatusClasses[$paymentStatus] ?? 'status-unpaid' }}">
                    {{ $paymentStatusLabels[$paymentStatus] ?? ucfirst(str_replace('_', ' ', $paymentStatus)) }}
                </span>
            </span>
        </div>

        {{-- QRIS UNTUK PEMBAYARAN BARU --}}
        @if ($paymentStatus === 'unpaid' && $bookingStatus !== 'cancelled')
            <div class="qris-wrapper" style="margin-top: 24px;">
                <p class="qris-description">
                    Scan kode QRIS resmi merchant SPORTSPACE melalui aplikasi
                    pembayaran yang mendukung QRIS. Pastikan nominal pembayaran
                    sesuai dengan total pesanan.
                </p>

                <img
                    src="{{ asset('image/qris.jpeg') }}"
                    alt="QRIS SPORTSPACE"
                    class="qris-image"
                >

                <div class="qris-amount">
                    <div class="qris-amount-label">
                        Nominal yang harus dibayar
                    </div>

                    <div class="qris-amount-value">
                        Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                    </div>
                </div>

                <div class="alert alert-info" style="text-align: left;">
                    Setelah pembayaran dilakukan, unggah bukti transaksi yang valid.
                    Pembayaran akan menunggu verifikasi admin.
                </div>
            </div>
        @endif

        {{-- BUKTI DITOLAK DAN ALASAN ADMIN --}}
        @if ($paymentStatus === 'rejected' && $bookingStatus !== 'cancelled')
            <div class="alert alert-warning" style="margin-top: 20px;">
                <strong>Bukti pembayaran ditolak oleh admin.</strong>
                <br>
                Silakan baca alasan penolakan berikut sebelum mengunggah ulang bukti.

                @if ($booking->rejection_reason)
                    <div class="rejection-reason">
                        <strong>Alasan penolakan:</strong>
                        <p>{{ $booking->rejection_reason }}</p>
                    </div>
                @else
                    <p style="margin-bottom: 0;">
                        Admin belum memberikan keterangan tambahan.
                    </p>
                @endif
            </div>

            <div class="qris-wrapper">
                <p class="qris-description">
                    Pastikan pembayaran menggunakan QRIS resmi SPORTSPACE
                    dan nominal yang sesuai.
                </p>

                <img
                    src="{{ asset('image/qris.jpeg') }}"
                    alt="QRIS SPORTSPACE"
                    class="qris-image"
                >

                <div class="qris-amount">
                    <div class="qris-amount-label">Nominal pembayaran</div>
                    <div class="qris-amount-value">
                        Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                    </div>
                </div>
            </div>
        @endif

        {{-- MENUNGGU VERIFIKASI --}}
        @if ($paymentStatus === 'waiting_verification')
            <div class="alert alert-info" style="margin-top: 20px;">
                <strong>Bukti pembayaran berhasil dikirim.</strong>
                <br>
                Admin sedang memeriksa pembayaran kamu. Kamu tidak perlu
                mengunggah bukti lagi selama proses verifikasi berlangsung.
            </div>
        @endif

        {{-- PEMBAYARAN LUNAS --}}
        @if ($paymentStatus === 'paid')
            <div class="alert alert-success" style="margin-top: 20px;">
                <strong>Pembayaran berhasil diverifikasi!</strong>
                <br>
                Pembayaran telah dinyatakan lunas oleh admin SPORTSPACE.
                Simpan bukti pembayaran di bawah sebagai referensi transaksi.
            </div>
        @endif

        {{-- BOOKING DIBATALKAN --}}
        @if ($bookingStatus === 'cancelled')
            <div class="alert alert-error" style="margin-top: 20px;">
                Pesanan ini telah dibatalkan. Fitur pembayaran dan unggah
                bukti tidak tersedia untuk pesanan ini.
            </div>
        @endif

        {{-- FORM UNGGAH ATAU UNGGAH ULANG BUKTI --}}
        @if ($canUploadProof)
            <form
                action="{{ route('bookings.payment-proof', $booking->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="upload-form"
            >
                @csrf

                <label for="payment_proof" class="form-label">
                    {{ $paymentStatus === 'rejected' ? 'Unggah Ulang Bukti Pembayaran' : 'Unggah Bukti Pembayaran' }}
                </label>

                <input
                    type="file"
                    id="payment_proof"
                    name="payment_proof"
                    class="file-input"
                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                    required
                >

                <p class="file-help">
                    Format yang didukung: JPG, JPEG, PNG, atau WEBP.
                    Ukuran maksimal 2 MB.
                </p>

                <button
                    type="submit"
                    class="button button-primary"
                    style="margin-top: 18px;"
                >
                    {{ $paymentStatus === 'rejected' ? 'Kirim Ulang Bukti Pembayaran' : 'Unggah Bukti Pembayaran' }}
                </button>
            </form>
        @endif

        {{-- BUKTI PEMBAYARAN YANG SUDAH DIUNGGAH --}}
        @if ($proofUrl)
            <div class="proof-section">
                <h3 class="proof-title">Bukti Pembayaran Saya</h3>

                <p class="proof-description">
                    Bukti transaksi yang kamu unggah untuk pesanan #{{ $booking->id }}.
                    Bukti ini tetap tersedia setelah pembayaran diverifikasi.
                </p>

                <a
                    href="{{ $proofUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Buka bukti pembayaran ukuran penuh"
                >
                    <img
                        src="{{ $proofUrl }}"
                        alt="Bukti pembayaran pesanan #{{ $booking->id }}"
                        class="proof-preview"
                        loading="lazy"
                        onerror="this.style.display='none'; document.getElementById('proof-error-{{ $booking->id }}').style.display='block';"
                    >
                </a>

                <div
                    id="proof-error-{{ $booking->id }}"
                    class="alert alert-error"
                    style="display: none; text-align: left;"
                >
                    Gambar bukti tidak dapat ditampilkan. Silakan klik tautan
                    di bawah untuk mencoba membukanya.
                </div>

                <a
                    href="{{ $proofUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="proof-link"
                >
                    Lihat Bukti Pembayaran Ukuran Penuh 
                </a>
            </div>
        @else
            <div class="alert alert-info" style="margin-top: 20px;">
                Belum ada bukti pembayaran yang diunggah untuk pesanan ini.
            </div>
        @endif
    </section>

    {{-- KEMBALI KE PESANAN --}}
    <div class="action-buttons">
        <a
            href="{{ route('bookings.orders') }}"
            class="button button-secondary"
        >
            Kembali ke Pesanan Saya
        </a>
    </div>

</main>

</body>
</html>
