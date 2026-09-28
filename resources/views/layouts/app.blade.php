<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMART VOTE - BAWASLU BANYUMAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-950 text-slate-100 flex min-h-screen">

    <!-- Sidebar -->
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

            <nav class="space-y-2">
                <a href="{{ route('home') }}" class="flex items-center px-4 py-3 rounded-xl bg-red-950/80 text-yellow-400 border border-red-800">
                    <i class="fas fa-home w-6"></i> Beranda
                </a>
            </nav>
        </div>
        <div class="text-xs text-slate-500 border-t border-slate-800 pt-4">
            Proyek Sistem Informasi
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
        <header class="h-16 bg-slate-900/50 border-b border-slate-800 px-6 flex items-center justify-between">
            <h2 class="font-semibold text-slate-200">Mitra: BAWASLU Kabupaten Banyumas</h2>
            <span class="text-xs px-3 py-1 bg-green-950 text-green-400 border border-green-800 rounded-full">● Node Active</span>
        </header>

        <div class="p-6 flex-1">
            @yield('content')
        </div>
    </main>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMART VOTE - BAWASLU BANYUMAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-950 text-slate-100 flex min-h-screen">

    <!-- Sidebar -->
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

            <nav class="space-y-2">
                <a href="{{ route('home') }}" class="flex items-center px-4 py-3 rounded-xl bg-red-950/80 text-yellow-400 border border-red-800">
                    <i class="fas fa-home w-6"></i> Beranda
                </a>
            </nav>
        </div>
        <div class="text-xs text-slate-500 border-t border-slate-800 pt-4">
            Proyek Sistem Informasi &copy; Bawaslu Banyumas
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
        <header class="h-16 bg-slate-900/50 border-b border-slate-800 px-6 flex items-center justify-between">
            <h2 class="font-semibold text-slate-200">Mitra: BAWASLU Kabupaten Banyumas</h2>
            <span class="text-xs px-3 py-1 bg-green-950 text-green-400 border border-green-800 rounded-full">● Node Active</span>
        </header>

        <div class="p-6 flex-1">
            @yield('content')
        </div>
    </main>

</body>
</html>
