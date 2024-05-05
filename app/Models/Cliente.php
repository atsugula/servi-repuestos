<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $cedula
 * @property $apellido
 * @property $telefono
 * @property $direccion
 * @property $total_compras
 * @property $ultima_compra
 * @property $fecha_creado
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    public $timestamps = false;

    static $rules = [
		'nombre' => 'required',
		'cedula' => 'required',
		'apellido' => 'required',
    ];

    protected $perPage = 100;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','cedula','apellido','telefono','direccion','total_compras','ultima_compra','fecha_creado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'id_cliente', 'id');
    }


}
