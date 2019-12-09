<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Cart;
use App\ItemCashJoin;
use Auth;
use Config; // Added this line

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class ChargeController extends Controller
{

  public function charge_view($value='')
  {
    return view('charge/sample');
  }

  /*単発決済用のコード*/
  public function charge(Request $request)
  {
    $user = Auth::user();
    $cash = new Cash();

    $total_price = \DB::table('carts')
    ->selectRaw('sum(discount_price*cart_item_num) as total_price, sum(cart_item_num) as total_num')
    ->join('items','items.id','=','carts.item_id')
    ->where('status', 1)
    ->where('user_id', $user->id)
    ->get()->first();

      try {
          Stripe::setApiKey(Config::get('app.stripe_secret_key'));

          $customer = Customer::create(array(
              'email' => $request->stripeEmail,
              'source' => $request->stripeToken
          ));

          $charge = Charge::create(array(
              'customer' => $customer->id,
              'amount' => $total_price->total_price,
              'currency' => 'jpy'
          ));

          // $user = Auth::user();
          // cashedテーブルにデータを入れる

          $cash->user_id = $user->id;
          $cash->total_price = $total_price->total_price;
          $cash->total_num = $total_price->total_num;
          $cash->save();


          // 購入したら、cartのstatusを2にして、購入済みにして、カートから消す

          $cart_status_update = Cart::where('user_id', '=', $user->id)
          ->where('status', 1)->get();
          // dd($cart_status_update);

          foreach ($cart_status_update as $key => $cart_status) {
            $cart_status->status = 2;
            $cart_status->save();
            // 買った商品idと個数をItemCashJoinに入れる
            $cash_items = new ItemCashJoin();
            $cash_items->user_id = $user->id;
            $cash_items->cash_id = $cash->id;
            $cash_items->item_id = $cart_status['item_id'];
            $cash_items->cash_item_num = $cart_status['cart_item_num'];
            $cash_items->save();
          }

          // // 買った商品idと個数をItemCashJoinに入れる
          // foreach ($cart_status_update as $key => $cart_update_item) {
          //   $cash_items = new ItemCashJoin();
          //   $cash_items->user_id = $user->id;
          //   $cash_items->cash_id = $cash->id;
          //   $cash_items->item_id = $cart_update_item['item_id'];
          //   $cash_items->cash_item_num = $cart_update_item['cart_item_num'];
          //   $cash_items->save();
          // }
          return back();
      } catch (\Exception $ex) {
          return $ex->getMessage();
      }
  }
}
