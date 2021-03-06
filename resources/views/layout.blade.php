
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <title>ec_site</title>
    @yield('styles')

    <link rel="stylesheet" href="/css/styles.css">
  </head>
  <body>
  <header>
    <nav class="my-navbar">
      <a class="my-navbar-brand" href="/items">ec_site</a>
      <div class="">
        @if(Auth::check())
          <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
          ｜
          <a href="{{ route('cart.showCart', [], false) }}" id="" class="my-navbar-item">買い物かご</a>
          ｜
          <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
          <form id="logout-form" action="{{ route('logout', [], false) }}" method="POST" style="display: none;">
            @csrf
          </form>
        @else
          <a class="my-navbar-item" href="{{ route('login', [], false) }}">ログイン</a>
          ｜
          <a class="my-navbar-item" href="{{ route('register', [], false) }}">会員登録</a>
        @endif
      </div>
    </nav>
  </header>
  <main>
    @yield('content')

  </main>

  @if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif

@yield('scripts')
  </body>
</html>
