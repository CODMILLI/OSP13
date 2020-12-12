
<html>
<head>
  <link rel="stylesheet" type="text/css" href="cs.css">
  <link href="https://fonts.googleapis.com/earlyaccess/jejumyeongjo.css" rel="stylesheet">
</head>
<body>
  <div id="wrapper">
  <div class="blur">
    <div id="search">

  <?php
  print "<h3>그림일기</h3>";
  print "<a href='index.php?action=writeForm'>일기쓰기</a><br><br>";
  ?>
<div id="calander" >
  <div class="header">
              <div>
                <div id="month"></div>
                <div id="year"></div>
              </div>

              <div class="nav">
              <button class="nav-btn go-prev" onclick="prevMonth()">&lt;</button>
              <button class="nav-btn go-today" onclick="goToday()">Today</button>
              <button class="nav-btn go-next" onclick="nextMonth()">&gt;</button>
          </div>
          </div>
          <div>
              <div class="days">
                  <div class="day">Sun</div>
                  <div class="day">Mon</div>
                  <div class="day">Tue</div>
                  <div class="day">Wed</div>
                  <div class="day">Thu</div>
                  <div class="day">Fri</div>
                  <div class="day">Sat</div>
              </div>
              <div class="dates">
              </div>
          </div>
</div>

<div id="list">
<?php
foreach ($this->data as $f){

  $day=explode(".", $f);
  $day=explode("_", $day[2]);
  $content= file_get_contents($this->myfile->ymDir."/".$f);
  $content=explode("&%$", $content);

  print "<div class='contentbox'>
    <a href=index.php?action=read&fname=".$f.">
    <div class='daybox'>
    <p class='il'>".$day[0]."
    <p class='yoil'>".$day[1]."
    </div>
    </a>
    <img class='bunddle' src='img/bunddle.png'>
      <a href=index.php?action=read&fname=".$f."><div class='box'>
      <div class='tag'>".$content[0]."</div>
            <img class='diaryimg' src='".$content[4]."'>
        <div class='dailylog'>
          <div class='song'>
            <div class='songname'> ▶ &nbsp ".$content[2]."</div>
            <div class='artistname'>- ".$content[3]."</div>
          </div>
        <div class='article'>".$content[1]."</div>
      </div>
    </div></a>
  </div>";
  print "
  <script type='text/javascript' src ='js/calander.js' charset='UTF-8'> </script>";
  print "
  <script type='text/javascript'>
      document.getElementById('img".(int)$day[0]."').src= '".$content[4]."';
      document.getElementById('imghref".(int)$day[0]."').href= 'index.php?action=read&fname=".$f."';
  </script>
  ";


}
?>
</div>
</div>
</div>
</body>
<link rel="stylesheet" type="text/css" href="css/calander.css">
<link href="https://fonts.googleapis.com/earlyaccess/jejumyeongjo.css" rel="stylesheet">
</div>
</html>
