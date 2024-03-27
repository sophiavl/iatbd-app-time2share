@props(['inputtype'=> 'normal', 'for' => 'Username', 'type' => 'text', 'name'=> 'username'])

@php
$classes = 'rounded-lg p-1 w-52 border-2 mt-2 mb-4';
if ($inputtype === 'normal') {
    $classes .= ' border-accent';
} elseif ($inputtype === 'error') {
    $classes .= ' border-red';
}
@endphp

<div>
    <section class="flex flex-col items-start">
        <label for={{ $for }}>{{ $for }}</label>
        <input {{ $attributes->merge(['class' => $classes])}} type={{ $type }} id={{$name}} name={{$name}} placeholder={{$for}}></input>    
    </section>
</div>
