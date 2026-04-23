<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery — Groovy Archery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
</head>
<body class="antialiased bg-[#0a0a0a] text-white overflow-x-hidden" style="font-family:'Montserrat',sans-serif;">

    @include('src.components.navbar')

    <main>
        @include('gallery.components.header')
        @include('gallery.components.filter')
        @include('gallery.components.grid')
        @include('gallery.components.cta')
    </main>

    @include('src.components.footer')
    @include('src.components.modal-daftar')
    @include('gallery.components.lightbox')

</body>
</html>