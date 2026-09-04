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
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            border: none;
            border-radius: 14px;
            background: #f1f5f9;
            color: var(--text);
            font-size: 24px;
            cursor: pointer;
        }

        .booking-header h1 {
            margin: 0;
            font-size: 21px;
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
            width: 110px;
            height: 100px;
            flex-shrink: 0;
            object-fit: cover;
            border-radius: 16px;
        }

        .venue-info {
            min-width: 0;
            flex: 1;
        }

        .venue-summary h2 {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .venue-summary p {
            margin: 0 0 10px;
            color: var(--muted);
            font-size: 14px;
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
            background: #ffffff;
            font-weight: 700;
            cursor: pointer;
        }

        .month-choice.active,
        .year-choice.active {
            border-color: var(--primary);
            background: var(--primary);
            color: white;
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
            color: white;
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

        .time-option {
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

        .time-option.active {
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
            min-height: 52px;
            padding: 10px 5px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: var(--card);
            color: var(--text);
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
        }

        .duration-option.active {
            border-color: var(--primary);
            background: var(--primary-light);
            color: var(--primary);
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
            background: white;
            border-top: 1px solid var(--border);
        }

        .booking-bottom-inner {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
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
            color: white;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
        }

        @media (max-width: 480px) {
            .booking-header {
                padding: 13px 14px;
            }

            .venue-summary {
                margin: 14px;
                gap: 12px;
                padding: 12px;
            }

            .venue-summary img {
                width: 82px;
                height: 82px;
            }

            .content {
                padding: 0 14px 25px;
            }

            .calendar-box {
                padding: 12px 8px;
            }

            .calendar-weekdays,
            .calendar-days {
                gap: 3px;
            }

            .time-options,
            .duration-options {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .booking-bottom {
                padding: 10px 14px;
            }

            .continue-button {
                padding: 0 16px;
            }

            .month-picker,
            .year-picker {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }
    </style>
</head>

<body>

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
    >

    <input
        type="hidden"
        name="start_time"
        id="startTimeInput"
        value="08:00"
    >

    <input
        type="hidden"
        name="duration"
        id="durationInput"
        value="1"
    >

    <div
        class="booking-page"
        data-price="{{ $venue->price_per_hour }}"
    >

        <header class="booking-header">
            <button
                type="button"
                class="back-button"
                onclick="window.history.back()"
            >
                ←
            </button>

            <h1>Atur Booking</h1>
        </header>

        <div class="venue-summary">

            <img
                src="{{ asset($venue->image) }}"
                alt="{{ $venue->name }}"
            >

            <div class="venue-info">
                <h2>{{ $venue->name }}</h2>

                <p>📍 {{ $venue->location }}</p>

                <div class="venue-price">
                    Rp{{ number_format($venue->price_per_hour, 0, ',', '.') }}/jam
                </div>
            </div>

        </div>

        <main class="content">

            <section class="section">

                <h2 class="section-title">Pilih Tanggal</h2>

                <div class="calendar-box">

                    <div class="calendar-header">

                        <button
                            type="button"
                            class="calendar-nav"
                            id="prevMonth"
                        >
                            ‹
                        </button>

                        <div class="calendar-selector">

                            <button
                                type="button"
                                class="month-selector"
                                id="monthSelector"
                            >
                                Bulan
                            </button>

                            <button
                                type="button"
                                class="year-selector"
                                id="yearSelector"
                            >
                                Tahun
                            </button>

                        </div>

                        <button
                            type="button"
                            class="calendar-nav"
                            id="nextMonth"
                        >
                            ›
                        </button>

                    </div>

                    <div
                        class="month-picker"
                        id="monthPicker"
                    ></div>

                    <div
                        class="year-picker"
                        id="yearPicker"
                    ></div>

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

                        <div
                            class="calendar-days"
                            id="calendarDays"
                        ></div>

                    </div>

                </div>

            </section>

            <section class="section">

                <h2 class="section-title">Pilih Jam</h2>

                <div class="time-options">
                    <button type="button" class="time-option active">08:00</button>
                    <button type="button" class="time-option">10:00</button>
                    <button type="button" class="time-option">12:00</button>
                    <button type="button" class="time-option">14:00</button>
                    <button type="button" class="time-option">16:00</button>
                    <button type="button" class="time-option">18:00</button>
                    <button type="button" class="time-option">20:00</button>
                    <button type="button" class="time-option">21:00</button>
                    <button type="button" class="time-option">22:00</button>
                </div>

            </section>

            <section class="section">

                <h2 class="section-title">Durasi Bermain</h2>

                <div class="duration-options">

                    <button
                        type="button"
                        class="duration-option active"
                        data-duration="1"
                    >
                        1 Jam
                    </button>

                    <button
                        type="button"
                        class="duration-option"
                        data-duration="2"
                    >
                        2 Jam
                    </button>

                    <button
                        type="button"
                        class="duration-option"
                        data-duration="3"
                    >
                        3 Jam
                    </button>

                    <button
                        type="button"
                        class="duration-option"
                        data-duration="4"
                    >
                        4 Jam
                    </button>

                </div>

            </section>

            <section class="booking-summary">

                <h2 class="booking-summary-title">
                    Ringkasan Booking
                </h2>

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

    </div>

    <div class="booking-bottom">

        <div class="booking-bottom-inner">

            <div>
                <div class="total-label">
                    Total Pembayaran
                </div>

                <div
                    class="total-price"
                    id="totalPrice"
                >
                    Rp{{ number_format($venue->price_per_hour, 0, ',', '.') }}
                </div>
            </div>

            <button
                type="submit"
                class="continue-button"
            >
                Lanjutkan
            </button>

        </div>

    </div>

</form>

<script>
    const bookingPage = document.querySelector('.booking-page');
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

    const namaBulan = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    const namaHari = [
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    ];

    const hariIni = new Date();
    hariIni.setHours(0, 0, 0, 0);

    let tanggalDipilih = new Date(hariIni);
    let tahunTampil = hariIni.getFullYear();
    let bulanTampil = hariIni.getMonth();

    function formatRupiah(nilai) {
        return 'Rp' + nilai.toLocaleString('id-ID');
    }

    function formatTanggalIndonesia(tanggal) {
        return namaHari[tanggal.getDay()] +
            ', ' +
            tanggal.getDate() +
            ' ' +
            namaBulan[tanggal.getMonth()] +
            ' ' +
            tanggal.getFullYear();
    }

    function formatTanggalDatabase(tanggal) {
        const tahun = tanggal.getFullYear();
        const bulan = String(tanggal.getMonth() + 1).padStart(2, '0');
        const hari = String(tanggal.getDate()).padStart(2, '0');

        return tahun + '-' + bulan + '-' + hari;
    }

    function apakahTanggalSama(tanggal1, tanggal2) {
        return (
            tanggal1.getDate() === tanggal2.getDate() &&
            tanggal1.getMonth() === tanggal2.getMonth() &&
            tanggal1.getFullYear() === tanggal2.getFullYear()
        );
    }

    function updateTanggalInput() {
        bookingDateInput.value =
            formatTanggalDatabase(tanggalDipilih);

        summaryDate.textContent =
            formatTanggalIndonesia(tanggalDipilih);
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

        const hariPertama = new Date(
            tahunTampil,
            bulanTampil,
            1
        );

        const hariTerakhir = new Date(
            tahunTampil,
            bulanTampil + 1,
            0
        );

        let posisiHariPertama = hariPertama.getDay();

        posisiHariPertama =
            posisiHariPertama === 0
                ? 6
                : posisiHariPertama - 1;

        const jumlahHari = hariTerakhir.getDate();

        for (let i = 0; i < posisiHariPertama; i++) {
            const kosong = document.createElement('div');
            kosong.className = 'calendar-empty';
            calendarDays.appendChild(kosong);
        }

        for (let hari = 1; hari <= jumlahHari; hari++) {

            const tombolTanggal =
                document.createElement('button');

            const tanggal = new Date(
                tahunTampil,
                bulanTampil,
                hari
            );

            tanggal.setHours(0, 0, 0, 0);

            tombolTanggal.type = 'button';
            tombolTanggal.textContent = hari;
            tombolTanggal.className = 'calendar-day';

            if (tanggal < hariIni) {
                tombolTanggal.disabled = true;
                tombolTanggal.classList.add('disabled');
            }

            if (apakahTanggalSama(tanggal, hariIni)) {
                tombolTanggal.classList.add('today');
            }

            if (apakahTanggalSama(tanggal, tanggalDipilih)) {
                tombolTanggal.classList.add('selected');
            }

            tombolTanggal.addEventListener('click', function () {

                tanggalDipilih = new Date(tanggal);

                updateTanggalInput();

                tampilkanKalender();
            });

            calendarDays.appendChild(tombolTanggal);
        }

        const bulanSekarang =
            hariIni.getFullYear() * 12 +
            hariIni.getMonth();

        const bulanYangDitampilkan =
            tahunTampil * 12 +
            bulanTampil;

        prevMonthButton.disabled =
            bulanYangDitampilkan <= bulanSekarang;
    }

    function tampilkanPilihanBulan() {

        calendarView.style.display = 'none';

        yearPicker.classList.remove('show');
        monthPicker.innerHTML = '';

        namaBulan.forEach(function (bulan, index) {

            const tombol =
                document.createElement('button');

            tombol.type = 'button';
            tombol.textContent = bulan;
            tombol.className = 'month-choice';

            if (index === bulanTampil) {
                tombol.classList.add('active');
            }

            tombol.addEventListener('click', function () {

                const bulanBaru =
                    tahunTampil * 12 + index;

                const bulanSekarang =
                    hariIni.getFullYear() * 12 +
                    hariIni.getMonth();

                if (bulanBaru >= bulanSekarang) {
                    bulanTampil = index;
                }

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

            const tombol =
                document.createElement('button');

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

    monthSelector.addEventListener('click', function () {
        tampilkanPilihanBulan();
    });

    yearSelector.addEventListener('click', function () {
        tampilkanPilihanTahun();
    });

    prevMonthButton.addEventListener('click', function () {

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

            const waktu =
                this.textContent.trim();

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

            const durasi =
                Number(this.dataset.duration);

            const total =
                pricePerHour * durasi;

            totalPrice.textContent =
                formatRupiah(total);

            summaryDuration.textContent =
                durasi + ' Jam';

            durationInput.value = durasi;
        });
    });

    updateTanggalInput();
    tampilkanKalender();
</script>

</body>
</html>