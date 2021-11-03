<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Permisos de administrador
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }

    /**
     * Permisos de staff
     *
     * @return boolean
     */
    public function isStaff()
    {
        return $this->is_staff;
    }

    /**
     * Recibirá un array con los permisos que necesita una acción
     *
     * @param array $roles
     * @return void
     */
    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 404);
        return true;
    }

    /**
     * Recibe un string o array con una serie de permisos y comprueba si el usuario los tiene
     *
     * @param array $roles
     * @return boolean
     */
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->$role) {
                    return true;
                }
            }
        } else {
            if ($this->$roles) {
                return true;
            }
        }
        return false;
    }

}
