<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Latihan — Groovy Archery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
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