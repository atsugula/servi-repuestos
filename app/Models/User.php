<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellido',
        'config',
        'cedula',
        'password',
        'tipo_usuario',
    ];

    protected $perPage = 100;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    static $rules = [
		'name' => 'required',
		'apellido' => 'required',
		'cedula' => 'required',
		'tipo_usuario' => 'required',
    ];

    public function adminlte_image()
    {
        $config = Configuracione::find(1);
        return asset($config->logo_auth ?? 'img/config/auth-logo.png');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'id_usuario', 'id');
    }
}
