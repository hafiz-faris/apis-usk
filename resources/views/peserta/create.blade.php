<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peserta - Sertifikasi JWD</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Style Custom Internal -->
    <style>
        .form-input {
            width: 100%;
            padding: 0.625rem 0.875rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            background-color: #ffffff;
            transition: all 0.2s ease-in-out;
        }
        .form-input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
        }
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.375rem;
        }
        .btn-submit {
            background-color: #2563eb;
            color: #ffffff;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            transition: background-color 0.2s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .btn-submit:hover {
            background-color: #1d4ed8;
        }
        .btn-back {
            background-color: #f3f4f6;
            color: #4b5563;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }
        .btn-back:hover {
            background-color: #e5e7eb;
            color: #1f2937;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">

    <!-- Navigation Bar -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-8">
                    <span class="font-bold text-lg text-blue-700 tracking-wide">
                        Sertifikasi JWD
                    </span>
                    <div class="flex gap-6 text-sm">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-600 font-medium">Dashboard</a>
                        <a href="{{ route('skema.index') }}" class="text-gray-600 hover:text-blue-600 font-medium">Data Skema</a>
                        <a href="{{ route('peserta.index') }}" class="text-blue-600 font-semibold border-b-2 border-blue-600 pb-1">Data Peserta</a>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md font-semibold text-xs transition duration-150">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content Form -->
    <main class="py-10 max-w-2xl mx-auto px-4">
        <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
            
            <!-- Header Form -->
            <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-100">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Tambah Peserta Baru</h2>
                    <p class="text-xs text-gray-500 mt-1">Lengkapi formulir di bawah ini untuk mendaftarkan peserta sertifikasi.</p>
                </div>
                <a href="{{ route('peserta.index') }}" class="btn-back">
                    &larr; Kembali
                </a>
            </div>

            <!-- Form Body -->
            <form action="{{ route('peserta.store') }}" method="POST">
                @csrf

                <!-- No. Pendaftaran -->
                <div class="mb-5">
                    <label class="form-label">No. Pendaftaran <span class="text-red-500">*</span></label>
                    <input type="text" name="no_pendaftaran" value="{{ old('no_pendaftaran') }}" 
                           placeholder="Contoh: REG-2026-001" class="form-input" required>
                    @error('no_pendaftaran') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Skema Sertifikasi -->
                <div class="mb-5">
                    <label class="form-label">Skema Sertifikasi <span class="text-red-500">*</span></label>
                    <select name="skema_id" class="form-input" required>
                        <option value="">-- Pilih Skema --</option>
                        @foreach($skemas as $skema)
                            <option value="{{ $skema->id }}" {{ old('skema_id') == $skema->id ? 'selected' : '' }}>
                                {{ $skema->nama_skema ?? $skema->nm_skema }}
                            </option>
                        @endforeach
                    </select>
                    @error('skema_id') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Nama Peserta -->
                <div class="mb-5">
                    <label class="form-label">Nama Peserta <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_peserta" value="{{ old('nama_peserta') }}" 
                           placeholder="Masukkan nama lengkap" class="form-input" required>
                    @error('nama_peserta') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Email Peserta (TAMBAHAN BARU) -->
                <div class="mb-5">
                    <label class="form-label">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" 
                           placeholder="Contoh: peserta@email.com" class="form-input" required>
                    @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-5">
                    <label class="form-label">Jenis Kelamin <span class="text-red-500">*</span></label>
                    <select name="jns_kelamin" class="form-input" required>
                        <option value="L" {{ old('jns_kelamin') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ old('jns_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jns_kelamin') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Alamat -->
                <div class="mb-5">
                    <label class="form-label">Alamat Lengkap <span class="text-red-500">*</span></label>
                    <textarea name="alamat" rows="3" placeholder="Masukkan alamat tempat tinggal" 
                              class="form-input" required>{{ old('alamat') }}</textarea>
                    @error('alamat') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- No HP -->
                <div class="mb-6">
                    <label class="form-label">Nomor WhatsApp / HP <span class="text-red-500">*</span></label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" 
                           placeholder="Contoh: 081234567890" class="form-input" required>
                    @error('no_hp') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('peserta.index') }}" class="btn-back">Batal</a>
                    <button type="submit" class="btn-submit">Simpan Peserta</button>
                </div>
            </form>

        </div>
    </main>

</body>
</html>