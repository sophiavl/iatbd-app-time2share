
    <nav class="h-1/5 bg-bgcolor">
        <ul class="flex justify-between items-center">
            <li  class="pl-6"><button id="toggleMenu"><x-feathericon-menu class="w-10 h-10"></x-feathericon-menu></button></li>
            <li><x-logosmall></x-logosmall></li>
            <li  class="pr-6"><x-feathericon-user class="w-10 h-10"></x-feathericon-user></li>
        </ul>
        <div class="w-screen border border-text" style="--border-width: 1px;"; ></div>    
    </nav>
    
    
            <section v-if='menu' id="mobile-menu" class="absolute bg-bgcolor shadow-lg w-64 top-24 inset-0 z-50 flex items-beginning">
                <ul class="m-4">
                    <li class="p-2"><button>Uitgeleende producten</button></li>
                    <li class="p-2"><button>Geleende producten</button></li>
                    <li class="p-2"><button>Profiel</button></li>
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
        } else {
            mobileMenu.style.display = 'none';
        }
    }

</script>