<div class="space-y-6">

    <div class="bg-white dark:bg-zinc-800 rounded shadow p-6">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Welcome</h2>
        <p class="text-gray-600 dark:text-zinc-300">
            This is your dashboard. Customize it with widgets, stats, or quick actions.
        </p>
    </div>

    <!-- Grid Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-zinc-800 rounded shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Card 1</h3>
            <p class="text-gray-600 dark:text-zinc-300">Some content for card 1.</p>
        </div>
        <div class="bg-white dark:bg-zinc-800 rounded shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Card 2</h3>
            <p class="text-gray-600 dark:text-zinc-300">Some content for card 2.</p>
        </div>
    </div>

    <!-- Buttons -->
    <div class="flex flex-wrap gap-4">
        <x-auth-kit::button>Primary</x-auth-kit::button>
        <x-auth-kit::button
            class="bg-gray-200 dark:bg-zinc-600 text-gray-800 dark:text-white">Secondary</x-auth-kit::button>
    </div>

</div>

