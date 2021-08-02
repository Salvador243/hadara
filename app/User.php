<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'password', 'provider', 'provider_id',
        'enableSignature', 'signature',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public static function table(string $string)
    {
    }
    
    /**
     * Model's relationships
     */
    public function pictures(){
        return $this->hasMany(Picture::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    /**
     * Role's functions
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 404);
        return true;
    }

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
