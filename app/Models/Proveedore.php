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
    public function categorias()   
    {
        return $this->belongsToMany(Categoria::class, 'proveedores_has_categorias', 'Proveedores_idProveedores', 'categorias_idcategorias');
    }
	public function suministros()
	{
		return $this->belongsToMany(Suministro::class, 'proveedores_has_suministro', 'Proveedores_idProveedores', 'Suministro_idSuministro')
					->withPivot('idProveedores_has_Suministro');
	}

}
