@props([
    'type' => 'submit',
    'href' => null,
])

@if ($href && $attributes->has('wire:navigate'))
    <a wire:navigate href="{{ $href }}"
        {{ $attributes->merge(['class' => 'flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none']) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge([
            'type' => $type,
            'class' => 'flex items-center justify-center w-full px-3 py-2 rounded-md bg-black text-white text-sm font-medium shadow-[0px_4px_15px_-4px_#000] transition-all duration-300 hover:bg-neutral-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black disabled:opacity-50 disabled:cursor-not-allowed',
        ]) }}>
        {{ $slot }}
    </button>
@endif