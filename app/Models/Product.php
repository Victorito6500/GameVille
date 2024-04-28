<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'release_date',
        'developers',
        'category_id',
        'genre_id',
        'platform_id',
        'image_path',
        'price',
        'stock'
    ];

    protected $attributes = [
        'release_date' => null,
        'genre_id' => null,
        'platform_id' => null,
        'image_path' => null
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function platform()
    {
        return $this->belongsTo('App\Models\Platform');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\Model\OrderDetail');
    }
}
