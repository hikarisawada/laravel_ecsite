@extends('layout')


  @section('content')

    <div class="container">
      <ul class="index_item">
        @foreach($items as $item)
        <li class="item_list">
            <!-- <div class="index_item_main"> -->
              <div class="index_image">
                <a href="{{ route('items.detail', ['id' => $item['item']->id]) }}">
                    <img src="{{$item['images']}}" alt="" class="item_first_image">
                </a>
              </div>
              <div class="index_item_label">
                <div class="item_name">
                  <a href="{{ route('items.detail', ['id' => $item['item']->id]) }}">{{ $item['item']->name }}</a>
                </div>
                <div class="index_item_price">
                  ¥{{ $item['item']->price }}
                </div>
                <div class="index_item_discount_price">
                  ¥{{ $item['item']->discount_price }}
                </div>
              </div>
          <!-- </div> -->
        </li>
        @endforeach
      </ul>

      {{ $index_items->links() }}
    </div>
    @endsection
