<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Vendedore;
use App\Models\Producto;
use App\Models\User;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $userId = $user->id;

        if ($user->hasRole('Vendedor')){
            $pedidos = Pedido::where('id_vendedor', $userId)->get();
        }elseif($user->hasRole('Cliente')){
            $pedidos = Pedido::where('id_cliente', $userId)->get();
        }

        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
{
    $productoId = $request->input('producto_id');
    $cantidad = $request->input('cantidad'); 

    $producto = Producto::find($productoId);

    
    if (!$producto) {
        return redirect()->back()->with('error', 'El producto seleccionado no existe.');
    }

   
    $vendedor = $producto->vendedor;

    if (!$vendedor) {
        return redirect()->back()->with('error', 'El producto seleccionado no tiene un vendedor asociado.');
    }

    $precio = $producto->precio;

    return view('pedidos.create', [
        'productos' => Producto::all(), 
        'producto' => $producto,
        'cantidad' => $cantidad,
        'precio' => $precio,
        'id_vendedor' => $vendedor->id, 
    ]);
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string',
        'email' => 'required|email',
        'direccion' => 'required|string',
        'telefono' => 'required|string',
        'ciudad' => 'required|string',
        'cantidad' => 'required|integer|min:1',
        'valor' => 'required|numeric|min:0',
        'producto' => 'required|string',
        'id_vendedor' => 'required|integer',
    ]);

    
    $producto = Producto::where('nombre', $request->get('producto'))->first();

    if (!$producto) {
        return redirect()->back()->with('error', 'El producto seleccionado no existe.');
    }

    $vendedor = $producto->vendedor;

    if (!$vendedor) {
        return redirect()->back()->with('error', 'El producto seleccionado no tiene un vendedor asociado.');
    }

    $id_vendedor = $vendedor->user_id;
    $cliente = auth()->user(); 

    $pedido = new Pedido();
    $pedido->nombre_cl = $request->get('nombre');
    $pedido->email_cl = $request->get('email');
    $pedido->direccion = $request->get('direccion');
    $pedido->ciudad = $request->get('ciudad');
    $pedido->telefono = $request->get('telefono');
    $pedido->nombre_producto = $producto->nombre;
    $pedido->cantidad = $request->get('cantidad');
    $pedido->precio = $request->get('precio');
    $pedido->total = $request->get('valor');

   
   $pedido->id_vendedor = $id_vendedor; 
    $pedido->id_cliente = $cliente->id;  

    $pedido->save();

    //$this->eliminarItemDelCarrito($producto->id, $cliente->id);

    return redirect()->route('productos.index')->with('success', 'Pedido realizado con éxito');
}

private function eliminarItemDelCarrito($productoId, $clienteId)
{
    $carritoItem = CarritoItem::where('producto_id', $productoId)
                              ->where('cliente_id', $clienteId)
                              ->first();

    if ($carritoItem) {
        $carritoItem->delete();
    }
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
        //
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
