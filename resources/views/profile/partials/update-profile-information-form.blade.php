<section>

    <header>
        <h2>Informasi Profil</h2>

        <p>
            Perbarui nama dan alamat email akun kamu.
        </p>
    </header>


    <form
        id="send-verification"
        method="post"
        action="{{ route('verification.send') }}"
    >
        @csrf
    </form>


    <form
        method="post"
        action="{{ route('profile.update') }}"
        class="profile-form"
    >

        @csrf
        @method('patch')


        <div class="form-group">

            <label for="name">
                Nama
            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
            >

            @if ($errors->updateProfileInformation->get('name'))

                <div class="form-error">
                    {{ $errors->updateProfileInformation->first('name') }}
                </div>

            @endif

        </div>


        <div class="form-group">

            <label for="email">
                Email
            </label>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            >

            @if ($errors->updateProfileInformation->get('email'))

                <div class="form-error">
                    {{ $errors->updateProfileInformation->first('email') }}
                </div>

            @endif

        </div>


        @if (
            $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail
            && ! $user->hasVerifiedEmail()
        )

            <div class="verification-box">

                <p>
                    Email kamu belum diverifikasi.
                </p>

                <button
                    form="send-verification"
                    type="submit"
                    class="verification-button"
                >
                    Kirim Ulang Email Verifikasi
                </button>


                @if (session('status') === 'verification-link-sent')

                    <p class="verification-success">
                        Link verifikasi baru sudah dikirim ke email kamu.
                    </p>

                @endif

            </div>

        @endif


        <div class="form-actions">

            <button
                type="submit"
                class="save-button"
            >
                Simpan Perubahan
            </button>


            @if (
                session('status') === 'profile-updated'
            )

                <span class="save-success">
                    Berhasil disimpan
                </span>

            @endif

        </div>

    </form>

</section>