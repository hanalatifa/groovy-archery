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
<body class="antialiased bg-white text-gray-900 overflow-x-hidden">

    @include('src.components.navbar')

    <main>
    @include('achievements.pages.header')
    @include('achievements.pages.achievement-grid')
    @include('landing.contacts')
    </main>

    @include('src.components.footer')

</body>
</html>
