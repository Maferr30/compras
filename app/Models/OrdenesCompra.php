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
 * @property string $status
 * @property float $subtotal_pagar
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
		'subtotal_pagar' => 'float',
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
		'status',
		'subtotal_pagar',
		'total_pagar',
		'cantidad_pedida',
		'precio_unitario',
		'Empleados_idEmpleados',
		'Proveedores_idProveedores',
		'Suministros_idSuministro'
	];
}
