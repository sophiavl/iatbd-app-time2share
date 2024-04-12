
<nav class="h-1/5 w-full flex flex-col bg-bgcolor flex">
    <ul class="flex justify-between items-center">
        <li  class="pl-6"><button id="toggleMenu"><x-feathericon-menu class="w-10 h-10"></x-feathericon-menu></button></li>
        <li><a href="{{ route('welcome')}}"><x-logosmall></x-logosmall></a></li>
        <li class="pr-6"><button><a href= "{{ route('profile')}}"><x-feathericon-user class="w-10 h-10"></x-feathericon-user></a></button></li>
    </ul>
    <div class="w-screen border border-text" style="--border-width: 1px;"; ></div>    
</nav>

    
<section id="mobile-menu" class="absolute bg-bgcolor shadow-lg w-64 top-24 inset-0 z-50 flex flex-col items-beginning">
    <div class="w-screen border border-text" style="--border-width: 1px;"></div>    
    <ul class="m-4 flex flex-col">
        <li class="p-2"><button><a href="{{ route('products')}}">Alle producten</a></button></li>
        <li class="p-2"><button><a href="{{ route('loaned')}}">Uitgeleende producten</a></button></li>
        <li class="p-2"><button><a href="{{ route('borrowed')}}">Geleende producten</a></button></li>
        <li class="p-2"><button><a href="{{ route('profile')}}">Profiel</a></button></li>
    </ul>
</section>
 

 <script>
    var menu = false;
    const button = document.getElementById('toggleMenu');
    button.addEventListener('click', toggleMenu);

    function toggleMenu(){
        menu = !menu;

        const mobileMenu = document.getElementById('mobile-menu');
        if (menu) {
            mobileMenu.style.display = 'block';
        }if(!menu) {
            mobileMenu.style.display = 'none';
        }
    }
    window.addEventListener('DOMContentLoaded', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.style.display = 'none';
    });

</script>