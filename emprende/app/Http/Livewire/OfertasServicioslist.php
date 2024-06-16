<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servicio;
use App\Models\CarritoCompra;
use Illuminate\Support\Facades\Auth;

class OfertasServicioslist extends Component
{
    public $ofertaCont;

    public function render()
    {
        $this -> ofertaCont = Servicio::where('oferta', true)->get();
        
        return view('livewire.ofertas-servicioslist');
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

            session()->flash('success', 'Oferta agregada al carrito exitosamente.');
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
