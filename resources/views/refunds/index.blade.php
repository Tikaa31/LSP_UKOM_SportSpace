
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Saya - SPORTSPACE</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">

    <style>
        * { box-sizing: border-box; }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --text: #172033;
            --muted: #7b8798;
            --border: #e5eaf1;
            --background: #f5f7fb;
            --danger: #dc2626;
        }

        body {
            margin: 0;
            min-width: 320px;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        button, input, textarea, select { font: inherit; }

        .refund-page {
            width: 100%;
            max-width: 1000px;
            min-height: 100vh;
            margin: 0 auto;
            padding: 22px 20px 120px;
        }

        .page-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 25px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            border: 1px solid #e5edf8;
            border-radius: 12px;
            background: #fff;
            color: var(--primary);
            cursor: pointer;
        }

        .back-button svg { width: 22px; height: 22px; }
        .page-title h1 { margin: 0; font-size: 27px; }

        .page-title p {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.5;
        }

        .intro-card {
            padding: 24px;
            margin-bottom: 22px;
            border-radius: 22px;
            color: white;
            background: linear-gradient(135deg, #2563eb, #1e40af);
            box-shadow: 0 12px 28px rgba(37, 99, 235, .15);
        }

        .intro-card h2 { margin: 0 0 9px; font-size: 22px; }

        .intro-card p {
            margin: 0;
            color: #eaf1ff;
            font-size: 14px;
            line-height: 1.7;
        }

        .notice, .alert {
            padding: 14px 16px;
            margin-bottom: 18px;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.6;
        }

        .notice {
            border: 1px solid #bfdbfe;
            background: #eff6ff;
            color: #1e40af;
        }

        .alert-success {
            color: #166534;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            color: #991b1b;
            background: #fef2f2;
            border: 1px solid #fecaca;
        }

        .alert ul { margin: 8px 0 0; padding-left: 20px; }

        .section-card {
            padding: 24px;
            margin-bottom: 22px;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .04);
        }

        .section-heading { margin-bottom: 20px; }
        .section-heading h2 { margin: 0; font-size: 19px; }

        .section-description {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .refund-list { display: grid; gap: 16px; }

        .refund-item {
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: #fff;
            min-width: 0;
        }

        .refund-item-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 16px;
        }

        .refund-item h3 { margin: 0 0 6px; font-size: 16px; }

        .muted {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .refund-amount {
            margin: 14px 0;
            color: var(--primary);
            font-size: 22px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin: 16px 0;
        }

        .detail-box {
            padding: 13px;
            border-radius: 12px;
            background: #f8fafc;
            min-width: 0;
            overflow-wrap: anywhere;
        }

        .detail-label {
            margin-bottom: 6px;
            color: var(--muted);
            font-size: 12px;
        }

        .detail-value {
            font-size: 14px;
            font-weight: 700;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-flex;
            align-items: center;
            padding: 7px 11px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-pending { color: #92400e; background: #fef3c7; }
        .status-approved { color: #1d4ed8; background: #dbeafe; }
        .status-rejected { color: #991b1b; background: #fee2e2; }
        .status-refunded { color: #166534; background: #dcfce7; }

        .form-group { margin-bottom: 17px; }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
        }

        .form-control {
            display: block;
            width: 100%;
            min-height: 45px;
            padding: 11px 13px;
            border: 1px solid #dbe2ea;
            border-radius: 12px;
            outline: none;
            background: #fff;
            color: var(--text);
        }

        textarea.form-control { min-height: 100px; resize: vertical; }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
        }

        .error-text {
            display: block;
            margin-top: 7px;
            color: var(--danger);
            font-size: 12px;
        }

        .button-primary, .button-proof {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 11px 17px;
            border: 0;
            border-radius: 12px;
            background: var(--primary);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .2s ease;
        }

        .button-primary:hover, .button-proof:hover {
            background: var(--primary-dark);
        }

        .actions { margin-top: 14px; }

        .empty-state {
            padding: 34px 18px;
            text-align: center;
            border: 1px dashed #cbd5e1;
            border-radius: 15px;
            background: #f8fafc;
        }

        .empty-icon {
            display: block;
            margin-bottom: 12px;
            font-size: 35px;
        }

        .empty-state h3 { margin: 0 0 8px; font-size: 16px; }

        .empty-state p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        @media (max-width: 600px) {
            .refund-page { padding: 16px 14px 105px; }
            .page-header { gap: 10px; }
            .page-title h1 { font-size: 22px; }
            .page-title p { font-size: 12px; }
            .intro-card { padding: 21px 18px; }
            .intro-card h2 { font-size: 19px; }
            .section-card { padding: 17px; }
            .refund-item { padding: 15px; }
            .refund-item-header { flex-direction: column; }
            .details-grid { grid-template-columns: 1fr; gap: 10px; }
            .refund-amount { font-size: 20px; }
            .button-primary, .button-proof { width: 100%; }
        }
    </style>
</head>
<body>
<main class="refund-page">

    <header class="page-header">
        <button
            type="button"
            class="back-button"
            onclick="window.history.back()"
            aria-label="Kembali"
            title="Kembali"
        >
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" aria-hidden="true">
                <path d="M19 12H5"></path>
                <path d="m12 19-7-7 7-7"></path>
            </svg>
        </button>

        <div class="page-title">
            <h1>Refund Saya</h1>
            <p>Kelola pengajuan dan riwayat pengembalian dana.</p>
        </div>
    </header>

    <section class="intro-card">
        <h2>Pengembalian Dana SPORTSPACE</h2>
        <p>
            Masukkan rekening atau e-wallet tujuan dengan benar.
            Admin akan memeriksa pengajuan dan mengembalikan dana
            setelah permohonan disetujui.
        </p>
    </section>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            <strong>Periksa kembali data yang kamu masukkan.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="notice">
        <strong>Informasi:</strong>
        Pengajuan refund diperiksa oleh admin. Dana belum dikembalikan
        hanya karena pengajuan disetujui. Jangan memasukkan PIN,
        kata sandi, atau kode OTP rekening/e-wallet.
    </div>

    {{-- PESANAN YANG MEMENUHI SYARAT REFUND --}}
    <section class="section-card">
        <div class="section-heading">
            <h2>Pesanan yang Bisa Direfund</h2>
            <p class="section-description">
                Pesanan yang dibatalkan dan sudah dibayar dapat diajukan
                untuk refund jika belum memiliki pengajuan.
            </p>
        </div>

        @if (isset($eligibleBookings) && $eligibleBookings->count())
            <div class="refund-list">
                @foreach ($eligibleBookings as $booking)
                    <article class="refund-item">
                        <div class="refund-item-header">
                            <div>
                                <h3>{{ $booking->venue->name ?? 'Lapangan' }}</h3>
                                <div class="muted">
                                    Kode booking: #{{ $booking->id }}
                                </div>
                            </div>
                            <span class="status status-pending">
                                Memenuhi syarat
                            </span>
                        </div>

                        <div class="details-grid">
                            <div class="detail-box">
                                <div class="detail-label">Total Pembayaran</div>
                                <div class="detail-value">
                                    Rp{{ number_format((float) $booking->total_price, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="detail-box">
                                <div class="detail-label">Status Pembayaran</div>
                                <div class="detail-value">Lunas</div>
                            </div>
                        </div>

                        <form
                            action="{{ route('refunds.store', $booking->id) }}"
                            method="POST"
                        >
                            @csrf

                            <div class="form-group">
                                <label for="reason-{{ $booking->id }}">
                                    Alasan Pengajuan Refund
                                </label>
                                <textarea
                                    class="form-control"
                                    id="reason-{{ $booking->id }}"
                                    name="reason"
                                    minlength="10"
                                    maxlength="2000"
                                    required
                                    placeholder="Jelaskan alasan pengajuan refund (minimal 10 karakter)."
                                >{{ old('reason') }}</textarea>
                                @error('reason')
                                    <span class="error-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="refund-method-{{ $booking->id }}">
                                    Metode Pengembalian Dana
                                </label>
                                <select
                                    class="form-control"
                                    id="refund-method-{{ $booking->id }}"
                                    name="refund_method"
                                    required
                                >
                                    <option value="">Pilih metode</option>
                                    <option value="bank_transfer"
                                        @selected(old('refund_method') === 'bank_transfer')>
                                        Transfer Bank
                                    </option>
                                    <option value="e_wallet"
                                        @selected(old('refund_method') === 'e_wallet')>
                                        E-Wallet
                                    </option>
                                </select>
                                @error('refund_method')
                                    <span class="error-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="account-name-{{ $booking->id }}">
                                    Nama Pemilik Rekening / E-Wallet
                                </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="account-name-{{ $booking->id }}"
                                    name="account_name"
                                    maxlength="150"
                                    value="{{ old('account_name') }}"
                                    required
                                    autocomplete="name"
                                    placeholder="Masukkan nama pemilik"
                                >
                                @error('account_name')
                                    <span class="error-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="bank-name-{{ $booking->id }}">
                                    Nama Bank / Penyedia E-Wallet
                                </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="bank-name-{{ $booking->id }}"
                                    name="bank_name"
                                    maxlength="100"
                                    value="{{ old('bank_name') }}"
                                    required
                                    placeholder="Contoh: BCA, BRI, DANA, OVO"
                                >
                                @error('bank_name')
                                    <span class="error-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="account-number-{{ $booking->id }}">
                                    Nomor Rekening / Nomor E-Wallet
                                </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="account-number-{{ $booking->id }}"
                                    name="account_number"
                                    maxlength="100"
                                    value="{{ old('account_number') }}"
                                    required
                                    autocomplete="off"
                                    placeholder="Masukkan nomor tujuan pengembalian"
                                >
                                @error('account_number')
                                    <span class="error-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <button
                                type="submit"
                                class="button-primary"
                                onclick="return confirm('Pastikan informasi rekening tujuan sudah benar. Ajukan refund sekarang?')"
                            >
                                Ajukan Refund
                            </button>
                        </form>
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <span class="empty-icon">📋</span>
                <h3>Belum Ada Pesanan yang Memenuhi Syarat</h3>
                <p>
                    Pesanan yang dapat diajukan untuk refund akan muncul di sini.
                </p>
            </div>
        @endif
    </section>

    {{-- RIWAYAT REFUND --}}
    <section class="section-card">
        <div class="section-heading">
            <h2>Riwayat Refund</h2>
            <p class="section-description">
                Pantau status semua pengajuan refund dan bukti transfer.
            </p>
        </div>

        @if (isset($refunds) && $refunds->count())
            <div class="refund-list">
                @foreach ($refunds as $refund)
                    @php
                        $status = strtolower($refund->status ?? 'pending');

                        $statusLabels = [
                            'pending' => 'Menunggu Pemeriksaan',
                            'approved' => 'Disetujui',
                            'rejected' => 'Ditolak',
                            'refunded' => 'Dana Dikembalikan',
                        ];

                        $methodLabels = [
                            'bank_transfer' => 'Transfer Bank',
                            'e_wallet' => 'E-Wallet',
                        ];
                    @endphp

                    <article class="refund-item">
                        <div class="refund-item-header">
                            <div>
                                <h3>
                                    {{ $refund->booking->venue->name ?? 'Lapangan' }}
                                </h3>
                                <div class="muted">
                                    Kode booking: #{{ $refund->booking_id }}
                                </div>
                            </div>

                            <span class="status status-{{ in_array($status, ['pending', 'approved', 'rejected', 'refunded']) ? $status : 'pending' }}">
                                {{ $statusLabels[$status] ?? ucfirst($status) }}
                            </span>
                        </div>

                        <div class="refund-amount">
                            Rp{{ number_format((float) $refund->amount, 0, ',', '.') }}
                        </div>

                        <div class="details-grid">
                            <div class="detail-box">
                                <div class="detail-label">Metode Pengembalian</div>
                                <div class="detail-value">
                                    {{ $methodLabels[$refund->refund_method] ?? '-' }}
                                </div>
                            </div>

                            <div class="detail-box">
                                <div class="detail-label">Nama Bank / E-Wallet</div>
                                <div class="detail-value">
                                    {{ $refund->bank_name ?? '-' }}
                                </div>
                            </div>

                            <div class="detail-box">
                                <div class="detail-label">Nama Pemilik</div>
                                <div class="detail-value">
                                    {{ $refund->account_name ?? '-' }}
                                </div>
                            </div>

                            <div class="detail-box">
                                <div class="detail-label">Nomor Tujuan</div>
                                <div class="detail-value">
                                    {{ $refund->account_number ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="detail-box">
                            <div class="detail-label">Alasan Refund</div>
                            <div class="detail-value" style="font-weight:400">
                                {{ $refund->reason }}
                            </div>
                        </div>

                        <div class="details-grid">
                            <div class="detail-box">
                                <div class="detail-label">Tanggal Pengajuan</div>
                                <div class="detail-value">
                                    {{ $refund->requested_at?->format('d M Y, H:i') ?? $refund->created_at?->format('d M Y, H:i') ?? '-' }}
                                </div>
                            </div>

                            <div class="detail-box">
                                <div class="detail-label">Tanggal Diproses</div>
                                <div class="detail-value">
                                    {{ $refund->processed_at?->format('d M Y, H:i') ?? '-' }}
                                </div>
                            </div>
                        </div>

                        @if ($refund->admin_note)
                            <div class="detail-box">
                                <div class="detail-label">Catatan Admin</div>
                                <div class="detail-value" style="font-weight:400">
                                    {{ $refund->admin_note }}
                                </div>
                            </div>
                        @endif

                        @if ($status === 'approved')
                            <p class="muted">
                                Pengajuan disetujui. Dana belum tentu dikembalikan;
                                tunggu konfirmasi dan bukti transfer dari admin.
                            </p>

                        @elseif ($status === 'rejected')
                            <p class="muted">
                                Pengajuan ditolak. Periksa catatan admin untuk
                                mengetahui alasannya.
                            </p>

                        @elseif ($status === 'refunded')
                            <p class="muted">
                                Pengembalian dana telah ditandai selesai oleh admin.
                                @if ($refund->refunded_at)
                                    Tanggal:
                                    {{ $refund->refunded_at->format('d M Y, H:i') }}.
                                @endif
                            </p>

                            @if ($refund->transfer_reference)
                                <div class="detail-box">
                                    <div class="detail-label">Referensi Transfer</div>
                                    <div class="detail-value">
                                        {{ $refund->transfer_reference }}
                                    </div>
                                </div>
                            @endif

                            @if ($refund->transfer_proof_path)
                                <div class="actions">
                                    <a
                                        href="{{ route('refunds.proof', $refund->id) }}"
                                        class="button-proof"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Lihat Bukti Transfer
                                    </a>
                                </div>
                            @else
                                <p class="muted">
                                    Bukti transfer belum tersedia.
                                </p>
                            @endif
                        @endif
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <span class="empty-icon">💳</span>
                <h3>Belum Ada Riwayat Refund</h3>
                <p>
                    Pengajuan refund yang kamu buat akan ditampilkan di sini.
                </p>
            </div>
        @endif
    </section>
</main>
</body>
</html>
