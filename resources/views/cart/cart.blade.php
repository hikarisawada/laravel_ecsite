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
              <form action="{{ route('cart.deleteCart', ['id' => $item->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="text-right">
                  <button type="submit" class="btn">カートから削除</button>
                </div>
              </form>
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
