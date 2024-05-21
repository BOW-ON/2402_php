<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // 수정허용 컬럼
    protected $fillable = [
        'account',
        'name',
        'password',
        'gender',
        'profile',
        'refresh_token',
    ];

    // Json serialization 제외할 컬럼
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'refresh_token',
    ];

    /**
     * TimeZone format when serializating
     * 
     * @param \DateTimeInterface $date
     * 
     * @return String('Y-m-d H:i:s')
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    
    // Accessor : Column gender
    // 이름 작성 형식 : get + 컬럼명 + Attribute
    public function getGenderAttribute($value) {
        return $value === '0' ? '남자' : '여자';
    }

    public function boards() {
        // Users와 Boards 테이블 관계 설정
        // hasMany : 1대 다 관계에서 1
        // belongsTo : 1대 다 관계에서 다
        return $this->hasMany(Board::class);
    }
}
