<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cotizacion
 *
 * @property $id
 * @property $total
 * @property $productos
 * @property $fecha
 * @property $id_cliente
 * @property $id_usuario
 * @property $iva
 * @property $descuento
 * @property $saldo_pendiente
 * @property $tipo_pago
 *
 * @property Cliente $cliente
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cotizacion extends Model
{
    public $timestamps = false;

    public $table = 'cotizaciones';

    static $rules = [
        'codigo' => 'required',
		'total' => 'required',
		'id_cliente' => 'required',
		'id_usuario' => 'required',
    ];

    protected $perPage = 100;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo',
        'total',
        'productos',
        'fecha',
        'id_cliente',
        'id_usuario',
        'iva',
        'descuento',
        'saldo_pendiente',
        'tipo_pago'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario');
    }

}
