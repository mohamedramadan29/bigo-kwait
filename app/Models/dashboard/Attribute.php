<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

    protected $fillable = ['name'];
    public function Attributevalues()
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y h:i A', strtotime($value));
    }
}
