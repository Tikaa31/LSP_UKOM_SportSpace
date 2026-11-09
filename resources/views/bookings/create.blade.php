
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking {{ $venue->name }} - SPORTSPACE</title>

    <style>
        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #eff6ff;
            --background: #f3f6fb;
            --card: #ffffff;
            --text: #172033;
            --muted: #7b8798;
            --border: #e5eaf1;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-width: 320px;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        button {
            font-family: inherit;
        }

        .booking-page {
            width: 100%;
            max-width: 900px;
            min-height: 100vh;
            margin: 0 auto;
            padding-bottom: 110px;
        }

        .booking-header {
            position: sticky;
            top: 0;
            z-index: 30;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(12px);
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            min-width: 44px;
            flex-shrink: 0;
            padding: 0;
            border: none;
            border-radius: 14px;
            background: #f1f5f9;
            color: var(--text);
            cursor: pointer;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .back-button svg {
            display: block;
            width: 22px;
            height: 22px;
        }

        .back-button:hover {
            background: #e2e8f0;
        }

        .back-button:active {
            transform: scale(0.96);
        }

        .back-button:focus-visible,
        button:focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: 3px;
        }

        .booking-header h1 {
            margin: 0;
            font-size: 21px;
        }

        .booking-error,
        .booking-success {
            margin: 20px;
            padding: 14px 16px;
            border-radius: 14px;
        }

        .booking-error {
            border: 1px solid #fecaca;
            background: #fef2f2;
            color: #991b1b;
        }

        .booking-error strong {
            display: block;
            margin-bottom: 6px;
            font-size: 15px;
        }

        .booking-error ul {
            margin: 0;
            padding-left: 20px;
            font-size: 14px;
            line-height: 1.6;
        }

        .booking-success {
            border: 1px solid #bbf7d0;
            background: #f0fdf4;
            color: #166534;
        }

        .venue-summary {
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 20px;
            padding: 16px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 22px;
        }

        .venue-summary img {
            display: block;
            width: 110px;
            height: 100px;
            flex-shrink: 0;
            object-fit: cover;
            border-radius: 16px;
            background: #e2e8f0;
        }

        .venue-info {
            min-width: 0;
            flex: 1;
        }

        .venue-summary h2 {
            margin: 0 0 8px;
            font-size: 18px;
            overflow-wrap: anywhere;
        }

        .venue-summary p {
            margin: 0 0 10px;
            color: var(--muted);
            font-size: 14px;
            overflow-wrap: anywhere;
        }

        .venue-price {
            color: var(--primary);
            font-size: 15px;
            font-weight: 800;
        }

        .content {
            width: 100%;
            padding: 0 20px 30px;
        }

        .section {
            margin-top: 28px;
        }

        .section-title {
            margin: 0 0 14px;
            font-size: 19px;
        }

        .calendar-box {
            width: 100%;
            overflow: hidden;
            padding: 18px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 22px;
        }

        .calendar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 18px;
        }

        .calendar-selector {
            min-width: 0;
            flex: 1;
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .calendar-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border: none;
            border-radius: 12px;
            background: #f1f5f9;
            font-size: 26px;
            cursor: pointer;
        }

        .calendar-nav:disabled {
            opacity: 0.35;
            cursor: not-allowed;
        }

        .month-selector,
        .year-selector {
            padding: 10px 13px;
            border: none;
            border-radius: 12px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
        }

        .month-picker,
        .year-picker {
            display: none;
            width: 100%;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
        }

        .month-picker.show,
        .year-picker.show {
            display: grid;
        }

        .month-choice,
        .year-choice {
            padding: 13px 8px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: #fff;
            font-weight: 700;
            cursor: pointer;
        }

        .month-choice.active,
        .year-choice.active {
            border-color: var(--primary);
            background: var(--primary);
            color: #fff;
        }

        .calendar-weekdays,
        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, minmax(0, 1fr));
            gap: 6px;
        }

        .calendar-weekdays {
            margin-bottom: 8px;
        }

        .weekday {
            padding: 7px 0;
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
            text-align: center;
        }

        .calendar-day,
        .calendar-empty {
            width: 100%;
            aspect-ratio: 1 / 1;
        }

        .calendar-day {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 0;
            padding: 0;
            border: 1px solid transparent;
            border-radius: 12px;
            background: transparent;
            color: var(--text);
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .calendar-day.today {
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .calendar-day.selected {
            border-color: var(--primary);
            background: var(--primary);
            color: #fff;
        }

        .calendar-day.disabled {
            color: #cbd5e1;
            cursor: not-allowed;
        }

        .time-options {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
        }

        .time-option,
        .duration-option {
            min-height: 52px;
            padding: 10px 8px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: var(--card);
            color: var(--text);
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
        }

        .time-option.active,
        .duration-option.active {
            border-color: var(--primary);
            background: var(--primary-light);
            color: var(--primary);
        }

        .duration-options {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 10px;
        }

        .duration-option {
            padding: 10px 5px;
        }

        .booking-summary {
            margin-top: 28px;
            padding: 18px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
        }

        .booking-summary-title {
            margin: 0 0 10px;
            font-size: 17px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 13px 0;
            border-bottom: 1px solid #eef1f5;
            color: var(--muted);
            font-size: 14px;
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .summary-row span:last-child {
            color: var(--text);
            font-weight: 700;
            text-align: right;
        }

        .booking-bottom {
            position: fixed;
            z-index: 50;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 12px 20px;
            background: #fff;
            border-top: 1px solid var(--border);
        }

        .booking-bottom-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }

        .total-label {
            margin-bottom: 4px;
            color: var(--muted);
            font-size: 12px;
        }

        .total-price {
            font-size: 22px;
            font-weight: 900;
        }

        .continue-button {
            min-height: 52px;
            padding: 0 22px;
            border: none;
            border-radius: 15px;
            background: var(--primary);
            color: #fff;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
        }

        .continue-button:hover {
            background: var(--primary-dark);
        }

        @media (max-width: 480px) {
            .booking-page {
                padding-bottom: 100px;
            }

            .booking-header {
                gap: 12px;
                padding: 13px 14px;
            }

            .booking-header h1 {
                font-size: 19px;
            }

            .booking-error,
            .booking-success {
                margin: 14px 14px 0;
            }

            .venue-summary {
                margin: 14px;
                gap: 12px;
                padding: 12px;
                border-radius: 18px;
            }

            .venue-summary img {
                width: 82px;
                height: 82px;
                border-radius: 12px;
            }

            .venue-summary h2 {
                font-size: 16px;
            }

            .venue-summary p {
                font-size: 12px;
            }

            .venue-price {
                font-size: 13px;
            }

            .content {
                padding: 0 14px 25px;
            }

            .section-title {
                font-size: 17px;
            }

            .calendar-box {
                padding: 12px 8px;
                border-radius: 18px;
            }

            .calendar-header {
                gap: 6px;
            }

            .calendar-nav {
                width: 36px;
                height: 38px;
            }

            .month-selector,
            .year-selector {
                padding: 10px 8px;
                font-size: 12px;
            }

            .calendar-weekdays,
            .calendar-days {
                gap: 3px;
            }

            .weekday {
                font-size: 11px;
            }

            .calendar-day {
                border-radius: 8px;
                font-size: 12px;
            }

            .time-options,
            .duration-options {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .booking-summary {
                padding: 15px;
            }

            .booking-bottom {
                padding: 10px 14px;
            }

            .booking-bottom-inner {
                gap: 10px;
            }

            .total-price {
                font-size: 18px;
            }

            .continue-button {
                min-height: 48px;
                padding: 0 16px;
            }

            .month-picker,
            .year-picker {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 360px) {
            .back-button {
                width: 42px;
                height: 42px;
                min-width: 42px;
            }

            .booking-header {
                gap: 10px;
            }

            .calendar-box {
                padding: 10px 6px;
            }

            .calendar-nav {
                width: 32px;
                height: 36px;
            }

            .calendar-selector {
                gap: 5px;
            }

            .month-selector,
            .year-selector {
                padding: 9px 6px;
                font-size: 11px;
            }

            .total-price {
                font-size: 16px;
            }

            .continue-button {
                padding: 0 12px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

<div
    class="booking-page"
    data-price="{{ $venue->price_per_hour }}"
>

    <header class="booking-header">
        <button
            type="button"
            class="back-button"
            onclick="window.history.back()"
            aria-label="Kembali ke halaman sebelumnya"
            title="Kembali"
        >
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
        </button>

        <h1>Atur Booking</h1>
    </header>

    @if (session('success'))
        <div class="booking-success" role="status">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="booking-error" role="alert">
            <strong>Booking gagal!</strong>
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="booking-error" role="alert">
            <strong>Booking gagal!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="venue-summary">

        @if ($venue->image)
            <img
                src="{{ asset('storage/' . ltrim($venue->image, '/')) }}"
                alt="{{ $venue->name }}"
                onerror="this.onerror=null; this.style.display='none';"
            >
        @else
            <div
                style="width:110px;height:100px;display:flex;align-items:center;justify-content:center;background:#e2e8f0;border-radius:16px;flex-shrink:0;"
            >
                🏟️
            </div>
        @endif

        <div class="venue-info">
            <h2>{{ $venue->name }}</h2>

            <p>📍 {{ $venue->location }}</p>

            <div class="venue-price">
                Rp{{ number_format($venue->price_per_hour, 0, ',', '.') }}/jam
            </div>
        </div>

    </div>

    <form
        id="bookingForm"
        action="{{ route('bookings.store', $venue) }}"
        method="POST"
    >
        @csrf

        <input
            type="hidden"
            name="booking_date"
            id="bookingDateInput"
            value="{{ old('booking_date', now()->format('Y-m-d')) }}"
        >

        <input
            type="hidden"
            name="start_time"
            id="startTimeInput"
            value="{{ old('start_time', '08:00') }}"
        >

        <input
            type="hidden"
            name="duration"
            id="durationInput"
            value="{{ old('duration', 1) }}"
        >

        <main class="content">

            <section class="section">
                <h2 class="section-title">Pilih Tanggal</h2>

                <div class="calendar-box">

                    <div class="calendar-header">
                        <button
                            type="button"
                            class="calendar-nav"
                            id="prevMonth"
                            aria-label="Bulan sebelumnya"
                        >‹</button>

                        <div class="calendar-selector">
                            <button
                                type="button"
                                class="month-selector"
                                id="monthSelector"
                            >Bulan</button>

                            <button
                                type="button"
                                class="year-selector"
                                id="yearSelector"
                            >Tahun</button>
                        </div>

                        <button
                            type="button"
                            class="calendar-nav"
                            id="nextMonth"
                            aria-label="Bulan berikutnya"
                        >›</button>
                    </div>

                    <div class="month-picker" id="monthPicker"></div>
                    <div class="year-picker" id="yearPicker"></div>

                    <div id="calendarView">
                        <div class="calendar-weekdays">
                            <div class="weekday">Sen</div>
                            <div class="weekday">Sel</div>
                            <div class="weekday">Rab</div>
                            <div class="weekday">Kam</div>
                            <div class="weekday">Jum</div>
                            <div class="weekday">Sab</div>
                            <div class="weekday">Min</div>
                        </div>

                        <div class="calendar-days" id="calendarDays"></div>
                    </div>

                </div>
            </section>

            <section class="section">
                <h2 class="section-title">Pilih Jam</h2>

                <div class="time-options">
                    @foreach (['08:00', '10:00', '12:00', '14:00', '16:00', '18:00', '20:00', '21:00', '22:00'] as $time)
                        <button
                            type="button"
                            class="time-option {{ old('start_time', '08:00') === $time ? 'active' : '' }}"
                            data-time="{{ $time }}"
                        >
                            {{ $time }}
                        </button>
                    @endforeach
                </div>
            </section>

            <section class="section">
                <h2 class="section-title">Durasi Bermain</h2>

                <div class="duration-options">
                    @foreach ([1, 2, 3, 4] as $duration)
                        <button
                            type="button"
                            class="duration-option {{ (int) old('duration', 1) === $duration ? 'active' : '' }}"
                            data-duration="{{ $duration }}"
                        >
                            {{ $duration }} Jam
                        </button>
                    @endforeach
                </div>
            </section>

            <section class="booking-summary">
                <h2 class="booking-summary-title">Ringkasan Booking</h2>

                <div class="summary-row">
                    <span>Tanggal</span>
                    <span id="summaryDate">Memuat...</span>
                </div>

                <div class="summary-row">
                    <span>Jam</span>
                    <span id="summaryTime">08:00</span>
                </div>

                <div class="summary-row">
                    <span>Durasi</span>
                    <span id="summaryDuration">1 Jam</span>
                </div>
            </section>

        </main>

        <div class="booking-bottom">
            <div class="booking-bottom-inner">
                <div>
                    <div class="total-label">Total Pembayaran</div>

                    <div class="total-price" id="totalPrice">
                        Rp{{ number_format($venue->price_per_hour, 0, ',', '.') }}
                    </div>
                </div>

                <button type="submit" class="continue-button">
                    Lanjutkan
                </button>
            </div>
        </div>

    </form>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const bookingPage = document.querySelector('.booking-page');

    if (!bookingPage) {
        console.error('Elemen booking-page tidak ditemukan.');
        return;
    }

    const pricePerHour = Number(bookingPage.dataset.price);

    const bookingDateInput = document.getElementById('bookingDateInput');
    const startTimeInput = document.getElementById('startTimeInput');
    const durationInput = document.getElementById('durationInput');

    const calendarDays = document.getElementById('calendarDays');
    const calendarView = document.getElementById('calendarView');

    const monthPicker = document.getElementById('monthPicker');
    const yearPicker = document.getElementById('yearPicker');

    const monthSelector = document.getElementById('monthSelector');
    const yearSelector = document.getElementById('yearSelector');

    const prevMonthButton = document.getElementById('prevMonth');
    const nextMonthButton = document.getElementById('nextMonth');

    const summaryDate = document.getElementById('summaryDate');
    const summaryTime = document.getElementById('summaryTime');
    const summaryDuration = document.getElementById('summaryDuration');
    const totalPrice = document.getElementById('totalPrice');

    const timeButtons = document.querySelectorAll('.time-option');
    const durationButtons = document.querySelectorAll('.duration-option');
    const bookingForm = document.getElementById('bookingForm');

    const namaBulan = [
        'Januari', 'Februari', 'Maret', 'April',
        'Mei', 'Juni', 'Juli', 'Agustus',
        'September', 'Oktober', 'November', 'Desember'
    ];

    const namaHari = [
        'Minggu', 'Senin', 'Selasa', 'Rabu',
        'Kamis', 'Jumat', 'Sabtu'
    ];

    const hariIni = new Date();
    hariIni.setHours(0, 0, 0, 0);

    function parseTanggal(value) {
        if (!value) {
            return new Date(hariIni);
        }

        const parts = value.split('-');

        if (parts.length !== 3) {
            return new Date(hariIni);
        }

        const tanggal = new Date(
            Number(parts[0]),
            Number(parts[1]) - 1,
            Number(parts[2])
        );

        tanggal.setHours(0, 0, 0, 0);

        if (Number.isNaN(tanggal.getTime()) || tanggal < hariIni) {
            return new Date(hariIni);
        }

        return tanggal;
    }

    let tanggalDipilih = parseTanggal(bookingDateInput.value);
    let tahunTampil = tanggalDipilih.getFullYear();
    let bulanTampil = tanggalDipilih.getMonth();

    function formatRupiah(nilai) {
        return 'Rp' + nilai.toLocaleString('id-ID');
    }

    function formatTanggalIndonesia(tanggal) {
        return namaHari[tanggal.getDay()] + ', ' +
            tanggal.getDate() + ' ' +
            namaBulan[tanggal.getMonth()] + ' ' +
            tanggal.getFullYear();
    }

    function formatTanggalDatabase(tanggal) {
        const tahun = tanggal.getFullYear();
        const bulan = String(tanggal.getMonth() + 1).padStart(2, '0');
        const hari = String(tanggal.getDate()).padStart(2, '0');

        return tahun + '-' + bulan + '-' + hari;
    }

    function updateTanggalInput() {
        bookingDateInput.value = formatTanggalDatabase(tanggalDipilih);
        summaryDate.textContent = formatTanggalIndonesia(tanggalDipilih);
    }

    function tutupPilihan() {
        monthPicker.classList.remove('show');
        yearPicker.classList.remove('show');
        calendarView.style.display = 'block';
    }

    function tampilkanKalender() {
        calendarDays.innerHTML = '';
        tutupPilihan();

        monthSelector.textContent = namaBulan[bulanTampil];
        yearSelector.textContent = tahunTampil;

        const hariPertama = new Date(tahunTampil, bulanTampil, 1);
        const hariTerakhir = new Date(tahunTampil, bulanTampil + 1, 0);

        let posisiHariPertama = hariPertama.getDay();

        posisiHariPertama = posisiHariPertama === 0
            ? 6
            : posisiHariPertama - 1;

        const jumlahHari = hariTerakhir.getDate();

        for (let i = 0; i < posisiHariPertama; i++) {
            const kosong = document.createElement('div');
            kosong.className = 'calendar-empty';
            calendarDays.appendChild(kosong);
        }

        for (let hari = 1; hari <= jumlahHari; hari++) {
            const tanggal = new Date(tahunTampil, bulanTampil, hari);
            tanggal.setHours(0, 0, 0, 0);

            const tombolTanggal = document.createElement('button');
            tombolTanggal.type = 'button';
            tombolTanggal.textContent = hari;
            tombolTanggal.className = 'calendar-day';

            if (tanggal < hariIni) {
                tombolTanggal.disabled = true;
                tombolTanggal.classList.add('disabled');
            }

            if (tanggal.getTime() === hariIni.getTime()) {
                tombolTanggal.classList.add('today');
            }

            if (tanggal.getTime() === tanggalDipilih.getTime()) {
                tombolTanggal.classList.add('selected');
            }

            tombolTanggal.addEventListener('click', function () {
                if (tanggal < hariIni) {
                    return;
                }

                tanggalDipilih = new Date(tanggal);
                updateTanggalInput();
                tampilkanKalender();
            });

            calendarDays.appendChild(tombolTanggal);
        }

        const bulanSekarang =
            hariIni.getFullYear() * 12 + hariIni.getMonth();

        const bulanYangDitampilkan =
            tahunTampil * 12 + bulanTampil;

        prevMonthButton.disabled =
            bulanYangDitampilkan <= bulanSekarang;
    }

    function tampilkanPilihanBulan() {
        calendarView.style.display = 'none';
        yearPicker.classList.remove('show');
        monthPicker.innerHTML = '';

        namaBulan.forEach(function (bulan, index) {
            const tombol = document.createElement('button');
            tombol.type = 'button';
            tombol.textContent = bulan;
            tombol.className = 'month-choice';

            if (index === bulanTampil) {
                tombol.classList.add('active');
            }

            tombol.addEventListener('click', function () {
                const bulanBaru = tahunTampil * 12 + index;

                const bulanSekarang =
                    hariIni.getFullYear() * 12 + hariIni.getMonth();

                if (bulanBaru < bulanSekarang) {
                    return;
                }

                bulanTampil = index;
                tampilkanKalender();
            });

            monthPicker.appendChild(tombol);
        });

        monthPicker.classList.add('show');
    }

    function tampilkanPilihanTahun() {
        calendarView.style.display = 'none';
        monthPicker.classList.remove('show');
        yearPicker.innerHTML = '';

        const tahunSekarang = hariIni.getFullYear();

        for (
            let tahun = tahunSekarang;
            tahun <= tahunSekarang + 10;
            tahun++
        ) {
            const tombol = document.createElement('button');
            tombol.type = 'button';
            tombol.textContent = tahun;
            tombol.className = 'year-choice';

            if (tahun === tahunTampil) {
                tombol.classList.add('active');
            }

            tombol.addEventListener('click', function () {
                tahunTampil = tahun;

                if (
                    tahunTampil === hariIni.getFullYear() &&
                    bulanTampil < hariIni.getMonth()
                ) {
                    bulanTampil = hariIni.getMonth();
                }

                tampilkanKalender();
            });

            yearPicker.appendChild(tombol);
        }

        yearPicker.classList.add('show');
    }

    monthSelector.addEventListener('click', tampilkanPilihanBulan);
    yearSelector.addEventListener('click', tampilkanPilihanTahun);

    prevMonthButton.addEventListener('click', function () {
        if (prevMonthButton.disabled) {
            return;
        }

        bulanTampil--;

        if (bulanTampil < 0) {
            bulanTampil = 11;
            tahunTampil--;
        }

        tampilkanKalender();
    });

    nextMonthButton.addEventListener('click', function () {
        bulanTampil++;

        if (bulanTampil > 11) {
            bulanTampil = 0;
            tahunTampil++;
        }

        tampilkanKalender();
    });

    timeButtons.forEach(function (tombol) {
        tombol.addEventListener('click', function () {
            timeButtons.forEach(function (item) {
                item.classList.remove('active');
            });

            this.classList.add('active');

            const waktu = this.dataset.time;

            summaryTime.textContent = waktu;
            startTimeInput.value = waktu;
        });
    });

    durationButtons.forEach(function (tombol) {
        tombol.addEventListener('click', function () {
            durationButtons.forEach(function (item) {
                item.classList.remove('active');
            });

            this.classList.add('active');

            const durasi = Number(this.dataset.duration);
            const total = pricePerHour * durasi;

            totalPrice.textContent = formatRupiah(total);
            summaryDuration.textContent = durasi + ' Jam';
            durationInput.value = durasi;
        });
    });

    bookingForm.addEventListener('submit', function (event) {
        if (!bookingDateInput.value) {
            event.preventDefault();
            alert('Silakan pilih tanggal booking terlebih dahulu.');
        }
    });

    // Sinkronkan tampilan dengan nilai form saat halaman dibuka.
    const waktuAwal = startTimeInput.value || '08:00';
    const durasiAwal = Number(durationInput.value || 1);

    timeButtons.forEach(function (tombol) {
        tombol.classList.toggle(
            'active',
            tombol.dataset.time === waktuAwal
        );
    });

    summaryTime.textContent = waktuAwal;

    durationButtons.forEach(function (tombol) {
        tombol.classList.toggle(
            'active',
            Number(tombol.dataset.duration) === durasiAwal
        );
    });

    summaryDuration.textContent = durasiAwal + ' Jam';
    totalPrice.textContent = formatRupiah(pricePerHour * durasiAwal);

    updateTanggalInput();
    tampilkanKalender();
});
</script>

</body>
</html>
