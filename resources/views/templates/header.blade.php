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

    <div class="w-90 m-4 w-1/2 text-right">
        <i id="theme-button" class="bi bi-lightbulb hover:cursor-pointer hover:text-light mr-5 select-none	"></i>

        <script src="{{ asset('js/theme-change.js') }}"></script>

        <i class="bi bi-person-circle mr-1"></i>
        Clique <a href="#" class="text-light  font-semibold hover:underline">aqui</a> para acessar sua conta!
    </div>
</div>
<hr>

<!-- Logo, Cart -->
<div class="windowsize h-34 ">
    <div class="mt-2 h-[110px] flex">
        <svg class="h-[110px] ml-[-15px] fill-light " viewBox="0 0 843.000000 684.000000">
            @include("templates.logo")
        </svg>

        <h3 class="text-3xl mt-auto mb-auto h-7 logo">MicroCore</h3>
    </div>

    <div class="w-1/2 ml-auto float-right flex justify-end mb-4">
        <div class="hover:cursor-pointer w-20 h-20 mr-5 mt-6 text-center transition ease-in-out delay-75 hover:scale-110">
            <i class="text-light bi bi-cart text-5xl"></i>
            <br>
            <h4 class="font-bold">Carrinho</h4>
        </div>
    </div>
</div>

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