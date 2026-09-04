<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Olahraga - SPORTSPACE</title>

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
            max-width: 700px;
            margin: 0 auto;
            padding: 24px;
        }

        .page-header {
            display: flex;
            align-items: center;
            gap: 14px;
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

        label {
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
            font-size: 15px;
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
            margin-top: 7px;
            color: #dc2626;
            font-size: 13px;
        }

        .icon-preview-box {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 12px;
            padding: 14px;
            border-radius: 14px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .icon-preview {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #eff6ff;
            font-size: 30px;
        }

        .preview-text {
            color: #64748b;
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
            padding: 0 22px;
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
            background: white;
            border: 1px solid #dbe2ea;
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

            .form-actions {
                flex-direction: column-reverse;
            }

            .cancel-button,
            .submit-button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="admin-page">

    <div class="page-header">

        <a
            href="{{ route('admin.sports.index') }}"
            class="back-button"
        >
            ←
        </a>

        <div class="page-title">
            <h1>Edit Olahraga</h1>
            <p>Ubah nama atau icon olahraga.</p>
        </div>

    </div>


    <form
        action="{{ route('admin.sports.update', $sport) }}"
        method="POST"
        class="form-card"
    >

        @csrf
        @method('PUT')


        <div class="form-group">

            <label for="name">
                Nama Olahraga
                <span class="required">*</span>
            </label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $sport->name) }}"
            >

            @error('name')
                <span class="error-text">{{ $message }}</span>
            @enderror

        </div>


        <div class="form-group">

            <label for="icon">
                Icon Olahraga
                <span class="required">*</span>
            </label>

            <input
                type="text"
                id="icon"
                name="icon"
                class="form-control @error('icon') is-invalid @enderror"
                value="{{ old('icon', $sport->icon) }}"
                placeholder="Contoh: ⚽"
            >

            @error('icon')
                <span class="error-text">{{ $message }}</span>
            @enderror


            <div class="icon-preview-box">

                <div
                    class="icon-preview"
                    id="iconPreview"
                >
                    {{ old('icon', $sport->icon) }}
                </div>

                <div class="preview-text">
                    Preview icon olahraga
                </div>

            </div>

        </div>


        <div class="form-actions">

            <a
                href="{{ route('admin.sports.index') }}"
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
    const iconInput = document.getElementById('icon');
    const iconPreview = document.getElementById('iconPreview');

    iconInput.addEventListener('input', function () {

        if (this.value.trim() !== '') {
            iconPreview.textContent = this.value;
        } else {
            iconPreview.textContent = '🏆';
        }

    });
</script>

</body>
</html>