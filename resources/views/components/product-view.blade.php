<div class="produto">
    <div id="{{$id}}">

        <img class="w-full h-40 object-contain" src="{{ asset('images/' . $path) }}">
        <h2 class="w-full h-[4.5rem] font-semibold overflow-hidden text-slate-700">
            {{$nome}}

        </h2>
        @if ($preco_antes != $preco)
        <h3 class="text-slate-400 text-sm font-thin line-through font-kanit mt-4">R$ {{$preco_antes}}</h3>
        @else
        <br>
        @endif
        <h3 class="text-light text-3xl font-bold font-kanit"> R$ {{$preco}}</h3>
        <h3 class="text-slate-400 text-2sm font-kanit"> A vistá no pix!</h3>
    </div>
    @if(Auth::check())
    <div class="flex">

        <div onclick="href('/produtos/{{$id}}/edit')" class="w-10 mr-2 bg-amber-500 text-slate-800 rounded-md shadow-md hover:cursor-pointer hover:bg-amber-600 transition ease-in-out delay-75  text-md font-bold pl-3 pr-3 p-2">
            <i class="bi bi-gear-fill"></i>
        </div>

        <div onclick="delete_produto('{{$id}}')" class="w-10 bg-red-500 text-slate-800 rounded-md shadow-md hover:cursor-pointer hover:bg-red-600 transition ease-in-out delay-75  text-md font-bold pl-3 pr-3 p-2">
            <i class="bi bi-trash-fill"></i>
        </div>
    </div>
    @endif
</div>

<script>
    $("#{{$id}}").click(function() {
        location.href = "/produtos/{{$id}}"
    })

    function href(url) {
        location.href = url;
    }

    function delete_produto(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var ajxReq = $.ajax('/produtos/' + id, {
            type: 'DELETE'
        });

        ajxReq.done(function(data) {

            Swal.fire(
                'Produto deletada com sucesso!',
                'Voltando...',
                'success'
            )

            setTimeout(() => {
                document.location.reload();
            }, 1000);
        });
    }
</script>