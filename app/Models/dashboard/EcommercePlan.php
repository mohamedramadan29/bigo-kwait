<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Model;

class EcommercePlan extends Model
{
    protected $guarded = [];

    public function getStatus()
    {
        return $this->is_active == 1 ? 'مفعل' : 'غير مفعل';

    }
}
