<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groovy Archery</title>
    
    <script>
        (function() {
            const savedTheme = localStorage.getItem('ga-theme');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (systemDark ? 'dark' : 'light');
            
            document.documentElement.setAttribute('data-theme', theme);
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
    
    <style>
        /* CSS Variable tetap ada untuk mendukung transisi smooth di body */
        :root {
            --body-bg: #ffffff;
            --body-text: #1f2937;
        }
        [data-theme="dark"] {
            --body-bg: #0f172a;
            --body-text: #f1f5f9;
        }
        body {
            background-color: var(--body-bg);
            color: var(--body-text);
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        /* Jika mode gelap aktif, paksa semua teks dasar mengikuti variabel warna teks */
        .dark body {
            color: #f1f5f9 !important;
        }

        /* Pastikan heading juga ikut berubah jika tidak pakai class text-xxx spesifik */
        .dark h1, .dark h2, .dark h3, .dark h4, .dark p, .dark span:not([class*="text-"]) {
            color: #f8fafc;
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden bg-white dark:bg-slate-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">

    @include('src.components.navbar')

    <main>
        @include('landing.hero')
        @include('landing.marque')
        @include('landing.about-us')
        @include('landing.visi-misi')
        @include('landing.values')
        @include('landing.sunnah')
        @include('landing.stats')
        @include('landing.training')
        @include('landing.testimoni')
        @include('landing.cta-champions')
        @include('landing.contacts')
    </main>

    @include('src.components.footer')

    @include('src.components.modal-daftar')
    @include('src.components.modal-testimoni')

</body>
</html>