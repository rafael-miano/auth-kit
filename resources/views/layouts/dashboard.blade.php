<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }} - {{ $title ?? 'Dashboard' }}</title>
    <style>[x-cloak] { display: none !important; }</style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    {!! ToastMagic::styles() !!}
</head>
<body class="flex bg-gray-100 dark:bg-zinc-900 text-gray-900 dark:text-white min-h-screen" theme="dark">

    <!-- Sidebar -->
    <x-auth-kit::sidebar>
        <x-slot name="links">
            <li><x-auth-kit::sidebar-link route="dashboard" label="Dashboard" /></li>
        </x-slot>
    </x-auth-kit::sidebar>

    <!-- Page content -->
    <div class="flex-1 flex flex-col">

        <!-- Top Navigation -->
        <x-auth-kit::topbar />

        <!-- Main Content -->
        <main class="flex-1 px-4 sm:px-6 lg:px-8 py-6 overflow-y-auto bg-white dark:bg-zinc-900 transition-colors duration-300">
            {{ $slot }}
        </main>

    </div>

    @livewireScripts
    {!! ToastMagic::scripts() !!}
</body>
</html>
