@props(['size'=> 'medium', 'inputtype'=> 'normal', 'for' => 'Username', 'type' => 'text', 'name'=> 'username'])

@php
$classes = 'p-2 w-60 border-2 ';
if ($inputtype === 'normal') {
    $classes .= ' border-accent';
} elseif ($inputtype === 'error') {
    $classes .= ' border-red';
}

if ($size === 'large') {
    $classes .= ' mt-1 mb-4 rounded-lg ';
} elseif ($size === 'medium') {
    $classes .= ' mb-2 mt-1 rounded-xl h-8'; // Pas de marge aan naar een grotere waarde
}

@endphp

<div>
    <section class="flex flex-col items-start">
        <label for={{ $for }}>{{ $for }}</label>
        <input {{ $attributes->merge(['class' => $classes])}} type={{ $type }} id={{$name}} name={{$name}} placeholder={{$for}}></input>    
    </section>
</div>
