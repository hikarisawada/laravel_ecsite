<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemImage;
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

  $images = $current_item->ItemImage()->first();

  // dd($images);

  return view('items/detail', [
      // 'items' => $items,
      'current_item' => $current_item,
      'images' => $images,

  ]);

}

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
