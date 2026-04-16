<!DOCTYPE html>
<html>
<head>
    <title>Groovy Archery</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

@include('src.components.navbar')

<main>
    @include('achievements.pages.header')
    @include('achievements.pages.achievement-grid')
    @include('landing.contacts')
</main>

@include('src.components.footer')

</body>
</html>
