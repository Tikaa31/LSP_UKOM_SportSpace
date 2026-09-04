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
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
        }

        .admin-title h1 {
            margin: 0 0 6px;
            font-size: 28px;
        }

        .admin-title p {
            margin: 0;
            color: #64748b;
            line-height: 1.5;
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
            border-radius: 14px;
            background: #eff6ff;
            font-size: 28px;
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
        }

        .edit-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #eff6ff;
            color: #2563eb;
        }

        .delete-button {
            background: #fee2e2;
            color: #dc2626;
        }

        .empty-state {
            padding: 50px 20px;
            text-align: center;
            color: #64748b;
        }

        /* MOBILE */
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
                flex-direction: column;
                align-items: stretch;
            }

            .admin-title h1 {
                font-size: 24px;
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

    <div class="admin-header">

        <div class="admin-title">
            <h1>Manajemen Olahraga</h1>
            <p>Tambah, ubah, atau hapus jenis olahraga.</p>
        </div>

        <a
            href="{{ route('admin.sports.create') }}"
            class="add-button"
        >
            + Tambah Olahraga
        </a>

    </div>


    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
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
                                {{ $sport->icon }}
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
                    {{ $sport->icon }}
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