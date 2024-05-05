<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 *
 * @property $id
 * @property $nit
 * @property $nombre
 * @property $correo
 * @property $telefono
 *
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedore extends Model
{
    public $timestamps = false;

    static $rules = [
		'nit' => 'required',
		'nombre' => 'required',
    ];

    protected $perPage = 100;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nit','nombre','correo','telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'id_proveedor', 'id');
    }


}
