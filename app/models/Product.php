<?php

namespace App\models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'sku',
        'name',
        'slug',
        'price',
        'weight',
        'length',
        'width',
        'height',
        'short_description',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\models\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\models\Category', 'product_categories');
    }

    public function productImages()
    {
        return $this->hasMany('App\models\ProductImage');
    }

    public static function statuses()
    {
        return[
            0 => 'draft',
            1 => 'active',
            2 => 'inactive'
        ];
    }
}
