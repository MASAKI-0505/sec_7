<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>password_reset</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/sign_up.css') }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js”></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

  <header>

  </header>
  <h2 class="title center">パスワードリセット画面</h2>
  <p>送信をクリックするとパスワードが送られます。</p>
  <form action="/mail" method="post" name="form">
  @csrf
  <table>
  <tr>
    <td><dt><label for="email">メールアドレス</label></dt></td>
    <td>
      <dd class="error" id="email_error1">メールアドレスは正しくご入力ください。</dd>
      <dd class="error" id="email_error2">メールアドレスは必須入力です。</dd>
      <dd><input type="text" name="email" id="email" placeholder="test@test.co.jp" value= "" ></dd>
    </td>
  </tr>
  </table>
  <button id="sending" type="submit">送 信</button>

  </form>

  <div>
    <p><a href="/login">ログイン画面に戻る</a></P>
  </div>
  <footer>

  </footer>
</body>
</html>

<script>
</script>