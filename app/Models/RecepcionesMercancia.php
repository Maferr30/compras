<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RecepcionesMercancia
 * 
 * @property int $idRecepcion_mercancia
 * @property Carbon $fecha_recepcion
 * @property string $status
 * @property int $cantidad_recibida
 * @property int $Empleados_idEmpleados
 * @property int $Ordenes_compras_idOrden_compra
 *
 * @package App\Models
 */
class RecepcionesMercancia extends Model
{
	protected $table = 'recepciones_mercancias';
	protected $primaryKey = 'idRecepcion_mercancia';
	public $timestamps = false;

	protected $casts = [
		'fecha_recepcion' => 'datetime',
		'cantidad_recibida' => 'int',
		'Empleados_idEmpleados' => 'int',
		'Ordenes_compras_idOrden_compra' => 'int'
	];

	protected $fillable = [
		'fecha_recepcion',
		'status',
		'cantidad_recibida',
		'Empleados_idEmpleados',
		'Ordenes_compras_idOrden_compra'
	];
}
