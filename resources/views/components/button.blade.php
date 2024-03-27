@props(['variant' => 'primary', 'size' => 'small', 'text'=> ''])

@php
$classes = 'rounded-lg m-2 mt-8 w-36 h-10 flex justify-center items-center text-2xl font-medium text-lg';


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