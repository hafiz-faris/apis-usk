<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta - Sertifikasi JWD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-6">
            <span class="font-bold text-xl text-gray-800">Aplikasi Sertifikasi</span>
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-600">Dashboard</a>
            <a href="{{ route('skema.index') }}" class="text-gray-600 hover:text-blue-600">Data Skema</a>
            <a href="{{ route('peserta.index') }}" class="text-blue-600 font-semibold">Data Peserta</a>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-semibold">
                Logout
            </button>
        </form>
    </nav>

    <!-- Main Content -->
    <div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                <h2 class="text-2xl font-bold text-gray-800">Daftar Peserta Sertifikasi</h2>
                
                <div class="flex gap-3 w-full md:w-auto items-center">
                    <!-- Tombol Kembali -->
                    <a href="{{ route('dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md text-sm font-semibold whitespace-nowrap">
                        &larr; Kembali
                    </a>

                    <!-- Form Pencarian -->
                    <form action="{{ route('peserta.index') }}" method="GET" class="flex w-full md:w-auto">
                        <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama / alamat..." 
                               class="px-3 py-2 border border-gray-300 rounded-l-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                        <button type="submit" class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-r-md text-sm">
                            Cari
                        </button>
                    </form>

                    <a href="{{ route('peserta.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-semibold whitespace-nowrap">
                        + Tambah Peserta
                    </a>
                </div>
            </div>

            <!-- Pesan Sukses -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Data Peserta -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse border border-gray-200 text-sm">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <th class="p-3 font-semibold text-gray-700">No</th>
                            <th class="p-3 font-semibold text-gray-700">Skema</th>
                            <th class="p-3 font-semibold text-gray-700">Nama Peserta</th>
                            <th class="p-3 font-semibold text-gray-700">Email</th>
                            <th class="p-3 font-semibold text-gray-700">Jenis Kelamin</th>
                            <th class="p-3 font-semibold text-gray-700">Alamat</th>
                            <th class="p-3 font-semibold text-gray-700">No HP</th>
                            <th class="p-3 font-semibold text-gray-700 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesertas as $index => $peserta)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="p-3">{{ $pesertas->firstItem() + $index }}</td>
                                <td class="p-3 font-medium">{{ $peserta->skema->nama_skema ?? '-' }}</td>
                                <td class="p-3">{{ $peserta->nama_peserta }}</td>
                                <td class="p-3">{{ $peserta->email }}</td>
                                <td class="p-3">{{ $peserta->jns_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                <td class="p-3">{{ $peserta->alamat }}</td>
                                <td class="p-3">{{ $peserta->no_hp }}</td>
                                <td class="p-3 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('peserta.show', $peserta->id) }}" class="bg-green-500 text-white px-2 py-1 rounded text-xs">Detail</a>
                                        <a href="{{ route('peserta.edit', $peserta->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">Edit</a>
                                        <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="p-4 text-center text-gray-500">
                                    Data peserta belum tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $pesertas->appends(['search' => $search])->links() }}
            </div>

        </div>
    </div>

</body>
</html>