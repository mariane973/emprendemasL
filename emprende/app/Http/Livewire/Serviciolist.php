<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servicio;
use App\Models\CarritoCompra;
use Illuminate\Support\Facades\Auth;

class Serviciolist extends Component
{
    public $servicioCont;

    public function render()
    {
        $user = Auth::user();
        
        if (Auth::check() && $user->hasRole('Vendedor')) {
            $vendedorIds = $user->vendedores->map(
                function($vendedor) {
                    return $vendedor->id;
               });
            $this->servicioCont = Servicio::whereIn('vendedor_id', $vendedorIds)->get();
        } else {
            $this->servicioCont = Servicio::all();
        }

        return view('livewire.serviciolist');
    }

    public function agregarCarro($id)
    {
        if (auth()->user()) {
            $data = [
                'user_id' => auth()->user()->id,
                'servicio_id' => $id,
            ];
            
            CarritoCompra::updateOrCreate($data);

            $this->emit('updateCartCount');

            session()->flash('success', 'Servicio agregado al carrito exitosamente.');
        }
    }

    public $id_eliminacion;

    protected $listeners = ['confirmacionEliminacion'=>'eliminarServicio'];

    public function eliminacion($id) {
        $this->id_eliminacion = $id;
        $this->dispatchBrowserEvent('eliminacion-servicio');
    }

    public function eliminarServicio() {
        $servicio = Servicio::where('id', $this->id_eliminacion)->first();
        $servicio->delete();

        $this->dispatchBrowserEvent('servicioEliminado');
    }
}
