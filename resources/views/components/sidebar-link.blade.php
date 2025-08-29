@props([
    'route',
    'label',
    'icon' => null,
    'active' => null,
])

@php
    $isActive = $active ?? request()->routeIs($route);
@endphp

<a href="{{ route($route) }}" wire:navigate
   class="block rounded-lg px-4 py-2 transition-colors duration-300
        {{ $isActive
            ? 'bg-gray-100 dark:bg-zinc-700 text-gray-700 dark:text-white'
            : 'text-gray-500 dark:text-zinc-400 hover:bg-gray-100 dark:hover:bg-zinc-700 hover:text-gray-700 dark:hover:text-white' }}">
    @if ($icon)
        <x-dynamic-component :component="$icon" class="w-4 h-4 inline-block mr-2" />
    @endif
    {{ $label }}
</a>
