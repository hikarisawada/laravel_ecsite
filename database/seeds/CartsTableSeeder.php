<?php

use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
           'user_id' => 1,
           'item_id' => 1,
           'status' => 1,
           'cart_item_num' => 3,
       ]);
    }
}
