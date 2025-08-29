@props([
    'id' => Str::random(8),
    'name' => null,
    'model' => null,
    'label' => null,
    'required' => false,
])

@php
    $wireModel = $attributes->wire('model') ?? ($model ? "wire:model.defer=\"$model\"" : '');
@endphp

<div class="flex items-start mb-6">
    <div class="flex items-center h-5">
        <input type="checkbox" id="{{ $id }}" name="{{ $name }}" {{ $required ? 'required' : '' }}
            {{ $wireModel }} class="hidden peer" {{ $attributes->except(['wire:model', 'model', 'label']) }}>
        <label for="{{ $id }}"
            class="peer-checked:[&_svg]:scale-100 text-sm font-medium text-neutral-600 peer-checked:text-black-600 [&_svg]:scale-0 peer-checked:[&_.custom-checkbox]:border-black peer-checked:[&_.custom-checkbox]:bg-black select-none flex items-center space-x-2">
            <span
                class="flex items-center justify-center w-4 h-4 border-2 rounded custom-checkbox text-neutral-900 border-black dark:border-white transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="white" class="duration-300 ease-out">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </span>
            <span class="text-black dark:text-white transition-colors duration-300">{{ $label }}</span>
        </label>
    </div>
</div>
