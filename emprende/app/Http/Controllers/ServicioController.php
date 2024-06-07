<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('servicios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newProduct = new Servicio();
        $imagen = $request->file('imagen');
        $nombreimg = time().'.'.$imagen -> getClientOriginalExtension();
        $destino = public_path('imagenes/servicios');
        $request -> imagen -> move($destino,$nombreimg);

        $newProduct -> imagen = $nombreimg;
        $newProduct -> nombre = $request->get('nombre');
        $newProduct -> descripcion = $request->get('descripcion');
        $newProduct -> precio = $request->get('precio');
        $newProduct -> categoria = $request->get('categoria');
        $newProduct -> vendedor_id = Auth::id();

        $newProduct -> save();

        return redirect('/servicios');
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
        $servicioEditar = Servicio::findOrFail($id);
        return view('servicios.edit', [
            'serviciosEditar' => $servicioEditar
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
        $editarServicio = Servicio::findOrFail($id);

        $editarServicio -> nombre = $request -> get('nombreEdit');
        $editarServicio -> descripcion = $request -> get('descripEdit');
        $editarServicio -> precio = $request -> get('precioEdit');
        $editarServicio -> categoria = $request -> get('categoriaEdit');
        
        $editarServicio -> save();
        return redirect('/servicios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminarServicio = Servicio::findOrFail($id);
        $eliminarServicio -> delete();
        return redirect('/servicios');
    }

    public function eliminar($id)
    {
        $eliminarServicio = Servicio::findOrFail($id);

        return view('servicios.delete', [
            'servicioEliminar' => $eliminarServicio
        ]);

    }
}
