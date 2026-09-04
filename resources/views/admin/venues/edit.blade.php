<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Lapangan - SPORTSPACE</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-width: 320px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1e293b;
        }

        .admin-page {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 24px;
        }

        .page-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 24px;
        }

        .back-button {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: white;
            color: #1e293b;
            text-decoration: none;
            font-size: 24px;
        }

        .page-title h1 {
            margin: 0 0 5px;
            font-size: 27px;
        }

        .page-title p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .form-card {
            padding: 24px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
        }

        .required {
            color: #dc2626;
        }

        .form-control {
            width: 100%;
            min-height: 48px;
            padding: 12px 14px;
            border: 1px solid #dbe2ea;
            border-radius: 12px;
            background: white;
            color: #1e293b;
            font-family: inherit;
            font-size: 14px;
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .form-control.is-invalid {
            border-color: #dc2626;
        }

        .error-text {
            display: block;
            margin-top: 6px;
            color: #dc2626;
            font-size: 13px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .current-image {
            margin-top: 14px;
        }

        .preview-label {
            display: block;
            margin-bottom: 8px;
            color: #64748b;
            font-size: 13px;
        }

        .image-preview {
            width: 100%;
            max-width: 400px;
            height: 220px;
            object-fit: cover;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #f8fafc;
            display: block;
        }

        .no-image {
            width: 100%;
            max-width: 400px;
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px dashed #cbd5e1;
            border-radius: 14px;
            background: #f8fafc;
            color: #94a3b8;
            font-size: 14px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .cancel-button,
        .submit-button {
            min-height: 48px;
            padding: 0 20px;
            border-radius: 12px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .cancel-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #dbe2ea;
            background: white;
            color: #475569;
            text-decoration: none;
        }

        .submit-button {
            border: none;
            background: #2563eb;
            color: white;
        }

        .submit-button:hover {
            background: #1d4ed8;
        }

        @media (max-width: 600px) {
            .admin-page {
                padding: 15px;
            }

            .page-title h1 {
                font-size: 22px;
            }

            .form-card {
                padding: 16px;
                border-radius: 16px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .cancel-button,
            .submit-button {
                width: 100%;
            }

            .image-preview,
            .no-image {
                max-width: 100%;
                height: 180px;
            }
        }
    </style>
</head>

<body>

<div class="admin-page">

    <div class="page-header">

        <a
            href="{{ route('admin.venues.index') }}"
            class="back-button"
        >
            ←
        </a>

        <div class="page-title">
            <h1>Edit Lapangan</h1>
            <p>Ubah data lapangan.</p>
        </div>

    </div>


    <form
        action="{{ route('admin.venues.update', $venue) }}"
        method="POST"
        enctype="multipart/form-data"
        class="form-card"
    >

        @csrf
        @method('PUT')


        {{-- NAMA LAPANGAN --}}
        <div class="form-group">

            <label for="name">
                Nama Lapangan
                <span class="required">*</span>
            </label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $venue->name) }}"
            >

            @error('name')
                <span class="error-text">{{ $message }}</span>
            @enderror

        </div>


        {{-- JENIS OLAHRAGA --}}
        <div class="form-group">

            <label for="sport_id">
                Jenis Olahraga
                <span class="required">*</span>
            </label>

            <select
                id="sport_id"
                name="sport_id"
                class="form-control @error('sport_id') is-invalid @enderror"
            >

                @foreach ($sports as $sport)

                    <option
                        value="{{ $sport->id }}"
                        {{ old('sport_id', $venue->sport_id) == $sport->id ? 'selected' : '' }}
                    >
                        {{ $sport->icon }} {{ $sport->name }}
                    </option>

                @endforeach

            </select>

            @error('sport_id')
                <span class="error-text">{{ $message }}</span>
            @enderror

        </div>


        {{-- LOKASI --}}
        <div class="form-group">

            <label for="location">
                Lokasi
                <span class="required">*</span>
            </label>

            <textarea
                id="location"
                name="location"
                class="form-control @error('location') is-invalid @enderror"
            >{{ old('location', $venue->location) }}</textarea>

            @error('location')
                <span class="error-text">{{ $message }}</span>
            @enderror

        </div>


        <div class="form-row">

            {{-- HARGA --}}
            <div class="form-group">

                <label for="price_per_hour">
                    Harga per Jam
                    <span class="required">*</span>
                </label>

                <input
                    type="number"
                    id="price_per_hour"
                    name="price_per_hour"
                    class="form-control @error('price_per_hour') is-invalid @enderror"
                    value="{{ old('price_per_hour', $venue->price_per_hour) }}"
                    min="0"
                >

                @error('price_per_hour')
                    <span class="error-text">{{ $message }}</span>
                @enderror

            </div>


            {{-- RATING --}}
            <div class="form-group">

                <label for="rating">
                    Rating
                </label>

                <input
                    type="number"
                    id="rating"
                    name="rating"
                    class="form-control @error('rating') is-invalid @enderror"
                    value="{{ old('rating', $venue->rating) }}"
                    min="0"
                    max="5"
                    step="0.1"
                >

                @error('rating')
                    <span class="error-text">{{ $message }}</span>
                @enderror

            </div>

        </div>


        {{-- GAMBAR --}}
        <div class="form-group">

            <label for="image">
                Ganti Gambar
            </label>

            <input
                type="file"
                id="image"
                name="image"
                class="form-control @error('image') is-invalid @enderror"
                accept="image/jpeg,image/png,image/jpg,image/webp"
            >

            @error('image')
                <span class="error-text">{{ $message }}</span>
            @enderror


            <div class="current-image">

                <span class="preview-label">
                    Preview gambar:
                </span>

                @if ($venue->image)

                    <img
                        id="imagePreview"
                        src="{{ asset('storage/' . $venue->image) }}"
                        alt="{{ $venue->name }}"
                        class="image-preview"
                    >

                @else

                    <div
                        id="noImage"
                        class="no-image"
                    >
                        Belum ada gambar
                    </div>

                    <img
                        id="imagePreview"
                        src=""
                        alt="Preview gambar"
                        class="image-preview"
                        style="display: none;"
                    >

                @endif

            </div>

        </div>


        <div class="form-actions">

            <a
                href="{{ route('admin.venues.index') }}"
                class="cancel-button"
            >
                Batal
            </a>

            <button
                type="submit"
                class="submit-button"
            >
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>


<script>
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const noImage = document.getElementById('noImage');

    imageInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            return;
        }

        const imageUrl = URL.createObjectURL(file);

        imagePreview.src = imageUrl;
        imagePreview.style.display = 'block';

        if (noImage) {
            noImage.style.display = 'none';
        }

    });
</script>

</body>
</html>