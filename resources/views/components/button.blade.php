@props(['variant' => 'primary', 'text'=> '', 'route'=>null])

@php
$classes = 'rounded-xl flex justify-center m-1 items-center text-md font-medium p-3 pl-6 pr-6 h-10 lg:h-11 xl:text-base rounded-xl';

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