@extends('layout')


  @section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">ログイン</div>
          <div class="panel-body">
              @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
                @endforeach
              </div>
              @endif
              <form class="" action="{{ route('login', [], false) }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">メールアドレス</label>
                  <input type="email" name="email" value="" id="email" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">パスワード</label>
                  <input type="password" value="" name="password" id="password" class="form-control">
                </div>

                <div class="text-right">
                  <button type="submit" name="button" class="btn btn-primary">送信</button>
                </div>
              </form>
            </div>
          </nav>
              <div class="text-center">
                <a href="{{ route('password.request', [], false) }}">パスワードの変更はこちらから</a>
              </div>

            </div>

            </div>

    </div>
    @endsection
