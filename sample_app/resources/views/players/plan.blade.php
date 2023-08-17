<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>予定</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/plan.css') }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js”></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

  <header>
    @include('players.header')
  </header>
  
  <h2 class="title center">予定入力フォーム</h2>
  <form method="POST" action="/plan_complete">
  @csrf
  <div  id="layout">
  <input id="day" name="day" type="date"></input> 
  

  <textarea class="left" id="plan" name="plan" placeholder="予定を入力してください。"></textarea>
</div>
  <div class="center"  id="login_box">
    <button class="center"  id="sending" type="submit">決定</button>

    <p class="center" id="back"><a href="/index">マイページに戻る</a></p>
  </div>

  <footer>
  @include('players.footer')
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
