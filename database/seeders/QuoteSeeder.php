<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quote;
use App\Models\Category;
use Illuminate\Support\Str;

class QuoteSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        if ($categories->count() == 0) {
            $this->command->warn("No categories found. Please seed categories first.");
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            Quote::create([
                'headline' => fake()->sentence(3), 
                'isi' => fake()->paragraph(2),     
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}
