<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Produtos;

class ProductView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $produto = Produtos::where('id', $this->id)->first();
        if ($produto != null) {
            $preco = $produto->preco;

            if ($produto->desconto != 0.00)
                $preco = $preco - ($preco * ($produto->desconto / 100.0));
            return view('components.product-view', ["nome" => $produto->nome, "preco" => $preco, "preco_antes" => $produto->preco, "path" => $produto->img_path, "id" => $this->id]);
        } else {
            return view('components.product-view', ["nome" => "PlaceHolder", "preco" => 800, "preco_antes" => 900, "path" => "amd", "id" => $this->id]);
        }
    }
}
