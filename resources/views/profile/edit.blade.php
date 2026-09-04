<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil - SPORTSPACE</title>

    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-width: 320px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #172033;
        }

        .profile-page {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            padding: 20px 16px 110px;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 24px;
        }

        .back-button {
            width: 44px;
            height: 44px;
            border: none;
            border-radius: 12px;
            background: #ffffff;
            color: #172033;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.06);
        }

        .profile-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .profile-user-card {
            padding: 24px;
            margin-bottom: 20px;
            text-align: center;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border-radius: 24px;
            color: white;
        }

        .profile-avatar {
            width: 76px;
            height: 76px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            border: 4px solid rgba(255,255,255,0.4);
            border-radius: 50%;
            background: #ffffff;
            color: #2563eb;
            font-size: 30px;
            font-weight: 800;
        }

        .profile-user-card h2 {
            margin: 0 0 6px;
            font-size: 21px;
        }

        .profile-user-card p {
            margin: 0;
            font-size: 14px;
            opacity: 0.9;
            word-break: break-word;
        }

        .profile-section {
            margin-bottom: 18px;
            padding: 20px;
            background: #ffffff;
            border: 1px solid #e8edf5;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.04);
        }

        .profile-section h2 {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .profile-section p {
            color: #7b8798;
            line-height: 1.5;
        }

        .profile-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #172033;
            font-size: 14px;
            font-weight: 700;
        }

        .form-group input {
            width: 100%;
            min-height: 50px;
            padding: 0 15px;
            border: 1px solid #dfe5ee;
            border-radius: 13px;
            outline: none;
            background: #ffffff;
            color: #172033;
            font-size: 14px;
        }

        .form-group input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .form-error {
            margin-top: 7px;
            color: #dc2626;
            font-size: 13px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        .save-button {
            min-height: 48px;
            padding: 0 20px;
            border: none;
            border-radius: 13px;
            background: #2563eb;
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .save-success {
            color: #16a34a;
            font-size: 14px;
            font-weight: 600;
        }

        .logout-button {
            width: 100%;
            min-height: 50px;
            margin-top: 12px;
            padding: 0 20px;
            border: none;
            border-radius: 13px;
            background: #172033;
            color: #ffffff;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #0f172a;
        }

        .delete-title {
            color: #dc2626;
        }

        .delete-button {
            min-height: 48px;
            margin-top: 12px;
            padding: 0 20px;
            border: none;
            border-radius: 13px;
            background: #dc2626;
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        @media (max-width: 480px) {
            .profile-page {
                padding: 16px 14px 100px;
            }

            .profile-user-card {
                padding: 20px 15px;
            }

            .profile-section {
                padding: 16px;
            }

            .profile-header h1 {
                font-size: 21px;
            }

            .profile-section h2 {
                font-size: 17px;
            }

            .profile-section p {
                font-size: 13px;
            }

            .form-actions {
                align-items: stretch;
                flex-direction: column;
            }

            .save-button,
            .logout-button,
            .delete-button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <main class="profile-page">

        {{-- Header --}}
        <div class="profile-header">

            <button
                type="button"
                class="back-button"
                onclick="window.history.back()"
            >
                ←
            </button>

            <h1>Profil Saya</h1>

        </div>


        {{-- Informasi akun --}}
        <section class="profile-user-card">

            <div class="profile-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <h2>{{ Auth::user()->name }}</h2>

            <p>{{ Auth::user()->email }}</p>

        </section>


        {{-- Ubah profil --}}
        <section class="profile-section">

            @include('profile.partials.update-profile-information-form')

        </section>


        {{-- Ubah password --}}
        <section class="profile-section">

            @include('profile.partials.update-password-form')

        </section>


        {{-- Logout --}}
        <section class="profile-section">

            <h2>Keluar Akun</h2>

            <p>Keluar dari akun SPORTSPACE di perangkat ini.</p>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    Logout
                </button>

            </form>

        </section>


        {{-- Hapus akun --}}
        <section class="profile-section">

            @include('profile.partials.delete-user-form')

        </section>

    </main>

</body>
</html>