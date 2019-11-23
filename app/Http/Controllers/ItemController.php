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
    // データ整形
    $item_array = array();

    $items = \DB::table('items')
    ->where('is_enabled', 1)
    ->paginate(4);

    foreach ($items as $key => $item) {
      // 最初に登録された画像の1枚を取得する
      $image = ItemImage::where('item_id','=',$item->id)->get()->first();
      if(isset($image)){
        $first_image = array('item'=> $item, 'images'=> $image->image_url);
        array_push($item_array, $first_image);
      }
    }

    return view('items/index', [
      'demo_item' => $item_array,
      'items' => $items
    ]);

  }

  public function detail(int $id)
  {
    $current_item = Item::find($id);
    $images = $current_item->ItemImage()->get();

    // 画像がなかったら/itemsにリダイレクト
    if($images == null){
      return redirect('/items');
    }

    return view('items/detail', [
        'current_item' => $current_item,
        'images' => $images
    ]);

  }

}
