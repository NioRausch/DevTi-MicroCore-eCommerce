<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\Produtos;

use Illuminate\Database\Eloquent\Model;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::all();
        $categorias_nomes = $categorias->pluck("nome");

        $produtos = Produtos::all()->pluck("id");

        return view("categorias.index", ["categorias" => $categorias_nomes, "produtos_ids" => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("categorias.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categorias;

        $categoria->nome = $request->name;

        $categoria->save();
        return ("test");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorias = Categorias::all();
        $categorias_nomes = $categorias->pluck("nome");

        $categoria_id = Categorias::where("nome", $id)->get("id")->first()["id"];

        $produtos = Produtos::all()->where("categoria_id", $categoria_id)->pluck("id");

        return view("categorias", ["categorias" => $categorias_nomes, "produtos_ids" => $produtos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria_nome = Categorias::where("id", $id)->get("nome")->first()["nome"];



        return view("categorias.edit", ['categoria_nome' => $categoria_nome, 'id' => $id]);
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
        Categorias::where('id', $id)
            ->update(['nome' => $request->name]);

        return "done";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Categorias::find($id);

        $flight->delete();
        return "Done delete";
    }
}
