<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Skema Sertifikasi</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; background-color: #f3f4f6; margin: 0; padding: 24px; }
        .container { max-width: 1280px; margin: 0 auto; background: #ffffff; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px; }
        
        .btn { display: inline-block; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 0.875rem; transition: background-color 0.2s; }
        .btn-primary { background-color: #2563eb; color: #ffffff; }
        .btn-primary:hover { background-color: #1d4ed8; }
        .btn-secondary { background-color: #6b7280; color: #ffffff; }
        .btn-secondary:hover { background-color: #4b5563; }
        
        .btn-action-warning { color: #d97706; text-decoration: none; font-weight: 600; margin-right: 12px; }
        .btn-action-warning:hover { text-decoration: underline; }
        .btn-text-danger { background: none; border: none; color: #dc2626; cursor: pointer; font-weight: 600; padding: 0; font-size: inherit; }
        .btn-text-danger:hover { text-decoration: underline; }

        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #e5e7eb; padding: 12px 10px; text-align: left; }
        th { background-color: #f9fafb; font-weight: 600; color: #374151; }
        tr:nth-child(even) { background-color: #fcfcfc; }
        
        .alert-success { background-color: #d1fae5; color: #065f46; padding: 12px; border-radius: 6px; margin-bottom: 15px; border: 1px solid #a7f3d0; }
        .pagination-wrapper { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h2 style="margin: 0; font-size: 1.25rem; color: #111827;">Data Skema Sertifikasi</h2>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-text-danger" style="font-size: 0.875rem;">Logout</button>
            </form>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div style="margin-bottom: 16px; display: flex; gap: 10px; align-items: center;">
            <a href="{{ url('/dashboard') }}" class="btn btn-secondary">
                &larr; Kembali
            </a>
            <a href="{{ route('skema.create') }}" class="btn btn-primary">
                + Tambah Skema
            </a>
        </div>

        <!-- Tabel Data Skema -->
        <table>
            <thead>
                <tr>
                    <th style="width: 40px;">No</th>
                    <th>Kode Skema</th>
                    <th>Nama Skema</th>
                    <th>Jenis</th>
                    <th>Jumlah Unit</th>
                    <th style="width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skemas as $index => $item)
                <tr>
                    <td>{{ $skemas->firstItem() + $index }}</td>
                    <td><strong>{{ $item->kd_skema }}</strong></td>
                    <td>{{ $item->nm_skema }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->jml_unit }}</td>
                    <td>
                        <a href="{{ route('skema.edit', $item->id) }}" class="btn-action-warning">Edit</a>
                        <form action="{{ route('skema.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus skema ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-text-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 20px; color: #6b7280;">Data skema belum ada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination-wrapper">
            {{ $skemas->links('pagination::simple-default') }}
        </div>
    </div>
</body>
</html>