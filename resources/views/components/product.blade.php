@props(['title' => 'Title', 'category' => 'Category', 'photo' => 'images\tent.jpg', 'remaining_days' => 0, 'productId'])


<div class="flex flex-col justify-center m-1 w-56 sm:w-56 md:w-48 lg:w-48 xl:w-60 2xl:w-52">
    @auth
        @if (Auth::user()->isAdmin())
        <section class="flex w-full justify-end"> 
            <form action="{{ route('products.delete', $productId )}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <x-feathericon-x class="text-red"></x-feathericon-x>
                </button>
            </form>
        </section>
        @endif
    @endauth
    <section class="flex w-fit h-2/3 justify-center">
        <img src="{{ asset($photo) }}" class="w-52 h-52 object-cover sm:w-56 sm:h-56 md:w-48 md:h-48 xl:w-60 xl:h-60 2xl:w-52 2xl:h-52" >
    </section>
    <section class="flex justify-start items-center p-1 mt-1 h-1/3">
        <section class="flex flex-col mr-20">
            <h1 class="font-medium text-base sm:text-sm md:text-sm lg:text-base xl:text-base">{{ $title }}</h1>
            <h3 class=" text-sm sm:text-sm md:text-xs lg:text-xs xl:text-sm">{{ $category }}</h3>  
        </section>
        <section class="flex flex-col items-center w-1/4 justify-center">
            <x-feathericon-clock class="text-accent sm:w-4 h-4 md:w-4 h-4 lg:w-4 h6-4 xl:w-6 h-6"></x-feathericon-clock>
            <p class="text-xs">{{ $remaining_days }} days</p>
        </section>
    </section>
</div>