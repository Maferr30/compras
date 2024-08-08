<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Devolucione
 * 
 * @property int $idDevoluciones
 * @property Carbon $fecha_devolucion
 * @property string $status
 * @property int $cantidad_devuelta
 * @property string $motivo
 * @property int $Emplados_idEmplados
 * @property int $Recepciones_mercancias_idRecepcion_mercancia
 * @property int $Suministros_idSuministro
 *
 * @package App\Models
 */
class Devolucione extends Model
{
	protected $table = 'devoluciones';
	protected $primaryKey = 'idDevoluciones';
	public $timestamps = false;

	protected $casts = [
		'fecha_devolucion' => 'datetime',
		'cantidad_devuelta' => 'int',
		'Emplados_idEmplados' => 'int',
		'Recepciones_mercancias_idRecepcion_mercancia' => 'int',
		'Suministros_idSuministro' => 'int'
	];

	protected $fillable = [
		'fecha_devolucion',
		'status',
		'cantidad_devuelta',
		'motivo',
		'Emplados_idEmplados',
		'Recepciones_mercancias_idRecepcion_mercancia',
		'Suministros_idSuministro'
	];
}
