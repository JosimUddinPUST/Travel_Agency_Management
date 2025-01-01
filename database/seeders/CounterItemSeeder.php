<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounterItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $counter_items = [
            [
                'item1_title' => 'Destinations',
                'item1_number' => '40',
                'item2_title' => 'Clients',
                'item2_number' => '1500',
                'item3_title' => 'Packages',
                'item3_number' => '1300',
                'item4_title' => 'Feedbacks',
                'item4_number' => '100',
            ],
        ];

        foreach ($counter_items as $counter_item) {
            \App\Models\CounterItem::create($counter_item);
        }
    }
}
