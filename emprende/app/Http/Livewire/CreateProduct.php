<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CreateProduct extends Component
{
    //public $productoCont;
    

    //public function option($id){
        // const seleccionSiNo = document.getElementById('seleccionSiNo');
        // const camposInformacion = document.getElementById('camposInformacion');

        // seleccionSiNo.addEventListener('change', () => {
        // if (seleccionSiNo.value === 'si') {
        //     camposInformacion.style.display = 'block';
        // } else {
        //     camposInformacion.style.display = 'none';
        // }
        // });
    //}

    public $opcOferta = 'no';
    public $descuento = 0;
    public $precio = 0;
    public $valor_final = 0;
    //public $oferta;

    public function updatedOpcOferta()
    {
        $this->descuento = 0;
        $this->calculateValorFinal();
    }

    // public function updatedOpcOferta()
    // {
    //     $this->oferta = $this->opcOferta == 'si';

    //     $this->calculateValorFinal();
    // }
    public function updatedDescuento()
    {
        $this->calculateValorFinal();
    }

    public function updatedPrecio($value)
    {
        $this->precio = $value;
        $this->calculateValorFinal();
    }

    public function calculateValorFinal()
    {
        if ($this->opcOferta == 'si' && $this->descuento > 0 && $this->precio > 0) {
            $this->valor_final = $this->precio - ($this->precio * ($this->descuento / 100));
        } else {
            $this->valor_final = $this->precio;
        }
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}