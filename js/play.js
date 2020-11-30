//플레이어 재생 관련 기능
var player,
    time_update_interval = 0;

var num=5;
var list=[
["불꽃놀이 (Remember Me)", "오마이걸", "https://cdnimg.melon.co.kr/cm/album/images/102/02/711/10202711_500.jpg?f6a4b682ad0d0799c509f22940434d7f/melon/quality/80/optimize", "UAshqNflYMY" ],

["Blueming", "아이유", "https://cdnimg.melon.co.kr/cm2/album/images/103/46/650/10346650_500.jpg?14a08050b8c6adc879b6e0cf587d456a/melon/quality/80/optimize", "kjYU22znggc"],

["butterfly", "이달의 소녀", "https://cdnimg.melon.co.kr/cm/album/images/102/52/794/10252794_500.jpg?60cad57f0168f495cca7941da4fcdab5/melon/quality/80/optimize", "fvlbaW4YWf8"],

["밤하늘의 별을", "경서", "https://cdnimg.melon.co.kr/cm2/album/images/105/18/234/10518234_20201113150500_500.jpg?14229bd15eb93dec69341e7d2a01e9ab/melon/quality/80/optimize", "S_0me7vYyeU"],

["5시 53분의 하늘에서 발견한 너와 나", "투모로우바이투게더",
"https://cdnimg.melon.co.kr/cm2/album/images/105/08/871/10508871_20201026151152_500.jpg?76c663141007b35ed1bc482d96bd3de9/melon/quality/80/optimize",
"NCMpDelurAk"]
];
var playlist=list;
var youtubelist=[];
for(var i=0;i<num;i++){
  youtubelist.push(playlist[i][3]);
}

function onYouTubeIframeAPIReady() {
    player = new YT.Player('video-placeholder', {
        width: 1,
        height:0,
        videoId: playlist[0][3],
        playerVars: {
            color: 'white',
        },
        events: {
            onReady: initialize,
            onStateChange: change
        }
    });
}


function initialize(){
  updateTimerDisplay();
  updateProgressBar();
    player.cuePlaylist({playlist: youtubelist});
    player.setPlaybackQuality('small');
    player.setVolume(50);
    // Update the controls on load


    // Clear any old interval.
    clearInterval(time_update_interval);

    // Start interval to update elapsed time display and
    // the elapsed part of the progress bar every second.
    time_update_interval = setInterval(function () {
        updateTimerDisplay();
        updateProgressBar();
    }, 1000);

    player.setLoop(true);

    $('#volume-input').val(Math.round(player.getVolume()));

    document.getElementById("songname").innerText= playlist[0][0];
    document.getElementById("artistname").innerText= playlist[0][1];
    document.getElementById("p_albumart").src=  playlist[0][2]
    document.getElementById("player").style.backgroundImage=  "url("+playlist[0][2]+")";

}

function change(event){
  if(shufflestate==2){
    shufflelist();
  }
  var index= player.getPlaylistIndex();
  if(event.data==YT.PlayerState.BUFFERING){
    document.getElementById("songname").innerText= playlist[index][0];
    document.getElementById("artistname").innerText= playlist[index][1];
    document.getElementById("p_albumart").src=  playlist[index][2]
    document.getElementById("player").style.backgroundImage=  "url("+playlist[index][2]+")";
  }
}
//for initialize, else
var dur;
function updateTimerDisplay(){
    // Update current time text display.
    $('#current-time').text(formatTime( player.getCurrentTime() ));
    dur=player.getDuration();
    $('#duration').text(formatTime(dur));
}

function dragCalculation(input){
  var a= parseInt(dur*input/100);
  var min= parseInt(a/60);
  var sec= a%60;
  sec = sec < 10 ? '0' + sec : sec;
  document.getElementById("current-time").innerText= min+":"+sec;
}

function updateProgressBar(){
    $('#progress-bar').val((player.getCurrentTime() / player.getDuration()) * 100);
}

$('#progress-bar').on('mouseup touchend', function (e) {
    var newTime = player.getDuration() * (e.target.value / 100);
    player.seekTo(newTime);
    if(state==0){
      playstate=1;
      document.getElementById("play").src="img/playericon/일시정지.png"
      state=1;
    }
});

// Playback
var state=0; //처음 재생때 드래그시 자동재생돼서 생기는 문제 해결 위함
var playstate=0;


//재생,일시정지
$('#play').on('click', function () {
  var b=document.getElementById("play");
  if(playstate==0){
    playstate=1;
    player.playVideo();
    b.src="img/playericon/일시정지.png"
    state=1;
  }
  else {
    playstate=0;
    player.pauseVideo();
    b.src="img/playericon/재생.png"
  }
});


//볼륨창 조절
$('#volume_bar').on('mouseup touchend', function(e) {
    var newVolume = e.target.value;
    if(player.isMuted()){
        player.unMute();
    }
    player.setVolume(newVolume);
});

$('#volume_bar').on('click mousemove', function(e) {
    var newVolume = e.target.value;
    if(player.isMuted()){
        player.unMute();
    }
    player.setVolume(newVolume);
}); //드래그도 바로 반영.

//volume창 팝업 이벤트
var volume_state=0;
$('#volume').mouseover(function(){
  if(volume_state==0){
    volume_state=1;
    $('#volume_popup').fadeIn('fast');
  }
});
$('#container, #option, #controller, #playing_bar').mouseover(function(){
  if(volume_state==1){
    volume_state=0;
    $('#volume_popup').fadeOut('fast');
  }
});



//볼륨버튼 클릭시 음소거
var savevolume;
$('#volume').on('click', function() {
    var mute_toggle = $(this);
    var b=document.getElementById("volumeicon");
    if(player.isMuted()){
      b.src="img/playericon/volume.png";

        player.unMute();
        $('#volume_bar').val(savevolume);

    }
    else{
        savevolume = $('#volume_bar').val();
        player.mute();
        $('#volume_bar').val(0);
        b.src="img/playericon/novolume.png";


    }
});


function volumeiconchange(input){
    var b=document.getElementById("volumeicon");
    if(input==0){
        b.src="img/playericon/novolume.png";
    }
    else
        b.src="img/playericon/volume.png";
}


// 다음곡, 이전곡 이동
$('#next').on('click', function () {
    player.nextVideo()
    if(playstate==0){
      playstate=1;
      document.getElementById("play").src="img/playericon/일시정지.png"
      state=1;
    }
});

$('#prev').on('click', function () {
    player.previousVideo()
    if(playstate==0){
      playstate=1;
      document.getElementById("play").src="img/playericon/일시정지.png"
      state=1;
    }
});



//셔플
var shufflestate=0;
function shufflelist(){
  var sh=[];
  var s=player.getPlaylist();
  for(var i=0;i<num;i++){
    var a=youtubelist.indexOf(s[i]);
    sh.push(list[a]);
  }
  playlist=sh;
  shufflestate=1;
}

$('#shuffle').on('click', function () {
  if(shufflestate==0){
    player.setShuffle(true);
    shufflestate=2;
    document.getElementById('shuffle').style.opacity="0.9";
  }
  else {
    playlist=list;
    player.setShuffle(false);
    shufflestate=0;
    document.getElementById('shuffle').style.opacity="0.4";
  }

});

//반복
var loopstate=1;
$('#loop').on('click', function () {
  if(loopstate==0){
    player.setLoop(true);
    loopstate=1;
    document.getElementById('loop').style.opacity="0.9";
  }
  else {
    player.setLoop(false);
    loopstate=0;
    document.getElementById('loop').style.opacity="0.4";
  }
});




// Helper Functions
function formatTime(time){
    time = Math.round(time);

    var minutes = Math.floor(time / 60),
        seconds = time - minutes * 60;

    seconds = seconds < 10 ? '0' + seconds : seconds;

    return minutes + ":" + seconds;
}

$('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
});
