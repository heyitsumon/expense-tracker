<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomeCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Salary',
            'Business Income',
            'Freelance',
            'Part-Time Job',
            'Bonus',
            'Commission',
            'Investment',
            'Interest',
            'Rental Income',
            'Online Income',
            'Gift',
            'Refund',
            'Pension',
            'Dividends',
            'Other Income',
        ];

        foreach ($categories as $category) {
            DB::table('income_categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}