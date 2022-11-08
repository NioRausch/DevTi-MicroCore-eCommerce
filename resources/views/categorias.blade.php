@include("app")

<body class="antialiased bg-bglight dark:bg-bgdark">
    <div class="flex">
        <!-- Header -->
        <div class="w-full">
            <!-- Contatos e login -->
            @include("header")

            <div class="windowsize mt-10">
                <!-- Categorias -->
                <div class="w-[250px] bg-bglight h-[1000px]  rounded-sm">
                    <p class="text-black font-bold text-md m-3 p-2 border rounded-md text-shadow-sm
                     hover:bg-black hover:text-white hover:cursor-pointer
                    transition ease-out delay-75 drop-shadow-md">Placas de video</p>
                </div>
            </div>

            @include("footer")
        </div>
    </div>
</body>