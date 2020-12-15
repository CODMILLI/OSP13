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

  $keyword=trim($_POST['key']);
    ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="cs.css">
  <link href="https://fonts.googleapis.com/earlyaccess/jejumyeongjo.css" rel="stylesheet">
</head>
<body>
  <div id="wrapper" style=" background-image:  url(<?php print $arr[4]?>);
    background-size: 100%;
   background-repeat:no-repeat;">
  <div class="blur">
    <div id="search">
      <form name="f2" action="search.php?user=<?php print $user?>" method="post">
        <input type="text" name="key" value=<?php print $keyword?>>
        <input type="submit">
      </form>
    </div>


<div id="list">
<?php
$dir = "contents/".$user;

// 핸들 획득
$handle  = opendir($dir);

$files = array();

// 디렉터리에 포함된 파일을 저장한다.
while (false !== ($filename = readdir($handle))) {
    if($filename != "." && $filename != ".."){
        $childir=$dir."/".$filename;
        $c=opendir($childir);
        while (false !== ($filename = readdir($c))){
          if(is_file($childir . "/" . $filename)){
              $files[] = $filename;
          }
        }
    }
}
closedir($handle);
closedir($c);
rsort($files);
  $count=0;
// 파일명을 출력한다.
foreach ($files as $f) {
  $day=explode(".", $f);
  $day=explode("_", $day[2]);
  $yym=substr($f, 0, 7);
  $str = file_get_contents($dir."/".$yym."/".$f);		//현재 소스파일과 위치가 다르기 때문에 경로를 지정하여
  $content = explode("&%$", $str);

  if (strpos($content[0], $keyword)!==false||strpos($content[1], $keyword)!==false||strpos($content[2], $keyword)!==false||strpos($content[3], $keyword)!==false){
    $count+=1;
    print "<div class='contentbox'>
      <a href=index.php?action=read&user=".$_GET['user']."&ym=".$yym."&fname=".$f.">
      <div class='daybox'>
      <p class='il'>".$day[0]."
      <p class='yoil'>".$day[1]."
      </div>
      </a>
      <img class='bunddle' src='img/bunddle.png'>
          <a href=index.php?action=read&user=".$_GET['user']."&ym=".$yym."&fname=".$f."><div class='box'>
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
  }
}
 ?>

</div>
<div id="calander" >
<?php echo '"'.$keyword.'"'." 검색 결과: ".$count."건" ?>


</div>
</div>
</div>
</body>
<link rel="stylesheet" type="text/css" href="css/calander.css">
<link href="https://fonts.googleapis.com/earlyaccess/jejumyeongjo.css" rel="stylesheet">
</html>
