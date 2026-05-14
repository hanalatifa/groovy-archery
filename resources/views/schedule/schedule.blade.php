<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Latihan — Groovy Archery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])

        <style>
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

        .dark body {
            color: #f1f5f9 !important;
        }

        .dark h1, .dark h2, .dark h3, .dark h4, .dark p, .dark span:not([class*="text-"]) {
            color: #f8fafc;
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden" style="font-family:'Montserrat',sans-serif; background:#ffff;">

    @include('src.components.navbar')

    <main>
        @include('schedule.components.hero')
        @include('schedule.components.programs')
        @include('schedule.components.jadwal')
    </main>

    @include('src.components.footer')
    @include('src.components.modal-daftar')

</body>
</html>