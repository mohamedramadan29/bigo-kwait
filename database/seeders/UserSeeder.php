<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->create([
            'name'=>'mohamed',
            'email'=>'mohamed@gmail.com',
            'phone'=>'111',
            'password'=>bcrypt('11111111'),
            'type'=>'user',
            'country_id'=>1,
            'status'=>1,
            'email_active'=>1,
        ]);
    }
}
