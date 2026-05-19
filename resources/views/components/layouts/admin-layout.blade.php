<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        (function () {
            var theme = localStorage.getItem('ga-theme') || 'light';
            document.documentElement.setAttribute('data-theme', theme);
            
            // Tambahan sinkronisasi agar Tailwind 'class' mode membaca data-theme
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>
    <script>
        // Diubah menjadi 'class' agar sinkron dengan deteksi tema berbasis atribut/class
        tailwind.config = { darkMode: 'class' }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title ?? 'Groovy Archery - Admin Panel' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo_groovy_round.png')}}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        :root {
            --body-bg:         #F4F5F9;
            --body-text:       #1f2937;
            --body-text-muted: #6b7280;
            --main-bg:         #F4F5F9;
            --card-bg:         #ffffff;
            --card-border:     #e5e7eb;
        }
        [data-theme="dark"] {
            --body-bg:         #0a0f1e;
            --body-text:       #e2e8f0;
            --body-text-muted: #94a3b8;
            --main-bg:         #0d1424;
            --card-bg:         #1e293b;
            --card-border:     rgba(255,255,255,0.08);
        }
        body {
            font-family: 'Inter', system-ui, sans-serif;
            background-color: var(--body-bg);
            color: var(--body-text);
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        main {
            background-color: var(--main-bg);
            transition: background-color 0.3s ease;
        }
        main h1, main h2, main h3,
        main h4, main h5, main h6,
        main p, main span, main label,
        main td, main th, main li, main a {
            color: var(--body-text);
            transition: color 0.3s ease;
        }
        [data-theme="dark"] main .text-gray-400,
        [data-theme="dark"] main .text-gray-500,
        [data-theme="dark"] main .text-gray-600 {
            color: var(--body-text-muted) !important;
        }
        [data-theme="dark"] main .text-gray-700,
        [data-theme="dark"] main .text-gray-800,
        [data-theme="dark"] main .text-gray-900 {
            color: var(--body-text) !important;
        }
        [data-theme="dark"] main .bg-white {
            background-color: var(--card-bg) !important;
            border-color: var(--card-border) !important;
        }
        [data-theme="dark"] main thead,
        [data-theme="dark"] main thead tr {
            background-color: #1e293b !important;
        }
        [data-theme="dark"] main tbody tr:hover {
            background-color: rgba(255,255,255,0.04) !important;
        }
        [data-theme="dark"] main td,
        [data-theme="dark"] main th {
            border-color: rgba(255,255,255,0.06) !important;
        }
        [data-theme="dark"] main input:not([type="checkbox"]):not([type="radio"]),
        [data-theme="dark"] main select,
        [data-theme="dark"] main textarea {
            background-color: #1e293b !important;
            border-color: #334155 !important;
            color: #e2e8f0 !important;
        }
        [data-theme="dark"] main input::placeholder,
        [data-theme="dark"] main textarea::placeholder {
            color: #64748b !important;
        }
        [data-theme="dark"] main .bg-gray-100 {
            background-color: #1e293b !important;
        }
        [data-theme="dark"] main .bg-gray-50 {
            background-color: #0f172a !important;
        }
    </style>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
          integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="flex h-screen overflow-hidden">
        <x-layouts.admin-sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <x-layouts.admin-header />

            <main class="flex-1 overflow-auto p-8">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>