<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemImage;
use App\Cart;
use Auth;
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
  public function showCartPost(int $id, Request $request)
  {
    // もしデータが存在していたらupdate分を作る 
    $user = Auth::user();
    $cart = new Cart();
    $cart->user_id = $user->id;
    $cart->item_id = $id;
    $cart->status = 1;
    $cart->cart_item_num = $request->item_num;
    $cart->save();
    return redirect('/cart');

  }
  public function showCart()
{
  $user = Auth::user();

  $items = \DB::table('carts')
  ->join('items','items.id','=','carts.item_id')
  ->where('status', 1)
  ->where('user_id', $user->id)
  ->get();
  // join('item_images','items.id','=','item_images.item_id')

  // dd($items);

  return view('cart/cart', [
      'items' => $items,
  ]);
}

    public function deleteCart(int $id)
    {
      // カートから削除を押したら、statusを3にする、とかにしたい
      $user = Auth::user();

        $cart = Cart::where('item_id',$id)->where('user_id',$user->id)->get()->first();
        // dd($cart->get()->first());

        $cart->status = 3;

        $cart->save();
        return redirect('/cart');

    }

}
