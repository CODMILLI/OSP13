

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/viewdiary.css">
<link rel="stylesheet" type="text/css" href="css/write.css">
<title> MOODSIC Tracker:: Diaries </title>

</head>
<body>
  <form name="f1" action="index.php?action=write&user=<?php print $this->myfile->user?>&ym=<?php print $this->myfile->ym?>" method="post">
  <div id="writing">
      <div id="image">
        <a href="index.php?action=list&user=<?php print $this->myfile->user?>&ym=<?php print $this->myfile->ym?>"><img id="back" src="img/left-arrow.png" style="opacity:0.3; width:50px; margin: 40px"></a>
        <img id='img' src='../img/playericon/none.png' width=250px>
     </div>
    <div id="menu">
      <input type="button" value="save" onclick="f1.submit();">
			<img id="more" src="img/more.png" style="width:40px;opacity:0.5;">
      <input type="hidden" value="false" name="result">
    </div>
		<div id="date">
      <?php $dd=explode("_", substr($_GET['fname'], 0, -4)); ?>
      <div class="date"><?php print $dd[0]?></div>
      <div class="date" style="opacity:0.7"><?php print strtoupper($dd[1])?></div>
	</div>

		<div id='song'>
		<div style='float:left'><img src='../img/playericon/재생.png' width=100px></div>
		<div style='float:left; padding-top:0px;'>
		<p  id='songname'>ddd
		<p  id='artistname'>ddd
		</div>
		</div>

    <img id="line" src="../img/leftsideicon/메뉴_선.png">

	<textarea id ="tag_" class="jeju" name="tag" value="#태그" style="background-color:transparent;border:0;font-family: 'Jeju Myeongjo'; font-size:15px;" placeholder="#태그"></textarea><br>

		<textarea id='article_' class="jeju" name="content" style="background-color:transparent;border:0;font-family: 'Jeju Myeongjo';font-size:15px;" placeholder="내용을 입력하세요." ></textarea><br>

<input type="text" name="fname" value='<?php print substr($_GET['fname'],0,-4)?>' style="display:none">


  </div>

  </form>
</body>

</html>
