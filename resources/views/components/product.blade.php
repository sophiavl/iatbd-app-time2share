@props(['size'=> 'medium', 'title' => 'Title', 'category' => 'Category', 'photo' => 'images\tent.jpg'])

@php
$imageclass = "object-cover ";
$h1class = 'font-medium ';
$h3class = '';
$clockclass = 'text-accent ';
$pclass = ' ';


if($size === "small"){
    $imageclass .= 'w-32';
    $h1class .= 'text-xs';
    $h3class .= 'text-xs';
    $clockclass .= 'w-4 h-4';
    $pclass .= 'text-xs';
}
if($size === "medium"){
    $imageclass .= 'w-44';
    $h1class .= 'text-base ';
    $h3class .= 'text-xs';
    $clockclass .= 'w-5 h-5';
    $pclass .= 'text-xs';
}

if($size === "large"){
    $imageclass .= 'w-52';
    $h1class .= 'text-lg';
    $h3class .= 'text-base';
    $clockclass .= 'w-6 h-6';
    $pclass .= ' text-base';

}
@endphp

<div class="flex flex-col justify-center">
    <img src="{{ asset($photo) }}" class="{{ $imageclass}}" >
    <section class="flex justify-center items-center p-2 mt-1">
        <section class="flex flex-col w-3/4">
            <h1 class="{{ $h1class }}">{{ $title }}</h1>
            <h3 class="{{ $h3class }}">{{ $category }}</h3>  
        </section>
        <section class="flex flex-col items-center w-1/4 justify-center">
            <x-feathericon-clock class="{{ $clockclass }}"></x-feathericon-clock>
            <p class="{{ $pclass }}">3 days</p>
        </section>
    </section>
</div>
