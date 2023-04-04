<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Products;
use WireUi\Traits\Actions;

class Produto extends Component
{

    use Actions;

    public $products = '', $name, $description, $price, $editCardModal, $viewCardModal, $productId;

    protected $rules = [
        'name' => 'required|min:5|max:80|unique:products',
        'description' => 'required|min:10|max:500',
        'price' => 'required|numeric|max:100000|min:1'
    ];

    public function viewModal ($id) {
        $update = Products::where('id', $id)->first();
        $this->productId = $id;
        $this->name= $update->name;
        $this->price= $update->price;
        $this->description= $update->description;

        $this->dispatchBrowserEvent('viewProductId');
    }

    public function editModal ($id) {
        $update = Products::where('id', $id)->first();
        $this->productId = $id;
        $this->name= $update->name;
        $this->price= $update->price;
        $this->description= $update->description;

        $this->dispatchBrowserEvent('editProductId');
    }

    public function editarProduto ($id) {
        $update = Products::where('id', $id)->first();

        $update->name = $this->name;
        $update->price = $this->price;
        $update->description = $this->description;
        $update->save();

        return redirect()->to('/')->with('editado', 'Produto editado com sucesso!');

    }

    public function delete ($id) {
        Products::destroy($id);
        $this->notification([
            'title'       => 'PRODUTO',
            'description' => 'Removido com sucesso!',
            'icon'        => 'info',
            'timeout' => 3000
        ]);
    }

    public function render()
    {
        $this->products = Products::all('id', 'name', 'description', 'price');
        return view('livewire.produto');
    }
}
