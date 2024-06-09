@props(['size'=> 'medium', 'title' => 'Title', 'category' => 'Category', 'photo' => 'images\tent.jpg'])


<div class="flex flex-col justify-center">
    <img src="{{ asset($photo) }}" class="object-cover sm:w-32 md:w-40 lg:w-48" >
    <section class="flex justify-center items-center p-2 mt-1 max-h-20">
        <section class="flex flex-col w-3/4">
            <h1 class="font-medium sm:text-xs md:text-sm lg:text-base">{{ $title }}</h1>
            <h3 class=" sm:text-sm md:text-base lg:text-lg">{{ $category }}</h3>  
        </section>
        <section class="flex flex-col items-center w-1/4  justify-center">
            <x-feathericon-clock class="text-accent sm:w-6 h-6 md:w-7 h-7 lg:w-8 h-8"></x-feathericon-clock>
            <p class="sm:text-lg md:text-xl lg:text-2xl">3 days</p>
        </section>
    </section>
</div>
