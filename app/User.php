<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','phone','status','tipo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function admin(){
        return $this->tipo === 'admin';  // el triple igual (===), es como si hiciermaos un if, devuelve un true si es admin, o un false si no lo es
    }

    public function guest(){
        return $this->tipo === 'guest';  // el triple igual (===), es como si hiciermaos un if, devuelve un true si es admin, o un false si no lo es
    }

    public function avatar(){
            return $this->hasOne('App\Avatar');
    }

    public function mensajes(){
        return $this->hasMany('App\Mensaje');
    }

}
