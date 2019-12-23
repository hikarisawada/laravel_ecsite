<?php

namespace App\Http\Controllers;
// use CartController;
use App\Item;
use App\ItemImage;
use App\Cart;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Config; // Added this line

class CartController extends Controller
{
  public function showCartPost(int $id, Request $request)
  {
    // もしデータが存在していたらupdate分を作る
    $user = Auth::user();
    $cart = new Cart();

    // ユーザーIDとitem_idがあって、statusが1の場合は、商品の個数を更新したい
    $cart_create_or_update = Cart::where('user_id', '=', $user->id)
    ->where('item_id', '=', $id)->where('status',1)->get()->first();

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

  $total_price = \DB::table('carts')
  ->selectRaw('sum(discount_price*cart_item_num) as total_price, sum(cart_item_num) as total_num')
  ->join('items','items.id','=','carts.item_id')
  ->where('status', 1)
  ->where('user_id', $user->id)
  ->get()->first();

  $stripe_access_key = Config::get('app.stripe_access_key');
  // dd($stripe_access_key);

  // $cart = new CartController();
  // dd();
  // $cart.setStripeUrl();
  return view('cart/cart', [
    'items' => $items,
    'cart_items' => $cart_item_array,
    'total_price' => $total_price,
    'stripe_access_key' => $this->setStripeUrl(),
  ]);
}

  public function showCashed()
{
  $cash_item_array = array();
  $user = Auth::user();

  $items = \DB::table('item_cash_joins')
  ->select('item_cash_joins.id','item_cash_joins.user_id','item_cash_joins.cash_id','item_cash_joins.item_id', 'item_cash_joins.cash_item_num', 'item_cash_joins.created_at', 'items.name', 'items.price', 'items.discount_price')
  ->join('items','items.id','=','item_cash_joins.item_id')
  ->where('user_id', $user->id)
  ->get();
  // dd($items);

  foreach ($items as $key => $item) {
    $image = ItemImage::where('item_id', '=', $item->item_id)->get()->first();
    // dd($image);

    if (isset($image)) {
      $first_image = array('item'=>$item, 'images'=>$image->image_url);
      array_push($cash_item_array, $first_image);
      // dd($cash_item_array);
    }
  }
  // dd($cash_item_array);

  $total_price = \DB::table('item_cash_joins')
  ->selectRaw('sum(discount_price*cash_item_num) as total_price, sum(cash_item_num) as total_num')
  ->join('items','items.id','=','item_cash_joins.item_id')
  ->where('user_id', $user->id)
  ->get()->first();

  // dd($total_price);


  return view('cart/cashed', [
    'items' => $items,
    'cash_items' => $cash_item_array,
    'total_price' => $total_price,
  ]);


}

    public function deleteCart(int $id)
    {
        // カートから削除を押したら、statusを3にする、とかにしたい
        $user = Auth::user();

        $cart = Cart::where('item_id',$id)
        ->where('user_id',$user->id)
        ->where('status',1)
        ->get()
        ->first();
        $cart->status = 3;
        $cart->save();
        return redirect('/cart');
    }
    // stripe_access_keyが正しかったらtrue
    
    private function setStripeUrl()
    {
      return Config::get('app.stripe_access_key');
    }
}
