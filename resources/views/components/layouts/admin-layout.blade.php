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
</head>
<body class="bg-gray-50">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <x-layouts.admin-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header / Topbar -->
            <x-layouts.admin-header />

            <!-- Page Content -->
            <main class="flex-1 overflow-auto p-8">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>
