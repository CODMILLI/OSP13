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
      <div id="overflow">
        <div id="search">
          <form name="f1" action="songsearch.php" method="post">
            <input id="songsearch" type="text" name="keyword" minlength="1"></input>
            <input type="image" src="../img/loupe.png" style="opacity:0.5; width:15px;"></input>
          </form>
        </div>
        <img
  width=30px style="padding-left:100px" src="http://alexsignorini.com/5cf4d9ce73a623bc36b6dc78_equalizer.gif">
        <div style="width:1100px; height: 30px;">
          <div id="area1">
            <div id="today">
              <div style="float: left">
                <p style="font-size:30px; font-weight:200;"><?php print date('Y.m.d') ?></p>
                <p style="font-size:40px; width:300px;float:left; font-weight:400">오늘의 MOODSIC</p>
              </div>
              <div style="float:left; padding-top:5px; padding-top:24px; padding-left:10px;">
                <a href="index.php?action=writeForm&user=<?php print $user?>&ym=<?php print $ym ?>&fname=<?php print $date ?>&w=-1">
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
    <div style="float:left; width: 90%;">
        <p style="font-size:20px;padding-bottom:10px; font-weight: 400; text-decoration:none; color:#303030;"> Today's Hot Mood
          <div class='tag'>#금요일</div>
          <div class='tag'>#기분좋은</div>
          <div class='tag'>#따뜻한</div>
          <div class='tag'>#힐링</div>
          <div class='tag'>#기분전환</div>
          <div class='tag'>#설렘</div>
          <div class='tag'>#첫눈</div>
          <div class='tag'>#크리스마스</div>

    </div>

  </div>
</div>
</body>
</html>
