@include("app")


<body class="antialiased bg-bglight dark:bg-bgdark">
    <script>
        function href(url) {
            location.href = url;
        }

        function delete_cat(id) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var ajxReq = $.ajax('/categorias/' + id, {
                type: 'DELETE'
            });

            ajxReq.done(function(data) {

                Swal.fire(
                    'Categoria deletada com sucesso!',
                    'Voltando...',
                    'success'
                )

                setTimeout(() => {
                    document.location.reload();
                }, 1000);
            });
        }
    </script>


    <div class="flex">
        <!-- Header -->
        <div class="w-full">
            <!-- Contatos e login -->
            @include("templates.header")


            <div class="windowsize mt-10 flex w-[300px]  bg-stone-300 rounded-md pt-10 pb-10">

                <div class="m-auto">

                    <div onclick="href('/categorias/create')" class="mb-5 text-center bg-green-400 rounded-md shadow-md hover:cursor-pointer hover:scale-105 transition ease-in-out delay-75  text-xl font-bold pl-5 pr-5 p-2">
                        <i class="bi bi-plus-square"></i> Criar Categoria
                    </div>


                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-md text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Nome da categoria
                                    </th>
                                    <th scope="col" class="py-3 px-6">

                                    </th>
                                    <th scope="col" class="py-3 px-6">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                <?php
                                $id = $categoria["id"];

                                ?>

                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$categoria["nome"]}}
                                    </th>
                                    <td class="py-4 ">
                                        <div onclick="href('/categorias/{{$id}}/edit')" class="bg-amber-500 text-slate-800 rounded-md shadow-md hover:cursor-pointer hover:bg-amber-600 transition ease-in-out delay-75  text-md font-bold pl-5 pr-5 p-2">
                                            <i class="bi bi-gear-fill"></i> Editar
                                        </div>
                                    </td>
                                    <td class="py-4 px-3">
                                        <div onclick="delete_cat('{{$id}}')" class="bg-red-500 text-slate-800 rounded-md shadow-md hover:cursor-pointer hover:bg-red-600 transition ease-in-out delay-75  text-md font-bold pl-5 pr-5 p-2">
                                            <i class="bi bi-trash-fill"></i> Deletar
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div onclick="href('/categorias')" class="mb-5 mt-5 text-center bg-yellow-300 rounded-md shadow-md hover:cursor-pointer hover:scale-105 transition ease-in-out delay-75  text-xl font-bold pl-5 pr-5 p-2">
                        <i class="bi bi-arrow-return-left"></i> Voltar
                    </div>

                </div>



            </div>

            @include("templates.footer")
        </div>
    </div>
</body>