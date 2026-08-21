<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Food',
            'Groceries',
            'Restaurant',
            'Transport',
            'Fuel',
            'House Rent',
            'Electricity Bill',
            'Water Bill',
            'Internet Bill',
            'Mobile Bill',
            'Education',
            'Healthcare',
            'Shopping',
            'Entertainment',
            'Clothing',
            'Travel',
            'Insurance',
            'Loan Payment',
            'Family',
            'Personal Care',
            'Subscriptions',
            'Charity',
            'Maintenance',
            'Other Expense',
        ];

        foreach ($categories as $category) {
            DB::table('expense_categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}