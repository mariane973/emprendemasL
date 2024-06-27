<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servicio;
use App\Models\CarritoCompra;
use Illuminate\Support\Facades\Auth;

class OfertasServicioslist extends Component
{
    public $ofertaCont;
    public $search = '';

    public function render()
    {
        if(Auth::check() && Auth::user()->hasRole('Vendedor')) {
            $this->ofertaCont = Servicio::where('oferta', true)
                ->where('nombre', 'like', '%' . $this->search . '%')
                ->whereHas('vendedor', function ($query) {
                    $query->where('user_id', Auth::user()->id);
                })
                ->get();
        } else {
            $this->ofertaCont = Servicio::where('oferta', true)
                ->where('nombre', 'like', '%' . $this->search . '%')
                ->get();
        }

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