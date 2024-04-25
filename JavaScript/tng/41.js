// 1. 현재 시간을 화면에 표시
// 2. 실시간으로 시간을 화면에 표시
const lpadZero = (val, length) => {
    return String(val).padStart(length,'0')
}
let TIME;
let cnt = 1;
function time() {
    TIME = setInterval(() => {    
        const NOW = new Date();
        
        let HOUR = lpadZero(NOW.getHours(), 2);
        let AMPM = '오전';
        if (HOUR > 12){
            AMPM = '오후';
            HOUR = lpadZero((HOUR - 12), 2);
        }
        const MINUTE = lpadZero(NOW.getMinutes(), 2);
        const SECOND = lpadZero(NOW.getSeconds(), 2);
    
        const FORMAT_DATE = `현재 시각 ${AMPM} ${HOUR}:${MINUTE}:${SECOND}`
        cnt++
        // console.log(FORMAT_DATE);
    
        const BTN_TIME = document.querySelector('#time');
        BTN_TIME.innerHTML = FORMAT_DATE;
    }, 1000);
}

time();

// // 3. 멈춰 버튼을 누르면, 시간이 정지할 것
const BTN_STOP = document.querySelector('#btn-stop');
BTN_STOP.addEventListener('click', () => {
    clearInterval(TIME);
});


// 멈춘 시간부터 다시 시작하기
// let NOW2;
// let formatDate2;
// const BTN_STOP = document.querySelector('#btn-stop');
// BTN_STOP.addEventListener('click', () => {
//     clearInterval(TIME);

//     NOW2 = new Date();

//     let HOUR2 = lpadZero(NOW2.getHours(), 2);
//     let AMPM2 = '오전';
//     if (HOUR2 > 12){
//         AMPM2 = '오후';
//         HOUR2 = lpadZero((HOUR2 - 12), 2);
//     }
//     const MINUTE2 = lpadZero(NOW2.getMinutes(), 2);
//     const SECOND2 = lpadZero(NOW2.getSeconds(), 2);
//     formatDate2 = `현재 시각 ${AMPM2} ${HOUR2}:${MINUTE2}:${SECOND2}`
//     console.log(formatDate2);

// });

// 4. 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시
const BTN_RESTART = document.querySelector('#btn-restart');
BTN_RESTART.addEventListener('click', () => {
    clearInterval(TIME);
    time();
});


// 멈춘 시간부터 다시 시작하기
// const BTN_RESTART = document.querySelector('#btn-restart');
// BTN_RESTART.addEventListener('click', () => {
//     clearInterval(TIME);
//     cnt = 1;
//     setInterval(() => {    
//         formatDate2
//         cnt++

//         const BTN_TIME = document.querySelector('#time');
//         BTN_TIME.innerHTML = formatDate2;
//     }, 1000);
// });