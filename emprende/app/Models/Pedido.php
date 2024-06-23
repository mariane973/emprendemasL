<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    use HasFactory;
    protected $fillable = [
        'nombre_cliente', 'email_cliente', 'direccion', 'telefono',
        'producto_id', 'cantidad', 'precio_unitario', 'total',
    ];

    public function vendedor()
    {
        return $this->belongsTo(Vendedore::class, 'id_vendedor');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_cliente');
    }
    
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
