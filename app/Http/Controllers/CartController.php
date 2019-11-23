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

    // ユーザーIDとitem_idがある場合は、商品の個数を更新したい
    $cart_create_or_update = Cart::where('user_id', '=', $user->id)
    ->where('item_id', '=', $id)->get()->first();

    if (is_null($cart_create_or_update)) {
      $cart->user_id = $user->id;
      $cart->item_id = $id;
      $cart->status = 1;
      $cart->cart_item_num = $request->item_num;
      $cart->save();

    }else {
      $cart_create_or_update->cart_item_num = $request->item_num;
      $cart_create_or_update->save();
    }
    return redirect('/cart');

  }
  public function showCart()
{
  $cart_item_array = array();
  $user = Auth::user();

  $items = \DB::table('carts')
  ->join('items','items.id','=','carts.item_id')
  ->where('status', 1)
  ->where('user_id', $user->id)
  ->get();
  // dd($items);

  foreach ($items as $key => $item) {
    $image = ItemImage::where('item_id', '=', $item->item_id)->get()->first();
    // dd($image);

    if (isset($image)) {
      $first_image = array('item'=>$item, 'images'=>$image->image_url);
      array_push($cart_item_array, $first_image);
      // dd($item_array);
    }
  }
  // dd($cart_item_array);


  return view('cart/cart', [
    'cart_items' => $cart_item_array,
  ]);

  // dd($items);
  // cartのidどうやってとったらいいんだ
  // $carts = \DB::table('carts')->get();

  // dd($carts);

  // $images = \DB::table('carts')
  // ->join('item_images','item_images.item_id','=','carts.item_id')
  // ->where('status', 1)
  // ->where('user_id', $user->id)
  // 同じ画像が出てきちゃう
  // ->where('id', $carts->id)
  // ->get();
  // ->join('item_images','items.id','=','item_images.item_id')

  // dd($images);

  // return view('cart/cart', [
  //     'items' => $items,
  //     'images' => $images,
  // ]);
}

    public function deleteCart(int $id)
    {
        // カートから削除を押したら、statusを3にする、とかにしたい
        $user = Auth::user();

        $cart = Cart::where('item_id',$id)
        ->where('user_id',$user->id)
        ->get()
        ->first();
        // dd($cart->get()->first());

        $cart->status = 3;

        $cart->save();
        return redirect('/cart');

    }

    public function cashCart(int $id)
    {
        // カートの中身を買うやつ（新しいtable作らないと）
        $user = Auth::user();
        //
        // $cart = Cart::where('item_id',$id)
        // ->where('user_id',$user->id)
        // ->get()
        // ->first();
        // // dd($cart->get()->first());
        //
        // $cart->status = 3;
        //
        // $cart->save();
        // return redirect('/cart');

    }

}
