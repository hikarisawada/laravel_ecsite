<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      foreach (range(1, 5) as $num) {
        DB::table('items')->insert([
          'name' => "サンプル {$num}",
          'price' => $num * 100,
          'discount_price' => $num * 90,
          'description' => "サンプル {$num}の商品です。お買い得ですよ！",
          'is_enabled' => 1,
          'item_num' => $num,

        ]);
      }
    }

}
