<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Card::factory()->create([
            'balance' => '60000',
            'full_name' => 'Hamid Hamidli',
            'card_number' => '1234567891234567',
            'cvv' => '123',
            'date_month' => '01',
            'date_year' => '2027',
            'password' => bcrypt('1234'),
            'status' => 1,
        ]);
        \App\Models\Card::factory(10)->create();
    }
}
