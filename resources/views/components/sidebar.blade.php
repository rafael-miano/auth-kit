<aside class="flex h-screen flex-col justify-between border-e border-gray-100 dark:border-zinc-700 bg-white dark:bg-zinc-800 w-56">
    <div class="px-4 py-6">
        <!-- Logo -->
        <x-auth-kit::sidebar-logo />

        <!-- Nav -->
        <ul class="mt-6 space-y-1 text-sm font-medium">
            {{ $links }}
        </ul>
    </div>

    <!-- Footer / User Menu -->
    <x-auth-kit::sidebar-user />
</aside>
