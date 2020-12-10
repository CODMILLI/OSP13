<?php
print "<h3>그림일기</h3>";
print "<a href='index.php?action=writeForm'>일기쓰기</a><br><br>";
foreach ($this->data as $f){
	print "<a href=index.php?action=read&fname=".$f.">".$f."</a><br>";

}
?>
