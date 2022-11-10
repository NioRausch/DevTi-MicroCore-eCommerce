<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;


class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("categorias");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produtos::where('id', $id)->first();
        if ($produto != null){
            $preco_avista = $produto->preco;
            $preco_credito = $produto->preco;

            if ($produto->desconto != 0.00){
                $preco_avista = $preco_avista - ($preco_avista * (($produto->desconto + 15) / 100.0));
                $preco_credito = $preco_credito - ($preco_credito * (($produto->desconto) / 100.0));
            }

            return view("produtos.show", ["nome"=>$produto->nome, "preco_avista"=>$preco_avista, "preco_antes"=>$produto->preco,
             "preco_credito"=>$preco_credito, "path"=>$produto->img_path, "id"=>$id]);
        }

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
        //
    }
}