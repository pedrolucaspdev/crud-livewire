<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Products;
use WireUi\Traits\Actions;


class Cadastro extends Component
{   

    use Actions;

    public $products, $name, $description, $price;

     protected $rules = [
        'name' => 'required|min:5|max:80|unique:products',
        'description' => 'required|min:10|max:500',
        'price' => 'required|numeric|max:100000|min:1'
    ];

    protected $messages = [
        'name.required' => 'Produto não informado',
        'name.name' => 'Produto inválido, tente novamente',
        'name.min' => 'Precisa ter pelo menos 5 letras',
        'name.max' => 'Precisa ter no máximo 80 letras',
        'name.unique' => 'Produto já cadastrado, tente outro nome',


        'description.required' => 'Descrição não pode estar vazia',
        'description.description' => 'Descrição inválida, tente novamente',
        'description.min' => 'Precisa ter pelo menos 10 letras',
        'description.max' => 'Atingiu o limite de 500 letras, tente com um texto menor..',

        'price.required' => 'Valor não informado',
        'price.price' => 'Preço inválido, tente novamente',
        'price.min' => 'Precisa ter pelo menos um valor',
        'price.max' => 'Atingiu o valor máximo, tente um valor menor..',
    ];

    public function home () {
        return redirect()->to('/');
    }

    public function cadastrarProduto () {
        $this->validate();

        Products::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price
        ]);

        return redirect()->to('/')->with('cadastrado', 'Produto cadastrado com sucesso!');

    }
    public function render()
    {
        return view('livewire.cadastro');
    }
}
