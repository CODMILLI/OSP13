<?php date_default_timezone_set('Asia/Seoul');
$user = $_GET['user'];
$dir = "contents/" . $user;
$ym = date("Y.m");
$dat = date('Y.m.d_D') . ".txt";
if (file_exists($dir . "/" . $ym . "/" . $dat)) {
  $str = file_get_contents($dir . "/" . $ym . "/" . $dat);    //현재 소스파일과 위치가 다르기 때문에 경로를 지정하여
  $arr = explode("&%$", $str);
} else {
  $arr = ['', '', '', '', 'img/none.png'];
}
$musiccount = 0;
?>

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> MOODSIC Tracker:: ANALYSIS </title>
  <script src="http://d3js.org/d3.v5.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link href="https://fonts.googleapis.com/earlyaccess/jejumyeongjo.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/entirestyle.css">
  <link rel="stylesheet" type="text/css" href="css/analysis.css">
</head>

<body>
  <div id="wrapper">
    <div class="blur">
      <div class="calender">
        <div class="nav">
          <i class="fas fa-angle-left prev"></i>
          <div class="date">
            <h1></h1>
            <p></p>
          </div>
          <i class="fas fa-angle-right next"></i>
        </div>
      </div>


      <?php //초기경로설정 
      $calym = $this->myfile->ymDir;
      $calym = explode("/", $calym);
      $calym = explode(".", $calym[2]);
      ?>

      <script type='text/javascript' charset='UTF-8'>
        // month에 따라 페이지 다르게 하기 
        let date = new Date(<?php print $calym[0] ?>, <?php print $calym[1] ?> - 1);

        function renderCalender() {
          document.querySelector('.date h1').innerHTML = months[date.getMonth()];
          document.querySelector('.date p').innerHTML = date.getFullYear();
        };

        //const date = new Date();
        const month = date.getMonth();
        const months = ["January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        //  document.querySelector('.date h1').innerHTML = months[date.getMonth()];
        //  document.querySelector('.date p').innerHTML = date.toDateString();

        document.querySelector('.prev').addEventListener('click', () => {
          date.setMonth(date.getMonth() - 1);
          var year = date.getFullYear();
          var month = date.getMonth() + 1;
          if (month < 10) {
            month = "0" + month;
          }
          location.replace("index.php?action=analysis&user=<?php print $user ?>&ym=" + year + "." + month);
          renderCalendar();
        });

        document.querySelector('.next').addEventListener('click', () => {
          date.setMonth(date.getMonth() + 1);
          var year = date.getFullYear();
          var month = date.getMonth() + 1;
          if (month < 10) {
            month = "0" + month;
          }
          location.replace("index.php?action=analysis&user=<?php print $user ?>&ym=" + year + "." + month);
          renderCalendar();
        });

        renderCalender();
      </script>


      <div id="top5canalysis">
        <?php //month에 따른 content 정보들 array에 저장 
        $count = 0;
        $moodtags = array();
        $diarymusics_img = array();
        $diarymusics_title = array();
        $diarymusics_artist = array();

        foreach ($this->data as $f) {

          $day = explode(".", $f);
          $day = explode("_", $day[2]);
          $content = file_get_contents($this->myfile->ymDir . "/" . $f);
          $content = explode("&%$", $content);
          $count += 1;
          $tagarr = explode('#', $content[0]);
          foreach ($tagarr as $tagval) {
            if ($tagval != '') {
              array_push($moodtags, $tagval);
            }
          }

          array_push($diarymusics_title, $content[2]);
          array_push($diarymusics_artist, $content[3]);
          array_push($diarymusics_img, $content[4]);
        }
        ?>
        <?php

        $recent5imgs = array();
        $recent5title = array();
        $recent5artist = array();

        print "<div class='music_ranking'>
                <p id='month_music'>최근에 기록한 음악 TOP3</p>";

        for ($i = 0; $i < 3; $i++) {
          $recentimg = array_pop($diarymusics_img);
          if($diarymusics_img==null){
            $recent5imgs[$i]='img/none.jpeg';
          }
          else{array_push($recent5imgs, $recentimg);}
          $recenttitle = array_pop($diarymusics_title);
          if($diarymusics_title==null){
            $recent5title[$i]='-';
          }
          else{array_push($recent5title, $recenttitle);}
          $recentartist = array_pop($diarymusics_artist);
          if($diarymusics_artist==null){
            $recent5artist[$i]='입력된 노래가 없습니다.';
          }
         else {array_push($recent5artist, $recentartist);}
          

          print "<div class='rankingbox'>
                    
                    <img class='musicimg' src='" . $recent5imgs[$i] . "'>
                    <div class='song'>
                      <p id='ranking-num'>" . (string)($i + 1) . "</p>
                      <div class='musictitle'>" . $recent5title[$i] . "</div>
                      <div class='artistname'>" . $recent5artist[$i] . "</div>
                    </div>
                  </div>";
        }

        ?>
      </div>

      <!-- <script type="text/javascript" charset="UTF-8"> 
        d3.selectAll("span")
        .datum(function(){return this.dataset;})
        .style("height","0%")
        .style("left",(d,i)=>(i*80+30)+"px")
        .transition().duration(2000)
        .style("height",d=>d.val+"%")
        .style("background","pink");
    </script> -->

        <?php

        $topmoodtags=array();
        $cnt_ary=array();
        $cnt_ary=array_count_values($moodtags);
        arsort($cnt_ary);
        $tag6=array();
        $tagcount=array();
        $top6tags=array_slice($cnt_ary,0,6);
        $tag6=array_keys($top6tags);
        $tagcount=array_values($top6tags);
        $cnt=count($top6tags);
        if ($cnt > 0) { $max_val=max($top6tags);}
        else{$tag6[0]='';}
        print"

        <div class=tagGraph>
        <p id='month_mood'>이번 달 나의 mood 분석<p>
        <div class='announcement'>이번 달 일기 기록 횟수는 총 " . $count . "회입니다.<br>#" . $tag6[0] . " (을)를 이번 달에 가장 많이 느끼셨군요!<br>행복하고 좋은 감정뿐 아니라 부정적인 감정 모두 소중한 우리의 감정입니다.<br>당신의 감정과 나날들을 응원합니다!</div>";
      $i = 0;
      foreach ($top6tags as $key => $val) {
        print "<div class='tag'style='left:" . strval($i * 80) . "px;'>#" . $key . "</div>";
        $i += 1;
      }
      print "<div class='graph'>";
      $i = 0;
      foreach ($top6tags as $key => $val) {
        print "
              <span class='graphbar' data-val=" . (string)round(100 * $val / $max_val) . ">" . $val . "</span>";
        $i += 1;
      }
      for (; $i < 6; $i++) {
        print "<span class='graphbar' data-val='0'></span>";
      }
      print "</div>";
      $i = 0;
      print "<div class='graphText' >";
      foreach ($top6tags as $key => $val) {
        print "
            <div class='tagsText'style='left:" . strval($i * 80) . "px;'>" . $key . "</div>";
        $i += 1;
      }
      for (; $i < 6; $i++) {
        print "
        <div class='tagsText'style='left:" . strval($i * 80) . "px;'>없음</div>";
      }
      print "</div>";
      ?>
    </div>


  </div>
  </div>
  <script type="text/javascript" src="js/moodanalysis.js" charset="UTF-8"> </script>
</body>

</html>