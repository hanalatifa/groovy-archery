<!DOCTYPE html>
<html>
<html lang="id">
<head>
    <title>Groovy Archery</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 antialiased text-gray-900">

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
