<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'user_address',
        'user_phone',
        'status',
        'total_price'
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\Model\OrderDetail');
    }
}
