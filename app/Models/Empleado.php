<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 * 
 * @property int $idEmpleados
 * @property string $nombre_empleado
 * @property string $apellido_empleado
 * @property string $cedula
 *
 * @package App\Models
 */
class Empleado extends Model
{
	protected $table = 'empleados';
	protected $primaryKey = 'idEmpleados';
	public $timestamps = false;

	protected $fillable = [
		'nombre_empleado',
		'apellido_empleado',
		'cedula'
	];
}
