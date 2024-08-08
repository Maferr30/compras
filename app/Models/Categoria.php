<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 * 
 * @property int $idcategorias
 * @property string $nombre_categoria
 *
 * @package App\Models
 */
class Categoria extends Model
{
	protected $table = 'categorias';
	protected $primaryKey = 'idcategorias';
	public $timestamps = false;

	protected $fillable = [
		'nombre_categoria'
	];
}
