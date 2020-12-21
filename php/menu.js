
$('#home').on('click', function () {
  var b=document.getElementById("frame");
  var userid=document.getElementById("user-name").innerText;
  b.src="php/home.php?user="+userid;
});

$('#diary').on('click', function () {
  var b=document.getElementById("frame");
  var dt = new Date();
  var today= dt.getFullYear()+'.'+(dt.getMonth()+1);
  var userid=document.getElementById("user-name").innerText;
  b.src="php/index.php?action=list&user="+userid+"&ym="+today;
});

$('#moodanalysis').on('click', function () {
  var b=document.getElementById("frame");
  var dt = new Date();
  var today= dt.getFullYear()+'.'+(dt.getMonth()+1);
  var userid=document.getElementById("user-name").innerText;
  b.src="php/index.php?action=analysis&user="+userid+"&ym="+today;
});
$('#recommend').on('click', function () {
  var b=document.getElementById("frame");
  var userid=document.getElementById("user-name").innerText;
  b.src="moodrecommend.html";
});
$('#profile-edit').on('click', function () {
  var b=document.getElementById("frame");
  var userid=document.getElementById("user-name").innerText;
  b.src="mypage.html";
});
