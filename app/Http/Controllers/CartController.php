<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemImage;
use App\Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
  //   public function cart()
  // {
  //   // return "Hello world";
  //   // $items = Item::all();
  //   // dd($items);
  //   $current_item = Item::find();
  //
  //   // dd($current_item);
  //
  //   $images = $current_item->ItemImage()->first();
  //
  //   // dd($images);
  //
  //   return view('cart/cart', [
  //       // 'items' => $items,
  //       'current_item' => $current_item,
  //       'images' => $images,
  //
  //   ]);
  //
  // }

  public function showCart()
{

  $items = \DB::table('carts')
  ->join('items','items.id','=','carts.item_id')
  ->join('item_images','items.id','=','item_images.item_id')
  ->where('status', 1)
  ->get();

  // dd($items);

  return view('cart/cart', [
      'items' => $items,
  ]);
}

    public function deleteCart(int $id)
    {
      // カートから削除を押したら、statusを3にする、とかにしたい
        $cart = Cart::find($id);
        dd($cart);
        $cart->status = 3;

        $cart->save();

    }

}
