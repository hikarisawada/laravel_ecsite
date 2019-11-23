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
    $item_array = array();
    // dd($item_array);

    $items = \DB::table('items')
    // ->join('item_images','items.id','=','item_images.item_id')
    ->where('is_enabled', 1)
    // ->groupBy('items.id')
    // ->get();
    ->paginate(4);


    foreach ($items as $key => $item) {
      $image = ItemImage::where('item_id', '=', $item->id)->get()->first();

      if (isset($image)) {
        $first_image = array('item'=>$item, 'images'=>$image->image_url);
        // dd($first_image);
        array_push($item_array, $first_image);
        // dd($item_array);
      }
    }


    return view('items/index', [
      'items' => $item_array,
      'index_items' => $items,
    ]);

  }

  public function detail(int $id)
  {
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
