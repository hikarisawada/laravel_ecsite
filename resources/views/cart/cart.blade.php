@extends('layout')


  @section('content')

    <div class="">
      <div class="">買い物かご</div>
      <table>

        @if(isset($cart_items))
        @foreach($cart_items as $item)
        <tr class="index_item">
            <!-- <div class="index_item_main"> -->
            <td>
              <div class="index_image">
                <a href="{{ route('items.detail', ['id' => $item['item']->item_id]) }}">
                  <img src="{{ $item['images'] }}" alt="" width="200">

                </a>
              </div>
            </td>
            <td>
              <div class="index_item_label">
                <div class="item_name">
                  <a href="{{ route('items.detail', ['id' => $item['item']->item_id]) }}">{{ $item['item']->name }}</a>
                </div>
                <div class="">
                  ¥{{ $item['item']->price}}
                </div>
                <div class="">
                  ¥{{ $item['item']->discount_price}}
                </div>
                <div class="">
                  {{ $item['item']->cart_item_num}}個
                </div>
              </div>
            </td>
            <td>
              <form action="{{ route('cart.deleteCart', ['id' => $item['item']->item_id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="text-right">
                  <button type="submit" class="btn">カートから削除</button>
                </div>
              </form>
            </td>
          <!-- </div> -->
      </tr>
        @endforeach
        <div class="">
          <p>合計金額：</p>
          <p>個数：</p>
        </div>

        <div class="item_detail">
          <button type="submit" name="button" class="btn btn-primary">購入する</button>
        </div>
      </div>

        @else
        <div class="">
          カートに商品は入っていません。
        </div>

        @endif
      </table>
            <div class="">
              <a href="{{ route('items.index') }}">ショッピングを続ける</a>
            </div>


  @endsection
