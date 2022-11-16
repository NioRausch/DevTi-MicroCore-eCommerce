<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Categorias;



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

        $categorias = Categorias::all();
        //$categorias_nomes = $categorias->pluck("nome");

        return view("produtos.create", ["categorias" => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();

        // Public Folder
        $request->image->move(public_path('images'), $imageName);

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store IMage in DB 

        $produto = new Produtos;

        $produto->nome = $request->nome;
        $produto->preco = $request->price;
        $produto->descricao = $request->desc;
        $produto->img_path = $imageName;

        if ($request->oferta == "on")
            $produto->oferta = 1;
        else
            $produto->oferta = 0;

        $produto->desconto = $request->desconto;
        $produto->categoria_id = $request->categoria_id;

        $produto->save();

        $categorias = Categorias::all();
        $categorias_nomes = $categorias->pluck("nome");

        $produtos = Produtos::all()->pluck("id");

        return view("categorias.index", ["categorias" => $categorias_nomes, "produtos_ids" => $produtos]);
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
        if ($produto != null) {
            $preco_avista = $produto->preco;
            $preco_credito = $produto->preco;

            if ($produto->desconto != 0.00) {
                $preco_avista = $preco_avista - ($preco_avista * (($produto->desconto + 15) / 100.0));
                $preco_credito = $preco_credito - ($preco_credito * (($produto->desconto) / 100.0));
            }

            return view("produtos.show", [
                "nome" => $produto->nome, "preco_avista" => $preco_avista, "preco_antes" => $produto->preco,
                "preco_credito" => $preco_credito, "path" => $produto->img_path, "id" => $id
            ]);
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
        $categorias = Categorias::all();
        //$categorias_nomes = $categorias->pluck("nome");

        $produto = Produtos::find($id);


        return view("produtos.edit", ["categorias" => $categorias, "produto" => $produto]);
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
        $produto = Produtos::find($id);

        if ($request->image != null) {

            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ]);

            $imageName = time() . '.' . $request->image->extension();

            // Public Folder
            $request->image->move(public_path('images'), $imageName);
            $produto->img_path = $imageName;
        }

        if ($request->oferta == "on")
            $produto->oferta = 1;
        else
            $produto->oferta = 0;

        $produto->nome = $request->nome;
        $produto->preco = $request->price;
        $produto->descricao = $request->desc;
        $produto->desconto = $request->desconto;
        $produto->categoria_id = $request->categoria_id;

        $produto->save();

        $categorias = Categorias::all();
        $categorias_nomes = $categorias->pluck("nome");

        $produtos = Produtos::all()->pluck("id");
        return dd($request->oferta);
        return view("categorias.index", ["categorias" => $categorias_nomes, "produtos_ids" => $produtos]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produtos::find($id);

        $produto->delete();
        return "Done delete";
    }
}
