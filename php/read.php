
<h3><?php print $this->myfile->getFileName();?></h3>
<?php
	print "<a href=index.php?action=del&fname=".$this->myfile->getFileName().">삭제</a><br>";
?>
<textarea rows="2" cols="45"><?php print $this->myfile->getTag();?></textarea><br>
<textarea rows="15" cols="45"><?php print $this->myfile->getContent();?></textarea><br>
<a href="index.php?action=list">목록으로 돌아가기</a>
