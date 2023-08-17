<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>カレンダー</title>
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
  <h2 class="title center">カレンダー</h2>
  <h3 class="title center">{{$calender['year']}} 年 {{$calender['month']}} 月</h3>
  <table class="calender">
  <tr>
    <th class="week under_line">日</th>
    <th class="week under_line">月</th>
    <th class="week under_line">火</th>
    <th class="week under_line">水</th>
    <th class="week under_line">木</th>
    <th class="week under_line">金</th>
    <th class="week under_line">土</th>
  </tr> 
  <div>
  <tr>
    
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
  </div>




  </table>


  <p class="center"><a href="/index">マイページに戻る</a></p>

  <footer>
  @include('players.footer')
  </footer>
</body>
</html>

<script>
</script>