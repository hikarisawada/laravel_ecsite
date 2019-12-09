<?php

use Illuminate\Database\Seeder;

class Item_imagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      foreach (range(1, 150) as $num) {

        DB::table('item_images')->insert([
          'item_id' => $num,
          'image_url' => "/demo/".rand(1,5).".png",

        ]);
      }
    }
}
