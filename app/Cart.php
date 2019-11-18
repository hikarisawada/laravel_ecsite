<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public function ItemImage()
  {

    // user_id, item_id, status, cart_item_num,カラムにデータの挿入を許可する
    // protected $fillable = [
    //     'user_id',
    //     'item_id',
    //     'status',
    //     'cart_item_num',
    // ];

  }
}
