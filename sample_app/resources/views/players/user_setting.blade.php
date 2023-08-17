<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ユーザー設定</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/user_setting.css') }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js”></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

  <header>
  @include('players.header')
  </header>
  <form action="/user_setting_complete" method="post" name="form">
  @csrf
    <h2 class="center title">ユーザー情報の変更</h2>
  <div class="layout">    
    <table id="table">
      <tr>
        <td class="text"><label for="name">ユーザーネーム</label></td>
        <td>
          <dd><input type="text" name="name" id="name" placeholder="山田太郎" value= "" ></dd>
        </td>
      </tr>
      <tr>
        <td class="text"><dt><label for="email">メールアドレス</label></dt></td>
        <td>
          <dd><input type="text" name="email" id="email" placeholder="test@test.co.jp" value= "" ></dd>
        </td>
      </tr>
      <tr>
        <td class="text"><dt><label for="new_password">新しいパスワード</label></dt></td>
        <td>
          <dd><input type="text" name="new_password" id="new_password" placeholder="password" value= "" ></dd>
        </td>
      </tr>
    </table>
  </div>
  <div class="layout">  
    <button id="sending" type="submit">変 更</button>
    </div>
  </form>

  <div>
    <p class="center" id="back"><a href="/index">マイページに戻る</a></P>
  </div>
  <footer>
  @include('players.footer')
  </footer>
</body>
</html>

<script>

</script>