<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Products;

class Editar extends Component
{

    public $products, $name, $description, $price, $id_edit;

    protected $rules = [
       'name' => 'required|min:5|max:80',
       'description' => 'required|min:10|max:500',
       'price' => 'required|numeric|max:100000|min:1'
   ];

   protected $messages = [
       'name.required' => 'Produto não informado',
       'name.name' => 'Produto inválido, tente novamente',
       'name.min' => 'Precisa ter pelo menos 5 letras',
       'name.max' => 'Precisa ter no máximo 80 letras',


       'description.required' => 'Descrição não pode estar vazia',
       'description.description' => 'Descrição inválida, tente novamente',
       'description.min' => 'Precisa ter pelo menos 10 letras',
       'description.max' => 'Atingiu o limite de 500 letras, tente com um texto menor..',

       'price.required' => 'Valor não informado',
       'price.price' => 'Preço inválido, tente novamente',
       'price.min' => 'Precisa ter pelo menos um valor',
       'price.max' => 'Atingiu o valor máximo, tente um valor menor..',
   ];

   public function editarProduto () {
        $this->validate();
        
        $update = Products::where('id', $this->id_edit)->first();
        $update->name = $this->name;
        $update->name = $this->name;
        $update->description = $this->description;
        $update->price = $this->price;
        $update->save();

        return redirect()->to('/')->with('editado', 'Produto editado com sucesso!');

    }

   public function home () {
        return redirect()->to('/');
   }

   public function mount ($id) {
    $this->products = Products::where('id', $id)->first();

    $this->id_edit = $this->products->id;
    $this->name = $this->products->name;
    $this->description = $this->products->description;
    $this->price = $this->products->price;
   }
    public function render()
    {
        return view('livewire.editar');
    }
}
