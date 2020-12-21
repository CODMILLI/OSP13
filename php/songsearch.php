<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> MOODSIC Tracker:: HOME </title>
<link rel="stylesheet" type="text/css" href="../css/entirestyle.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="css/write.css">
<link href="https://fonts.googleapis.com/earlyaccess/jejumyeongjo.css" rel="stylesheet">

</head>
<body style="background:EAEAEA">
  <div id="wrapper">
    <div class="blur">
    </div>
  </div>
      <div id="overflow">
        <div id="search">
          <form name="f1" action="songsearch.php" method="post">
            <input id="songsearch" type="text" name="keyword" minlength="1" value="<?php $keyword=$_POST['keyword'] ?>"></input>
            <input type="image" src="../img/loupe.png" style="opacity:0.5; width:15px;"></input>
          </form>
        </div>

        <div style="padding:30px; padding-left:80px">
            <p style="padding-bottom:20px"> "<?php $keyword; print $keyword?>" 검색 결과

  <?php

  header('Content-Type: text/html; charset=UTF-8'); //simple_html_dom php 파일을
  include('simple_html_dom.php');

  $keyword=str_replace(' ','%20', $keyword);
  $url = 'https://www.genie.co.kr/search/searchMain?query='.$keyword;
  $html = @file_get_html($url);


  $arr = $html->find('table.list-wrap'); //1위 ~ 3위 랭킹순위 및 프로그램명 가져오기
  if(count($arr)!=0){
    $arr_result=$arr[0]->find('td.info>a[class=title ellipsis]');
    $arr_artist = $arr[0]->find('td.info>a[class=artist ellipsis]');
    $imgarr = $html->find('a.cover>img');

    if(count($arr_artist) > 0){ //위의 이미지에서 a 태그에 포함되는 html dom 객체를 가져옴
      for($i=0;$i<count($arr_result);$i++){ //children 속성을 이용해 맨 처음(0)의 태그 가져오기(<span class="rank_num">1</span>값 가져옴)
        if($arr_result[$i]->find('span[class=icon icon-title]')){
          $song= substr($arr_result[$i]->plaintext,100)."<br>";
        }
        else{
            $song= $arr_result[$i]->plaintext."<br>";
        }
        echo"
        <div id='song' style='height:100px;width:1000px; '>
          <div style='float:left'><img width=65px style='padding: 5px; padding-right:20px;' src=".$imgarr[$i]->src."><br><br></div>
          <div style='float:left; padding-top:20px;'>
            <p  id='songname' style='font-size:16px;'>".$song."
            <p  id='artistname'style='font-size:14px;'>".$arr_artist[$i]->plaintext."
          </div>
        </div>
        ";
      }

  }
  }
  else {
    echo ": 검색결과가 없습니다.";
  }

   ?>

      </div>

  </div>
</div>
</body>
</html>
