<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'governrate_id'];
    public $timestamps = false;
    public function governorate()
    {
        return $this->belongsTo(GovernRate::class, 'governrate_id');
    }
}
