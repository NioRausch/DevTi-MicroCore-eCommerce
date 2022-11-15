@include("app")


<body class="antialiased bg-bglight dark:bg-bgdark">

    <div class="flex">
        <!-- Header -->
        <div class="w-full">
            <!-- Contatos e login -->
            @include("templates.header")

            <div class="windowsize mt-10 ">


                <form class="bg-white m-auto flex flex-col w-[500px] p-10 border shadow-md" id="create" role="form">
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Nome da categoria</label>
                        <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <button id="submit" type="submit" class="hover:cursor-pointer m-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Criar</button>
                </form>

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

            @include("templates.footer")
        </div>
    </div>
</body>