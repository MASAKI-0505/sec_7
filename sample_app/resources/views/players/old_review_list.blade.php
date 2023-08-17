<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>過去の投稿</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/old_review_list.css') }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js”></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

  <header>
  @include('players.header')
  </header>
  <a></a>
  <h2 class="center title">{{ $name->name }} さんの過去の投稿一覧</h2>
  <div id="layout">
  <table>
  <tr>
    <th class="old_review">視聴日</th>
    <th class="old_review">タイトル</th>
    <th class="old_review">ジャンル</th>
    <th class="old_review">年代</th>
    <th class="old_review">評価</th>
    <th class="old_review">あらすじ</th>
    <th class="old_review">感想</th>
    <th class="old_review">投稿日時</th>
  </tr>
  @foreach($review as $column)
  <tr>
    <td class="old_review">{{ $column->day }}</td>
    <td class="old_review"><a href="/old_review?user_id={{ $name->id }}&review_id={{ $column->review_id }}">{{ $column->title }}</a></td>
    <td class="old_review">{{ $column->category }}</td>
    <td class="old_review">{{ $column->age }}</td>
    <td class="old_review">{{ $column->evaluation }}</td>
    <td class="old_review">{{ nl2br($column->story) }}</td>
    <td class="old_review">{{ nl2br($column->impression) }}</td>
    <td class="old_review">{{ $column->created_at }}</td>
  </tr>

    @endforeach
  </table>
</div>

  <p class="center" id="back"><a href="/index">マイページに戻る</a></p>

  <footer>
  @include('players.footer')
  </footer>
</body>
</html>

<script>
</script>