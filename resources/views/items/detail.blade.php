@extends('layout')


  @section('content')


    <div class="detail_main">
            <div class="item_left">
              <!-- <a href="#"> -->
              <div class="image_main">
              @if ($images)
                <img src="{{ asset($images->first()->image_url)}}" alt="" id="mainImage">
              @else
                <img src="/" alt="">
              @endif

              </div>
                <ul class="image_gallery">

                  @foreach ($images as $key => $value)
                    <li class="image_list"><img src="{{ $value->image_url }}" class="item_image" onClick="getImage({{ $key }})"></li>
                  @endforeach


                </ul>

              </div>

            <div class="item_right">

                <div class="item_name">
                  {{ $current_item->name }}
                </div>

                <div class="item_price">
                  ¥{{ $current_item->price}}
                </div>

                <div class="item_discount_price">
                  ¥{{ $current_item->discount_price}}
                </div>

                <div class="item_descriptionn">
                  {{ $current_item->description}}
                </div>
                <form action="{{ route('cart.add_cart', ['id' => $current_item->id]) }}" method="post">

                <div class="item_num">


                  <select name='item_num'>
                    @for($item_num = $current_item->item_num; $item_num >= 1; $item_num--)
                        <option value="{{ $item_num }}" selected="selected" name="item_num">{{ $item_num}}</option>
                    @endfor
                  </select>
                </div>
                <div class="">
                    @csrf
                  <!-- <a href="{{ route('cart.showCart') }}">カートに入れる</a> -->
                  <button type="submit" name="button" class="btn btn-primary">カートに入れる</button>
                </div>
              </form>

                <div class="">
                <a href="/items">戻る</a>
              </div>
            </div>
        </div>

        <script src="{{ asset('/js/image_change.js') }}"></script>


  @endsection
