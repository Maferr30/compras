<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrdenesCompra
 * 
 * @property int $idOrden_compra
 * @property Carbon $fecha_emision
 * @property Carbon $fecha_entraga
 * @property float $total_pagar
 * @property int $cantidad_pedida
 * @property float $precio_unitario
 * @property int $Empleados_idEmpleados
 * @property int $Proveedores_idProveedores
 * @property int $Suministros_idSuministro
 *
 * @package App\Models
 */
class OrdenesCompra extends Model
{
	protected $table = 'ordenes_compras';
	protected $primaryKey = 'idOrden_compra';
	public $timestamps = false;

	protected $casts = [
		'fecha_emision' => 'datetime',
		'fecha_entraga' => 'datetime',
		'total_pagar' => 'float',
		'cantidad_pedida' => 'int',
		'precio_unitario' => 'float',
		'Empleados_idEmpleados' => 'int',
		'Proveedores_idProveedores' => 'int',
		'Suministros_idSuministro' => 'int'
	];

	protected $fillable = [
		'fecha_emision',
		'fecha_entraga',
		'total_pagar',
		'cantidad_pedida',
		'precio_unitario',
		'Empleados_idEmpleados',
		'Proveedores_idProveedores',
		'Suministros_idSuministro'
	];
	public function proveedore()
    {
        return $this->belongsTo(Proveedore::class, 'Proveedores_idProveedores');
    }
	public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'Empleados_idEmpleados');
    }
	public function suministro()
    {
        return $this->belongsTo(Suministro::class, 'Suministros_idSuministro');
    }
	public function esCancelable()
    {
        if (!$this->enviado_at) {
        }
        return $this->belongsTo(OrdenesCompra::class, 'idOrden_compra');
    }
}
