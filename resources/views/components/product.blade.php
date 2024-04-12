@props(['size'=> 'medium'])

@php
$imageclass = "h-auto ";
$h1class = 'm-1 font-medium ';
$h3class = 'm-1 ';
$clockclass = 'text-accent ';
$pclass = '';
if($size === "small"){
    $imageclass .= 'w-30';
    $h1class .= 'text-base ';
    $h3class .= 'text-xs';
    $clockclass .= 'w-5 h-5';
    $pclass .= 'text-xs';
}

if($size === "medium"){
    $imageclass .= '';
    $h1class .= '';
    $h3class .= '';

}

if($size === "big"){
    $imageclass .= '';
    $h1class .= '';
    $h3class .= '';

}
@endphp

<div class="flex flex-col m-3">
    <img src="{{asset ('images/tent.jpg')}}" class="{{ $imageclass}}" >
    <section class="flex justify-center">
        <section class="flex flex-col">
            <h1 class="{{ $h1class }}">Title</h1>
            <h3 class="{{ $h3class }}">Category</h3>  
        </section>
        <section class="flex flex-col justify-center items-center ml-2">
            <x-feathericon-clock class="{{ $clockclass }}"></x-feathericon-clock>
            <p class="{{ $pclass }}">3 days</p>
        </section>
    </section>
</div>