<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\dashboard\EmployeRole;
use App\Models\dashboard\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verification_code',
        'expires_at',
        'phone',
        'resturant_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function Role()
    {
        return $this->belongsTo(EmployeRole::class, 'role_id');
    }

    public function hasAccess($store_config_permission)
    {
        $role = $this->Role;
        // dd($role);
        if (!$role) {
            return false;
        }
        $permissions = json_decode($role->permission);
        foreach ($permissions as $permission) {
            if ($permission == $store_config_permission ?? false) {
                return true;
            }
        }

    }

    ######### get Store

    public function Store(){
        return $this->hasOne(Store::class,'user_id');
    }
}
