<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Groovy Archery - Admin Panel' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: #d1d5db; }
    </style>
</head>
<body class="bg-gray-50">

    <div class="flex h-screen overflow-hidden">
        <x-dashboard::admin-sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <x-dashboard::admin-header />

            <main class="flex-1 overflow-auto p-8">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>