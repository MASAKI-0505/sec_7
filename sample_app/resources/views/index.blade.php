<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>my_page</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js”></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

  <header>
    @include('players.header')
  </header>
  <section id="section_1">
  <p class = "left">あなたのID:{{ $id }}</p>
  <p class="center title">マイページ</h1>
  
  <div class="center">
    <!-- <div class="center" id = "icon"> アイコン表示</div> -->
    <button id = "send"><a href = "/post">投稿</a></button>
  </div>
  </section>
  <section id="section_2">
  <p class="center title">過去の投稿一覧</p>
  <!-- リストを追加 -->
  <div class="layout">
    <table>
    <tr>
      <!-- <th>更新日</th> -->
      <th class="old_review center">タイトル</th>
      <th class="old_review center">ジャンル</th>
      <th class="old_review center">年代</th>
      <th class="old_review center">評価</th>
      <th class="old_review center">あらすじ</th>
      <th class="old_review center">感想</th>
    </tr>
    @foreach($review as $column)
    <tr>
      <!-- <td>{{ $column->created_at }}</td> -->
      <td class="old_review"><a href="/old_review?user_id={{ $id }}&review_id={{ $column->review_id }}">{{ $column->title }}</a></td>
      <td class="old_review">{{ $column->category }}</td>
      <td class="old_review center">{{ $column->age }}</td>
      <td class="old_review center">{{ $column->evaluation }}</td>
      <td class="old_review">{!! nl2br(e($column->story)) !!}</td>
      <td class="old_review">{!! nl2br($column->impression) !!}</td>
    </tr>
      @endforeach
    </table>
</div>
  <p id="more"><a href="/old_review_list?user_id={{$id}}">全て表示</a></p>
  </section>

  <section id="section_3">
    <p class="center title"><a href="/calendar">カレンダー</a></p>
    <!-- 予定を追加 -->
    @php
      $calender['year'] = date('Y');
      $calender['month'] = date('m');
      $calender['day'] = date('j');
      $calender['first_weekday'] = date("w", mktime(0, 0, 0, $calender['month'], 1, $calender['year']));
    @endphp
    <p class="center">{{ $calender['year'] }}年{{ $calender['month'] }}月</p>
    <div class="center">
      <table class="calender">
        <tr class="center">
          <th class="week under_line">日</th>
          <th class="week under_line">月</th>
          <th class="week under_line">火</th>
          <th class="week under_line">水</th>
          <th class="week under_line">木</th>
          <th class="week under_line">金</th>
          <th class="week under_line">土</th>
        </tr>
        @for ($i = 1; $i <= $calender['first_weekday']; $i++) 
          <td class="week"> </td>
        @endfor
        @php
          $d = 1;
        @endphp
        @while (checkdate($calender['month'], $d, $calender['year'])) 
          <td class="week">
          <a id="day" href="/plan"> {{$d}} </a>
          @php
            $d = sprintf('%02d', $d);
            $day = $calender['year']. "-". $calender['month']. "-". $d
          @endphp
        
          @foreach($plan as $column)  
            @if ($column->day == $day) 
              </br>
              <a> {{$column->plan}}</a>
            @endif
          @endforeach
          </td>
          @if (date("w", mktime(0, 0, 0, $calender['month'], $d, $calender['year'])) == 6) 
            </tr>
          @endif
          <!-- {{ $d++ }} -->
        @endwhile
      </table>
    </div>
  </section>
  <footer>
  @include('players.footer')
  </footer>
</body>
</html>

<script>
</script>