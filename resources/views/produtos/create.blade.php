@include("app")


<body class="antialiased bg-bglight dark:bg-bgdark">

    <div class="flex">
        <!-- Header -->
        <div class="w-full">
            <!-- Contatos e login -->
            @include("templates.header")

            <div class="windowsize mt-10 ">


                <form method="POST" action="{{ route('produtos.store') }}" enctype="multipart/form-data" class="rounded-lg shadow-xl bg-gray-50 m-auto flex flex-col w-[900px] p-10 border shadow-md" role="form">
                    @csrf


                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-md font-bold text-gray-900 ">Nome do produto</label>
                        <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>

                        <label for="price" class="block mb-2 mt-2 text-md font-bold text-gray-900 ">Preço do produto</label>
                        <input type="number" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-2xl rounded-lg
                         focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>

                        <label for="desc" class="block mb-2 mt-2 text-md font-bold text-gray-900 ">Descricão do produto</label>
                        <textarea id="desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                         focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></textarea>
                    </div>

                    <input type="file" class="form-control" name="image" />

                    <button id="submit" type="submit" class="mt-10 hover:cursor-pointer  text-white bg-blue-700 hover:bg-blue-800
                     focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center
                      dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Criar produto</button>

            </div>
            @include("templates.footer")

        </div>



        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#create").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "/categorias",
                    data: {
                        "name": $("#text").val()
                    },
                    success: function(data) {
                        Swal.fire(
                            'Categoria criada com sucesso!',
                            'Voltando...',
                            'success'
                        )

                        setTimeout(() => {
                            history.back();
                        }, 1000);
                    },
                });


            });
        </script>

    </div>
</body>