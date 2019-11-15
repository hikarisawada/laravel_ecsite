@extends('layout')


  @section('content')

    <div class="">
      <div class="">ショッピングカート</div>
        @if(isset ($items) )
        @foreach($items as $item)
        <ul class="index_item">
          <li class="item_list">
            <!-- <div class="index_item_main"> -->
              <div class="index_image">
                <a href="{{ route('items.detail', ['id' => $item->id]) }}">
                  <img src="{{ asset($item->image_url)}}" alt="" class="item_first_image">
                </a>
              </div>
              <div class="index_item_label">
                <div class="item_name">
                  <a href="{{ route('items.detail', ['id' => $item->id]) }}">{{ $item->name }}</a>
                </div>
                <div class="">
                  ¥{{ $item->price}}
                </div>
                <div class="">
                  ¥{{ $item->discount_price}}
                </div>
              </div>
              <div class="">
                {{ $item->cart_item_num}}個
              </div>
              <div class="">
                <a href="#">カートから削除</a>
              </div>
          <!-- </div> -->
        </li>
      </ul>
        </div>
        @endforeach
        <div class="item_detail">
          <button type="submit" name="button" class="btn btn-primary">購入する</button>
        </div>
        @else
        <div class="">
          カートに商品は入っていません。
        </div>

        @endif
            <div class="">
              <a href="{{ route('items.index')}}">ショッピングを続ける</a>
            </div>





  @endsection
