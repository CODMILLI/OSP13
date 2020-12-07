const date = new Date();
const month=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec",];

const viewYear = date.getFullYear();
const viewMonth = date.getMonth();
var v= viewMonth;
document.querySelector('.year-month').textContent = `${viewYear} `+ month[v];
const prevLast = new Date(viewYear, viewMonth, 0);
const thisLast = new Date(viewYear, viewMonth + 1, 0);

const PLDate = prevLast.getDate();
const PLDay = prevLast.getDay();

const TLDate = thisLast.getDate();
const TLDay = thisLast.getDay();
const prevDates = [];
const thisDates = [...Array(TLDate + 1).keys()].slice(1);
const nextDates = [];
if (PLDay !== 6) {
  for (let i = 0; i < PLDay + 1; i++) {
    prevDates.push(' ');
  }
}

for (let i = 1; i < 7 - TLDay; i++) {
  nextDates.push(' ');
}
const dates = prevDates.concat(thisDates, nextDates);

dates.forEach((date, i) => {
  dates[i] = `<div class="date">${date}</div>`;
})

document.querySelector('.dates').innerHTML = dates.join('');
