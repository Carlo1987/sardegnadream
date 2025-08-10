<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;  

use App\Enums\RolesEnum;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => RolesEnum::ADMIN,
            'name' => env('USER_NAME'),
            'email' => env('USER_EMAIL'),
            'password' =>Hash::make(env('USER_PASSWORD')),
        ]);
    }
}
