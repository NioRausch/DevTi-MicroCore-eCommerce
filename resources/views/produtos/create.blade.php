@include("app")


<body class="antialiased bg-bglight">

    <div class="flex">
        <!-- Header -->
        <div class="w-full">
            <!-- Contatos e login -->
            @include("templates.header")

            <div class="windowsize mt-10 ">


                <form method="POST" action="{{ route('produtos.store') }}" enctype="multipart/form-data" class="rounded-lg shadow-xl bg-gray-50 m-auto flex flex-col w-[900px] p-10 border shadow-md" role="form">
                    @csrf


                    <div class="mb-6">
                        <label for="nome" class="block mb-2 text-md font-bold text-gray-900 ">Nome do produto</label>
                        <input type="text" name="nome" id="nome" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>

                        <label for="price" class="block mb-2 mt-2 text-md font-bold text-gray-900 ">Preço do produto</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-2xl rounded-lg
                         focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>

                        <label for="desconto" class="block mb-2 mt-2 text-md font-bold text-gray-900 ">Desconto do produto</label>
                        <input type="number" name="desconto" id="desconto" min="0" max="100" step="0.1" class="bg-gray-50 border border-gray-300 text-gray-900 text-2xl rounded-lg
                         focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>

                        <label for="oferta" class="block mb-2 mt-2 text-md font-bold text-gray-900 ">Oferta</label>
                        <input type="radio" name="oferta" id="oferta" class="bg-gray-50 border border-gray-300 text-gray-900 text-2xl rounded-lg
                        focus:ring-blue-500 focus:border-blue-500 " required @if($produto->oferta == 1)checked@endif> Inserir na pagina de oferta

                        <label for="categoria_id" class="block mb-2 mt-2 text-md font-bold text-gray-900 ">Categoria do produto</label>
                        <select name="categoria_id" id="categoria_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg
                         focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria['id']}}">{{$categoria['nome']}}</option>
                            @endforeach
                        </select>

                        <label for="desc" class="block mb-2 mt-2 text-md font-bold text-gray-900 ">Descricão do produto</label>
                        <textarea id="desc" name="desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                         focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></textarea>
                    </div>

                    <input type="file" class="form-control" name="image" />

                    <button id="submit" type="submit" class="mt-10 hover:cursor-pointer  text-white bg-blue-700 hover:bg-blue-800
                     focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center
                     ">Criar produto</button>

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