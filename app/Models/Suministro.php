<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Suministro
 * 
 * @property int $idSuministro
 * @property string $nombre_suministro
 * @property float $precio_unitario
 * @property int $categorias_idcategorias
 *
 * @package App\Models
 */
class Suministro extends Model
{
	protected $table = 'suministros';
	protected $primaryKey = 'idSuministro';
	public $timestamps = false;

	protected $casts = [
		'precio_unitario' => 'float',
		'categorias_idcategorias' => 'int'
	];

	protected $fillable = [
		'nombre_suministro',
		'precio_unitario',
		'categorias_idcategorias'
	];
}
