<?php

namespace Database\Seeders;

use App\Models\dashboard\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $store = new Store();
        $store->create([
            'name'=>'store1',
            'description'=>'store1',
            'slug'=>'store',
            'user_id'=>1,
            'status'=>1,
        ]);
    }
}
