{{-- resources/views/components/topbar.blade.php --}}
<div class="w-full bg-white dark:bg-zinc-800 px-4 py-3 border-b border-gray-200 dark:border-zinc-700">
    <div class="flex justify-between items-center max-w-7xl mx-auto">
        <h1 class="text-lg font-semibold text-gray-900 dark:text-white">
            {{ $title ?? 'Welcome' }}
        </h1>

        <div class="flex items-center gap-4">
            <span class="text-sm text-gray-600 dark:text-zinc-300"> 
                Hi, {{ explode(' ', Auth::user()?->name)[0] ?? 'User' }}
            </span>
        </div>
    </div>
</div>
