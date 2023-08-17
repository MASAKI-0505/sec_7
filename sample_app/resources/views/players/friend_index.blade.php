<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>my_page</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/friend_index.css') }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js”></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>

  <header>
    @include('players.header')
  </header>
<p>あなたのID:{{ $id }}</p>
<p>ユーザーID:{{ $user_id }}</p>
  <section id="section_1">
    <h2 class="center title">{{ $name->name}} さんのページ</h2>
  <div id=layout_1 class="center">
    <!-- <div id = "icon"> アイコン表示</div> -->
    <button id = "send"><a href = "add_friend?user_id={{ $user_id }}">友達に追加</a></button>
    <button id = "send"><a href = "/friends_list?user_id={{ $user_id }}">友達一覧</a></button>
  </div>
  </section>

  <section id="section_2">
  <p class="center title">過去の投稿一覧</p>
    <!-- リストを追加 -->
    <table>
    <tr>
      <th class="old_review center">タイトル</th>
      <th class="old_review center">ジャンル</th>
      <th class="old_review center">年代</th>
      <th class="old_review center">評価</th>
      <th class="old_review center">あらすじ</th>
      <th class="old_review center">感想</th>
    </tr>
    @foreach($review as $column)
    <tr>
      <td class="old_review"><a href="/old_review?user_id={{ $user_id }}&review_id={{ $column->review_id }}">{{ $column->title }}</a></td>
      <td class="old_review">{{ $column->category }}</td>
      <td class="old_review center">{{ $column->age }}</td>
      <td class="old_review center">{{ $column->evaluation }}</td>
      <td class="old_review">{!! nl2br(e($column->story)) !!}</td>
      <td class="old_review">{!! nl2br(e($column->impression)) !!}</td>
    </tr>
    @endforeach
</table>


    <!--  -->
  <p id="more"><a href="/old_review_list?user_id={{ $user_id }}">全て表示</a></p>
  </section>


  </div>
</body>
</html>
  </section>


  <footer>
  @include('players.footer')
  </footer>
</body>
</html>

<script>
    $(function(){
  $("#send").on("click", function(){
    alert("友達登録しました。");
  });
});
</script>