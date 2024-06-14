<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CreateProduct extends Component
{
    public $productoCont;
    

    public function option($id){
        // const seleccionSiNo = document.getElementById('seleccionSiNo');
        // const camposInformacion = document.getElementById('camposInformacion');

        // seleccionSiNo.addEventListener('change', () => {
        // if (seleccionSiNo.value === 'si') {
        //     camposInformacion.style.display = 'block';
        // } else {
        //     camposInformacion.style.display = 'none';
        // }
        // });
    }
}
