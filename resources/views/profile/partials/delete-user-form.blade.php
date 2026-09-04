<section>

    <header>
        <h2 class="delete-title">Hapus Akun</h2>

        <p>
            Setelah akun dihapus, semua data akun kamu akan dihapus secara permanen.
            Tindakan ini tidak dapat dibatalkan.
        </p>
    </header>


    <button
        type="button"
        class="delete-button"
        onclick="openDeleteModal()"
    >
        Hapus Akun
    </button>


    {{-- MODAL KONFIRMASI --}}
    <div
        id="deleteModal"
        class="delete-modal"
    >

        <div class="delete-modal-box">

            <h3>Hapus Akun?</h3>

            <p>
                Tindakan ini tidak dapat dibatalkan. Masukkan password kamu
                untuk mengonfirmasi penghapusan akun.
            </p>


            <form
                method="post"
                action="{{ route('profile.destroy') }}"
            >

                @csrf
                @method('delete')


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Masukkan password kamu"
                        required
                    >

                    @if ($errors->userDeletion->get('password'))

                        <div class="form-error">

                            {{ $errors->userDeletion->first('password') }}

                        </div>

                    @endif

                </div>


                <div class="delete-modal-actions">

                    <button
                        type="button"
                        class="cancel-button"
                        onclick="closeDeleteModal()"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="confirm-delete-button"
                    >
                        Ya, Hapus Akun
                    </button>

                </div>

            </form>

        </div>

    </div>

</section>


<script>

    function openDeleteModal() {

        document
            .getElementById('deleteModal')
            .classList.add('show');

        document.body.style.overflow = 'hidden';

    }


    function closeDeleteModal() {

        document
            .getElementById('deleteModal')
            .classList.remove('show');

        document.body.style.overflow = '';

    }

</script>