<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WelcomeItem;

class WelcomeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $welcomeItem = new WelcomeItem();
        $welcomeItem->heading = "Welcome to our website";
        $welcomeItem->text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $welcomeItem->button_text = 'Read More';
        $welcomeItem->button_link = '#';
        $welcomeItem->photo = 'welcome.jpg';
        $welcomeItem->video = 'JgHfx2v9zOU';
        $welcomeItem->status = 'active';
        $welcomeItem->save();
    }
}
