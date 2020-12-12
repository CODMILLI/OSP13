$('#home').on('click', function () {
  var b=document.getElementById("frame");
  b.src="home.html";
});

$('#diary').on('click', function () {
  var b=document.getElementById("frame");
  var dt = new Date();
  var today= dt.getFullYear()+'.'+(dt.getMonth()+1);
  var userid=document.getElementById("user-name").innerText;
  b.src="php/index.php?action=list&user="+userid+"&ym="+today;
});


$('#share').on('click', function () {
  var b=document.getElementById("frame");
  b.src="share.html"
});
