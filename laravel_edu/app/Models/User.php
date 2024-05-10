<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // 해당 모델에 소프트딜리트를 적용시키고 싶으면 softDeletes 트레이드 추가
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    // 모델과 이어질 테이블 명을 정의하는 프로퍼티 (default : 모델명s)
    // protected $table = 'users';

    // PK를 지정하는 프로퍼티 (default : id)
    // protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // *1.화이트리스트 or 2.블랙리스트 하나만 설정하면됨

    // 1. upsert시 변경을 허용할 컬럼을 설정하는 프로퍼티 (화이트 리스트)
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
    ];
    // 2. upsert시 변경을 비허용할 컬럼을 설정하는 프로퍼티 (블랙 리스트)
    // protected $guarded = [
    //     'id',
    // ];

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
    ];
}
