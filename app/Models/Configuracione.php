<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Configuracione
 *
 * @property $id
 * @property $icono
 * @property $img_auth
 * @property $logo_auth
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Configuracione extends Model
{
    public $timestamps = false;

    protected $perPage = 100;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['icono','img_auth','logo_auth'];



}
