@extends('layout')


  @section('content')

    <div class="">
      <div class="">購入済み一覧</div>
      <table>

        @if(!$items->isEmpty())
        @foreach($cash_items as $item)
        <tr class="index_item">
            <!-- <div class="index_item_main"> -->
            <td class="item_underline">
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
                  {{ $item['item']->cash_item_num}}個
                </div>
                <div class="">
                  購入日時：{{ $item['item']->created_at}}
                </div>
              </div>
            </td>
            <td>
            </td>
          <!-- </div> -->
      </tr>
        @endforeach
      </table>
      </div>
        <div class="">
          <p>合計金額：{{$total_price->total_price}}　円</p>
          <p>個数：{{$total_price->total_num}} 個</p>
        </div>

        @else
        <div class="noDate">
          購入された商品はありません。
        </div>

        @endif
            <div class="">
              <a href="{{ route('items.index') }}">ショッピングを続ける</a>
            </div>
            <div class="">
              <a href="{{ route('cart.showCart') }}">カートに戻る</a>
            </div>


  @endsection
