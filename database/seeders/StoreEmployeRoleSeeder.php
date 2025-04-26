<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\dashboard\EmployeRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreEmployeRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisions = [];
        foreach (config('store_permissions') as $key => $value) {
            $permisions[] = $key;
        }
        EmployeRole::create([
            'role' => 'مدير متجر',
            'permission' => json_encode($permisions),
            'permission_type'=>'store',
        ]);
    }
}
