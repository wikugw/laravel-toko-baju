<?php

namespace App\models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    public function childs() {
        return $this->hasMany('App\models\Category', 'parent_id');
    }

    public function parent() {
        return $this->belongsTo('App\models\Category', 'parent_id');
    }

    public function products() {
        return $this->belongsToMany('App\models\Product', 'product_categories');
    }
}
