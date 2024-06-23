<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Vendedore;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('productos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $vendedores = $user->vendedores;
        return view('productos.create', compact( 'vendedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newProduct = new Producto();
        $imagen = $request->file('imagen');
        $nombreimg = time().'.'.$imagen -> getClientOriginalExtension();
        $destino = public_path('imagenes/productos');
        $request -> imagen -> move($destino,$nombreimg);

        $newProduct -> imagen = $nombreimg;
        $newProduct -> nombre = $request->get('nombre');
        $newProduct -> descripcion = $request->get('descripcion');
        $newProduct -> precio = $request->get('precio');
        $newProduct -> stock = $request->get('stock');
        $newProduct -> categoria = $request->get('categoria');
        $newProduct -> oferta = $request -> opcOferta == 'si';
        if($request -> opcOferta == 'si') {
            $newProduct -> descuento = $request->get('descuento');
            $newProduct -> valor_final = $request->get('valor_final');
        } else {
            $newProduct -> descuento = null;
            $newProduct -> valor_final = $request->get('precio');
        }
        $newProduct -> vendedor_id = $request->get('vendedor_id');

        $newProduct -> save();

        return redirect('/productos');
    }

    public function ofertasIndex()
    {
        return view('ofertas.index');
    }

    public function inventarioVendedor()
    {
        $user = auth()->user();
        $userId = $user->id;

        $inventario = Producto::where('vendedor_id', $userId)->get();

        return view('inventario.index', compact('inventario'));
    }

    public function actualizarStock(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto -> stock = $request->get('stock');

        $producto -> save();

        return redirect('/inventario');
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
        $productoEditar = Producto::findOrFail($id);
        return view('productos.edit', [
            'productEditar' => $productoEditar
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
        $editarProducto = Producto::findOrFail($id);

        $editarProducto -> nombre = $request -> get('nombreEdit');
        $editarProducto -> descripcion = $request -> get('descripEdit');
        $editarProducto -> precio = $request -> get('precioEdit');
        $editarProducto -> stock = $request -> get('stockEdit');
        $editarProducto -> categoria = $request -> get('categoriaEdit');

        if ($request->opcOferta == 'si') {
            $editarProducto->oferta = true;
            $editarProducto->descuento = $request->get('descuento');
            $editarProducto->valor_final = $request->get('valor_final');
        } else {
            $editarProducto->oferta = false;
            $editarProducto->descuento = null;
            $editarProducto->valor_final = $request->get('precioEdit');
        }
        
        if ($request->hasFile('imagen')) {
            if ($editarProducto->imagen) {
                $rutaImagenActual = public_path('imagenes/productos/' . $editarProducto->imagen);
                if (file_exists($rutaImagenActual)) {
                    unlink($rutaImagenActual);
                }
            }
    
            $imagen = $request->file('imagen');
            $nombreimg = time() . '.' . $imagen->getClientOriginalExtension();
            $destino = public_path('imagenes/productos');
            $imagen->move($destino, $nombreimg);
    
            $editarProducto->imagen = $nombreimg;
        }

        $editarProducto -> save();

        return redirect('/productos');
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
