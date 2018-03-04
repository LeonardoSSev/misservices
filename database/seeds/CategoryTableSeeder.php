<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Alimentação',
            'description' => 'Referente a alimentos.'
        ]);

        Category::create([
            'name' => 'Educação',
            'description' => 'Referente à educação.'
        ]);

        Category::create([
            'name' => 'Reforma',
            'description' => 'Referente à reformas de construções.'
        ]);
    }
}
