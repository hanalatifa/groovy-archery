<!DOCTYPE html>
<html>
<head>
    <title>Groovy Archery</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

@include('src.components.navbar')

<main>
    @include('landing.hero')
    @include('landing.about-us')
    @include('landing.visi-misi')
    @include('landing.values')
    @include('landing.sunnah')
    @include('landing.training')
    @include('landing.testimoni')
    @include('landing.contacts')
</main>

@include('src.components.footer')

</body>
</html>
