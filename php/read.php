<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/earlyaccess/jejumyeongjo.css" rel="stylesheet">
<title> MOODSIC Tracker:: Diaries </title>

</head>
<body>
  <div id="writing">
		<?php
		$content=$this->myfile->getContent();
		$content=explode("&%$", $content);
		$ddate=$this->myfile->getFileName();
		$ddate=explode("_", $ddate);
		$dday=explode(".", $ddate[1]);
		?>
      <div id="image">
        <a href="index.php?action=list&user=<?php print $this->myfile->user?>&ym=<?php print $this->myfile->ym?>"><img id="back" src="img/left-arrow.png" style="opacity:0.3; width:50px; margin: 40px"></a>
        <?php print "<img id='img' src='".$content[3]."' width=250px>"?>
     </div>
    <div id="menu">
			<?php
				print "<a href=index.php?action=del&user=".$this->myfile->user."&ym=".$this->myfile->ym."&fname=".$this->myfile->getFileName().">삭제</a><br>";
			?>
			<img id="more" src="img/more.png" style="width:40px;opacity:0.5;">
    </div>
		<div id="date">
    <div class="date"><?php print $ddate[0]?></div>
		<div class="date"><?php print strtoupper($dday[0])?></div>
	</div>

		<div id='song'>
		<div style='float:left'><img src='../img/playericon/재생.png' width=100px></div>
		<div style='float:left; padding-top:0px;'>
		<p  id='songname'><?php print $content[1] ?>
		<p  id='artistname'><?php print $content[2] ?>
		</div>
		</div>

    <div id='tag'>
			<?php $tagarr=$this->myfile->getTag();
				$tagarr=explode('#', $tagarr);
				foreach($tagarr as $tagval){
					if($tagval!=''){
							print "<p class='tag'>#".$tagval;
					}
				}
			?>

    </div>
		<?php
    print "<div id='article' class='jeju'>".$content[0]."</div>";
		?>



  </div>
</body>
<link rel="stylesheet" type="text/css" href="css/viewdiary.css">
</html>
