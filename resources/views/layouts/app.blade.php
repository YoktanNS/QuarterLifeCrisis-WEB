<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendukung Keputusan - Quarter-Life Crisis</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-beige text-ink min-h-screen flex flex-col">
    
    <nav class="bg-surface shadow-sm border-b border-beige-dark">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <div class="w-8 h-8 rounded bg-sage flex items-center justify-center text-white font-bold">
                        QLC
                    </div>
                    <span class="font-semibold text-lg tracking-wide text-sage-dark">KrisisFase</span>
                </div>
                <div>
                    <span class="text-sm text-gray-500">Sistem Pendukung Keputusan Berbasis Pakar</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        @yield('content')
    </main>

    <footer class="bg-surface border-t border-beige-dark mt-auto">
        <div class="max-w-5xl mx-auto px-4 py-6 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Hak Cipta Dilindungi. Make With Love ♥️.
        </div>
    </footer>

</body>
</html>