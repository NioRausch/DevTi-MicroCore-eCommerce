@include("app")


<div class="flex">
    <!-- Header -->
    <div class="w-full rounded-md ">
        <!-- Contatos e login -->
        @include("templates.header")

        <div class="w-full min-w-[900px] mt-6">
            <div class="rounded-sm  windowsize h-12 mb-10 bg-bgdark">
                <h2 class="font-tesla text-2xl text-white m-auto">CARRINHO</h2>

            </div>



        </div>

        <div class="windowsize-noflex mt-10 pb-10 pt-5 text-center bg-bglight">
            <?php
            $total = 0;
            $index = 0;
            ?>

            @foreach($produtos as $produto)

            <?php
            $total = $total + $produto->preco;
            ?>
            <div class="p-2 rounded-md shadow-md mb-5 ml-auto mr-auto w-[700px] border flex">
                <img class="w-full ml-5 h-20 w-20 object-contain rounded-sm" src="{{ asset('images/' . $produto->img_path) }}">
                <p class="ml-2 font-semibold mt-auto mb-auto w-52 text-sm">{{$produto->nome}}</p>
                <h3 class="ml-2 mt-auto mb-auto text-light text-2xl font-bold font-kanit"> R$ {{$produto->preco}}</h3>
                <h1 class="mt-auto ml-auto mr-10 mb-auto text-red-400 font-semibold underline text-sm hover:cursor-pointer" onclick="delete_carrinho('{{$index}}')"> Remover</h1>
            </div>
            <?php
            $index = $index + 1;
            ?>
            @endforeach

            <div class="p-2 pb-6 pt-6 rounded-md shadow-md mb-5 ml-auto mr-auto w-[700px] border flex">
                <h1 class="mt-auto mb-auto text-2xl font-bold ml-auto mr-auto text-black"> Total: <b class="text-green-700">R$ {{$total}}</b> </h1>
            </div>
        </div>
        @include("templates.footer")

        <script>
            function delete_carrinho(id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var ajxReq = $.ajax('/carrinho/' + id, {
                    type: 'DELETE'
                });

                ajxReq.done(function(data) {

                    Swal.fire(
                        'Produto deletado com sucesso!',
                        '',
                        'success'
                    )

                    setTimeout(() => {
                        document.location.reload();
                    }, 1000);
                });
            }
        </script>
    </div>
</div>