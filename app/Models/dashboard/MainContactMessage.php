<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Model;

class MainContactMessage extends Model
{
    protected $fillable = [
        'name','email','phone','subject','messages'
    ];
}
