@extends('layout')


  @section('content')

    <div class="container">
      <ul class="index_item">
        @foreach($items as $item)
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
          <!-- </div> -->
        </li>
        @endforeach
      </ul>


    </div>
    @endsection
