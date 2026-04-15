<!DOCTYPE html>
<html>
<head>
    <title>Groovy Archery</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

@include('components.navbar')

<main>
    @include('pages.hero')
    @include('pages.about-us')
    @include('pages.visi-misi')
    @include('pages.values')
    @include('pages.sunnah')
    @include('pages.training')
    @include('pages.testimoni')
    @include('pages.contacts')
</main>

@include('components.footer')

</body>
</html>
