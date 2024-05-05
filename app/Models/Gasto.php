<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gasto
 *
 * @property $id
 * @property $valor
 * @property $fecha
 * @property $observaciones
 * @property $id_tipo_gasto
 *
 * @property TipoGasto $tipoGasto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Gasto extends Model
{
    public $timestamps = false;

    static $rules = [
		'valor' => 'required',
		'observaciones' => 'required',
		'id_tipo_gasto' => 'required',
    ];

    protected $perPage = 100;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['valor','fecha','observaciones','id_tipo_gasto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoGasto()
    {
        return $this->hasOne('App\Models\TipoGasto', 'id', 'id_tipo_gasto');
    }


}
