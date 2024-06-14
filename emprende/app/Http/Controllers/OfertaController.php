<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use Illuminate\Support\Facades\Auth;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('ofertas.index');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ofertas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newOferta = new Oferta();
        $imagen = $request->file('imagen');
        $nombreimg = time().'.'.$imagen -> getClientOriginalExtension();
        $destino = public_path('imagenes/ofertas');
        $request -> imagen -> move($destino,$nombreimg);

        $newOferta -> imagen = $nombreimg;
        $newOferta -> nombre = $request->get('nombre');
        $newOferta -> descripcion = $request->get('descripcion');
        $newOferta -> precio = $request->get('precio');
        $newOferta -> descuento = $request->get('descuento');
        $newOferta -> stock = $request->get('stock');
        $newOferta -> precioDescuento = $request->get('precioDescuento');
        $newOferta -> vendedor_id = Auth::id();

        $newOferta -> save();

        return redirect('/ofertas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ofertaEditar = Oferta::findOrFail($id);
        return view('ofertas.edit', [
            'ofertaEditar' => $ofertaEditar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editarOferta = Oferta::findOrFail($id);

        $editarOferta -> nombre = $request -> get('nombreEdit');
        $editarOferta -> descripcion = $request -> get('descripEdit');
        $editarOferta -> precio = $request -> get('precioEdit');
        $editarOferta -> descuento = $request -> get('descuentoEdit');
        $editarOferta -> stock = $request -> get('stockEdit');
        $editarOferta -> precioDescuento = $request -> get('precioDescuentoEdit');
        
        $editarOferta -> save();
        return redirect('/ofertas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminarOferta = Oferta::findOrFail($id);
        $eliminarOferta -> delete();
        return redirect('/ofertas');
    }

    public function eliminar($id)
    {
        $eliminarOferta = Oferta::findOrFail($id);

        return view('ofertas.delete', [
            'ofertaEliminar' => $eliminarOferta
        ]);

    }
}
