<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peserta</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; background-color: #f3f4f6; margin: 0; padding: 24px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .header { margin-bottom: 20px; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; font-weight: 600; font-size: 0.875rem; color: #374151; margin-bottom: 6px; }
        input[type="text"], input[type="email"], select, textarea { width: 100%; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; font-size: 0.875rem; }
        .btn { display: inline-block; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 0.875rem; cursor: pointer; border: none; }
        .btn-primary { background-color: #2563eb; color: #ffffff; }
        .btn-primary:hover { background-color: #1d4ed8; }
        .btn-secondary { background-color: #6b7280; color: #ffffff; margin-right: 8px; }
        .alert-danger { background-color: #fee2e2; color: #991b1b; padding: 12px; border-radius: 6px; margin-bottom: 15px; border: 1px solid #fca5a5; font-size: 0.875rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="margin: 0; font-size: 1.25rem;">Edit Data Peserta</h2>
        </div>

        @if ($errors->any())
            <div class="alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>No. Pendaftaran</label>
                <input type="text" name="no_pendaftaran" value="{{ old('no_pendaftaran', $peserta->no_pendaftaran) }}" required>
            </div>

            <div class="form-group">
                <label>Skema Sertifikasi</label>
                <select name="skema_id" required>
                    <option value="">-- Pilih Skema --</option>
                    @foreach($skemas as $skema)
                        <option value="{{ $skema->id }}" {{ old('skema_id', $peserta->skema_id) == $skema->id ? 'selected' : '' }}>
                            {{ $skema->kd_skema }} - {{ $skema->nm_skema }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Nama Peserta</label>
                <input type="text" name="nama_peserta" value="{{ old('nama_peserta', $peserta->nama_peserta) }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $peserta->email) }}" required>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jns_kelamin" required>
                    <option value="L" {{ old('jns_kelamin', $peserta->jns_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jns_kelamin', $peserta->jns_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $peserta->no_hp) }}" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" rows="3" required>{{ old('alamat', $peserta->alamat) }}</textarea>
            </div>

            <div style="margin-top: 20px;">
                <a href="{{ route('peserta.index') }}" class="btn btn-secondary">&larr; Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>