<!-- Contatos e login -->
<div class="w-7/12 min-w-[900px] h-14 mx-auto flex ">
    <div class="m-4 w-1/2 flex ">
        <div class="space-x-3 select-none">
            <i class="bi bi-facebook hover:cursor-pointer "></i>
            <i class="bi bi-twitter hover:cursor-pointer"></i>
            <i class="bi bi-instagram hover:cursor-pointer"></i>
            <i class="bi bi-youtube hover:cursor-pointer"></i>
            <i class="bi bi-pinterest hover:cursor-pointer"></i>
        </div>
        <i class="bi bi-telephone-fill ml-10 mr-2 mt-1"></i>
        (xx) xx xxxxxxxxxx
    </div>

    <div class="w-90 m-4 w-1/2 flex text-right">



        @if(Auth::check())
        <div class="mb-5 mt-0 h-4 ml-auto w-12 flex">
            <i id="theme-button" class="bi bi-lightbulb hover:cursor-pointer hover:text-light ml-auto select-none	"></i>

            <x-dropdown width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>


        </div>
        @else
        <i id="theme-button" class="bi bi-lightbulb hover:cursor-pointer hover:text-light ml-auto select-none mr-2	"></i>
        &nbsp;
        <i class="bi bi-person-circle mr-1"></i>
        Clique&nbsp;<a href="/login" class="text-light  font-semibold hover:underline">aqui</a> &nbsp;para acessar sua conta!

        @endif

        <script src="{{ asset('js/theme-change.js') }}"></script>

    </div>
</div>
<hr>

<!-- Logo, Cart -->
<div class="windowsize h-34 ">
    <div id="logo" class="mt-2 h-[110px] flex hover:cursor-pointer">
        <svg class="h-[110px] ml-[-15px] fill-light " viewBox="0 0 843.000000 684.000000">
            @include("templates.logo")
        </svg>

        <h3 class="text-3xl mt-auto mb-auto h-7 logo">MicroCore</h3>
    </div>

    <div class="w-1/2 ml-auto float-right flex justify-end mb-4">
        <div id="carrinho" class="hover:cursor-pointer w-20 h-20 mr-5 mt-6 text-center transition ease-in-out delay-75 hover:scale-110">
            <i class="text-light bi bi-cart text-5xl"></i>
            <br>
            <h4 class="font-bold">Carrinho</h4>
        </div>
    </div>
</div>

<script>
    function href(url) {
        location.href = url;
    }

    $("#logo").click(function() {
        href("/")
    });
    $("#carrinho").click(function() {
        href("/carrinho")
    });
</script>

<!-- Titulos -->
<div class="  h-14 mx-auto flex">
    <div class=" windowsize h-14">
        <div class="space-x-3 text-sm grid shadow-lg divide-x-2 grid-flow-col w-full text-center justify-evenly ">
            <a href="/categorias" class="titles">Categorias</a>

            <a href="#" class="titles">Quem Somos</a>

            <a href="#" class="titles">Apostilas</a>

            <a href="#" class="titles">Dúvidas Frequentes</a>

            <a href="#" class="titles">Frete Grátis</a>

            <a href="#" class="titles">Trocas e Devoluções</a>

            <a href="#" class="titles">Trabalhe Conosco</a>

        </div>
    </div>
</div>