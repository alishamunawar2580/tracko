<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        $organization = Organization::create([
            'name' => 'Test Organization',
            'email' => 'org@example.com',
            'owner_id' => $user->id,
        ]);

        $user->organizations()->attach($organization->id);
    }
}
