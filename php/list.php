<?php   date_default_timezone_set('Asia/Seoul');
   $user= $_GET['user'];
   $dir="contents/".$user;
   $ym=date("Y.m");
   $dat=date('Y.m.d_D').".txt";
   if(file_exists($dir."/".$ym."/".$dat)){
     $str = file_get_contents($dir."/".$ym."/".$dat);		//현재 소스파일과 위치가 다르기 때문에 경로를 지정하여
     $arr = explode("&%$", $str);
   }
  else{
    $arr=['','','','','img/none.png'];
  }
    ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="cs.css">
  <script src="//code.jquery.com/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/earlyaccess/jejumyeongjo.css" rel="stylesheet">
</head>
<body>
  <div id="wrapper" style=" background-image:  url(<?php print $arr[4]?>);
    background-size: 100%;
   background-repeat:no-repeat;">
  <div class="blur">
    <div id="search">
            <img src="img/search.png" width=420px>
    </div>
  <?php
  $calym=$this->myfile->ymDir;
  $calym=explode("/",$calym);
  $calym=explode(".",$calym[2]);
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
<?php
$calym=$this->myfile->ymDir;
$calym=explode("/",$calym);
$calym=explode(".",$calym[2]);
 ?>
<script type='text/javascript' charset='UTF-8'>
let date = new Date(<?php print $calym[0]?>, <?php print $calym[1]?>-1);
const month=["JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC"];
const yoil=["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];

const renderCalendar = () => {
  const viewYear = date.getFullYear();
  const viewMonth = date.getMonth();

  // year-month 채우기
  document.querySelector('#month').textContent = month[`${viewMonth}`];
  document.querySelector('#year').textContent = `${viewYear}`;

  // 지난 달 마지막 Date, 이번 달 마지막 Date
  const prevLast = new Date(viewYear, viewMonth, 0);
  const thisLast = new Date(viewYear, viewMonth + 1, 0);

  const PLDate = prevLast.getDate();
  const PLDay = prevLast.getDay();

  const TLDate = thisLast.getDate();
  const TLDay = thisLast.getDay();

  // Dates 기본 배열들
  const prevDates = [];
  const thisDates = [...Array(TLDate + 1).keys()].slice(1);
  const nextDates = [];

  // prevDates 계산
  if (PLDay !== 6) {
    for (let i = 0; i < PLDay + 1; i++) {
      prevDates.push(" ");
    }
  }
  // nextDates 계산
  for (let i = 1; i < 7 - TLDay; i++) {
    nextDates.push(" ")
  }

  // Dates 합치기
  const dates = prevDates.concat(thisDates, nextDates);


  // Dates 정리
  dates.forEach((date, i) => {
    dates[i] = `<div class="date" style="text-align: right;"> ${date}<br>`;
    if(date!=" "){
      if (date<10){
        date='0'+date;
      }
      dates[i]=dates[i]+`<a id="imghref${date}" href="index.php?action=writeForm&user=<?php print $this->myfile->user?>&ym=<?php print $this->myfile->ym?>&fname=<?php print $this->myfile->ym?>.${date}_${yoil[i%7]}.txt">
        <img id="img${date}" src="img/calander_none.png" style="width:55px; height:55px; border-radius:70px; "
onmouseover="this.src='img/calander_add.png'" onmouseout="this.src='img/calander_none.png'"></div></a>`;
    }
    else {
      dates[i]=dates[i]+"</div>";
    }
    const today= new Date();
    if(viewMonth === today.getMonth && viewYear === today.getFullYear){
      document.getElementById(`imghref${today.getDate()}`).src="씨앙";
    }

  })

  // Dates 그리기
  document.querySelector('.dates').innerHTML = dates.join('');

}

renderCalendar();

const prevMonth = () => {
  date.setMonth(date.getMonth()-1);
  var year=date.getFullYear();
  var month=date.getMonth()+1;
  if(month<10){
    month="0"+month;
  }
  location.replace("index.php?action=list&user=<?php print $user?>&ym="+year+"."+month);
  renderCalendar();

}

const nextMonth = () => {
  date.setMonth(date.getMonth()+1);
  var year=date.getFullYear();
  var month=date.getMonth()+1;
  if(month<10){
    month="0"+month;
  }
  location.replace("index.php?action=list&user=<?php print $user?>&ym="+year+"."+month);
  renderCalendar();
}

const goToday = () => {
  <?php
  $calym=$this->myfile->ymDir;
  $calym=explode("/",$calym);
  $calym=explode(".",$calym[2]);
   ?>
  date = new Date();
  var year=date.getFullYear();
  var month=date.getMonth()+1;
  if(month<10){
    month="0"+month;
  }
  location.replace("index.php?action=list&user=<?php print $user?>&ym="+year+"."+month);
  renderCalendar();
}

</script>

<div id="list">
<?php
foreach ($this->data as $f){

  $day=explode(".", $f);
  $day=explode("_", $day[2]);
  $content= file_get_contents($this->myfile->ymDir."/".$f);
  $content=explode("&%$", $content);

  print "<div class='contentbox'>
    <a href=index.php?action=read&user=".$this->myfile->user."&ym=".$this->myfile->ym."&fname=".$f.">
    <div class='daybox'>
    <p class='il'>".$day[0]."
    <p class='yoil'>".$day[1]."
    </div>
    </a>
    <img class='bunddle' src='img/bunddle.png'>
      <a href=index.php?action=read&user=".$this->myfile->user."&ym=".$this->myfile->ym."&fname=".$f."><div class='box'>
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
  <script type='text/javascript'>
      document.getElementById('img".$day[0]."').src= '".$content[4]."';
      document.getElementById('img".$day[0]."').onmouseover='';
      document.getElementById('img".$day[0]."').onmouseout='';
      document.getElementById('imghref".$day[0]."').href= 'index.php?action=read&user=".$this->myfile->user."&ym=".$this->myfile->ym."&fname=".$f."';
  </script>
  ";


}
?>
</div>
</div>
</div>
</div>
</body>
<link rel="stylesheet" type="text/css" href="css/calander.css">
<link href="https://fonts.googleapis.com/earlyaccess/jejumyeongjo.css" rel="stylesheet">
</html>
