<!DOCTYPE html>
<html class="" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include("app")

<body class="antialiased bg-bglight dark:bg-bgdark">
    <div class="flex">
        <!-- Header -->
        <div class="w-full">
            <!-- Contatos e login -->
            @include("header")

            <!-- Ofertas do dia -->
            <div class="w-full min-w-[900px] mt-6">
                <div class="rounded-sm  windowsize h-12 mb-10 bg-bgdark dark:bg-light">
                    <h2 class="font-tesla text-2xl text-white m-auto">OFERTAS DO DIA</h2>

                </div>

                <div class="windowsize mb-10 grid grid-flow-col justify-evenly ">
                    @foreach ($ofertas as $oferta)
                    <x-product-view id="{{$oferta['produto_id']}}" />
                    @endforeach


                </div>

            </div>

            <!-- Conheça nossa loja -->
            <div class="w-full min-w-[900px] mt-6">
                <div class="rounded-sm  windowsize h-12 mb-10 bg-bgdark dark:bg-light">
                    <h2 class="font-tesla text-2xl text-white m-auto">Conheça a nossa loja!</h2>
                </div>
                <div class="windowsize max-w-[900px] h-[500px] grid grid-flow-col grid-cols-2 grid-rows-3 gap-5">
                    <div class="row-span-2 categoria-preview">
                        <img class="m-auto w-full h-full object-scale-down" src="{{ asset('imgs/gabinete.jpg') }}">
                        <p class="absolute text-black bottom-2 left-4 font-bold text-2xl text-shadow-xl font-tesla">
                            Gabinetes</p>
                    </div>
                    <div class="categoria-preview">
                        <img class="m-auto w-full h-full object-scale-down" src="{{ asset('imgs/gpu.png') }}">
                        <p class="absolute text-black bottom-2 left-4 font-bold text-2xl text-shadow-xl font-tesla">Gpus
                        </p>

                    </div>
                    <div class="categoria-preview">
                        <img class="m-auto w-full h-full object-scale-down" src="{{ asset('imgs/ram.jpg') }}">
                        <p class="absolute text-black bottom-2 left-4 font-bold text-2xl text-shadow-xl font-tesla">Rams
                        </p>

                    </div>
                    <div class="row-span-2 categoria-preview">
                        <img class="m-auto w-full h-full object-scale-down" src="{{ asset('imgs/cpui9.jpg') }}">
                        <p class="absolute text-black bottom-2 left-4 font-bold text-2xl text-shadow-xl font-tesla">Cpus
                        </p>

                    </div>
                </div>
            </div>


            @include("footer")

        </div>
    </div>
</body>

</html>