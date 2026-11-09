<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard | SPORTSPACE</title>

    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">

    {{-- Tampilan ikon olahraga yang diunggah dari halaman admin --}}
    <style>
        .sport-emoji {
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .sport-emoji .sport-image {
            display: block;
            width: 80px;
            height: 80px;
            max-width: 80%;
            max-height: 80%;
            object-fit: contain;
        }
    </style>
</head>

<body class="dashboard-page">

<div class="dashboard-app">

    {{-- HEADER DAN HERO --}}
    <section class="home-hero">

        <header class="home-top">

            <a href="{{ route('dashboard') }}" class="brand">
                <img
                    src="{{ asset('image/logosportspace.png') }}"
                    alt="Logo SPORTSPACE"
                    class="brand-logo"
                >

                <span class="brand-name">
                    SPORT<span>SPACE</span>
                </span>
            </a>

            {{-- NAVIGASI DESKTOP --}}
            <nav class="desktop-menu" aria-label="Navigasi desktop">

                <a href="{{ route('dashboard') }}" class="desktop-link active">
                    Beranda
                </a>

                <a href="{{ route('bookings.index') }}" class="desktop-link">
                    Booking
                </a>

                <a href="{{ route('jadwal.index') }}" class="desktop-link">
                    Jadwal
                </a>

                <a href="{{ route('bookings.orders') }}" class="desktop-link">
                    Riwayat
                </a>

                <a href="{{ route('profile.edit') }}" class="desktop-link">
                    Profil
                </a>

            </nav>

            <a href="{{ route('profile.edit') }}" class="user-profile">

                <span class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>

                <span class="user-details">
                    <strong>{{ Auth::user()->name }}</strong>
                    <small>Akun pengguna</small>
                </span>

            </a>

        </header>

        {{-- HERO CONTENT --}}
        <div class="hero-content">

            <div class="hero-copy">

                <p class="welcome-label">SELAMAT DATANG KEMBALI,</p>

                <p class="welcome-name">
                    {{ Auth::user()->name }} 👋
                </p>

                <h1>Siap Bermain<br>Hari Ini?</h1>

                <p class="home-subtitle">
                    Temukan lapangan favorit dan booking sesuai jadwalmu
                    dengan mudah di SPORTSPACE.
                </p>

                <form class="search-home" id="searchForm">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m16 16 4 4"></path>
                    </svg>

                    <input
                        type="search"
                        id="searchInput"
                        placeholder="Cari lapangan atau olahraga..."
                        autocomplete="off"
                        aria-label="Cari lapangan atau olahraga"
                    >

                    <button type="submit">Cari</button>

                </form>

            </div>

            <div class="hero-note">

                <span class="hero-note-icon">📍</span>

                <div>
                    <strong>Main Lebih Mudah</strong>

                    <p>
                        Pilih lapangan, lihat jadwal, dan langsung booking.
                    </p>
                </div>

            </div>

        </div>

    </section>

    {{-- MENU CEPAT --}}
    <section class="quick-actions">

        {{-- BOOKING --}}
        <a href="{{ route('bookings.index') }}" class="quick-action">

            <div class="quick-photo photo-booking"></div>

            <div class="quick-info">

                <span class="quick-icon icon-blue">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <rect x="3" y="5" width="18" height="16" rx="2"></rect>
                        <path d="M16 3v4M8 3v4M3 10h18"></path>
                    </svg>
                </span>

                <span class="quick-copy">
                    <strong>Booking</strong>
                    <small>Pesan lapangan sekarang</small>
                </span>

                <span class="quick-arrow" aria-hidden="true">›</span>

            </div>

        </a>

        {{-- JADWAL --}}
        <a href="{{ route('jadwal.index') }}" class="quick-action">

            <div class="quick-photo photo-schedule"></div>

            <div class="quick-info">

                <span class="quick-icon icon-green">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <rect x="3" y="5" width="18" height="16" rx="2"></rect>
                        <path d="M16 3v4M8 3v4M3 10h18M8 14h3"></path>
                    </svg>
                </span>

                <span class="quick-copy">
                    <strong>Jadwal</strong>
                    <small>Lihat jadwal booking</small>
                </span>

                <span class="quick-arrow" aria-hidden="true">›</span>

            </div>

        </a>

        {{-- FAVORIT --}}
        <button type="button" class="quick-action" id="favoriteShortcut">

            <div class="quick-photo photo-favorite"></div>

            <div class="quick-info">

                <span class="quick-icon icon-purple">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1.1L12 21l7.8-7.5 1.1-1.1a5.5 5.5 0 0 0-.1-7.8Z"></path>
                    </svg>
                </span>

                <span class="quick-copy">
                    <strong>Favorit</strong>
                    <small>Lapangan favoritmu</small>
                </span>

                <span class="quick-arrow" aria-hidden="true">›</span>

            </div>

        </button>

        {{-- RIWAYAT --}}
        <a href="{{ route('bookings.orders') }}" class="quick-action">

            <div class="quick-photo photo-history"></div>

            <div class="quick-info">

                <span class="quick-icon icon-orange">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M12 7v5l3 2"></path>
                    </svg>
                </span>

                <span class="quick-copy">
                    <strong>Riwayat</strong>
                    <small>Cek riwayat booking</small>
                </span>

                <span class="quick-arrow" aria-hidden="true">›</span>

            </div>

        </a>

    </section>

    {{-- PILIH OLAHRAGA --}}
    <section class="home-content">

        <div class="section-header">

            <div>
                <h2>Pilih Olahraga</h2>

                <p class="section-subtitle">
                    Temukan lapangan sesuai olahraga favoritmu.
                </p>
            </div>

            <button type="button" class="see-all" id="showAllSports">
                Lihat Semua
            </button>

        </div>

        <div class="sports-row">

            @forelse ($sports as $sport)

                <button
                    type="button"
                    class="sport-choice"
                    data-sport="{{ $sport->name }}"
                    aria-pressed="false"
                >

                    <span class="sport-card-visual">

                        <span class="sport-emoji">

                            @if ($sport->icon && str_starts_with($sport->icon, 'sports/'))
                                <img
                                    src="{{ asset('storage/' . $sport->icon) }}"
                                    alt="Ikon {{ $sport->name }}"
                                    class="sport-image"
                                    loading="lazy"
                                    onerror="this.style.display='none'; this.parentElement.textContent='🏅';"
                                >
                            @else
                                {{ $sport->icon }}
                            @endif

                        </span>

                        <span class="sport-select-mark">✓</span>

                    </span>

                    <span class="sport-name">{{ $sport->name }}</span>

                </button>

            @empty

                <p class="empty-message">
                    Belum ada olahraga tersedia.
                </p>

            @endforelse

        </div>

    </section>

    {{-- REKOMENDASI LAPANGAN --}}
    <section class="home-content venue-section">

        <div class="section-header">

            <div>
                <h2>Rekomendasi Lapangan</h2>

                <p class="section-subtitle">
                    Temukan tempat terbaik untuk bermain.
                </p>
            </div>

        </div>

        <div class="venue-row" id="venueRow">

            @forelse ($venues as $venue)

                <a
                    href="{{ route('venues.show', $venue) }}"
                    class="venue"
                    data-sport="{{ $venue->sport ? $venue->sport->name : '' }}"
                    data-name="{{ $venue->name }}"
                    data-location="{{ $venue->location }}"
                >

                    <div class="venue-photo">

                        @if ($venue->image)

                            <img
                                src="{{ asset('storage/' . $venue->image) }}"
                                alt="{{ $venue->name }}"
                                loading="lazy"
                                onerror="this.style.display='none'; this.nextElementSibling.hidden=false;"
                            >

                            <div class="venue-placeholder" hidden>
                                <span>🏟️</span>
                                <span>Gambar lapangan tidak tersedia</span>
                            </div>

                        @else

                            <div class="venue-placeholder">
                                <span>🏟️</span>
                                <span>Lapangan SPORTSPACE</span>
                            </div>

                        @endif

                        <span class="venue-badge">Lapangan</span>

                        <button
                            type="button"
                            class="favorite"
                            aria-label="Tambahkan ke favorit"
                            title="Favorit"
                            data-favorite-id="{{ $venue->id }}"
                        >♡</button>

                    </div>

                    <div class="venue-info">

                        <div class="venue-title-row">
                            <h3>{{ $venue->name }}</h3>

                            <span class="rating">
                                ★ {{ number_format($venue->rating ?? 0, 1) }}
                            </span>
                        </div>

                        <p class="venue-location">

                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="2.5"></circle>
                            </svg>

                            {{ $venue->location }}

                        </p>

                        <div class="venue-meta">

                            <div class="venue-price">
                                Rp{{ number_format($venue->price_per_hour, 0, ',', '.') }}
                                <span>/ jam</span>
                            </div>

                            <span class="venue-detail">Lihat detail</span>

                        </div>

                    </div>

                </a>

            @empty

                <div class="empty-venues">
                    <span>🏟️</span>
                    <h3>Belum ada lapangan</h3>
                    <p>Lapangan yang tersedia akan ditampilkan di sini.</p>
                </div>

            @endforelse

        </div>

        <p id="filterEmptyMessage" class="filter-empty" hidden>
            Lapangan yang kamu cari belum tersedia.
        </p>

    </section>

</div>

{{-- NAVIGASI MOBILE --}}
<nav class="mobile-nav" aria-label="Navigasi utama">

    <a href="{{ route('dashboard') }}" class="nav-button active">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M3 10.5 12 3l9 7.5"></path>
            <path d="M5 9.5V21h14V9.5M9 21v-6h6v6"></path>
        </svg>
        <span>Beranda</span>
    </a>

    <a href="{{ route('bookings.index') }}" class="nav-button">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <rect x="3" y="5" width="18" height="16" rx="2"></rect>
            <path d="M16 3v4M8 3v4M3 10h18"></path>
        </svg>
        <span>Booking</span>
    </a>

    <a href="{{ route('jadwal.index') }}" class="nav-button">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <rect x="3" y="5" width="18" height="16" rx="2"></rect>
            <path d="M16 3v4M8 3v4M3 10h18M8 14h3"></path>
        </svg>
        <span>Jadwal</span>
    </a>

    <a href="{{ route('bookings.orders') }}" class="nav-button">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <circle cx="12" cy="12" r="9"></circle>
            <path d="M12 7v5l3 2"></path>
        </svg>
        <span>Riwayat</span>
    </a>

    <a href="{{ route('profile.edit') }}" class="nav-button">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <circle cx="12" cy="8" r="4"></circle>
            <path d="M4 21c1.5-4 4.2-6 8-6s6.5 2 8 6"></path>
        </svg>
        <span>Profil</span>
    </a>

</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sportButtons = document.querySelectorAll('.sport-choice');
    const venues = Array.from(document.querySelectorAll('.venue'));
    const searchInput = document.getElementById('searchInput');
    const searchForm = document.getElementById('searchForm');
    const filterEmptyMessage = document.getElementById('filterEmptyMessage');
    const showAllSportsButton = document.getElementById('showAllSports');
    const favoriteShortcut = document.getElementById('favoriteShortcut');

    let selectedSport = '';
    let showingFavorites = false;

    function getFavorites() {
        try {
            return JSON.parse(
                localStorage.getItem('sportspace-favorites') || '[]'
            ).map(String);
        } catch (error) {
            return [];
        }
    }

    function filterVenues() {
        const keyword = (searchInput?.value || '').toLowerCase().trim();
        const favorites = getFavorites();
        let visibleCount = 0;

        venues.forEach(function (venue) {
            const name = (venue.dataset.name || '').toLowerCase();
            const location = (venue.dataset.location || '').toLowerCase();
            const sport = (venue.dataset.sport || '').toLowerCase();
            const favoriteButton = venue.querySelector('.favorite');

            const matchesSport = !selectedSport ||
                sport.includes(selectedSport);

            const matchesKeyword = !keyword ||
                name.includes(keyword) ||
                location.includes(keyword) ||
                sport.includes(keyword);

            const matchesFavorite = !showingFavorites ||
                (
                    favoriteButton &&
                    favorites.includes(String(favoriteButton.dataset.favoriteId))
                );

            const visible =
                matchesSport && matchesKeyword && matchesFavorite;

            venue.hidden = !visible;

            if (visible) {
                visibleCount++;
            }
        });

        if (filterEmptyMessage) {
            filterEmptyMessage.hidden =
                visibleCount !== 0 || venues.length === 0;
        }
    }

    function resetSportSelection() {
        selectedSport = '';

        sportButtons.forEach(function (button) {
            button.classList.remove('active');
            button.setAttribute('aria-pressed', 'false');
        });
    }

    sportButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const clickedSport =
                (button.dataset.sport || '').toLowerCase();

            showingFavorites = false;

            if (selectedSport === clickedSport) {
                resetSportSelection();
            } else {
                selectedSport = clickedSport;

                sportButtons.forEach(function (item) {
                    const active = item === button;

                    item.classList.toggle('active', active);
                    item.setAttribute('aria-pressed', String(active));
                });
            }

            if (searchInput) {
                searchInput.value = '';
            }

            filterVenues();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            showingFavorites = false;
            resetSportSelection();
            filterVenues();
        });
    }

    if (searchForm) {
        searchForm.addEventListener('submit', function (event) {
            event.preventDefault();

            document.querySelector('.venue-section')?.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    }

    if (showAllSportsButton) {
        showAllSportsButton.addEventListener('click', function () {
            showingFavorites = false;
            resetSportSelection();

            if (searchInput) {
                searchInput.value = '';
            }

            filterVenues();

            document.querySelector('.sports-row')?.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        });
    }

    document.querySelectorAll('.favorite').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();

            const id = String(button.dataset.favoriteId);
            let favorites = getFavorites();

            if (favorites.includes(id)) {
                favorites = favorites.filter(function (item) {
                    return item !== id;
                });
            } else {
                favorites.push(id);
            }

            localStorage.setItem(
                'sportspace-favorites',
                JSON.stringify(favorites)
            );

            restoreFavorites();

            if (showingFavorites) {
                filterVenues();
            }
        });
    });

    function restoreFavorites() {
        const favorites = getFavorites();

        document.querySelectorAll('.favorite').forEach(function (button) {
            const saved = favorites.includes(
                String(button.dataset.favoriteId)
            );

            button.classList.toggle('is-favorite', saved);
            button.textContent = saved ? '♥' : '♡';

            button.setAttribute(
                'aria-label',
                saved ? 'Hapus dari favorit' : 'Tambahkan ke favorit'
            );
        });
    }

    if (favoriteShortcut) {
        favoriteShortcut.addEventListener('click', function () {
            showingFavorites = true;
            resetSportSelection();

            if (searchInput) {
                searchInput.value = '';
            }

            filterVenues();

            document.querySelector('.venue-section')?.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    }

    restoreFavorites();
    filterVenues();
});
</script>

</body>
</html>