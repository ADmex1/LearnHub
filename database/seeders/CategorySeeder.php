<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Data Analytics',
            'slug' => 'data-analytics',
            'color' => 'bg-red-200'
        ]);
        Category::create([
            'name' => 'Data Mining',
            'slug' => 'data-Mining',
            'color' => 'bg-red-200'
        ]);
        Category::create([
            'name' => 'Data Science',
            'slug' => 'data-Science',
            'color' => 'bg-red-200'
        ]);
        Category::create([
            'name' => 'Object Oriented Programming',
            'slug' => 'object-oriented-programming',
            'color' => 'bg-green-200'
        ]);
        Category::create([
            'name' => 'Computer Network',
            'slug' => 'computer-network',
            'color' => 'bg-blue-300'
        ]);
    }
}
