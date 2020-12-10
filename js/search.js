function search_music() {
    const target = document.getElementById("search").value;
    if(target == '' || target == null) alert("검색 대상을 입력하세요.");
    else {
        window.open(
            'https://www.youtube.com/results?search_query=' + target,
            '_blank'
        );
        location.href = 'find-music.html';
    }
}