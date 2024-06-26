<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\CarritoCompra;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class Productlist extends Component
{
    

    public $productoCont;
    public $search = '';

    public $productos;
    public $categorias;
    public $categoriaSeleccionada = '';

    public function filtrarPorCategoria()
    {
        if (!empty($this->categoriaSeleccionada)) {
            $this->productoCont = Producto::where('categoria', $this->categoriaSeleccionada)
                ->where('nombre', 'like', '%' . $this->search . '%')
                ->get();
        } else {
            $this->productoCont = Producto::where('nombre', 'like', '%' . $this->search . '%')
                ->get();
        }

        $this->emit('productosActualizados', $this->productoCont);
    }
    
    public function render()
{
    $query = Producto::query();

    if (!empty($this->categoriaSeleccionada)) {
        $query->where('categoria', $this->categoriaSeleccionada);
    }

    if (!empty($this->search)) {
        $query->where('nombre', 'like', '%' . $this->search . '%');
    }

    $this->productoCont = $query->get();

    if (Auth::check() && Auth::user()->hasRole('Vendedor')) {
        $vendedorIds = Auth::user()->vendedores->pluck('id')->toArray();

        $this->productoCont = $this->productoCont->whereIn('vendedor_id', $vendedorIds);
    }

    
    $this->categorias = Categoria::all();

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

    public $id_eliminacion;

    protected $listeners = ['confirmacionEliminacion'=>'eliminarProducto'];

    public function eliminacion($id) {
        $this->id_eliminacion = $id;
        $this->dispatchBrowserEvent('eliminacion-producto');
    }

    public function eliminarProducto() {
        $producto = Producto::where('id', $this->id_eliminacion)->first();
        $producto->delete();

        $this->dispatchBrowserEvent('productoEliminado');
    }
}