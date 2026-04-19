<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groovy Archery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/css/style.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white text-gray-900 overflow-x-hidden flex flex-col min-h-screen">

    @include('src.components.navbar')

    <main class="flex-grow">
        @include('athletes-page.pages.header')
        @include('athletes-page.pages.atlet')
        @include('athletes-page.pages.cta-daftar')
        @include('landing.contacts')
    </main>

    @include('src.components.footer')
    @include('src.components.modal-request')
    @include('src.components.modal-daftar')

</body>
</html>