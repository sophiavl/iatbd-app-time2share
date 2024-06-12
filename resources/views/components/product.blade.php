@props(['title' => 'Title', 'category' => 'Category', 'photo' => 'images\tent.jpg'])


<div class="flex flex-col justify-center m-3 w-60 sm:w-56 md:w-48 lg:w-48 xl:w-60 2xl:w-52">
    <section class="flex w-full justify-center">
        <img src="{{ asset($photo) }}" class="w-60 object-cover sm:w-56 md:w-48 lg:w-48 xl:w-60 2xl:w-52" >
    </section>
    <section class="flex justify-center items-center p-1 mt-1 max-h-20">
        <section class="flex flex-col w-3/4">
            <h1 class="font-medium text-base sm:text-sm md:text-sm lg:text-base xl:text-base">{{ $title }}</h1>
            <h3 class=" text-sm sm:text-sm md:text-xs lg:text-xs xl:text-sm">{{ $category }}</h3>  
        </section>
        <section class="flex flex-col items-center w-1/4 justify-center">
            <x-feathericon-clock class="text-accent sm:w-4 h-4 md:w-4 h-4 lg:w-4 h6-4 xl:w-6 h-6"></x-feathericon-clock>
            <p class="text-xs">3 days</p>
        </section>
    </section>
</div>
