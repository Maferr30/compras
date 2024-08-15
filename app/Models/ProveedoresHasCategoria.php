<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProveedoresHasCategoria
 * 
 * @property int $idProveedores_has_Categorias
 * @property int $Proveedores_idProveedores
 * @property int $Categorias_idCategorias
 *
 * @package App\Models
 */
class ProveedoresHasCategoria extends Model
{
	protected $table = 'Proveedores_has_Categorias';
	protected $primaryKey = 'idProveedores_has_Categorias';
	public $timestamps = false;

	protected $casts = [
		'Proveedores_idProveedores' => 'int',
		'Categorias_idCategorias' => 'int'
	];

	protected $fillable = [
		'Proveedores_idProveedores',
		'categorias_idcategorias'
	];
	public function proveedore()
	{
		return $this->belongsTo(Proveedore::class, 'Proveedores_idProveedores');
	}

	public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'categorias_idcategorias');
	}
}
