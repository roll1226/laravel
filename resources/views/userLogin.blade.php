<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>
    ユーザログイン
  </h1>
  <form action="/isLogin" method="POST">
    {{ csrf_field() }}

    <label>
      ユーザID:
    </label>
    <input type="text" name="user" value="{{old('user')}}" />

    <label>
      パスワード:
    </label>
    <input type="password" name="passwd" value="{{old('passwd')}}" />

    <input type="submit" value="ログイン" />
  </form>

  <a href="http://localhost/userRegist">
    会員登録
  </a>

  @if($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li>
          {{ $error }}
        </li>
      @endforeach
    </ul>
  @endif
</body>
</html>
