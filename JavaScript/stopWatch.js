const leftPadZero = (target, length, fillStr) => {
    return String(target).padStart(length, fillStr);
}

const GET_DATE = () => {
    const NOW = new Date('2000-01-01T00:00:00.000'); // Date 객체(현재시간) 생성
    console.log(NOW);
    let minute = NOW.getMinutes();
    let second = NOW.getSeconds();
    let milliSecond = NOW.getMilliseconds();


    let printTime = 
        + leftPadZero(minute, 2, '0') + ':'
        + leftPadZero(second, 2, '0') + ':'
        + leftPadZero(milliSecond, 3, '0');
        
    const SPAN_TIME = document.querySelector('#time');
    SPAN_TIME.textContent = printTime;
}

GET_DATE();
let intervalID = setInterval(GET_DATE, 1000);
