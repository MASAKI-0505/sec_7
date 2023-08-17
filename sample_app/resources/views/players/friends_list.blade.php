<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>友達一覧</title>
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
  <h2 class="center title">友達一覧</h2>

  <div class="layout">
    <table>
    <tr>
      <th class="old_review">ユーザーID</th>
      <th class="old_review">名前</th>
    </tr>
    @foreach($review as $column)
    <tr>
      <td class="old_review">{{ $column->friend_user_id }}</td>
      <td class="old_review"><a href="/friend_index?user_id={{ $column->id }}" >{{ $column->name }}</a></td>
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