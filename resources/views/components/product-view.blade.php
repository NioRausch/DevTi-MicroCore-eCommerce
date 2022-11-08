<div class="produto">
    <img class="w-full h-40 object-contain" src="{{ asset('imgs/' . $path) }}">
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