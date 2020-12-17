<?php
$w=$_GET['w'];
$playlist='contents/playlist.txt';
$songs = file_get_contents($playlist);
$songs = explode('_@_', $songs);
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/viewdiary.css">
<link rel="stylesheet" type="text/css" href="css/write.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<title> MOODSIC Tracker:: Diaries </title>

</head>
<body>
  <form name="f1" action="index.php?action=write&user=<?php print $this->myfile->user?>&ym=<?php print $this->myfile->ym?>" method="post">
  <div id="writing">
    <div id="menu">
      <input type="image" src="img/checked.png" style="width:30px;opacity:0.5;font-size:15px;">
      <input type="hidden" value="false" name="result">
    </div>
		<div id="date">
      <?php $dd=explode("_", substr($_GET['fname'], 0, -4)); ?>
      <div class="date"><?php print $dd[0]?></div>
      <div class="date" style="opacity:0.7"><?php print strtoupper($dd[1])?></div>
	</div>
  <?php
  $file="contents/".$this->myfile->user."/".$this->myfile->ym."/".$_GET['fname'];
  if($w==-1){
    if(file_exists($file)){
      $str = file_get_contents($file);		//현재 소스파일과 위치가 다르기 때문에 경로를 지정하여
      $arr = explode("&%$", $str);
      print "
      <div id='image'>
        <a href='index.php?action=list&user=".$this->myfile->user."&ym=".$this->myfile->ym."'><img id='back' src='img/left-arrow.png' style='opacity:0.3; width:50px; margin: 40px'></a>
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
    }
      else{
        print "
        <div id='image'>
          <a href='index.php?action=list&user=".$this->myfile->user."&ym=".$this->myfile->ym."'><img id='back' src='img/left-arrow.png' style='opacity:0.3; width:50px; margin: 40px'></a>
          <img id='img' src='img/none.png' style='opacity:0.4' width=250px>
       </div>
        <div id='song'>
    		<div style='float:left'><img src='../img/playericon/재생.png' width=100px></div>
    		<div style='float:left; padding-top:0px;'>
    		<p  id='songname'>
    		<p  id='artistname'>
    		</div>
    		</div>
        <img id='line' src='../img/leftsideicon/메뉴_선.png'>
    	<textarea id ='tag_' class='jeju' name='tag' value='#태그' style='background-color:transparent;border:0;font-family: `Jeju Myeongjo`; font-size:15px;' placeholder='#태그'></textarea><br>
    		<textarea id='article_' class='jeju' name='content' style='background-color:transparent;border:0;font-family: `Jeju Myeongjo`;font-size:15px;' placeholder='내용을 입력하세요.' ></textarea><br>
        ";
        print"<div id='modal'>
          <div class='modal_content'>
            <div style='height:30px; width:300px;'>
                <br>
                <p>  &nbsp ▶ 플레이리스트에서 선택하기
                <p id='dd'></p>

          </div>
            <br><br>";


                       $i=0;
                       foreach ($songs as $s){
                         $songarr = explode('&%$', $s);
                         print
                         "<div id='s".$i."' class='song' onmouseover='this.style.backgroundColor=`#eaeaea`' onmouseout='this.style.backgroundColor=`#f6f6f6`'>
                         <img src='".$songarr[2]."' width=60px style='float:left'>
                         <div style='float:left; padding:13px'>
                           <div class='songname' >".$songarr[0]."</div>
                           <div class='artistname'>".$songarr[1]."</div>
                         </div>
                           </div>";
                         $i++;

                       }
         print"</div><div class='modal_layer'></div>";
         print"
         <script>
         $('.song').on('click', function () {
           var a= $(this).attr('id');
           a=a.substr(1);
           document.getElementById('modal').style.display='none';
         location.replace('index.php?action=writeForm&user=".$_GET['user']."&ym=".$_GET['ym']."&fname=".$_GET['fname']."&w='+a);
       });</script>";



  }

     }
     else{
       $selected = $songs[$w];
       $divided=explode("&%$", $selected);
   print "
       <div id='image'>
         <a href='index.php?action=list&user=".$this->myfile->user."&ym=".$this->myfile->ym."'><img id='back' src='img/left-arrow.png' style='opacity:0.3; width:50px; margin: 40px'></a>
         <img id='img' src='".$divided[2]."' width=250px>
      </div>
       <div id='song'>
      <div style='float:left'><img src='../img/playericon/재생.png' width=100px></div>
      <div style='float:left; padding-top:0px;'>
      <p  id='songname'>".$divided[0]."
      <p  id='artistname'>".$divided[1]."
      </div>
      </div>
       <img id='line' src='../img/leftsideicon/메뉴_선.png'>
    <textarea id ='tag_' class='jeju' name='tag' value='#태그' style='background-color:transparent;border:0;font-family: `Jeju Myeongjo`; font-size:15px;' placeholder='#태그'></textarea><br>
      <textarea id='article_' class='jeju' name='content' style='background-color:transparent;border:0;font-family: `Jeju Myeongjo`;font-size:15px;' placeholder='내용을 입력하세요.' ></textarea><br>
       ";
     }
  ?>



<input type='text' name='selectsong' value='<?php print $selected?>' style="display:none">
<input type="text" name="fname" value='<?php print substr($_GET['fname'],0,-4)?>' style="display:none">

  </div>

  </form>



  </div>

</body>
</html>
