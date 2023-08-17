<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>login</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js”></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

  <header>

  </header>

  <h2>ログイン画面</h2>
  <form id='login_form' method="POST" action="/login">
  @csrf
  <input class="login_text" id="email" name="email" placeholder="メールアドレス"></input>
  <input class="login_text" name="password" placeholder="パスワード"></input>
  <div id="login_box">
  <button id="sending" type="submit">ログイン</button>
  <p id="sign_up"><a href="/sign_up">新規登録</a></p>
  </div>
  </form>
  <p>パスワードを忘れたら<span><a href="password_reset" >こちら<a></span></p>
  
  <footer>

  </footer>
</body>
</html>

<script>
</script>
