<?php

namespace App\models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'product_id',
        'path'
    ];

    public function product()
    {
        return $this->belongsTo('App\models\Product');
    }
}
