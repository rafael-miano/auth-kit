@php
    $user = Auth::user();
@endphp

<div x-data="{ open: false }"
     class="relative border-t border-gray-100 dark:border-zinc-700 bg-white dark:bg-zinc-800">
    <div x-show="open" @click.away="open = false" x-transition
         class="absolute bottom-full left-4 right-4 mb-2 z-10 rounded-lg border border-gray-100 dark:border-zinc-700 bg-white dark:bg-zinc-800 shadow-md">
        <ul class="py-2 text-sm text-gray-700 dark:text-zinc-300">
            <li><x-auth-kit::sidebar-link route="profile" label="Profile" /></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 dark:hover:bg-zinc-700 hover:text-red-700 dark:text-red-400">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Avatar Button -->
    <button @click="open = !open" type="button"
            class="flex w-full items-center gap-2 p-4 hover:bg-gray-50 dark:hover:bg-zinc-700 focus:outline-none">
        <img src="{{ user_avatar_url($user?->name) }}" alt="{{ $user?->name ?? 'User' }}"
             class="size-10 rounded-full object-cover" />
        <div class="text-left">
            <p class="text-xs">
                <strong class="block font-medium text-gray-700 dark:text-white">{{ $user->name }}</strong>
                <span class="text-gray-500 dark:text-zinc-400">{{ $user->email }}</span>
            </p>
        </div>
        <svg class="ml-auto h-5 w-5 text-gray-400 dark:text-zinc-300 transform transition-transform duration-200"
             :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>
    </button>
</div>
