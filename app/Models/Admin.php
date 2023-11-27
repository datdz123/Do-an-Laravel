<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
// use Spatie\Permission\Models\Role;

class Admin extends Authenticatable
{
    use  HasFactory, Notifiable;
    use  HasRoles;

    protected $table = 'admin';

    protected $guarded = 'admin';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'email_verified_at',
        'password',
        'avatar',

    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function model_has_roles()
    // {
    //     return $this->hasMany(Role::class, 'id', 'id');
    // }
}
