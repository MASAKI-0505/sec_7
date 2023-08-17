<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>sign_up</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/sign_up.css') }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js”></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
  <header>

  </header>
  <h2>新規登録画面</h2>
  <form action="/sign_up" method="post" name="form">
  @csrf
  <table>
    <tr>
      <td><label for="name">ユーザーネーム</label></td>
      <td>
        <dd><input type="text" name="name" id="name" placeholder="山田太郎" value= "{{ $info['name'] }}" ></dd>
      </td>
    </tr>
    <tr>
      <td><dt><label for="email">メールアドレス</label></dt></td>
      <td>
        <dd><input type="text" name="email" id="email" placeholder="test@test.co.jp" value= "{{ $info['email'] }}" ></dd>
      </td>
    </tr>
    <tr>
      <td><dt><label for="password">パスワード</label></dt></td>
      <td>
        <dd><input type="text" name="password" id="password" placeholder="password" value= "{{ $info['password'] }}" ></dd>
      </td>
    </tr>
  </table>
  <button id="sending" type="submit">登 録</button>

  </form>

  <div>
    <a href="/login">ログイン画面に戻る</a>
  </div>
  <footer>

  </footer>
</body>
</html>

<script>
$(function(){
  $("#sending").on("click", function(){
    if(confirm("登録しますか？")){
      return true;
    } else {
      return false;
    }
  });
});
</script>