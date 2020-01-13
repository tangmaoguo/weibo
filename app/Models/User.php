<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * @desc 可以被批量赋值的属性
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     * @desc 敏感信息在用户实例通过数组或者json显示时隐藏
     *
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

    public function gravatar($size = '80'){
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://s.gravatar.com/avatar/$hash?s=$size";
    }

    public static function boot(){
        parent::boot();
        static::creating(function($user){
            $user->activation_token = Str::random(10);
        });

    }
}






















