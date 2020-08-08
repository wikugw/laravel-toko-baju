<?php

namespace App\models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class AttributeOption extends Model
{
    use SoftDeletes;

    protected $fillable = ['attribute_id', 'name'];

    public function attribute()
    {
        return $this->belongsTo('App\models\Attribute');
    }
}
