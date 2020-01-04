@extends('layout')


  @section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
        <div class="panel-heading">ec_siteへようこそ！</div>
        <div class="panel-body">
          <div class="">
            <a href="{{ route('items.index', [], false) }}" class="btn btn-primary">
              商品一覧へ
            </a>

          </div>

        </div>

        </div>
      </nav>
</div>
</div>

  @endsection
