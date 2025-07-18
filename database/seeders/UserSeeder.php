<?php

namespace Database\Seeders;

use App\Models\User;
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
            'email' => 'MrThadaWee@gmail.com',
            'password' => Hash::make('TheThaDirth'),
            'is_admin' => true
        ]);
        User::factory(30)->create();
    }
}
