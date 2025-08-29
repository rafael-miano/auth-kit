<!DOCTYPE html>
<html lang="en" x-data="{ dark: $persist(true) }" :class="{ 'dark': dark }">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }} - {{ $title ?? 'Login' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-gray-100 dark:bg-zinc-900 flex items-center justify-center min-h-screen px-4">
    <div class="w-full max-w-md">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>
