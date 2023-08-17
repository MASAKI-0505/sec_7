<head>
  <meta charset="UTF-8">
  <title>Lesson Sample Site</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js”></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<header class="contact">
  <h1 class="center">movie diary</h1>
  <div class="hamburger">
    <span class="bar bar-top"></span>
    <span class="bar bar-middle"></span>
    <span class="bar bar-bottom"></span>
  </div>

  <nav class="nav-02">
    <ul>
      <li class="link"><a href="/index">マイページ</a></li>
      <li class="link"><a href="/post">投稿</a></li>
      <li class="link"><a href="/old_review_list?user_id={{$id}}">過去の投稿一覧</a></li>
      <li class="link"><a href="/plan">予定登録</a></li>
      <li class="link"><a href="/calendar">カレンダー</a></li>
      <li class="link"><a href="/friends_list?user_id={{ $id }}">友達一覧</a></li>
      <li class="link"><a href="/user_setting">設定</a></li>
      <li class="link"><a href="/login">ログアウト</a></li>
    </ul>
  </nav>

</header>
<script>
  $('.hamburger').on('click',function() {
    $('.nav-02').toggleClass('nav-02-active');
    $('.hamburger').toggleClass('close');
  });
</script>