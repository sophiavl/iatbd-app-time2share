@props(['variant' => 'primary', 'size' => 'medium', 'text'=> ''])

@php
$classes = 'rounded-xl m-2 w-40 flex justify-center items-center text-2xl font-medium';
if ($size === 'small') {
    $classes .= ' px-2 py-1 text-sm';
} elseif ($size === 'large') {
    $classes .= ' px-4 py-2 text-lg';
} else {
    $classes .= ' px-3 py-2 text-base';
}

if ($variant === 'primary') {
    $classes .= ' bg-accent text-text';
} elseif ($variant === 'secondary') {
    $classes .= ' bg-section2 text-text border-accent border-2';
} else {
    $classes .= ' bg-gray-500 text-text';
}
@endphp

<div {{ $attributes->merge(['class' => $classes])}}>
    {{ $text }}
</div>