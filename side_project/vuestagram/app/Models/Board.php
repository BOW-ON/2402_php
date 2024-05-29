<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'content',
        'img',
        'like',
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

    public function users() {
        // Users와 Boards 테이블 관계 설정
        // hasMany : 1대 다 관계에서 1
        // belongsTo : 1대 다 관계에서 다
        return $this->belongsTo(User::class);
    }
}

