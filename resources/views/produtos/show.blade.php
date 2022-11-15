@include("app")

<body class="antialiased bg-bglight">
    <script>
    function href(url) {
        location.href = url;
    }
    </script>


    <div class="flex">
        <!-- Header -->
        <div class="w-full rounded-md ">
            <!-- Contatos e login -->
            @include("header")

            <div class="windowsize-noflex mt-10 pb-10 pt-5 text-center bg-bglight">
                <hr class="w-full">
                <h2 class="w-full ml-auto h-[2.5rem] font-semibold text-2xl overflow-hidden text-black">
                    {{$nome}}
                </h2>
            </div>

            <div class="windowsize h-[600px]">

                <div class="w-2/3 bg-bglight  rounded-sm flex">
                    <div class="ml-auto mr-auto object-contain">
                        <img class="" src="{{ asset('imgs/' . $path) }}" alt="">
                    </div>
                </div>
                <div class="w-1/2 bg-zinc-700  p-5 flex flex-col">



                    @if ($preco_antes != $preco_credito)
                    <h3 class="text-slate-400 text-2sm font-thin line-through font-kanit mt-4">R$ {{$preco_antes}}</h3>
                    @else
                    <br>
                    @endif
                    <h3 class="text-light text-5xl font-bold font-kanit"> R$ {{$preco_avista}}</h3>
                    <h3 class="text-slate-400 text-2xl font-kanit"> A vistá no pix <b>15% OFF</b></h3>
                    <h3 class="text-slate-400 text-2xl font-kanit"> <b>Ou</b></h3>
                    <h3 class="text-slate-400 text-2xl font-kanit"> R$ {{$preco_credito}}
                    </h3>
                    <h3 class="text-slate-400 text-xl font-kanit">em 6x de <b>R$ {{$preco_credito/6}}</b> sem juros</h3>

                    <div
                        class="rounded-md shadow-md hover:cursor-pointer ml-auto mr-auto hover:scale-105 transition ease-in-out delay-75 inline-block bg-light text-4xl font-bold pl-5 pr-5 p-2 mt-10">
                        <i class="bi bi-bag-check"></i>
                        Comprar
                    </div>

                </div>
            </div>

            @include("footer")
        </div>
</body>