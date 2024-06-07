<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedore;
use Illuminate\Support\Facades\Auth;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (Auth::check() && $user->hasRole('Vendedor')) {
            $vendedorCont = Vendedore::where('user_id', $user->id)->get();
        } else {
            $vendedorCont = Vendedore::all();
        }

        return view('vendedores.index', compact('vendedorCont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newVendedor = new Vendedore();
        $logo = $request->file('logo');
        $nombreimg = time().'.'.$logo -> getClientOriginalExtension();
        $destino = public_path('imagenes/emprendimientos');
        $request -> logo -> move($destino,$nombreimg);

        $newVendedor -> logo = $nombreimg;
        $newVendedor -> nom_emprendimiento = $request->get('nom_emprendimiento');
        $newVendedor -> descrip_emprendimiento = $request->get('descrip_emprendimiento');
        $newVendedor -> telefono = $request->get('telefono');
        $newVendedor -> direccion = $request->get('direccion');
        $newVendedor -> ciudad = $request->get('ciudad');
        $newVendedor -> user_id = Auth::id();

        $newVendedor -> save();

        return redirect('/emprendimientos');
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
        $vendedorEditar = Vendedore::findOrFail($id);
        return view('servicios.edit', [
            'serviciosEditar' => $vendedorEditar
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
