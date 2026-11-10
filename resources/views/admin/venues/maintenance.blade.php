
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Maintenance - SportSpace</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
            color: #1e293b;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        h1 {
            font-size: 26px;
            color: #1e3a8a;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            font-size: 14px;
        }

        .back-button {
            display: inline-block;
            text-decoration: none;
            background: #e2e8f0;
            color: #334155;
            padding: 11px 16px;
            border-radius: 8px;
            font-weight: bold;
        }

        .venue-info,
        .card {
            background: white;
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 22px;
            box-shadow: 0 2px 10px rgba(0,0,0,.04);
        }

        .venue-info h2 {
            color: #1e40af;
            font-size: 19px;
            margin-bottom: 8px;
        }

        .venue-info p {
            color: #64748b;
            font-size: 14px;
        }

        .card h2 {
            font-size: 19px;
            margin-bottom: 20px;
            color: #1e3a8a;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 14px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        .submit-button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .submit-button:hover {
            background: #1d4ed8;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
        }

        .maintenance-item {
            border: 1px solid #e2e8f0;
            border-left: 4px solid #94a3b8;
            border-radius: 9px;
            padding: 18px;
            margin-bottom: 14px;
        }

        .maintenance-item h3 {
            font-size: 16px;
            margin-bottom: 9px;
        }

        .maintenance-item p {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 8px;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Status jadwal maintenance */

        .status.available {
            background: #dcfce7;
            color: #166534;
        }

        .status.scheduled {
            background: #fef3c7;
            color: #92400e;
        }

        .status.ongoing {
            background: #fee2e2;
            color: #b91c1c;
        }

        .status.completed {
            background: #e2e8f0;
            color: #475569;
        }

        .delete-button {
            background: #fee2e2;
            color: #b91c1c;
            border: none;
            padding: 9px 13px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 8px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #94a3b8;
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
        }

        .venue-status {
            margin-top: 12px;
        }

        @media (max-width: 600px) {
            body {
                padding: 16px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <div>
            <h1>Kelola Maintenance</h1>
            <p class="subtitle">Pengaturan jadwal perbaikan lapangan SportSpace</p>
        </div>

        <a href="{{ route('admin.venues.index') }}" class="back-button">
            Kembali
        </a>
    </div>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="venue-info">
        <h2>{{ $venue->name }}</h2>
        <p>{{ $venue->location }}</p>

        @php
            $today = now()->startOfDay();

            $activeMaintenance = $maintenances->first(function ($maintenance) use ($today) {
                return $today->betweenIncluded(
                    $maintenance->start_date->copy()->startOfDay(),
                    $maintenance->end_date->copy()->startOfDay()
                );
            });

            $upcomingMaintenance = $maintenances->first(function ($maintenance) use ($today) {
                return $maintenance->start_date->copy()->startOfDay()->gt($today);
            });
        @endphp

        <div class="venue-status">
            @if ($activeMaintenance)
                <span class="status ongoing">
                    Dalam Perbaikan
                </span>
            @elseif ($upcomingMaintenance)
                <span class="status scheduled">
                    Terjadwal
                </span>
            @else
                <span class="status available">
                    Tersedia
                </span>
            @endif
        </div>
    </div>

    <div class="card">
        <h2>Tambah Jadwal Perbaikan</h2>

        <form action="{{ route('admin.venues.maintenance.store', $venue) }}"
              method="POST">
            @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label for="start_date">Tanggal Mulai</label>
                    <input
                        type="date"
                        id="start_date"
                        name="start_date"
                        value="{{ old('start_date') }}"
                        required
                    >

                    @error('start_date')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end_date">Tanggal Selesai</label>
                    <input
                        type="date"
                        id="end_date"
                        name="end_date"
                        value="{{ old('end_date') }}"
                        required
                    >

                    @error('end_date')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group full">
                    <label for="reason">Keterangan Perbaikan</label>
                    <textarea
                        id="reason"
                        name="reason"
                        placeholder="Contoh: Perbaikan lantai lapangan dan pengecatan ulang..."
                        required
                    >{{ old('reason') }}</textarea>

                    @error('reason')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group full">
                    <button type="submit" class="submit-button">
                        Simpan Jadwal Maintenance
                    </button>
                </div>

            </div>
        </form>
    </div>

    <div class="card">
        <h2>Daftar Jadwal Maintenance</h2>

        @forelse ($maintenances as $maintenance)

            @php
                $startDate = $maintenance->start_date->copy()->startOfDay();
                $endDate = $maintenance->end_date->copy()->startOfDay();

                if ($today->lt($startDate)) {
                    $statusLabel = 'Terjadwal';
                    $statusClass = 'scheduled';
                } elseif ($today->gt($endDate)) {
                    $statusLabel = 'Selesai';
                    $statusClass = 'completed';
                } else {
                    $statusLabel = 'Dalam Perbaikan';
                    $statusClass = 'ongoing';
                }
            @endphp

            <div class="maintenance-item">

                <span class="status {{ $statusClass }}">
                    {{ $statusLabel }}
                </span>

                <h3>{{ $venue->name }}</h3>

                <p>
                    <strong>Tanggal:</strong>
                    {{ $maintenance->start_date->format('d M Y') }}
                    -
                    {{ $maintenance->end_date->format('d M Y') }}
                </p>

                <p>
                    <strong>Keterangan:</strong>
                    {{ $maintenance->reason }}
                </p>

                <form
                    action="{{ route('admin.venue-maintenances.destroy', $maintenance) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus jadwal maintenance ini?')"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete-button">
                        Hapus Maintenance
                    </button>
                </form>

            </div>

        @empty

            <div class="empty">
                Belum ada jadwal maintenance untuk lapangan ini.
            </div>

        @endforelse
    </div>

</div>
</body>
</html>
