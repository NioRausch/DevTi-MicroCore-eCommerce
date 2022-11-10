@include("app")


<body class="antialiased bg-bglight dark:bg-bgdark">
    <script>
    function href(url) {
        location.href = url;
    }
    </script>


    <div class="flex">
        <!-- Header -->
        <div class="w-full">
            <!-- Contatos e login -->
            @include("header")

            <div class="windowsize mt-10">
                <!-- Categorias -->
                <div class="w-[250px] bg-bglight h-[1000px]  rounded-sm">
                    <p onclick="href('/categorias')" class="categoria text-black font-bold text-md m-3 p-2 border rounded-md text-shadow-sm
                     hover:bg-black hover:text-white hover:cursor-pointer
                    transition ease-out delay-75 drop-shadow-md">Todos os produtos</p>
                    @foreach ($categorias as $categoria)
                    <p onclick="href('/categorias/{{$categoria}}')" class="categoria text-black font-bold text-md m-3 p-2 border rounded-md text-shadow-sm
                     hover:bg-black hover:text-white hover:cursor-pointer
                    transition ease-out delay-75 drop-shadow-md">{{$categoria}}</p>
                    @endforeach
                </div>

                <div class="w-[900px] bg-slate-400 p-10 grid grid-cols-3 gap-3 ">
                    @foreach ($produtos_ids as $id)
                    <x-product-view id="{{$id}}" />
                    @endforeach


                </div>
            </div>

            @include(" footer")
        </div>
    </div>
</body>