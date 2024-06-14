<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CarritoCompra;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class OfertasList extends Component
{
    public $ofertaCont;

    public function render()
    {
        // $user = Auth::user();

        // if (Auth::check() && $user->hasRole('Vendedor')) {
        //     $this->ofertaCont = Producto::where('vendedor_id', $user->id)->get();
        // } else {
        //     $this->ofertaCont = Producto::all();
        // }
        // return view('livewire.ofertas-list');
        
        $this->ofertaCont = Producto::where('oferta', true)->get();
        
        return view('livewire.ofertas-list');
    }

    public function agregarCarro($id)
    {
        if (auth()->user()) {
            // $precioDescuento = $oferta->precio - ($oferta->precio * ($oferta->descuento / 100));

            $data = [
                'user_id' => auth()->user()->id,
                'oferta_id' => $id,
            ];
            
            CarritoCompra::updateOrCreate($data);

            $this->emit('updateCartCount');

            session()->flash('success', 'Oferta agregada al carrito exitosamente.');
        }
    }
}
