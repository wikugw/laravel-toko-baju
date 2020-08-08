<?php

namespace App\models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'type',
        'validation',
        'is_required',
        'is_unique',
        'is_filterable',
        'is_configurable'
    ];

   public static function types()
    {
        return [
            'text' => 'Text',
            'textarea' => 'Textarea',
            'price' => 'Price',
            'boolean' => 'Boolean',
            'select' => 'Select',
            'datetime' => 'Datetime',
            'date' => 'Date',
        ];
    }

    public static function booleanOptions()
    {
        return [
            1 => 'Yes',
            0 => 'No',
        ];
    }

    public static function validations()
    {
        return [
            'number' => 'Number',
            'decimal' => 'Decimal',
            'email' => 'Email',
            'url' => 'URL',
        ];
    }

    public function attributeOptions()
    {
        return $this->hasMany('App\models\AttributeOption');
    }
}
