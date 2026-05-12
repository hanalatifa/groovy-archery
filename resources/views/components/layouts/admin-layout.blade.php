<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title ?? 'Groovy Archery - Admin Panel' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', system-ui, sans-serif;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-[#F4F5F9]">

    <div class="flex h-screen overflow-hidden">
        <x-layouts.admin-sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <x-layouts.admin-header />

            <main class="flex-1 overflow-auto p-8">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>
