<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\CarritoCompra;

class Productlist extends Component
{
    public $productoCont;

    public function render()
    {
        $this->productoCont = Producto::get();

        return view('livewire.productlist');
    }

    public function agregarCarro($id){
        if(auth()->user()){
            $data = [
                'user_id' => auth()->user()->id,
                'producto_id' => $id,
            ];
            CarritoCompra::updateOrCreate($data);
            
            $this->emit('updateCartCount');

            session()->flash('success','Producto agregado al carrito exitosamente.');
        }
    }
}
