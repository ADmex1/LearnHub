<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'useruser3',
            'username' => '@useruser3',
            'email' => 'rajendra@student.undiksha.ac.id',
            'email_verified_at' => now(),
            'password' => Hash::make('TheThaDirth'),
            'remember_token' => Str::random(10),
            'is_admin' => true
        ]);
        User::factory(30)->create();
    }
}
