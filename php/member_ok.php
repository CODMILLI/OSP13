<?php
	include("db.php");

	$userid = $_POST['userid'];
	$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
	$email = $_POST['useremail'];
  $userdate = $_POST['userdate'];

$sql = mq("insert into member (id,pw,email,birth) values('$userid','$userpw','$useremail','$userdate')");

?>
<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<meta http-equiv="refresh" content="0 url=/">
