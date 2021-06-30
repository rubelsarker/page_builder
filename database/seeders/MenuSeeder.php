<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::updateOrCreate(['title' => 'Home-Navbar', 'desc' => 'This is home page menu', 'deletable' => false]);

        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'label' => 'Home', 'parent_id' => null, 'order' => 1, 'url' => 'home']);
        MenuItem::updateOrCreate(['menu_id' => $menu->id, 'label' => 'About', 'parent_id' => null, 'order' => 2, 'url' => 'about']);

    }

}
