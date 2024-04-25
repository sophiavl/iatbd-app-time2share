@props(['variant' => 'primary', 'size' => 'small', 'text'=> '', 'route'=>null])

@php
$classes = 'rounded-lg m-2 mt-6 w-36 h-10 p-2 flex justify-center items-center text-2xl font-medium';


if ($variant === 'primary') {
    $classes .= ' bg-accent text-text';
} elseif ($variant === 'secondary') {
    $classes .= ' bg-section2 text-text border-accent border-2';
} else {
    $classes .= ' bg-gray-500 text-text';
}

if($size === 'small') {
    $classes .= ' text-sm';
} elseif ($size === 'big') {
    $classes .= ' text-lg';
}

@endphp

<div {{ $attributes->merge(['class' => $classes])}}>
    <a href='{{ route($route) }}'>{{ $text }}</a>
</div>