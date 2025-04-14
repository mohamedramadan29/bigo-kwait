<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Model;

class MainSetting extends Model
{
    protected $guarded = [];
    public function getLogo()
    {
        return asset('assets/uploads/logos/' . $this->logo);
    }
    public function getFavicon()
    {
        return asset('assets/uploads/favicons/' . $this->favicon);
    }
}
