@extends('layout')


  @section('content')

    <div class="">

      <div class="">買い物かご</div>
      <table>

        @if(!$items->isEmpty())


        @foreach($cart_items as $item)
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
      </table>
      </div>

        <div class="">
          <p>合計金額：{{$total_price->total_price}}　円</p>
          <p>個数：{{$total_price->total_num}} 個</p>
        </div>


        <form action="{{ asset('charge') }}" method="POST">
            {{ csrf_field() }}
                    <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ $stripe_access_key }}"
                            data-amount="{{ $total_price->total_price }}"
                            data-name="Stripe Demo"
                            data-label="決済をする"
                            data-description="Online course about integrating Stripe"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto"
                            data-currency="JPY">
                    </script>
        </form>

        @else
        <div class="noDate">
          カートに商品は入っていません。
        </div>

        @endif
            <div class="continue">
              <a href="{{ route('items.index') }}">ショッピングを続ける</a>
            </div>
            <div class="cashed-list">
              <a href="{{ route('cart.showCashed') }}">購入済み一覧</a>
            </div>


  @endsection
