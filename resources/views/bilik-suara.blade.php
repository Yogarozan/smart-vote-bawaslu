<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilik Suara Digital - SMART VOTE BAWASLU BANYUMAS</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-950 text-slate-100 flex min-h-screen">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-slate-900 border-r border-slate-800 p-6 flex flex-col justify-between hidden md:flex">
        <div>
            <div class="flex items-center space-x-3 mb-8">
                <div class="w-10 h-10 rounded-lg bg-red-900 border border-yellow-500 flex items-center justify-center font-bold text-yellow-400">
                    BV
                </div>
                <div>
                    <h1 class="font-bold text-white text-sm">SMART VOTE</h1>
                    <p class="text-xs text-yellow-500 font-semibold">BAWASLU BANYUMAS</p>
                </div>
            </div>

            <!-- Menu Sidebar -->
            <nav class="space-y-2">
                <a href="{{ route('home') }}" class="flex items-center px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 transition">
                    <i class="fas fa-home w-6"></i> Beranda
                </a>
                <a href="{{ route('bilik-suara') }}" class="flex items-center px-4 py-3 rounded-xl bg-red-950/80 text-yellow-400 border border-red-800 font-medium">
                    <i class="fas fa-vote-yea w-6"></i> Bilik Suara
                </a>
                <a href="{{ route('quick-count') }}" class="flex items-center px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 transition">
                    <i class="fas fa-chart-pie w-6"></i> Quick Count
                </a>
                <a href="{{ route('e-lapor') }}" class="flex items-center px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 transition">
                    <i class="fas fa-bullhorn w-6"></i> E-Lapor Bawaslu
                </a>
            </nav>
        </div>

        <div class="text-xs text-slate-500 border-t border-slate-800 pt-4">
            Proyek Sistem Informasi &copy; Bawaslu Banyumas
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
        <!-- Topbar -->
        <header class="h-16 bg-slate-900/50 border-b border-slate-800 px-6 flex items-center justify-between">
            <h2 class="font-semibold text-slate-200">Bilik Pemungutan Suara Terenkripsi</h2>
            <span class="text-xs px-3 py-1 bg-green-950 text-green-400 border border-green-800 rounded-full">
                ● E-Voting Active
            </span>
        </header>

        <!-- Main Body -->
        <div class="p-6 space-y-6 max-w-5xl mx-auto w-full">

            <!-- Flash Message Sukses -->
            @if(session('success'))
                <div class="bg-emerald-950/80 border border-emerald-500 text-emerald-200 p-5 rounded-2xl shadow-lg">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-400 text-2xl mt-0.5"></i>
                        <div class="flex-1">
                            <h4 class="font-bold text-lg text-emerald-400">Pencoblosan Berhasil!</h4>
                            <p class="text-sm mt-1 text-emerald-200">{{ session('success') }}</p>
                            <div class="mt-3 bg-slate-950 border border-emerald-800/60 p-3 rounded-xl flex items-center justify-between">
                                <span class="text-xs text-slate-400">Receipt Token Audit:</span>
                                <code class="font-mono text-yellow-400 font-bold text-sm" id="tokenText">{{ session('hash_token') }}</code>
                                <button onclick="copyToken()" class="px-3 py-1 bg-emerald-800 hover:bg-emerald-700 text-xs font-semibold rounded-lg transition">
                                    <i class="fas fa-copy mr-1"></i> Salin Token
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Flash Message Error -->
            @if(session('error'))
                <div class="bg-red-950/80 border border-red-500 text-red-200 p-4 rounded-2xl flex items-center gap-3">
                    <i class="fas fa-exclamation-triangle text-red-400 text-xl"></i>
                    <div>
                        <h4 class="font-bold text-red-400">Peringatan</h4>
                        <p class="text-sm text-red-200">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-950/80 border border-red-500 text-red-200 p-4 rounded-2xl">
                    <ul class="list-disc list-inside text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Header Banner Bilik Suara -->
            <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h2 class="text-2xl font-extrabold text-white flex items-center gap-2">
                        <i class="fas fa-vote-yea text-yellow-400"></i> Bilik Pemilihan Digital
                    </h2>
                    <p class="text-slate-400 text-sm mt-1">
                        Silakan masukkan NIK Kabupaten Banyumas Anda dan pilih salah satu Pasangan Calon.
                    </p>
                </div>
                <span class="text-xs px-3 py-1.5 bg-yellow-500/10 text-yellow-400 border border-yellow-500/30 rounded-lg">
                    <i class="fas fa-lock mr-1"></i> Enkripsi End-to-End
                </span>
            </div>

            <!-- Form Pemilihan -->
            <form action="{{ route('vote.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Data Pemilih -->
                <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl space-y-4">
                    <h3 class="text-sm font-bold text-yellow-400 uppercase tracking-wider flex items-center gap-2">
                        <i class="fas fa-id-card"></i> 1. Verifikasi Identitas Pemilih
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-2">
                                NIK Pemilih <span class="text-red-400">* (Wajib Banyumas, Kode: 3302)</span>
                            </label>
                            <input type="text" name="nik" placeholder="Contoh: 3302123456780001" maxlength="16" value="{{ old('nik') }}"
                                class="w-full bg-slate-950 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-yellow-500 font-mono text-sm" required>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-2">
                                Kecamatan Asal Domisili <span class="text-red-400">*</span>
                            </label>
                            <select name="kecamatan" class="w-full bg-slate-950 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-yellow-500 text-sm" required>
                                <option value="" disabled selected>-- Pilih Kecamatan --</option>
                                <option value="Purwokerto Timur" {{ old('kecamatan') == 'Purwokerto Timur' ? 'selected' : '' }}>Purwokerto Timur</option>
                                <option value="Purwokerto Barat" {{ old('kecamatan') == 'Purwokerto Barat' ? 'selected' : '' }}>Purwokerto Barat</option>
                                <option value="Purwokerto Selatan" {{ old('kecamatan') == 'Purwokerto Selatan' ? 'selected' : '' }}>Purwokerto Selatan</option>
                                <option value="Purwokerto Utara" {{ old('kecamatan') == 'Purwokerto Utara' ? 'selected' : '' }}>Purwokerto Utara</option>
                                <option value="Sokaraja" {{ old('kecamatan') == 'Sokaraja' ? 'selected' : '' }}>Sokaraja</option>
                                <option value="Banyumas" {{ old('kecamatan') == 'Banyumas' ? 'selected' : '' }}>Banyumas</option>
                                <option value="Kalibagor" {{ old('kecamatan') == 'Kalibagor' ? 'selected' : '' }}>Kalibagor</option>
                                <option value="Ajibarang" {{ old('kecamatan') == 'Ajibarang' ? 'selected' : '' }}>Ajibarang</option>
                                <option value="Wangon" {{ old('kecamatan') == 'Wangon' ? 'selected' : '' }}>Wangon</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Kartu Pilihan Paslon -->
                <div class="space-y-4">
                    <h3 class="text-sm font-bold text-yellow-400 uppercase tracking-wider flex items-center gap-2">
                        <i class="fas fa-users"></i> 2. Pilih Pasangan Calon
                    </h3>

                    @if($candidates->isEmpty())
                        <div class="bg-amber-950/50 border border-amber-800 p-4 rounded-xl text-amber-300 text-sm">
                            <i class="fas fa-info-circle mr-2"></i> Belum ada data Paslon di database. Silakan jalankan <code>php artisan db:seed --class=CandidateSeeder</code> di terminal Anda.
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            @foreach($candidates as $candidate)
                                <label class="cursor-pointer relative group">
                                    <input type="radio" name="candidate_id" value="{{ $candidate->id }}" class="peer hidden" required>

                                    <div class="p-6 bg-slate-900 border-2 border-slate-800 rounded-2xl transition-all duration-300 peer-checked:border-yellow-500 peer-checked:bg-slate-800/90 peer-checked:shadow-xl peer-checked:shadow-yellow-500/10 hover:border-slate-700 flex flex-col justify-between h-full">
                                        <div>
                                            <div class="flex items-center justify-between mb-4">
                                                <span class="px-3 py-1 bg-red-950 border border-red-800 text-yellow-400 font-extrabold text-sm rounded-lg">
                                                    PASLON 0{{ $candidate->nomor_urut }}
                                                </span>
                                                <i class="fas fa-check-circle text-yellow-500 text-xl opacity-0 peer-checked:opacity-100 transition-opacity"></i>
                                            </div>

                                            <h4 class="font-bold text-white text-base leading-snug">{{ $candidate->nama_capres }}</h4>
                                            <p class="text-xs text-slate-400 mt-1">& {{ $candidate->nama_cawapres }}</p>

                                            <div class="mt-4 pt-3 border-t border-slate-800">
                                                <p class="text-xs font-semibold text-yellow-500/90">Pengusung:</p>
                                                <p class="text-xs text-slate-300">{{ $candidate->partai_pengusung }}</p>
                                            </div>

                                            <div class="mt-3">
                                                <p class="text-xs font-semibold text-slate-400">Visi Utama:</p>
                                                <p class="text-xs text-slate-300 italic mt-0.5">"{{ $candidate->visi_misi }}"</p>
                                            </div>
                                        </div>

                                        <div class="mt-6 pt-3 text-center">
                                            <span class="inline-block text-xs font-bold text-slate-400 peer-checked:text-yellow-400 transition-colors">
                                                Klik Untuk Memilih
                                            </span>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Tombol Submit -->
                @if(!$candidates->isEmpty())
                    <button type="submit" class="w-full py-4 bg-gradient-to-r from-red-800 via-red-900 to-slate-900 hover:from-red-700 hover:to-red-800 text-yellow-400 font-bold text-base rounded-2xl border border-yellow-500/40 shadow-xl transition-all flex items-center justify-center gap-3">
                        <i class="fas fa-paper-plane"></i> Kirim Suara Sah Ke Ledger Bawaslu
                    </button>
                @endif
            </form>
        </div>
    </main>

    <!-- Script Salin Token -->
    <script>
        function copyToken() {
            const tokenText = document.getElementById('tokenText').innerText;
            navigator.clipboard.writeText(tokenText);
            alert('Token Hash Audit berhasil disalin: ' + tokenText);
        }
    </script>

</body>
</html>
