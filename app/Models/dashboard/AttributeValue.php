<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{

    protected $fillable = ['attribute_id', 'value'];

    public $timestamps = false;
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
