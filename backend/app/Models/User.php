<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password'
    ];

    protected $guarded = [];

    protected $hidden = [
        'password'
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function hasAccess($access) {
        return $this->role->permissions->pluck('name')->contains($access);
    }

}
