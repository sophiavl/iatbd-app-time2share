@props(['variant' => 'primary', 'text'=> '', 'route'=>null])

@php
$classes = 'rounded-xl flex justify-center items-center font-medium p-3 pl-6 pr-6 sm:h-10 text-lg md:h-12 md:text-xl lg:h-12 xl:text-xl 2xl:h-14 2xl:text-2xl 2xl:font-normal';

if ($variant === 'primary') {
    $classes .= ' bg-accent text-text';
} elseif ($variant === 'secondary') {
    $classes .= ' bg-section2 text-text border-accent border-2';
} else {
    $classes .= ' bg-gray-500 text-text';
}

@endphp

<div {{ $attributes->merge(['class' => $classes])}}>
    <a href='{{ route($route) }}'>{{ $text }}</a>
</div>