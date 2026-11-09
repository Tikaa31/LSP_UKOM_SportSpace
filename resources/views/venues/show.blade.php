<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $venue->name }} - SPORTSPACE</title>

    <style>
        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-width: 320px;
            font-family: Arial, Helvetica, sans-serif;
            background: #eef2f8;
            color: #172033;
        }

        button,
        a {
            font-family: inherit;
        }

        /* PAGE */
        .detail-page {
            width: 100%;
            min-height: 100vh;
            background: #f5f7fb;
            padding-bottom: 110px;
            overflow: hidden;
        }

        /* HEADER IMAGE */
        .detail-header {
            position: relative;
            height: clamp(300px, 50vw, 480px);
            overflow: hidden;
            background: #101827;
            animation: imageReveal .7s ease both;
        }

        .detail-header img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            animation: imageZoom 1.2s ease both;
        }

        .image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom,
                rgba(4, 15, 35, .18),
                rgba(4, 15, 35, .62)
            );
        }

        @keyframes imageReveal {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes imageZoom {
            from { transform: scale(1.08); }
            to { transform: scale(1); }
        }

        /* TOMBOL KEMBALI */
        .back-button {
            position: absolute;
            z-index: 5;
            top: 20px;
            left: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            width: 46px;
            height: 46px;
            min-width: 46px;
            flex-shrink: 0;
            padding: 0;
            border: 1px solid rgba(255, 255, 255, .3);
            border-radius: 50%;
            background: rgba(255, 255, 255, .92);
            color: #172033;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .16);
            transition: transform .25s ease, background .25s ease,
                box-shadow .25s ease;
        }

        .back-button svg {
            display: block;
            width: 22px;
            height: 22px;
            flex-shrink: 0;
        }

        .back-button:hover {
            transform: translateX(-4px) scale(1.05);
            background: #fff;
            box-shadow: 0 12px 28px rgba(0, 0, 0, .22);
        }

        .back-button:active {
            transform: scale(.9);
        }

        .back-button:focus-visible {
            outline: 3px solid #93c5fd;
            outline-offset: 3px;
        }

        /* CONTENT CARD */
        .detail-card {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1100px;
            min-height: 500px;
            margin: -38px auto 0;
            padding: 30px 22px 45px;
            background: #fff;
            border-radius: 32px 32px 0 0;
            animation: cardUp .7s cubic-bezier(.22, .8, .32, 1) .15s both;
        }

        @keyframes cardUp {
            from {
                opacity: 0;
                transform: translateY(55px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .detail-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 15px;
            animation: fadeUp .6s ease .35s both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .detail-title-row h1 {
            margin: 0;
            color: #162033;
            font-size: clamp(24px, 4vw, 34px);
            line-height: 1.2;
            overflow-wrap: anywhere;
        }

        .detail-location {
            margin-top: 10px;
            color: #7b8799;
            font-size: 14px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .detail-rating {
            flex-shrink: 0;
            padding: 9px 12px;
            border-radius: 13px;
            background: #fff6dd;
            color: #d88900;
            font-size: 14px;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(216, 137, 0, .08);
        }

        /* PRICE */
        .detail-price {
            margin-top: 28px;
            color: #146cff;
            font-size: clamp(25px, 4vw, 34px);
            font-weight: 800;
            overflow-wrap: anywhere;
            animation: fadeUp .6s ease .45s both;
        }

        .detail-price span {
            color: #8a93a1;
            font-size: 14px;
            font-weight: 500;
        }

        .detail-divider {
            width: 100%;
            height: 1px;
            margin: 28px 0;
            background: linear-gradient(to right, #e8edf4, #f5f7fa);
            animation: lineGrow .8s ease .5s both;
            transform-origin: left;
        }

        @keyframes lineGrow {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }

        /* DESCRIPTION */
        .detail-description {
            animation: fadeUp .6s ease .55s both;
        }

        .detail-description h3,
        .facility-title {
            margin: 0 0 12px;
            color: #172033;
            font-size: 19px;
        }

        .detail-description p {
            max-width: 850px;
            margin: 0;
            color: #717c8c;
            font-size: 14px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        /* FACILITIES */
        .facility-title {
            margin-top: 32px;
            animation: fadeUp .6s ease .65s both;
        }

        .facilities {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            animation: fadeUp .6s ease .75s both;
        }

        .facility {
            padding: 11px 15px;
            border: 1px solid #e7eefc;
            border-radius: 14px;
            background: #f4f8ff;
            color: #286fe5;
            font-size: 13px;
            transition: transform .25s ease, background .25s ease,
                box-shadow .25s ease;
        }

        .facility:hover {
            transform: translateY(-4px);
            background: #eaf2ff;
            box-shadow: 0 8px 18px rgba(40, 111, 229, .12);
        }

        /* BOOKING BOTTOM */
        .booking-area {
            position: fixed;
            z-index: 50;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 12px 18px 20px;
            background: rgba(255, 255, 255, .93);
            border-top: 1px solid rgba(226, 232, 240, .8);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            animation: bottomUp .7s ease .5s both;
        }

        @keyframes bottomUp {
            from {
                opacity: 0;
                transform: translateY(100%);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .booking-button {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 1050px;
            min-height: 58px;
            margin: auto;
            padding: 12px 16px;
            overflow: hidden;
            border-radius: 17px;
            background: linear-gradient(135deg, #146cff, #3b82f6);
            color: #fff;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
            font-weight: 700;
            box-shadow: 0 10px 25px rgba(20, 108, 255, .25);
            transition: transform .25s ease, box-shadow .25s ease,
                filter .25s ease;
        }

        .booking-button::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 70%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, .25),
                transparent
            );
            transform: skewX(-20deg);
            transition: left .6s ease;
        }

        .booking-button:hover::before {
            left: 140%;
        }

        .booking-button:hover {
            transform: translateY(-3px);
            filter: brightness(1.05);
            box-shadow: 0 15px 35px rgba(20, 108, 255, .35);
        }

        .booking-button:active {
            transform: scale(.97);
        }

        .booking-button:focus-visible {
            outline: 3px solid #93c5fd;
            outline-offset: 3px;
        }

        /* TABLET */
        @media (min-width: 700px) {
            body {
                padding: 25px;
            }

            .detail-page {
                max-width: 1100px;
                margin: auto;
                border-radius: 30px;
                overflow: hidden;
                box-shadow: 0 20px 70px rgba(15, 23, 42, .13);
            }

            .detail-header {
                height: 430px;
            }

            .detail-card {
                margin-top: -40px;
                padding: 38px 40px 55px;
            }

            .booking-area {
                position: static;
                padding: 22px 40px 30px;
                background: #fff;
                border-top: 1px solid #edf0f5;
                backdrop-filter: none;
            }

            .booking-button {
                max-width: none;
            }
        }

        /* DESKTOP */
        @media (min-width: 1000px) {
            .detail-header {
                height: 480px;
            }

            .detail-card {
                padding: 45px 55px 60px;
            }

            .detail-title-row {
                gap: 30px;
            }

            .detail-description p {
                font-size: 15px;
            }

            .facilities {
                gap: 14px;
            }

            .facility {
                padding: 13px 18px;
                font-size: 14px;
            }
        }

        /* SMALL MOBILE */
        @media (max-width: 390px) {
            .detail-header {
                height: 280px;
            }

            .back-button {
                top: 14px;
                left: 14px;
                width: 44px;
                height: 44px;
                min-width: 44px;
            }

            .back-button svg {
                width: 22px;
                height: 22px;
            }

            .detail-card {
                padding-left: 17px;
                padding-right: 17px;
            }

            .detail-title-row {
                gap: 10px;
            }

            .detail-rating {
                padding: 7px 9px;
                font-size: 12px;
            }

            .facility {
                width: 100%;
            }

            .booking-area {
                padding-left: 12px;
                padding-right: 12px;
            }
        }

        /* REDUCE ANIMATION */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }

            html {
                scroll-behavior: auto;
            }
        }

        /* FALLBACK GAMBAR */
        .detail-image-placeholder {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 56px;
            background: linear-gradient(135deg, #172033, #34445f);
        }
    </style>
</head>

<body>
<div class="detail-page">

    <div class="detail-header">
        @php
            $venueImage = $venue->image ?? null;
            $venueImagePath = $venueImage ? ltrim($venueImage, '/') : null;

            if (
                $venueImagePath &&
                !str_starts_with($venueImagePath, 'http://') &&
                !str_starts_with($venueImagePath, 'https://') &&
                !str_starts_with($venueImagePath, 'storage/')
            ) {
                $venueImagePath = 'storage/' . $venueImagePath;
            }

            $venueImageUrl = $venueImagePath
                ? (
                    str_starts_with($venueImagePath, 'http://') ||
                    str_starts_with($venueImagePath, 'https://')
                        ? $venueImagePath
                        : asset($venueImagePath)
                )
                : null;
        @endphp

        @if ($venueImageUrl)
            <img
                src="{{ $venueImageUrl }}"
                alt="{{ $venue->name }}"
                onerror="this.style.display='none'; document.getElementById('venue-image-placeholder').style.display='flex';"
            >
            <div
                id="venue-image-placeholder"
                class="detail-image-placeholder"
                style="display: none;"
                aria-label="Gambar lapangan tidak tersedia"
            >🏟️</div>
        @else
            <div
                class="detail-image-placeholder"
                aria-label="Gambar lapangan tidak tersedia"
            >🏟️</div>
        @endif

        <div class="image-overlay"></div>

        <button
            type="button"
            class="back-button"
            onclick="window.history.back()"
            aria-label="Kembali"
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
                focusable="false"
            >
                <path d="M19 12H5"></path>
                <path d="M12 19l-7-7 7-7"></path>
            </svg>
        </button>
    </div>

    <div class="detail-card">
        <div class="detail-title-row">
            <div>
                <h1>{{ $venue->name }}</h1>
                <div class="detail-location">
                    📍 {{ $venue->location }}
                </div>
            </div>

            <div class="detail-rating">
                ★ {{ number_format($venue->rating, 1) }}
            </div>
        </div>

        <div class="detail-price">
            Rp{{ number_format($venue->price_per_hour, 0, ',', '.') }}
            <span>/ jam</span>
        </div>

        <div class="detail-divider"></div>

        <div class="detail-description">
            <h3>Tentang Lapangan</h3>
            <p>
                {{ $venue->description ?? 'Lapangan olahraga yang nyaman dan siap digunakan untuk bermain bersama teman.' }}
            </p>
        </div>

        <h3 class="facility-title">Fasilitas</h3>

        <div class="facilities">
            <div class="facility">💡 Pencahayaan</div>
            <div class="facility">🚿 Kamar Mandi</div>
            <div class="facility">🅿️ Parkir</div>
            <div class="facility">🪑 Area Tunggu</div>
        </div>
    </div>
</div>

<div class="booking-area">
    <a
        href="{{ route('bookings.create', $venue) }}"
        class="booking-button"
    >
        Booking Sekarang
    </a>
</div>

</body>
</html>