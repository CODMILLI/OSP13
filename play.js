//플레이어 재생 관련 기능
var player,
    time_update_interval = 0;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('video-placeholder', {
        width: 0,
        height: 1,
        videoId: 'p0Mb4MPPQNI',
        playerVars: {
            color: 'white',
            playlist: ''
        },
        events: {
            onReady: initialize
        }



    });
}

function initialize(){

  player.setPlaybackQuality('small');

    // Update the controls on load
    updateTimerDisplay();
    updateProgressBar();

    // Clear any old interval.
    clearInterval(time_update_interval);

    // Start interval to update elapsed time display and
    // the elapsed part of the progress bar every second.
    time_update_interval = setInterval(function () {
        updateTimerDisplay();
        updateProgressBar();
    }, 1000);


    $('#volume-input').val(Math.round(player.getVolume()));
}



// This function is called by initialize()
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




// This function is called by initialize()
function updateProgressBar(){
    // Update the value of our progress bar accordingly.
    $('#progress-bar').val((player.getCurrentTime() / player.getDuration()) * 100);
}


// Progress bar

$('#progress-bar').on('mouseup touchend', function (e) {

    // Calculate the new time for the video.
    // new time in seconds = total duration in seconds * ( value of range input / 100 )
    var newTime = player.getDuration() * (e.target.value / 100);

    // Skip video to new time.
    player.seekTo(newTime);
    if(state==0){
      playstate=1;
      document.getElementById("play").src="playericon/일시정지.png"
      state=1;
    }
});

// Playback
var state=0; //처음 재생때 드래그시 자동재생돼서 생기는 문제 해결 위함
var playstate=0;

$('#play').on('click', function () {
    var b=document.getElementById("play");
    if(playstate==0){
      playstate=1;
      player.playVideo();
      b.src="playericon/일시정지.png"
      state=1;
    }
    else {
      playstate=0;
      player.pauseVideo();
      b.src="playericon/재생.png"
    }

});




//볼륨창 조절
$('#volume_bar').on('mouseup touchend', function(e) {
    var newVolume = e.target.value;
    player.setVolume(newVolume);
});

$('#volume_bar').on('mousemove', function(e) {
    var newVolume = e.target.value;
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
      b.src="playericon/volume.png";

        player.unMute();
        $('#volume_bar').val(savevolume);
      
    }
    else{
        savevolume = $('#volume_bar').val();
        player.mute();
        $('#volume_bar').val(0);
        b.src="playericon/novolume.png";


    }
});


function volumeiconchange(input){
    var b=document.getElementById("volumeicon");
    if(input==0){
        b.src="playericon/novolume.png";
    }
    else
        b.src="playericon/volume.png";
}


// Playlist

$('#next').on('click', function () {
    player.nextVideo()
});

$('#prev').on('click', function () {
    player.previousVideo()
});


// Load video

$('.thumbnail').on('click', function () {

    var url = $(this).attr('data-video-id');

    player.cueVideoById(url);

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
