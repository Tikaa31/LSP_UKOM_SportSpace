<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manajemen Olahraga - SPORTSPACE</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-width: 320px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1e293b;
        }

        .admin-page {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 24px;
        }

        .admin-header {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto minmax(0, 1fr);
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            justify-self: start;
            gap: 10px;
            min-width: 0;
            color: #1e293b;
            text-decoration: none;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .brand img {
            display: block;
            width: 46px;
            height: 46px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .admin-title {
            text-align: center;
            min-width: 0;
        }

        .admin-title h1 {
            margin: 0 0 6px;
            font-size: 28px;
            line-height: 1.2;
        }

        .admin-title p {
            margin: 0;
            color: #64748b;
            line-height: 1.5;
            font-size: 14px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            justify-self: end;
            min-height: 42px;
            padding: 10px 18px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            background: #ffffff;
            color: #334155;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
            transition: background 0.2s, border-color 0.2s;
        }

        .back-button:hover {
            background: #f1f5f9;
            border-color: #94a3b8;
        }

        .page-actions {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .add-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            padding: 12px 20px;
            border-radius: 12px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            font-weight: 700;
            white-space: nowrap;
            transition: background 0.2s;
        }

        .add-button:hover {
            background: #1d4ed8;
        }

        .success-message {
            margin-bottom: 20px;
            padding: 14px 16px;
            border-radius: 12px;
            background: #dcfce7;
            color: #166534;
            font-weight: 600;
        }

        .error-message {
            margin-bottom: 20px;
            padding: 14px 16px;
            border-radius: 12px;
            background: #fee2e2;
            color: #991b1b;
            font-weight: 600;
        }

        .table-card {
            overflow-x: auto;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
        }

        table {
            width: 100%;
            min-width: 600px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            font-size: 13px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .number-column {
            width: 70px;
            text-align: center;
        }

        .sport-icon {
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 14px;
            background: #eff6ff;
            flex-shrink: 0;
        }

        .sport-icon img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .sport-name {
            font-weight: 700;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-buttons form {
            margin: 0;
        }

        .edit-button,
        .delete-button {
            min-height: 40px;
            padding: 8px 14px;
            border: none;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .edit-button {
            background: #eff6ff;
            color: #2563eb;
        }

        .edit-button:hover {
            background: #dbeafe;
        }

        .delete-button {
            background: #fee2e2;
            color: #dc2626;
        }

        .delete-button:hover {
            background: #fecaca;
        }

        .empty-state {
            padding: 50px 20px;
            text-align: center;
            color: #64748b;
        }

        .sport-cards {
            display: none;
        }

        .sport-card {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 12px;
            padding: 15px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
        }

        .sport-card-content {
            flex: 1;
            min-width: 0;
        }

        .sport-card-name {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .sport-card-actions {
            display: flex;
            gap: 8px;
            margin-top: 10px;
        }

        .sport-card-actions form {
            margin: 0;
        }

        @media (max-width: 768px) {
            .admin-page {
                padding: 16px;
            }

            .admin-header {
                grid-template-columns: minmax(0, 1fr) auto;
                gap: 16px;
            }

            .brand {
                font-size: 17px;
            }

            .brand img {
                width: 40px;
                height: 40px;
            }

            .admin-title {
                grid-column: 1 / -1;
                grid-row: 2;
                text-align: left;
            }

            .admin-title h1 {
                font-size: 24px;
            }

            .back-button {
                grid-column: 2;
                grid-row: 1;
            }

            .page-actions {
                justify-content: stretch;
            }

            .add-button {
                width: 100%;
            }

            .table-card {
                display: none;
            }

            .sport-cards {
                display: block;
            }
        }

        @media (max-width: 400px) {
            .admin-page {
                padding: 12px;
            }

            .admin-header {
                gap: 12px;
            }

            .brand {
                gap: 7px;
                font-size: 15px;
            }

            .brand img {
                width: 34px;
                height: 34px;
            }

            .back-button {
                min-height: 38px;
                padding: 8px 12px;
                font-size: 13px;
            }

            .admin-title h1 {
                font-size: 22px;
            }

            .sport-card {
                align-items: flex-start;
                flex-direction: column;
            }

            .sport-card-content {
                width: 100%;
            }

            .sport-card-actions {
                width: 100%;
            }

            .sport-card-actions .edit-button,
            .sport-card-actions .delete-button {
                flex: 1;
            }
        }
    </style>
</head>

<body>

<div class="admin-page">

    {{-- HEADER ADMIN --}}
    <header class="admin-header">

        <a
            href="{{ route('admin.dashboard') }}"
            class="brand"
            aria-label="SPORTSPACE - Dashboard Admin"
        >
            <img
                src="{{ asset('image/logosportspace.png') }}"
                alt="Logo SPORTSPACE"
            >

            <span>SPORTSPACE</span>
        </a>

        <div class="admin-title">
            <h1>Manajemen Olahraga</h1>
            <p>Tambah, ubah, atau hapus jenis olahraga.</p>
        </div>

        <a
            href="{{ route('admin.dashboard') }}"
            class="back-button"
        >
            Kembali
        </a>

    </header>

    {{-- TOMBOL TAMBAH OLAHRAGA --}}
    <div class="page-actions">
        <a
            href="{{ route('admin.sports.create') }}"
            class="add-button"
        >
            + Tambah Olahraga
        </a>
    </div>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    {{-- DESKTOP --}}
    <div class="table-card">

        <table>

            <thead>
                <tr>
                    <th class="number-column">No</th>
                    <th>Icon</th>
                    <th>Nama Olahraga</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($sports as $sport)

                    <tr>

                        <td class="number-column">
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <div class="sport-icon">
                                @if ($sport->icon)
                                    <img
                                        src="{{ asset('storage/' . $sport->icon) }}"
                                        alt="Icon {{ $sport->name }}"
                                    >
                                @else
                                    🏆
                                @endif
                            </div>
                        </td>

                        <td>
                            <span class="sport-name">
                                {{ $sport->name }}
                            </span>
                        </td>

                        <td>
                            <div class="action-buttons">

                                <a
                                    href="{{ route('admin.sports.edit', $sport) }}"
                                    class="edit-button"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.sports.destroy', $sport) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus olahraga ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-button"
                                    >
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="empty-state">
                            Belum ada olahraga. Klik
                            <strong>+ Tambah Olahraga</strong>
                            untuk menambahkan.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- MOBILE --}}
    <div class="sport-cards">

        @forelse ($sports as $sport)

            <div class="sport-card">

                <div class="sport-icon">
                    @if ($sport->icon)
                        <img
                            src="{{ asset('storage/' . $sport->icon) }}"
                            alt="Icon {{ $sport->name }}"
                        >
                    @else
                        🏆
                    @endif
                </div>

                <div class="sport-card-content">

                    <p class="sport-card-name">
                        {{ $sport->name }}
                    </p>

                    <div class="sport-card-actions">

                        <a
                            href="{{ route('admin.sports.edit', $sport) }}"
                            class="edit-button"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.sports.destroy', $sport) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus olahraga ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-button"
                            >
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="sport-card">
                <div class="empty-state">
                    Belum ada olahraga.
                </div>
            </div>

        @endforelse

    </div>

</div>

</body>
</html>
