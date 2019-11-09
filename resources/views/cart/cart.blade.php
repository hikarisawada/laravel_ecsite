@extends('layout')


  @section('content')

    <div class="">
      <div class="">ショッピングカート</div>

            <div class="">
              <img src="" alt="">
            </div>
            <div class="detail">
            <div class="item_detail">
            </div>

            <div class="item_detail">

            </div>
            <div class="item_detail">

            </div>
            <div class="item_detail">
              カートに商品は入っていません。

            </div>
            <div class="item_detail">
              <button type="submit" name="button" class="btn btn-primary">購入する</button>
            </div>


          </div>
        </div>
            <div class="">
              <a href="{{ route('items.index')}}">ショッピングを続ける</a>
            </div>





  @endsection
