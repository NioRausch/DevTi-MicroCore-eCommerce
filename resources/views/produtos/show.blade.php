@include("app")

<body class="antialiased bg-bglight">



    <div class="flex">
        <!-- Header -->
        <div class="w-full rounded-md ">
            <!-- Contatos e login -->
            @include("templates.header")

            <div class="windowsize-noflex mt-10 pb-10 pt-5 text-center bg-bglight">
                <hr class="w-full">
                <h2 class="w-full ml-auto h-[2.5rem] font-semibold text-2xl overflow-hidden text-black">
                    {{$nome}}
                </h2>
            </div>

            <div class="windowsize h-[400px] ">

                <div class="w-2/3 bg-bglight  rounded-sm flex ">
                    <div class="ml-auto mr-auto object-contain">
                        <img class="" src="{{ asset('images/' . $path) }}" alt="">
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

                    <div id="comprar" class="rounded-md shadow-md hover:cursor-pointer ml-auto mr-auto hover:scale-105 transition ease-in-out delay-75 inline-block bg-light text-4xl font-bold pl-5 pr-5 p-2 mt-10">
                        <i class="bi bi-bag-check"></i>
                        Comprar
                    </div>

                </div>
            </div>
            <hr class="mt-10 mb-10">
            <div class="windowsize flex">
                <h1 class="ml-auto mr-auto mb-10 text-3xl font-bold">
                    Reviews
                </h1>
            </div>
            <div class="windowsize">

                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <img class="mt-2 rounded-full w-8 h-8" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
                    </div>
                    <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                        <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                        <p class="text-sm">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                            sed diam nonumy eirmod tempor invidunt ut labore et dolore
                            magna aliquyam erat, sed diam voluptua.
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>

                </div>

            </div>
            @include("templates.footer")

            <script>
                function href(url) {
                    location.href = url;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#comprar").click(function() {
                    $.ajax({
                        type: "POST",
                        url: "/carrinho",
                        data: {
                            "id": "{{$id}}"
                        },
                        success: function(data) {
                            Swal.fire(
                                'Produto adicionado ao carrinho!',
                                '',
                                'success'
                            )

                            setTimeout(() => {
                                location.href = "/carrinho"
                            }, 1000);
                        },
                    });


                })
            </script>
</body>