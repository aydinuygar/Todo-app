<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todo::create([
            'title' => 'Buy groceries',
            'description' => 'Milk, Bread, Cheese',
            'priority' => 'high',
            'is_completed' => false,
        ]);

        Todo::create([
            'title' => 'Clean the house',
            'description' => 'Living room, Kitchen',
            'priority' => 'medium',
            'is_completed' => false,
        ]);

        Todo::create([
            'title' => 'Pay bills',
            'description' => 'Electricity, Water, Internet',
            'priority' => 'low',
            'is_completed' => true,
        ]);
    }
}
