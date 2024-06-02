<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CarritoCompra as Carrito;

class Carritocompra extends Component
{
    public $carritoitems, $sub_total = 0, $total = 0, $envio = 8000;

    public function render()
    {
        $this->carritoitems = Carrito::with('producto')
            ->where(['user_id'=>auth()->user()->id])
            ->get();
        $this->total = 0; $this->sub_total = 0; $this->envio = 8000;

        foreach($this->carritoitems as $item){
            $this->sub_total += $item->producto->precio * $item->cantidad;
        }
        $this->total = $this->sub_total + $this->envio;
        
        return view('livewire.carritocompra');
    }

    public function incrementCant($id){
        $cart = Carrito::whereId($id)->first();
        $cart->cantidad += 1;
        $cart->save();
    }

    public function decrementCant($id){
        $cart = Carrito::whereId($id)->first();
        if($cart->cantidad>1){
            $cart->cantidad -= 1;
            $cart->save();
        }
    }

    public function eliminarItem($id){
        $cart = Carrito::whereId($id)->first();
        if($cart){
            $cart->delete();
            $this->emit('updateCartCount');
        }
    }
}
