<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
            'created_at' => now()->subDays(30),
        ]);

        // Create sales team members
        $salesMembers = [
            ['name' => 'John Sales', 'email' => 'john@example.com', 'is_active' => true, 'days_ago' => 20],
            ['name' => 'Sarah Sales', 'email' => 'sarah@example.com', 'is_active' => true, 'days_ago' => 15],
            ['name' => 'Mike Sales', 'email' => 'mike@example.com', 'is_active' => true, 'days_ago' => 10],
            ['name' => 'Emily Sales', 'email' => 'emily@example.com', 'is_active' => false, 'days_ago' => 25],
            ['name' => 'David Sales', 'email' => 'david@example.com', 'is_active' => true, 'days_ago' => 5],
        ];

        foreach ($salesMembers as $member) {
            User::create([
                'name' => $member['name'],
                'email' => $member['email'],
                'password' => Hash::make('password'),
                'role' => 'sales',
                'is_active' => $member['is_active'],
                'created_at' => now()->subDays($member['days_ago']),
            ]);
        }

        // Create users signed up today
        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'name' => "Today User {$i}",
                'email' => "today{$i}@example.com",
                'password' => Hash::make('password'),
                'role' => 'user',
                'is_active' => true,
                'created_at' => now(),
            ]);
        }

        // Create regular users (some active, some inactive)
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "Regular User {$i}",
                'email' => "user{$i}@example.com",
                'password' => Hash::make('password'),
                'role' => 'user',
                'is_active' => $i % 3 !== 0, // Every third user is inactive
                'created_at' => now()->subDays(rand(1, 60)),
            ]);
        }
    }
}
