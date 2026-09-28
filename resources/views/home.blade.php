<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMART VOTE - BAWASLU BANYUMAS</title>
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
                <a href="{{ route('home') }}" class="flex items-center px-4 py-3 rounded-xl bg-red-950/80 text-yellow-400 border border-red-800">
                    <i class="fas fa-home w-6"></i> Beranda
                </a>
                <a href="{{ route('bilik-suara') }}" class="flex items-center px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 transition">
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
            <h2 class="font-semibold text-slate-200">Mitra Pengawasan: BAWASLU Kabupaten Banyumas</h2>
            <span class="text-xs px-3 py-1 bg-green-950 text-green-400 border border-green-800 rounded-full">
                ● Status Node Active
            </span>
        </header>

        <!-- Dynamic Content -->
        <div class="p-6 space-y-6">
            <!-- Hero Banner -->
            <div class="bg-gradient-to-r from-red-950/80 via-slate-900 to-slate-950 border border-red-900/50 rounded-2xl p-8 relative overflow-hidden">
                <div class="max-w-2xl relative z-10">
                    <span class="px-3 py-1 bg-yellow-500/10 text-yellow-400 border border-yellow-500/30 rounded-full text-xs font-semibold uppercase tracking-wider">
                        Sistem Pemungutan Suara Digital
                    </span>
                    <h1 class="text-3xl font-extrabold text-white mt-4 mb-3 leading-tight">
                        SMART VOTE <span class="text-yellow-400">BAWASLU BANYUMAS</span>
                    </h1>
                    <p class="text-slate-300 text-sm leading-relaxed mb-6">
                        Platform e-Voting modern berbasis enkripsi hash digital yang transparan, akuntabel, dan terintegrasi langsung dengan sistem pengawasan BAWASLU Kabupaten Banyumas.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('bilik-suara') }}" class="px-5 py-2.5 bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-bold rounded-xl text-sm transition flex items-center gap-2">
                            <i class="fas fa-vote-yea"></i> Masuk Bilik Suara
                        </a>
                        <a href="{{ route('quick-count') }}" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-200 font-semibold rounded-xl text-sm border border-slate-700 transition flex items-center gap-2">
                            <i class="fas fa-chart-pie"></i> Lihat Quick Count
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-slate-900 border border-slate-800 p-5 rounded-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-slate-400 font-medium">Total Suara Masuk</p>
                            <h3 class="text-2xl font-bold text-white mt-1">{{ $totalVotes ?? 0 }}</h3>
                        </div>
                        <div class="w-10 h-10 bg-red-900/30 border border-red-800 text-red-400 rounded-xl flex items-center justify-center text-lg">
                            <i class="fas fa-box-archive"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-900 border border-slate-800 p-5 rounded-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-slate-400 font-medium">Laporan Pelanggaran</p>
                            <h3 class="text-2xl font-bold text-yellow-400 mt-1">{{ $totalReports ?? 0 }}</h3>
                        </div>
                        <div class="w-10 h-10 bg-yellow-900/30 border border-yellow-800 text-yellow-400 rounded-xl flex items-center justify-center text-lg">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-900 border border-slate-800 p-5 rounded-2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-slate-400 font-medium">Node Pengawasan</p>
                            <h3 class="text-2xl font-bold text-emerald-400 mt-1">Active</h3>
                        </div>
                        <div class="w-10 h-10 bg-emerald-900/30 border border-emerald-800 text-emerald-400 rounded-xl flex items-center justify-center text-lg">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
