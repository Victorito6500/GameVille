<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img_path'
    ];

    protected $attributes = [
        'img_path' => null
    ];

    public function products()
    {
        return $this->hasMany('App\Model\Product');
    }
}
