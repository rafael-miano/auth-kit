@props([
    'type' => 'text',
    'placeholder' => ''
])

<input
    type="{{ $type }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' => 'flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 pr-10'
    ]) }}
/>
