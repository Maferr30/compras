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
 * @property string $fecha_nacimiento
 * @property string $telefono_empleado
 * @property string $direccion_empleado
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
		'cedula',
        'fecha_nacimiento',
		'telefono_empleado',
		'direccion_empleado'
	];
}
