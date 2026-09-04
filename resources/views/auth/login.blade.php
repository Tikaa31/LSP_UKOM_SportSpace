<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - SPORTSPACE</title>

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

                <h1>Masuk ke akunmu</h1>

                <p class="login-subtitle">
                    Masuk untuk booking lapangan dan menikmati semua fitur SPORTSPACE.
                </p>


                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Masukkan email"
                        >

                        @error('email')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <div class="password-label">
                            <label for="password">Password</label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Masukkan password"
                        >

                        @error('password')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>


                    <label class="remember-me">
                        <input
                            type="checkbox"
                            name="remember"
                        >

                        <span>Ingat saya</span>
                    </label>


                    <button type="submit" class="login-button">
                        MASUK KE SPORTSPACE
                    </button>


                    <div class="register-link">
                        Belum punya akun?

                        <a href="{{ route('register') }}">
                            Daftar sekarang
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

</body>
</html>