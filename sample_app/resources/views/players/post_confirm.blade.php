<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>投稿</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/post.css') }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js”></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

  <header>
    @include('players.header')
  </header>
  
  <h2 class="center title">確認画面</h2>
  <form id='post' method="POST" action="/post_complete">
  @csrf
  <div class="center">
    <dt class="left">視聴日</dt>
    <dd class="dd left">{{ $info['day'] }}</dd>
    <dt class="left">タイトル</dt>
    <dd class="dd left" id="title" name="title">{{ $info['title'] }}</dd>
    <dt class="left">カテゴリー</dt>
    <dd class="dd left" id="category" name="category">{{ $info['category'] }}</dd>
    <dt class="left">年代</dt>
    <dd class="dd left" id="age" name="age">{{ $info['age'] }}</dd>
    <dt class="left">評価</dt>
    <dd class="dd left" id="evaluation" name="evaluation">{{ $info['evaluation'] }}</dd>
    <dt class="left">あらすじ</dt>
    <dd class="dd left linefeed">{!! nl2br(e($info['story'])) !!}</dd>
    <dt class="left">感想</dt>
    <dd class="dd left linefeed">{!! nl2br(e($info['impression'])) !!}</dd>
  </div>

  </table>
  <div id="login_box">
    <button class="center" id="sending" type="submit">投稿</button>
    <p class="center"><a href="/post">戻る</a></p>
  </div>
    <p class="center" id="back"><a href="/index">マイページに戻る</a></p>
  

  <footer>
  @include('players.footer')
  </footer>
</body>
</html>

<script>
</script>
