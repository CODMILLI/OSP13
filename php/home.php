<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> MOODSIC Tracker:: HOME </title>
<link rel="stylesheet" type="text/css" href="../css/entirestyle.css">
<link rel="stylesheet" type="text/css" href="css/calander.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link href="https://fonts.googleapis.com/earlyaccess/jejumyeongjo.css" rel="stylesheet">

</head>
<body>
  <?php
  date_default_timezone_set('Asia/Seoul');
   $user= $_GET['user'];
   $dir="contents/".$user;
   $ym=date("Y.m");
   $date=date('Y.m.d_D').".txt";
   if(file_exists($dir."/".$ym."/".$date)){
     $str = file_get_contents($dir."/".$ym."/".$date);		//현재 소스파일과 위치가 다르기 때문에 경로를 지정하여
     $arr = explode("&%$", $str);
   }
  else{
    $arr=['','오늘의 일기가 아직 작성되지 않았습니다.<br>MOODSIC을 통해 오늘 하루를 음악으로 기록해보세요.','-','moodsic','img/none.jpeg'];
  }
   ?>


  <div id="wrapper"
   style="background-image:  url(../img/white.png),url(<?php print $arr[4] ?>);
    background-size: 100%;
    background-repeat:no-repeat;">
    <div class="blur">
    </div>
  </div>

      <div id="search" >

      </div>
      <div id="overflow">
        <img
  width=50px style="padding-left:100px" src="http://alexsignorini.com/5cf4d9ce73a623bc36b6dc78_equalizer.gif">
        <div style="width:1100px; height: 30px;">
          <div id="area1">
            <div id="today">
              <div style="float: left">
                <p style="font-size:30px; font-weight:200;"><?php print date('Y.m.d') ?></p>
                <p style="font-size:40px; width:300px;float:left; font-weight:400">오늘의 MOODSIC</p>
              </div>
              <div style="float:left; padding-top:5px; padding-top:24px; padding-left:10px;">
                <a href="index.php?action=writeForm&user=<?php print $user?>&ym=<?php print $ym ?>&fname=<?php print $date ?>">
                  <img class="write" src="../img/write.png"></a></div>
            </div>

            <div id="written">
              <div id="song">
                <div style="float:left"><img src="../img/playericon/재생.png" width=100px></div>
                <div style="float:left; padding-top:30px;">
                  <p  id="songname"><?php print $arr[2] ?>
                  <p  id="artistname"><?php print $arr[3] ?>
                </div>
              </div>
              <div id="article">
                <p class="jeju"><?php print $arr[1] ?>
              </div>
            </div>
          </div>

          <div id="area2">
            <img src="<?php print $arr[4] ?>" width=250px>
          </div>

          <div id="area3">
    <div style="float:left">
        <a href="<?php print "index.php?action=list&user=".$user."&ym=".$ym?>"<p style="font-size:20px; width:300px;padding-bottom:20px; text-decoration:none; color:#303030;"> 다이어리 캘린더 ></a>
        <div id="calander" style="padding-top:10px;">
          <div class="header" >
                      <div>
                        <div id="month"></div>
                        <div id="year"></div>
                      </div>

                  </div>
                  <div >
                      <div class="days" style="margin: 10px 0 5px;">
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

        <script type='text/javascript' charset='UTF-8'>
        let date = new Date();
        const month=["JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC"];

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
            dates[i] = `<div class="date" style="text-align: right;"> ${date}</div>`;

          })

          // Dates 그리기
          document.querySelector('.dates').innerHTML = dates.join('');

        }

        renderCalendar();

                    </script>
    </div>
    <div style="float:left; padding-left:150px;">
        <p style="font-size:20px; width:300px;padding-bottom:20px;"> 나와 같은 MOOD >
      <div id="playlist">
      </div>
    </div>


  </div>
</div>
</body>
</html>
