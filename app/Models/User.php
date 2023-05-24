<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PDO;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $primaryKey = 'account_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'gender_id',
        'role_id',
        'display_picture_link',
        'email',
        'password',
    ];

    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}
