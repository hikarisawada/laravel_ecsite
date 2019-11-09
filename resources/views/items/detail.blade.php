@extends('layout')


  @section('content')

    <div class="detail_main">
            <div class="item_left">
              <!-- <a href="#"> -->
              <div class="image_main">
                <img src="{{ asset($images->image_url)}}" alt="">

              </div>
                <ul class="image_gallery">

                  <li>
                    <img src="{{ asset($images->image_url)}}" alt="" class="item_image">
                  </li>
                  <li>
                    <img src="{{ asset($images->image_url)}}" alt="" class="item_image">
                  </li>
                  <li>
                    <img src="{{ asset($images->image_url)}}" alt="" class="item_image">
                  </li>
                  <li>
                    <img src="{{ asset($images->image_url)}}" alt="" class="item_image">
                  </li>
                  <li>
                    <img src="{{ asset($images->image_url)}}" alt="" class="item_image">
                  </li>
                  <li>
                    <img src="{{ asset($images->image_url)}}" alt="" class="item_image">
                  </li>
                  <li>
                    <img src="{{ asset($images->image_url)}}" alt="" class="item_image">
                  </li>

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

                <div class="">
                  <!-- <a href="{{ route('cart.cart') }}">カートに入れる</a> -->
                  <button type="submit" name="button" class="btn btn-primary">カートに入れる</button>
                </div>
                <div class="">
                <a href="/items">戻る</a>
              </div>


            </div>
        </div>

  @endsection
