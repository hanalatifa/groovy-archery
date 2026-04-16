<!DOCTYPE html>
<html>
<head>
    <title>Groovy Archery</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

@include('src.components.navbar')

<main>
    @include('athletes-page.pages.header')
    @include('athletes-page.pages.atlet')
    @include('landing.contacts')
</main>

@include('src.components.footer')

</body>
</html>
