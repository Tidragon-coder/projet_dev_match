<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Swipe extends Model
{
    protected $fillable = [
        'swiper_user_id',
        'swiped_user_id',
        'direction',
    ];

    public function swiper()
    {
        return $this->belongsTo(User::class, 'swiper_user_id');
    }

    public function swiped()
    {
        return $this->belongsTo(User::class, 'swiped_user_id');
    }
}

