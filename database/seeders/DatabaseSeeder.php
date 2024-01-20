<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    protected static ?string $password;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'role' => 'ADMIN',
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'email_verified_at' => now(),
            'role' => 'EMPLOYEE',
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'email_verified_at' => now(),
            'role' => 'CUSTOMER',
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
