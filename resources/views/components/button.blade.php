@props(['variant' => 'primary', 'text'=> '', 'route'=>null])

@php
$classes = 'rounded-lg flex justify-center items-center font-medium m-2 mt-6 p-3 sm:h-8 text-sm lg:h-10 xl:text-base 2xl:h-12 2xl:text-xl';

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