@props([
    'space' => '8'
])

@php
    $separation = match ($space) {
        '1' => 'py-1',
        '1.5' => 'py-1.5',
        '2' => 'py-2',
        '2.5' => 'py-2.5',
        '3' => 'py-3',
        '4' => 'py-4',
        '5' => 'py-5',
        '6' => 'py-6',
        '7' => 'py-7',
        '8' => 'py-8',
        default => 'py-8'
    }
@endphp

<div class="hidden sm:block">
    <div class="{{ $separation }}">
        <div class="border-t border-gray-200 dark:border-gray-700"></div>
    </div>
</div>
