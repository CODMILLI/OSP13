var season_album = ["https://cdnimg.melon.co.kr/cm2/album/images/103/68/053/10368053_20191223155246_500.jpg?ce9aaaa85e8cfe9e58f3b074ff8107ef"];

function showImage(){
  var objImg=document.getElementById("s_albumart");
  objImg.src=season_album[0];
}

showImage('season_albumart');

// 스트리밍 기능 알아보고 추가하기
var happy_mood = [
  ["https://cdnimg.melon.co.kr/cm/album/images/000/40/234/40234_500.jpg","힘찬 하루를 시작하기에\n좋은 노래"],
  ["https://cdnimg.melon.co.kr/cm2/album/images/105/05/830/10505830_20201020115450_500.jpg?3b0d9c3eadf75d3a26f4598339eef813","노는 게 가장 좋은\nYOLO족을 위한 노래"],
  ["https://cdnimg.melon.co.kr/cm2/album/images/104/26/648/10426648_20200506153340_500.jpg?0ed92b652a9149e26387233529a32781","비온 뒤 맑음\n결국에는 모든 게 해피엔딩"],
  ["https://cdnimg.melon.co.kr/cm2/album/images/104/23/289/10423289_20200427153909_500.jpg?33a9f621c154722d51621a0ba45dd402","마치 해변 위를 산책하듯\n청량감 넘치는 기분"]
];

var sad_mood = [
  ["https://cdnimg.melon.co.kr/cm/album/images/023/20/721/2320721_500.jpg","반복되는 일상에 지치고\n허무함을 느낀다면"], //혁오 큰새 
  ["https://cdnimg.melon.co.kr/cm/album/images/026/53/573/2653573_500.jpg","답답하고 우울한 마음을\n어떻게 표현해야 할까"],//백예린 잠들고 싶어
  ["https://cdnimg.melon.co.kr/cm/album/images/023/10/380/2310380_500.jpg","멀어져가는 인연을\n바라만 보고 있는 내 모습"], //자이언티 무중력
  ["https://cdnimg.melon.co.kr/cm/album/images/101/00/191/10100191_500.jpg?0e733ba07eeb0fd8a39f04a8eb6291fd","좌절의 아픔과 상처를\n나눌 수 있는 노래"] //볼빨간사춘기 나의 사춘기에게 
];

var today_emotion=0; //기쁨 키워드 받았을 때 
var today_mood=new Array(4);
for(var i =0;i<4;i++){
  today_mood[i]=new Array(2);
} // 나중에 다이어리 기록에 따라 오늘의 기분 키워드를 기쁨/슬픔으로 나눠서 받은 뒤 조건문으로 happy/sad 구분예정 
var mood_title;
function mood_set(){
if(today_emotion == 0){
  mood_title="무언가 신나는 일이 생길 것만 같을 때";
  today_mood = happy_mood; 
}
else{mood_title="내 슬픈 감정을 노래와 함께 공유하고 싶을 때";
today_mood = sad_mood; }}

function showTitle(){
  mood_set();
  var objTitle=document.getElementById("recommend_title");
  objTitle.innerText=mood_title;
}
showTitle('mood_recommend');

var moodsongs_imgID = ["first_song","second_song","third_song","fourth_song"];
var moodsongs_expID = ["first_explain","second_explain","third_explain","fourth_explain"];

function mood_R(){
for(var i=0;i<4;i++){
  document.getElementById(moodsongs_imgID[i]).src= today_mood[i][0];
  document.getElementById(moodsongs_expID[i]).innerText = today_mood[i][1];
  }};

  mood_R("mood_recommend");