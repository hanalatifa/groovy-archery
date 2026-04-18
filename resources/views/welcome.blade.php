<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groovy Archery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/style.css'])
</head>
<body class="antialiased bg-white text-gray-900 overflow-x-hidden">

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