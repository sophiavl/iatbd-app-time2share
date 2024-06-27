@props(['size'=> 'medium', 'inputtype'=> 'normal', 'for' => 'Username', 'type' => 'text', 'name'=> 'username'])

@php
$inputclass = 'p-2 w-60 border-1 ';
$labelclass = '';

if ($size ==='small') {
    $inputclass .= ' w-52 m-1 rounded-md h-6';
    $labelclass .= 'text-sm';
    
}

if ($inputtype === 'normal') {
    $inputclass .= ' border-accent';
}

if ($size === 'medium') {
    $inputclass .= ' mb-2 mt-1 rounded-xl h-8'; 
}

if ($size === 'large') {
    $inputclass .= ' mt-1 mb-4 rounded-lg ';
} 

$placeholderFontSize = ($size === 'small') ? '10px' : '12px';

@endphp

<div>
    <section class="flex flex-col items-start">
        <label for={{ $for }} class="{{ $labelclass }}">{{ $for }}</label>
        <input {{ $attributes->merge(['class' => $inputclass . ($errors->has($name) ? ' is-invalid' : '')])}} type={{ $type }} id={{$name}} name={{$name}}></input>   
        @error($name)
            <span class="invalid-feedback text-xs" style="color:red;">{{ $message }}</span> 
        @enderror
    </section>
</div>
