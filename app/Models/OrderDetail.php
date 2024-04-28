<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'product_id',
        'quantity',
        'price'
    ];

    public function order()
    {
        return $this->belongsTo('App\Model\Order');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }
}
