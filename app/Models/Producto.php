<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre
 * @property $marca
 * @property $codigo
 * @property $precio_costo
 * @property $precio_venta
 * @property $observaciones
 * @property $id_categoria
 * @property $id_proveedor
 * @property $stock
 * @property $porcentaje
 *
 * @property Categoria $categoria
 * @property Proveedore $proveedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    public $timestamps = false;

    static $rules = [
		'nombre' => 'required',
		'marca' => 'required',
		'precio_costo' => 'required',
		'precio_venta' => 'required',
		'porcentaje' => 'required',
		'stock' => 'required',
    ];

    static $ruleService = [
		'codigo_propio' => 'required',
		'nombre' => 'required',
		'precio_costo' => 'required',
		'porcentaje' => 'required',
		'precio_venta' => 'required',
    ];

    protected $perPage = 30;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'ganancia',
        'nombre',
        'marca',
        'codigo_escaner',
        'codigo_propio',
        'precio_costo',
        'precio_venta',
        'observaciones',
        'id_categoria',
        'id_proveedor',
        'stock',
        'porcentaje',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'id_categoria');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'id_proveedor');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

}
