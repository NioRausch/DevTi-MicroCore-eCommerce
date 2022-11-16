@include("app")


<body class="antialiased bg-bglight">
    <script>
        function href(url) {
            location.href = url;
        }
    </script>


    <div class="flex">
        <!-- Header -->
        <div class="w-full">
            <!-- Contatos e login -->
            @include("templates.header")

            <div class="windowsize mt-10">

                <!-- Categorias -->
                <div class="w-[250px] bg-bglight h-[1000px]  rounded-sm">
                    @if(Auth::check())
                    <div onclick="href('/categorias-config')" class="rounded-md shadow-md hover:cursor-pointer m-3 mt-0  hover:scale-105 transition ease-in-out delay-75 inline-block bg-light text-xl font-bold pl-5 pr-5 p-2">
                        <i class="bi bi-gear-fill"></i> Configurar
                    </div>
                    @endif

                    <p onclick="href('/categorias')" class="categoria text-black font-bold text-md m-3 p-2 border rounded-md text-shadow-sm
                     hover:bg-black hover:text-white hover:cursor-pointer
                    transition ease-out delay-75 drop-shadow-md">Todos os produtos</p>

                    @foreach ($categorias as $categoria)
                    <p onclick="href('/categorias/{{$categoria}}')" class="categoria text-black font-bold text-md m-3 p-2 border rounded-md text-shadow-sm
                     hover:bg-black hover:text-white hover:cursor-pointer
                    transition ease-out delay-75 drop-shadow-md">{{$categoria}} </p>
                    @endforeach

                </div>

                <div class="w-[900px] bg-slate-400 p-10 grid grid-cols-3 gap-3 ">
                    <div class="produto" onclick="href('/produtos/create')">
                        <img class="w-full h-40 object-contain" src="{{ asset('imgs/image-placeholder-base.jpg') }}">
                        <div class="flex h-50">

                            <h2 class="w-full h-[4.5rem] text-center mt-16 text-1xl font-bold overflow-hidden text-slate-700">
                                Adicionar Produto

                            </h2>
                        </div>

                    </div>


                    @foreach ($produtos_ids as $id)
                    <x-product-view id="{{$id}}" />
                    @endforeach


                </div>


            </div>

            @include("templates.footer")
        </div>
    </div>
</body>