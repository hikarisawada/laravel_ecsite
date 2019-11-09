<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemImage;
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
  return view('cart/cart');
}
}
