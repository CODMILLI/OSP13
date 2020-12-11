
let date = new Date();
const month=["JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC"];

const renderCalendar = () => {
  const viewYear = date.getFullYear();
  const viewMonth = date.getMonth();

  // year-month 채우기
  document.querySelector('#month').textContent = month[`${viewMonth}`];
  document.querySelector('#year').textContent = `${viewYear}`;

  // 지난 달 마지막 Date, 이번 달 마지막 Date
  const prevLast = new Date(viewYear, viewMonth, 0);
  const thisLast = new Date(viewYear, viewMonth + 1, 0);

  const PLDate = prevLast.getDate();
  const PLDay = prevLast.getDay();

  const TLDate = thisLast.getDate();
  const TLDay = thisLast.getDay();

  // Dates 기본 배열들
  const prevDates = [];
  const thisDates = [...Array(TLDate + 1).keys()].slice(1);
  const nextDates = [];

  // prevDates 계산
  if (PLDay !== 6) {
    for (let i = 0; i < PLDay + 1; i++) {
      prevDates.push(" ");
    }
  }
  // nextDates 계산
  for (let i = 1; i < 7 - TLDay; i++) {
    nextDates.push(" ")
  }

  // Dates 합치기
  const dates = prevDates.concat(thisDates, nextDates);

  // Dates 정리
  dates.forEach((date, i) => {
    dates[i] = `<div class="date" style="text-align: right;"> ${date}
   <br>
     <a id="imghref${date}" href="">
      <img id="img${date}" src="img/calander_none.png" style="width:55px; height:55px; border-radius:70px; "></div></a>`;
  })

  // Dates 그리기
  document.querySelector('.dates').innerHTML = dates.join('');

}

renderCalendar();

const prevMonth = () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
}

const nextMonth = () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
}

const goToday = () => {
  date = new Date();
  renderCalendar();
}
