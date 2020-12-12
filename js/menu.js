$('#home').on('click', function () {
  var b=document.getElementById("frame");
  b.src="home.html";
});

$('#diary').on('click', function () {
  var b=document.getElementById("frame");
  b.src="php/index.php?action=list"
});


$('#share').on('click', function () {
  var b=document.getElementById("frame");
  b.src="share.html"
});
