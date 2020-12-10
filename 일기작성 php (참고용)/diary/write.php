<html>
<head>
<script type="text/javascript">

</script>
</head>

<body>
<h3>일기쓰기</h3>
<form name="f1" action="index.php?action=write" method="post">
날짜:<input type="text" name="fname"> (2020.12.01_Mon 의 형식으로 작성)
<br><br>태그<br>
<textarea name="tag" rows="2" cols="45"></textarea><br>
<br><br>내용<br>
<textarea name="content" rows="15" cols="45"></textarea><br>
<input type="hidden" value="false" name="result">
<input type="button" value="save" onclick="f1.submit();">

</form>
</body>
</html>
