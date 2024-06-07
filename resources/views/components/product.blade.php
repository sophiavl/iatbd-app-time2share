@props(['size'=> 'medium', 'title' => 'Title', 'category' => 'Category', 'photo' => 'images\tent.jpg'])

@php
$imageclass = "h-5/6 w-1/2 object-cover ";
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

if($size === "big"){
    $imageclass .= '';
    $h1class .= '';
    $h3class .= '';

}
@endphp

<div class="w-full h-auto">
    <img src="{{ asset($photo) }}" class="{{ $imageclass}}" >
    <section class="flex justify-between items-center mt-1 w-full">
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
