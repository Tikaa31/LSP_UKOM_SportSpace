
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Refund - SPORTSPACE</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">

    <style>
        * { box-sizing: border-box; }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #eff6ff;
            --text: #172033;
            --muted: #7b8798;
            --border: #e5eaf1;
            --background: #f5f7fb;
            --card: #fff;
            --success: #16a34a;
            --warning: #d97706;
            --danger: #dc2626;
        }

        body {
            margin: 0;
            min-width: 320px;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        button, input, textarea { font: inherit; }

        .refund-page {
            width: 100%;
            max-width: 1200px;
            min-height: 100vh;
            margin: 0 auto;
            padding: 22px 20px 120px;
        }

        /* HEADER SPORTSPACE */
        .page-header {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, auto) minmax(0, 1fr);
            align-items: center;
            gap: 18px;
            width: 100%;
            padding: 18px 22px;
            margin-bottom: 25px;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 5px 18px rgba(15, 23, 42, .03);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            justify-self: start;
            gap: 11px;
            min-width: 0;
            color: var(--text);
            text-decoration: none;
        }

        .brand img {
            display: block;
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            object-fit: contain;
        }

        .brand span {
            font-size: 19px;
            font-weight: 800;
            letter-spacing: .3px;
            white-space: nowrap;
        }

        .page-title {
            min-width: 0;
            text-align: center;
        }

        .page-title h1 {
            margin: 0;
            font-size: 27px;
            letter-spacing: -.5px;
        }

        .page-title p {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.5;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            justify-self: end;
            min-height: 42px;
            padding: 10px 18px;
            border: 1px solid #dbeafe;
            border-radius: 11px;
            background: #fff;
            color: var(--primary);
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
            transition: .2s ease;
        }

        .back-button:hover {
            background: var(--primary-light);
            border-color: #c9dcff;
            transform: translateY(-1px);
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
            max-width: 700px;
            color: #eaf1ff;
            font-size: 14px;
            line-height: 1.7;
        }

        .alert {
            padding: 14px 16px;
            margin-bottom: 18px;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.5;
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
            background: var(--card);
            box-shadow: 0 8px 25px rgba(15, 23, 42, .04);
        }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .section-heading h2 { margin: 0; font-size: 19px; }

        .section-description {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 22px;
        }

        .summary-card {
            padding: 18px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: white;
            box-shadow: 0 5px 18px rgba(15, 23, 42, .03);
        }

        .summary-label { color: var(--muted); font-size: 13px; }

        .summary-number {
            margin-top: 9px;
            font-size: 27px;
            font-weight: 800;
        }

        .refund-list { display: grid; gap: 16px; }

        .refund-item {
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: #fff;
        }

        .refund-item-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 16px;
        }

        .refund-item h3 {
            margin: 0 0 6px;
            font-size: 16px;
            line-height: 1.5;
        }

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

        .form-group { margin-top: 17px; }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
        }

        .form-control {
            display: block;
            width: 100%;
            min-height: 44px;
            padding: 11px 13px;
            border: 1px solid #dbe2ea;
            border-radius: 12px;
            outline: none;
            background: #fff;
            color: var(--text);
        }

        textarea.form-control { min-height: 85px; resize: vertical; }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
        }

        .form-help {
            display: block;
            margin-top: 7px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 17px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 43px;
            padding: 11px 16px;
            border: 0;
            border-radius: 11px;
            color: white;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: .2s ease;
        }

        .button:hover { transform: translateY(-1px); }
        .button-approve { background: var(--primary); }
        .button-approve:hover { background: var(--primary-dark); }
        .button-reject { background: #dc2626; }
        .button-reject:hover { background: #b91c1c; }
        .button-refunded { background: #16a34a; }
        .button-refunded:hover { background: #15803d; }
        .button-proof { background: #2563eb; }
        .button-proof:hover { background: #1d4ed8; }

        .empty-state {
            padding: 34px 18px;
            text-align: center;
            border: 1px dashed #cbd5e1;
            border-radius: 15px;
            background: #f8fafc;
        }

        .empty-icon { display: block; margin-bottom: 12px; font-size: 35px; }
        .empty-state h3 { margin: 0 0 8px; font-size: 16px; }

        .empty-state p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .required { color: #dc2626; }

        @media (max-width: 800px) {
            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .page-header {
                grid-template-columns: minmax(0, 1fr) auto;
                gap: 14px;
                padding: 16px 18px;
            }

            .page-title {
                grid-column: 1 / -1;
                grid-row: 2;
                text-align: left;
            }

            .back-button {
                grid-column: 2;
                grid-row: 1;
            }
        }

        @media (max-width: 600px) {
            .refund-page { padding: 16px 14px 105px; }

            .page-header {
                gap: 10px;
                margin-bottom: 18px;
                padding: 14px;
            }

            .brand { gap: 8px; }
            .brand img { width: 40px; height: 40px; }
            .brand span { font-size: 16px; }

            .back-button {
                min-height: 39px;
                padding: 9px 13px;
                font-size: 13px;
            }

            .page-title h1 { font-size: 22px; }
            .page-title p { font-size: 12px; }

            .intro-card { padding: 21px 18px; border-radius: 18px; }
            .intro-card h2 { font-size: 19px; }
            .section-card { padding: 17px; border-radius: 17px; }
            .section-heading h2 { font-size: 17px; }
            .summary-grid { gap: 10px; }
            .summary-card { padding: 14px; }
            .summary-number { font-size: 23px; }
            .refund-item { padding: 15px; }
            .refund-item-header { flex-direction: column; }
            .details-grid { grid-template-columns: 1fr; gap: 10px; }
            .refund-amount { font-size: 20px; }
            .actions { flex-direction: column; }
            .button { width: 100%; }
        }
    </style>
</head>
<body>

<main class="refund-page">

    <header class="page-header">
        <a href="{{ route('admin.dashboard') }}"
           class="brand"
           aria-label="SPORTSPACE - Dashboard Admin">
            <img src="{{ asset('image/logosportspace.png') }}"
                 alt="Logo SPORTSPACE">
            <span>SPORTSPACE</span>
        </a>

        <div class="page-title">
            <h1>Kelola Refund</h1>
            <p>Periksa dan proses pengembalian dana pengguna.</p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="back-button">
            Kembali
        </a>
    </header>

    <section class="intro-card">
        <h2>Manajemen Refund SPORTSPACE</h2>
        <p>
            Kelola permohonan pengembalian dana secara teratur.
            Periksa alasan pengajuan, putuskan persetujuan, lalu
            unggah bukti setelah dana benar-benar dikembalikan.
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
            <strong>Periksa kembali data yang dimasukkan.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        $allRefunds = $refunds ?? collect();
        $pendingCount = $allRefunds->where('status', 'pending')->count();
        $approvedCount = $allRefunds->where('status', 'approved')->count();
        $refundedCount = $allRefunds->where('status', 'refunded')->count();
        $rejectedCount = $allRefunds->where('status', 'rejected')->count();
    @endphp

    <section class="summary-grid">
        <div class="summary-card">
            <div class="summary-label">Total Pengajuan</div>
            <div class="summary-number">{{ $allRefunds->count() }}</div>
        </div>

        <div class="summary-card">
            <div class="summary-label">Menunggu</div>
            <div class="summary-number">{{ $pendingCount }}</div>
        </div>

        <div class="summary-card">
            <div class="summary-label">Disetujui</div>
            <div class="summary-number">{{ $approvedCount }}</div>
        </div>

        <div class="summary-card">
            <div class="summary-label">Selesai</div>
            <div class="summary-number">{{ $refundedCount }}</div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-heading">
            <div>
                <h2>Daftar Pengajuan Refund</h2>
                <p class="section-description">
                    Semua pengajuan refund pengguna ditampilkan di bawah ini.
                </p>
            </div>
        </div>

        @if ($allRefunds->count())
            <div class="refund-list">
                @foreach ($allRefunds as $refund)
                    @php
                        $status = strtolower($refund->status ?? 'pending');

                        $statusLabels = [
                            'pending' => 'Menunggu Pemeriksaan',
                            'approved' => 'Disetujui',
                            'rejected' => 'Ditolak',
                            'refunded' => 'Dana Dikembalikan',
                        ];
                    @endphp

                    <article class="refund-item">
                        <div class="refund-item-header">
                            <div>
                                <h3>
                                    {{ $refund->booking->venue->name ?? 'Lapangan' }}
                                </h3>

                                <div class="muted">
                                    Booking #{{ $refund->booking_id }}
                                    · Pengguna: {{ $refund->user->name ?? 'Pengguna' }}
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
                                <div class="detail-label">Tanggal Pengajuan</div>
                                <div class="detail-value">
                                    {{ $refund->requested_at ? $refund->requested_at->format('d M Y, H:i') : ($refund->created_at?->format('d M Y, H:i') ?? '-') }}
                                </div>
                            </div>

                            <div class="detail-box">
                                <div class="detail-label">Tanggal Diproses</div>
                                <div class="detail-value">
                                    {{ $refund->processed_at?->format('d M Y, H:i') ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="details-grid">
                            <div class="detail-box">
                                <div class="detail-label">Metode Pengembalian</div>
                                <div class="detail-value">
                                    @if ($refund->refund_method === 'bank_transfer')
                                        Transfer Bank
                                    @elseif ($refund->refund_method === 'e_wallet')
                                        E-Wallet
                                    @else
                                        Belum tersedia
                                    @endif
                                </div>
                            </div>

                            <div class="detail-box">
                                <div class="detail-label">Nama Pemilik Rekening</div>
                                <div class="detail-value">
                                    {{ $refund->account_name ?: '-' }}
                                </div>
                            </div>

                            <div class="detail-box">
                                <div class="detail-label">Bank / Penyedia E-Wallet</div>
                                <div class="detail-value">
                                    {{ $refund->bank_name ?: '-' }}
                                </div>
                            </div>

                            <div class="detail-box">
                                <div class="detail-label">Nomor Rekening / Akun</div>
                                <div class="detail-value">
                                    {{ $refund->account_number ?: '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="detail-box">
                            <div class="detail-label">Alasan Pengajuan</div>
                            <div class="detail-value" style="font-weight:400">
                                {{ $refund->reason }}
                            </div>
                        </div>

                        @if ($refund->admin_note)
                            <div class="detail-box" style="margin-top:12px">
                                <div class="detail-label">Catatan Admin</div>
                                <div class="detail-value" style="font-weight:400">
                                    {{ $refund->admin_note }}
                                </div>
                            </div>
                        @endif

                        @if ($refund->processor)
                            <p class="muted">
                                Diproses oleh: {{ $refund->processor->name }}
                            </p>
                        @endif

                        @if ($status === 'pending')
                            <form
                                action="{{ route('admin.refunds.approve', $refund->id) }}"
                                method="POST"
                                onsubmit="return confirm('Setujui pengajuan refund ini?')"
                            >
                                @csrf
                                @method('PATCH')

                                <div class="form-group">
                                    <label for="approve-note-{{ $refund->id }}">
                                        Catatan Admin (Opsional)
                                    </label>

                                    <textarea
                                        class="form-control"
                                        id="approve-note-{{ $refund->id }}"
                                        name="admin_note"
                                        maxlength="2000"
                                        placeholder="Tambahkan catatan jika diperlukan."
                                    ></textarea>
                                </div>

                                <div class="actions">
                                    <button type="submit" class="button button-approve">
                                        Setujui Refund
                                    </button>
                                </div>
                            </form>

                            <form
                                action="{{ route('admin.refunds.reject', $refund->id) }}"
                                method="POST"
                                onsubmit="return confirm('Tolak pengajuan refund ini?')"
                            >
                                @csrf
                                @method('PATCH')

                                <div class="form-group">
                                    <label for="reject-note-{{ $refund->id }}">
                                        Alasan Penolakan
                                    </label>

                                    <textarea
                                        class="form-control"
                                        id="reject-note-{{ $refund->id }}"
                                        name="admin_note"
                                        minlength="3"
                                        maxlength="2000"
                                        required
                                        placeholder="Tuliskan alasan penolakan."
                                    ></textarea>
                                </div>

                                <div class="actions">
                                    <button type="submit" class="button button-reject">
                                        Tolak Refund
                                    </button>
                                </div>
                            </form>

                        @elseif ($status === 'approved')
                            <form
                                action="{{ route('admin.refunds.mark-refunded', $refund->id) }}"
                                method="POST"
                                enctype="multipart/form-data"
                                onsubmit="return confirm('Pastikan dana benar-benar sudah ditransfer dan bukti transfer benar sebelum menyelesaikan refund.')"
                            >
                                @csrf
                                @method('PATCH')

                                <div class="detail-box" style="margin-top:16px">
                                    <strong>Refund disetujui</strong>
                                    <p class="muted" style="margin-bottom:0">
                                        Lakukan transfer secara manual terlebih dahulu.
                                        Setelah dana dikirim, unggah bukti transfer di bawah.
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label for="transfer-proof-{{ $refund->id }}">
                                        Bukti Transfer <span class="required">*</span>
                                    </label>

                                    <input
                                        class="form-control"
                                        type="file"
                                        id="transfer-proof-{{ $refund->id }}"
                                        name="transfer_proof"
                                        accept=".jpg,.jpeg,.png,.webp,.pdf"
                                        required
                                    >

                                    <small class="form-help">
                                        Format JPG, JPEG, PNG, WEBP, atau PDF.
                                        Ukuran maksimal 5 MB.
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label for="transfer-reference-{{ $refund->id }}">
                                        Nomor Referensi Transfer (Opsional)
                                    </label>

                                    <input
                                        class="form-control"
                                        type="text"
                                        id="transfer-reference-{{ $refund->id }}"
                                        name="transfer_reference"
                                        maxlength="150"
                                        placeholder="Contoh: TRX123456789"
                                    >
                                </div>

                                <div class="actions">
                                    <button type="submit" class="button button-refunded">
                                        Upload Bukti &amp; Selesaikan Refund
                                    </button>
                                </div>
                            </form>

                        @elseif ($status === 'refunded')
                            <div class="detail-box" style="margin-top:16px">
                                <div class="detail-label">Status Pengembalian</div>
                                <div class="detail-value">
                                    Refund telah ditandai selesai.
                                </div>

                                @if ($refund->transfer_reference)
                                    <div class="detail-label" style="margin-top:12px">
                                        Nomor Referensi Transfer
                                    </div>
                                    <div class="detail-value">
                                        {{ $refund->transfer_reference }}
                                    </div>
                                @endif

                                @if ($refund->transfer_proof_path)
                                    <p class="muted">
                                        Bukti transfer tersimpan di penyimpanan privat.
                                    </p>
                                @else
                                    <p class="muted">
                                        Tidak ada file bukti transfer yang tercatat untuk refund ini.
                                    </p>
                                @endif
                            </div>
                        @endif
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <span class="empty-icon">📋</span>
                <h3>Belum Ada Pengajuan Refund</h3>
                <p>
                    Pengajuan refund dari pengguna akan muncul di halaman ini.
                </p>
            </div>
        @endif
    </section>

</main>
</body>
</html>
