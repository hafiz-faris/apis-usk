<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peserta - {{ $peserta->nama_peserta }}</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; background-color: #f3f4f6; margin: 0; padding: 24px; }
        .container { max-width: 768px; margin: 0 auto; background: #ffffff; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px; }
        .detail-group { margin-bottom: 16px; }
        .detail-label { font-size: 0.875rem; color: #6b7280; font-weight: 600; text-transform: uppercase; margin-bottom: 4px; }
        .detail-value { font-size: 1rem; color: #111827; }
        .btn { display: inline-block; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 0.875rem; }
        .btn-secondary { background-color: #6b7280; color: #ffffff; }
        .btn-warning { background-color: #d97706; color: #ffffff; margin-left: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="margin: 0; font-size: 1.25rem;">Detail Peserta Sertifikasi</h2>
        </div>

        <div class="detail-group">
            <div class="detail-label">No. Pendaftaran</div>
            <div class="detail-value"><strong>{{ $peserta->no_pendaftaran }}</strong></div>
        </div>

        <div class="detail-group">
            <div class="detail-label">Nama Lengkap</div>
            <div class="detail-value">{{ $peserta->nama_peserta }}</div>
        </div>

        <div class="detail-group">
            <div class="detail-label">Email</div>
            <div class="detail-value">{{ $peserta->email }}</div>
        </div>

        <div class="detail-group">
            <div class="detail-label">Skema Sertifikasi</div>
            <div class="detail-value">{{ $peserta->skema->nm_skema ?? '-' }}</div>
        </div>

        <div class="detail-group">
            <div class="detail-label">Jenis Kelamin</div>
            <div class="detail-value">{{ $peserta->jns_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
        </div>

        <div class="detail-group">
            <div class="detail-label">No. HP / WhatsApp</div>
            <div class="detail-value">{{ $peserta->no_hp }}</div>
        </div>

        <div class="detail-group">
            <div class="detail-label">Alamat</div>
            <div class="detail-value">{{ $peserta->alamat ?? '-' }}</div>
        </div>

        <div style="margin-top: 24px;">
            <a href="{{ route('peserta.index') }}" class="btn btn-secondary">&larr; Kembali</a>
            <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-warning">Edit Data</a>
        </div>
    </div>
</body>
</html>