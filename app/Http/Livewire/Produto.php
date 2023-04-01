<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Products;
use WireUi\Traits\Actions;

class Produto extends Component
{

    use Actions;

    public $products = '', $name, $description, $price;

    protected $rules = [
        'name' => 'required|min:5|max:80|unique:products',
        'description' => 'required|min:10|max:500',
        'price' => 'required|numeric|max:100000|min:1'
    ];


    public function edit ($id) {
        return view('livewire.editar');
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
