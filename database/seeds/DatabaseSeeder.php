<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(ItemsTableSeeder::class);
      $this->call(Item_imagesTableSeeder::class);
      $this->call(CartsTableSeeder::class);
    }
}
