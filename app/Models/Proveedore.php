<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 * 
 * @property int $idProveedores
 * @property string $nombre_empresa
 * @property string $telefono_proveedor
 * @property string $direccion_empresa
 * @property string $correo_proveedor
 * @property string $rif
 * @property int $categorias_idcategorias
 *
 * @package App\Models
 */
class Proveedore extends Model
{
	protected $table = 'proveedores';
	protected $primaryKey = 'idProveedores';
	public $timestamps = false;

	protected $fillable = [
		'nombre_empresa',
		'telefono_proveedor',
		'direccion_empresa',
		'correo_proveedor',
		'rif'
	];
	public function ordenes_compras()
	{
		return $this->hasMany(OrdenesCompra::class, 'Proveedores_idProveedores');
	}
	public function categorias()
	{
		return $this->belongsToMany(Categoria::class, 'proveedores_has_categorias', 'Proveedores_idProveedores', 'categorias_idcategorias')
					->withPivot('idProveedores_has_categorias');
	}
}
