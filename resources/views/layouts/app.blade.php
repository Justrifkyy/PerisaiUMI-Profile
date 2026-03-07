<!DOCTYPE html>
<html lang="id" class="overflow-y-scroll">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PERISAI UMI - Pusat Pengembangan Riset Mahasiswa')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #050505; /* Menyamakan warna background hitam gelap */
            overflow-x: hidden;
        }
    </style>

    @stack('styles')
</head>
<body class="text-white antialiased flex flex-col min-h-screen">
    
    @include('layouts.navbar') 

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('layouts.footer') 

    @stack('scripts')
</body>
</html>