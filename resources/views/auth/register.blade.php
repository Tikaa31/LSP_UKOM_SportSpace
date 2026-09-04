<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar - SPORTSPACE</title>

    <link rel="stylesheet" href="{{ asset('login.css') }}">
</head>

<body class="login-page">

    <div class="login-wrapper">

        {{-- BAGIAN KIRI --}}
        <div class="login-banner">

            <div class="login-overlay"></div>

            <div class="login-brand">
                SPORT<span>SPACE</span>
            </div>

        </div>


        {{-- BAGIAN KANAN --}}
        <div class="login-form-section">

            <div class="login-form-box">

                <div class="login-mobile-brand">
                    SPORT<span>SPACE</span>
                </div>

                <h1>Buat akun baru</h1>

                <p class="login-subtitle">
                    Daftar untuk mulai booking lapangan favoritmu.
                </p>


                <form method="POST" action="{{ route('register') }}">
                    @csrf


                    {{-- NAMA --}}
                    <div class="form-group">

                        <label for="name">Nama Lengkap</label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Masukkan nama lengkap"
                        >

                        @error('name')
                            <p class="form-error">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- EMAIL --}}
                    <div class="form-group">

                        <label for="email">Email</label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="Masukkan email"
                        >

                        @error('email')
                            <p class="form-error">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- PASSWORD --}}
                    <div class="form-group">

                        <label for="password">Password</label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Minimal 8 karakter"
                        >

                        @error('password')
                            <p class="form-error">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- KONFIRMASI PASSWORD --}}
                    <div class="form-group">

                        <label for="password_confirmation">
                            Konfirmasi Password
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Masukkan ulang password"
                        >

                        @error('password_confirmation')
                            <p class="form-error">{{ $message }}</p>
                        @enderror

                    </div>


                    <button type="submit" class="login-button">
                        BUAT AKUN
                    </button>


                    <div class="register-link">
                        Sudah punya akun?

                        <a href="{{ route('login') }}">
                            Masuk sekarang
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

</body>
</html>