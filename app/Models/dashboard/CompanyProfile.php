<?php
namespace App\Models\dashboard;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $table = 'company_profiles';
    protected $fillable = [
        'user_id',
        'name',
        'logo',
        'commercial_license',
        'signature_approval',
        'identity_card'
    ];
    public function company()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
