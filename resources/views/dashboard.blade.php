<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SPORTSPACE</title>

    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
</head>

<body class="dashboard-page">

<div class="dashboard-app">

    {{-- HERO --}}
    <section class="home-hero">

        <div class="home-top">

            <div class="home-logo">
                SPORT<span>SPACE</span>
            </div>

            <button type="button" class="notification">
                🔔
                <span class="notification-dot"></span>
            </button>

        </div>

        <div class="home-text">

            <p>Halo, {{ Auth::user()->name }} 👋</p>

            <h1>Siap bermain<br>hari ini?</h1>

            <p class="home-subtitle">
                Temukan lapangan favorit dan booking sesuai jadwalmu.
            </p>

        </div>

        {{-- SEARCH --}}
        <div class="search-home">

            <span class="search-icon">⌕</span>

            <input
                type="text"
                id="searchInput"
                placeholder="Cari lapangan atau olahraga"
                autocomplete="off"
            >

        </div>

    </section>


    {{-- MENU CEPAT --}}
    <section class="quick-actions">

        {{-- Booking --}}
        <a
            href="{{ route('bookings.index') }}"
            class="quick-action"
            style="text-decoration: none; color: inherit;"
        >
            <div class="quick-icon icon-blue">📅</div>
            Booking
        </a>


        {{-- Jadwal --}}
        <a
            href="{{ route('bookings.index') }}"
            class="quick-action"
            style="text-decoration: none; color: inherit;"
        >
            <div class="quick-icon icon-green">🗓️</div>
            Jadwal
        </a>


        {{-- Favorit --}}
        <button
            type="button"
            class="quick-action"
            onclick="alert('Fitur favorit belum tersedia.')"
        >
            <div class="quick-icon icon-purple">♡</div>
            Favorit
        </button>


        {{-- Riwayat --}}
        <a
            href="{{ route('bookings.orders') }}"
            class="quick-action"
            style="text-decoration: none; color: inherit;"
        >
            <div class="quick-icon icon-orange">◷</div>
            Riwayat
        </a>

    </section>


    {{-- PILIH OLAHRAGA --}}
    <section class="home-content">

        <div class="section-header">

            <h2>Pilih Olahraga</h2>

            <button
                type="button"
                class="see-all"
                id="showAllSports"
            >
                Lihat Semua
            </button>

        </div>


        <div class="sports-row">

            @forelse ($sports as $sport)

                <button
                    type="button"
                    class="sport-choice"
                    data-sport="{{ $sport->name }}"
                >

                    <div class="sport-circle">
                        {{ $sport->icon }}
                    </div>

                    <span>{{ $sport->name }}</span>

                </button>

            @empty

                <p>Belum ada olahraga tersedia.</p>

            @endforelse

        </div>

    </section>


    {{-- REKOMENDASI LAPANGAN --}}
    <section class="home-content">

        <div class="section-header">

            <h2>Rekomendasi Lapangan</h2>

            <button
                type="button"
                class="see-all"
                id="showAllVenues"
            >
                Lihat Semua
            </button>

        </div>


        <div class="venue-row">

            @forelse ($venues as $venue)

                <a
                    href="{{ route('venues.show', $venue) }}"
                    class="venue"
                    data-sport="{{ $venue->sport ? $venue->sport->name : '' }}"
                    style="text-decoration: none; color: inherit;"
                >

                    <div class="venue-photo">

                        @if ($venue->image)

                            <img
                                src="{{ asset('storage/' . $venue->image) }}"
                                alt="{{ $venue->name }}"
                            >

                        @endif

                        <button
                            type="button"
                            class="favorite"
                            onclick="event.preventDefault(); event.stopPropagation(); alert('Fitur favorit belum tersedia.');"
                        >
                            ♡
                        </button>

                    </div>


                    <div class="venue-info">

                        <h3>{{ $venue->name }}</h3>

                        <p class="venue-location">
                            📍 {{ $venue->location }}
                        </p>


                        <div class="venue-meta">

                            <div class="venue-price">
                                Rp{{ number_format($venue->price_per_hour, 0, ',', '.') }}
                                <span>/ jam</span>
                            </div>


                            <div class="rating">
                                ★ {{ number_format($venue->rating ?? 0, 1) }}
                            </div>

                        </div>

                    </div>

                </a>

            @empty

                <p id="emptyVenueMessage">
                    Belum ada lapangan tersedia.
                </p>

            @endforelse

        </div>


        <p
            id="filterEmptyMessage"
            style="display: none;"
        >
            Lapangan yang kamu cari belum tersedia.
        </p>

    </section>

</div>


{{-- BOTTOM NAVIGATION --}}
<nav class="mobile-nav">

    {{-- BERANDA --}}
    <a
        href="{{ route('dashboard') }}"
        class="nav-button active"
    >

        <svg
            class="nav-icon"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="M3 10.5L12 3l9 7.5"></path>
            <path d="M5 9.5V21h14V9.5"></path>
            <path d="M9 21v-6h6v6"></path>
        </svg>

        <span>Beranda</span>

    </a>


    {{-- BOOKING --}}
    <a
        href="{{ route('bookings.index') }}"
        class="nav-button"
    >

        <svg
            class="nav-icon"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <rect x="3" y="4" width="18" height="17" rx="2"></rect>
            <path d="M16 2v4"></path>
            <path d="M8 2v4"></path>
            <path d="M3 10h18"></path>
            <path d="M8 14h.01"></path>
            <path d="M12 14h.01"></path>
            <path d="M16 14h.01"></path>
        </svg>

        <span>Booking</span>

    </a>


    {{-- SHOP --}}
    <a
        href="{{ route('shop.index') }}"
        class="nav-button"
    >

        <svg
            class="nav-icon"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="M3 9l1-5h16l1 5"></path>
            <path d="M5 9v11h14V9"></path>
            <path d="M3 9a3 3 0 006 0"></path>
            <path d="M9 9a3 3 0 006 0"></path>
            <path d="M15 9a3 3 0 006 0"></path>
            <path d="M9 20v-6h6v6"></path>
        </svg>

        <span>Shop</span>

    </a>


    {{-- PESANAN --}}
    <a
        href="{{ route('bookings.orders') }}"
        class="nav-button"
    >

        <svg
            class="nav-icon"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <circle cx="12" cy="12" r="9"></circle>
            <path d="M12 7v5l3 2"></path>
        </svg>

        <span>Pesanan</span>

    </a>


    {{-- PROFIL --}}
    <a
        href="{{ route('profile.edit') }}"
        class="nav-button"
    >

        <svg
            class="nav-icon"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <circle cx="12" cy="8" r="4"></circle>
            <path d="M4 21c1.5-4 4.2-6 8-6s6.5 2 8 6"></path>
        </svg>

        <span>Profil</span>

    </a>

</nav>


<script>

    const sportButtons = document.querySelectorAll('.sport-choice');
    const venues = document.querySelectorAll('.venue');

    const searchInput = document.getElementById('searchInput');
    const filterEmptyMessage = document.getElementById('filterEmptyMessage');
    const showAllVenuesButton = document.getElementById('showAllVenues');


    function updateEmptyMessage(total) {

        if (filterEmptyMessage) {
            filterEmptyMessage.style.display =
                total === 0 && venues.length > 0
                    ? 'block'
                    : 'none';
        }

    }


    function showAllVenues() {

        venues.forEach(function(venue) {
            venue.style.display = '';
        });

        sportButtons.forEach(function(button) {
            button.classList.remove('active');
        });

        if (searchInput) {
            searchInput.value = '';
        }

        updateEmptyMessage(venues.length);

    }


    sportButtons.forEach(function(button) {

        button.addEventListener('click', function() {

            sportButtons.forEach(function(item) {
                item.classList.remove('active');
            });

            this.classList.add('active');

            if (searchInput) {
                searchInput.value = '';
            }

            const selectedSport =
                (this.dataset.sport || '').toLowerCase();

            let visibleVenue = 0;

            venues.forEach(function(venue) {

                const venueSport =
                    (venue.dataset.sport || '').toLowerCase();

                if (venueSport.includes(selectedSport)) {

                    venue.style.display = '';
                    visibleVenue++;

                } else {

                    venue.style.display = 'none';

                }

            });

            updateEmptyMessage(visibleVenue);

        });

    });


    if (searchInput) {

        searchInput.addEventListener('input', function() {

            const keyword =
                this.value.toLowerCase().trim();

            sportButtons.forEach(function(item) {
                item.classList.remove('active');
            });

            let visibleVenue = 0;

            venues.forEach(function(venue) {

                const venueName =
                    venue.querySelector('h3')?.textContent
                    .toLowerCase() || '';

                const venueLocation =
                    venue.querySelector('.venue-location')?.textContent
                    .toLowerCase() || '';

                const venueSport =
                    (venue.dataset.sport || '').toLowerCase();

                const isMatch =
                    venueName.includes(keyword) ||
                    venueLocation.includes(keyword) ||
                    venueSport.includes(keyword);

                if (isMatch) {

                    venue.style.display = '';
                    visibleVenue++;

                } else {

                    venue.style.display = 'none';

                }

            });

            updateEmptyMessage(visibleVenue);

        });

    }


    if (showAllVenuesButton) {

        showAllVenuesButton.addEventListener('click', function() {
            showAllVenues();
        });

    }

</script>

</body>
</html>