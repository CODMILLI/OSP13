
<?php
require_once 'controller.php';
$cont = new Controller($_GET['action']);
$cont->run();
exit;


// require_once 'dto.php';
// $myfile = new Myfile();
// $list = $myfile->flist(1);
// print "<h3>그림일기</h3>";
// print "<a href=write.php>일기쓰기</a><br><br>";
// foreach ($list as $f){
// 	print "<a href=read.php?fname=$f </a>".$f."<br>";
// }

// print "read 테스트=========<br>";
// $myfile->setFileName("170630.txt");
// $myfile->read();
// print "content:".$myfile->getContent()."<br>";
// print "img name:".$myfile->getImgName()."<br>";

// print "write 테스트=========<br>";
// $myfile->setFileName("170625.txt");
// $myfile->setContent("content170625");
// $myfile->setImgName("f.jpg");
// $myfile->write();

// print "read 170625테스트=========<br>";
// $myfile->setFileName("170625.txt");
// $myfile->read();
// print "content:".$myfile->getContent()."<br>";
// print "img name:".$myfile->getImgName()."<br>";

// print "delete 170625테스트=========<br>";
// $myfile->setFileName("170625.txt");
// $myfile->delete();

// print "flist 테스트=========<br>";
// $list = $myfile->flist(1);
// foreach ($list as $f){
// 	print $f."<br>";
// }
?>
<?php
require_once 'controller.php';
$cont = new Controller($_GET['action']);
$cont->run();
exit;


// require_once 'dto.php';
// $myfile = new Myfile();
// $list = $myfile->flist(1);
// print "<h3>그림일기</h3>";
// print "<a href=write.php>일기쓰기</a><br><br>";
// foreach ($list as $f){
// 	print "<a href=read.php?fname=$f </a>".$f."<br>";
// }

// print "read 테스트=========<br>";
// $myfile->setFileName("170630.txt");
// $myfile->read();
// print "content:".$myfile->getContent()."<br>";
// print "img name:".$myfile->getImgName()."<br>";

// print "write 테스트=========<br>";
// $myfile->setFileName("170625.txt");
// $myfile->setContent("content170625");
// $myfile->setImgName("f.jpg");
// $myfile->write();

// print "read 170625테스트=========<br>";
// $myfile->setFileName("170625.txt");
// $myfile->read();
// print "content:".$myfile->getContent()."<br>";
// print "img name:".$myfile->getImgName()."<br>";

// print "delete 170625테스트=========<br>";
// $myfile->setFileName("170625.txt");
// $myfile->delete();

// print "flist 테스트=========<br>";
// $list = $myfile->flist(1);
// foreach ($list as $f){
// 	print $f."<br>";
// }
?>
