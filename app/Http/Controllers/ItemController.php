<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemImage;
use App\Cart;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    public function index()
  {
    // return "Hello world";
    // $items = Item::all();
    // dd($items);
    // $images = ItemImage::all();
    // dd($images);
    // $images = $items->ItemImage()->first();

    // dd($images);
    $items = \DB::table('items')
    ->join('item_images','items.id','=','item_images.item_id')
    ->get();


    return view('items/index', [
        'items' => $items,
        // 'images' => $images,
    ]);

  }

  public function detail(int $id)
  {
    // return "Hello world";
    // $items = Item::all();
    // dd($items);
    $current_item = Item::find($id);

    // dd($current_item);

    $images = $current_item->ItemImage()->get();

    // 画像がなかったら/itemsにリダイレクト
    if($images == null){
      return redirect('/items');
    }

    // dd($images);

    return view('items/detail', [
        // 'items' => $items,
        'current_item' => $current_item,
        'images' => $images,

    ]);

  }

  // public function create(Request $request)
  // {
  //
  //   // インスタンス作成
  //   $cart_item = new Cart();
  //
  //   // 入力値を代入する
  //   $cart_item->item_id = $request->item_id;
  //   $cart_item->item_num = $request->item_num;
  //
  //   // dd();
  //   // カートに入れるを押したら、cartsにデータ入れる、にしたい
  //   Auth::user()->carts()->save($cart_item);
  //
  //
  //   return redirect()->route('cart.cart', [
  //       // 'id' => $folder->id,
  //   ]);
  //
  // }

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
//   return view('items/cart', [
//       // 'items' => $items,
//       'current_item' => $current_item,
//       'images' => $images,
//
//   ]);

}
