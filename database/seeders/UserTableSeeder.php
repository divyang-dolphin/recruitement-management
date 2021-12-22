<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userSeedData=[
            'name'=>'Sudip Dahal',
            'email'=>'sudip@dolphinwebsolutions.com',
            'password'=>Hash::make('developertest')
        ];
        User::create($userSeedData);
    }
}
