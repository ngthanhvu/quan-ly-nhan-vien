<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'status',
        'avatar',
        'email_verification_token',
        'email_verified_at',
        'last_login_at',
        'token_invalid_before',
        'otp_code',
        'otp_expires_at',
        'otp_attempts',
        'refresh_token',
        'refresh_token_expires_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp_code',
        'refresh_token',
    ];

    protected $casts = [
        'last_login_at'             => 'datetime',
        'token_invalid_before'      => 'datetime',
        'otp_expires_at'            => 'datetime',
        'refresh_token_expires_at'  => 'datetime',
        'otp_attempts'              => 'integer',
        'email_verified_at'         => 'datetime'
    ];

    /** 
     * BẮT BUỘC CHO JWT 
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Hash password tự động
     */
    public function setPasswordAttribute($value)
    {
        if ($value && strlen($value) < 60) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}
