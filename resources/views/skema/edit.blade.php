<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Skema Sertifikasi</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; background-color: #f3f4f6; margin: 0; padding: 24px; }
        .container { max-width: 800px; margin: 0 auto; background: #ffffff; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; font-weight: 600; font-size: 0.875rem; color: #374151; margin-bottom: 6px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; font-size: 0.875rem; }
        input:focus { outline: none; border-color: #d97706; ring: 2px #d97706; }
        .error-message { color: #ef4444; font-size: 0.75rem; margin-top: 4px; display: block; }
        .btn-group { display: flex; gap: 8px; margin-top: 24px; }
        .btn-warning { background-color: #d97706; color: #ffffff; padding: 10px 16px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; text-decoration: none; }
        .btn-warning:hover { background-color: #b45309; }
        .btn-secondary { background-color: #6b7280; color: #ffffff; padding: 10px 16px; border-radius: 6px; font-weight: bold; text-decoration: none; }
        .btn-secondary:hover { background-color: #4b5563; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="margin: 0; font-size: 1.25rem; color: #111827;">Edit Skema Sertifikasi</h2>
        </div>

        <form action="{{ route('skema.update', $skema->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Kode Skema</label>
                <input type="text" name="kd_skema" value="{{ old('kd_skema', $skema->kd_skema) }}" required>
                @error('kd_skema') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Nama Skema</label>
                <input type="text" name="nm_skema" value="{{ old('nm_skema', $skema->nm_skema) }}" required>
                @error('nm_skema') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Jenis Skema</label>
                <input type="text" name="jenis" value="{{ old('jenis', $skema->jenis) }}" required>
                @error('jenis') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Jumlah Unit</label>
                <input type="number" name="jml_unit" value="{{ old('jml_unit', $skema->jml_unit) }}" required>
                @error('jml_unit') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-warning">Update Skema</button>
                <a href="{{ route('skema.index') }}" class="btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>