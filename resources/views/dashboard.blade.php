<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sertifikasi JWD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-6">
            <span class="font-bold text-xl text-gray-800">Aplikasi Sertifikasi</span>
            <a href="{{ route('dashboard') }}" class="text-blue-600 font-semibold">Dashboard</a>
            <a href="{{ route('skema.index') }}" class="text-gray-600 hover:text-blue-600">Data Skema</a>
            <a href="{{ route('peserta.index') }}" class="text-gray-600 hover:text-blue-600">Data Peserta</a>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-semibold">
                Logout
            </button>
        </form>
    </nav>

    <!-- Main Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Selamat Datang di Aplikasi Pengelolaan Data Peserta Sertifikasi</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <!-- Kartu Total Peserta -->
                    <div class="bg-blue-600 text-white p-6 rounded-lg shadow-md">
                        <div class="text-4xl font-bold">{{ $totalPeserta }}</div>
                        <div class="text-sm mt-1">Total Peserta Sertifikasi</div>
                        <a href="{{ route('peserta.index') }}" class="inline-block mt-4 text-xs bg-white text-blue-600 font-semibold px-3 py-1.5 rounded hover:bg-gray-100">
                            Lihat Data Peserta &rarr;
                        </a>
                    </div>

                    <!-- Kartu Total Skema -->
                    <div class="bg-emerald-600 text-white p-6 rounded-lg shadow-md">
                        <div class="text-4xl font-bold">{{ $totalSkema }}</div>
                        <div class="text-sm mt-1">Total Skema Sertifikasi</div>
                        <a href="{{ route('skema.index') }}" class="inline-block mt-4 text-xs bg-white text-emerald-600 font-semibold px-3 py-1.5 rounded hover:bg-gray-100">
                            Lihat Data Skema &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>