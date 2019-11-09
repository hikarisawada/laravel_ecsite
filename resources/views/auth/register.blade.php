@extends('layout')


  @section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
            <div class="panel-heading">会員登録</div>
            <div class="panel-body">
            @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
              @endforeach
            </div>
            @endif
            <form class="" action="{{ route('register') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="">メールアドレス</label>
                <input type="email" name="email" value="" id="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="">ユーザー名</label>
                <input type="text" value=""name="name" id="name" class="form-control">
              </div>

              <div class="form-group">
                <label for="">パスワード</label>
                <input type="password" value="" name="password" id="password" class="form-control">
              </div>

              <div class="form-group">
                <label for="">パスワード確認</label>
                <input type="password" value="" name="password_confirmation" id="password-confirm" class="form-control">
              </div>

              <div class="text-right">
                <button type="submit" name="button" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>

    @endsection
