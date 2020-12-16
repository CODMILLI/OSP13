<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/viewdiary.css">
  <link rel="stylesheet" type="text/css" href="css/write.css">
  <title> MOODSIC Tracker:: Diaries </title>

</head>

<body>
  <form name="f1" action="index.php?action=write&user=<?php print $this->myfile->user ?>&ym=<?php print $this->myfile->ym ?>" method="post">
    <div id="writing">
      <div id="menu">
        <input type="button" value=" save " onclick="f1.submit();" style="background:#323232; padding:5px; color:white; font-family:'jejumyeongjo'; font-size:15px;">
        <input type="hidden" value="false" name="result">
      </div>
      <div id="date">
        <?php $dd = explode("_", substr($_GET['fname'], 0, -4)); ?>
        <div class="date"><?php print $dd[0] ?></div>
        <div class="date" style="opacity:0.7"><?php print strtoupper($dd[1]) ?></div>
      </div>
      <?php
      $file = "contents/" . $this->myfile->user . "/" . $this->myfile->ym . "/" . $_GET['fname'];
      if (file_exists($file)) {
        $str = file_get_contents($file);    //현재 소스파일과 위치가 다르기 때문에 경로를 지정하여
        $arr = explode("&%$", $str);
        print "
     <div id='image'>
       <a href='index.php?action=list&user=" . $this->myfile->user . "&ym=" . $this->myfile->ym . "'><img id='back' src='img/left-arrow.png' style='opacity:0.3; width:50px; margin: 40px'></a>
       <img id='img' src='$arr[4]' width=250px>
    </div>
     <div id='song'>
 		<div style='float:left'><img src='../img/playericon/재생.png' width=100px></div>
 		<div style='float:left; padding-top:0px;'>
 		<p  id='songname'>$arr[2]
 		<p  id='artistname'>$arr[3]
 		</div>
 		</div>
     <img id='line' src='../img/leftsideicon/메뉴_선.png'>
 	  <textarea id ='tag_' class='jeju' name='tag' style='background-color:transparent;font-size:15px;border:0;font-family: 'Jeju Myeongjo'; ' placeholder='#태그'>$arr[0]</textarea><br>
 		<textarea id='article_' class='jeju' name='content' style='background-color:transparent;border:0;font-size:15px;font-family: 'Jeju Myeongjo';' placeholder='내용을 입력하세요.' >$arr[1]</textarea><br>
     ";
      } else {
        print "
       <div id='image'>
        <a href='index.php?action=list&user=" . $this->myfile->user . "&ym=" . $this->myfile->ym . "'><img id='back' src='img/left-arrow.png' style='opacity:0.3; width:50px; margin: 40px'></a>
        <img id='img' src='img/none.png' style='opacity:0.4' width=250px>
      </div>
      <div id='song'>
   		<div style='float:left'><img src='../img/playericon/재생.png' width=100px></div>
   		<div style='float:left; padding-top:0px;'>
   		<p id='songname'>-
   		<p id='artistname'> 오늘의 MOODSIC을 선택하세요.
   		</div>
   		</div>
      <img id='line' src='../img/leftsideicon/메뉴_선.png'>
   	  <textarea id ='tag_' class='jeju' name='tag' value='#태그' style='background-color:transparent;border:0;font-family: `Jeju Myeongjo`; font-size:15px;' placeholder='#태그'></textarea><br>
   		<textarea id='article_' class='jeju' name='content' style='background-color:transparent;border:0;font-family: `Jeju Myeongjo`;font-size:15px;' placeholder='내용을 입력하세요.' ></textarea><br>
      <textarea id ='title_' class='jeju' name='title' style='background-color:transparent;border:0;font-family: `Jeju Myeongjo`; font-size:15px;' placeholder='노래 제목'></textarea><br>
   		<textarea id='artist_' class='jeju' name='artist' style='background-color:transparent;border:0;font-family: `Jeju Myeongjo`;font-size:15px;' placeholder='아티스트명' ></textarea><br>
      <textarea id ='thumbnail_' class='jeju' name='thumbnail' style='background-color:transparent;border:0;font-family: `Jeju Myeongjo`; font-size:15px;' placeholder='앨범 이미지 주소'></textarea><br>
      <textarea id ='url_' class='jeju' name='thumbnail' style='background-color:transparent;border:0;font-family: `Jeju Myeongjo`; font-size:15px;' placeholder='노래 플레이 URL'></textarea><br>
   		";
      }
      ?>

      <input type="text" name="fname" value='<?php print substr($_GET['fname'], 0, -4) ?>' style="display:none">


    </div>

  </form>
</body>

</html>