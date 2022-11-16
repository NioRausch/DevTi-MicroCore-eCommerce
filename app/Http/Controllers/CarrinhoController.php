<?php

namespace App\Http\Controllers;

use App\Models\Produtos;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids_carrinho = session('ids_carrinho');

        if ($ids_carrinho == null)
            $ids_carrinho = [];

        $produtos = Produtos::whereIn('id', $ids_carrinho)->get();


        return view('carrinho', ["produtos" => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ids_carrinho = session('ids_carrinho');

        if ($ids_carrinho == null)
            $ids_carrinho = [];

        array_push($ids_carrinho, $request->id);

        session(['ids_carrinho' => $ids_carrinho]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $ids_carrinho = session('ids_carrinho');

        if ($ids_carrinho == null)
            $ids_carrinho = [];

        unset($ids_carrinho[(int)$id]);

        session(['ids_carrinho' => $ids_carrinho]);
        return (int)$id;
    }
}
