<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>編集画面</title>
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
  
    @if (!empty($error))
    <p>{{ $error }}</p>
    @endif
    <h2 class="center title">編集画面</h2>
  <div class="layout">
    <form id='post' method="POST" action="post_edit_complete?review_id={{ $review->id }}">
    @csrf
    <div class="box">
      <dd class="font_small">視聴日</dd>
      <dd><input name="day" type="date" value="{{ $review->day }}" ></input></dd>
    </div>
    <div class="box">
      <dd class="font_small">タイトル</dd>
      <dd><input class="left" id="title" name="title" placeholder="" value="{{ $name->title }}"></input></dd>
    </div>
    <div class="box">
      <dd class="font_small text_box">ジャンル</dd>
      <dd><select class="left" name="category">
        <option>アクション映画</option>
        <option>SF映画</option>
        <option>コメディ映画</option>
        <option>サスペンス映画</option>
        <option>時代劇</option>
        <option>児童映画</option>
        <option>スリラー映画</option>
        <option>スポーツ映画</option>
        <option>青春映画</option>
        <option>西部劇</option>
        <option>音楽映画</option>
      </select></dd>
    </div>
    <div class="box">
      <dd class="font_small">年代</dd>
      <dd><select class="left" name="age">
        <option>1950 年代</option>
        <option>1960 年代</option>
        <option>1970 年代</option>
        <option>1980 年代</option>
        <option>1990 年代</option>
        <option>2000 年代</option>
        <option>2010 年代</option>
        <option>2020 年代</option>
      </select></dd>
    </div>
    <div class="box">
      <dd class="font_small">評価</dd>
      <dd><select class="left" name="evaluation">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select></dd>
    </div>
    <div class="box">
      <dd class="font_small">あらすじ</dd>
      <dd><textarea class="left" id="story" name="story" placeholder="">{{ (($review->story)) }}</textarea></dd>
    </div>
    <div class="box">
      <dd class="font_small">感想</dd>
      <dd><textarea class="left" id="impression" name="impression" placeholder="">{{ (($review->impression)) }}</textarea></dd>
    </div>
  </div>
  <div class="center">
    <button class="center" id="sending" type="submit">変更</button>
  </div>
  <p class="center" id="back"><a href="/old_review_list?user_id={{ $review->user_id }}">一覧に戻る</a></p>

  <p class="center" id="back"><a href="/index">マイページに戻る</a></p>
  

  <footer>
  @include('players.footer')
  </footer>
</body>
</html>

<script>

  $(function(){
    $("#sending").on("click", function(){
      var title = $("#title").val();
      if(title == ""){
        alert ("タイトルを記入してください。");
        return false;
      }
      
      
      if(confirm("変更しますか？")){
        return true;
      } else {
        return false;
      }
    });
  });
</script>
