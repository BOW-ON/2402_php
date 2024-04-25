// *타이머 함수

// 1. setTimeout(콜백함수, 시간(ms)) : 일정 시간이 흐른 후에 콜백 함수를 실행
setTimeout(() => (console.log('타임아웃')), 5000);

// ex) 1초뒤 A, 2초뒤 B, 3초 뒤 C 출력
setTimeout(() => (console.log('A')), 1000);
setTimeout(() => (console.log('B')), 2000);
setTimeout(() => (console.log('C')), 3000);

// console.log('A');
// setTimeout(()=> console.log('B'), 1000);
// console.log('C')

// A, B, C를 순서대로 출력
console.log('A');
setTimeout( () => {
    console.log('B')
    console.log('C')
}, 1000);


// 2. clearTimeout(타임아웃ID) : 해당 타임아웃ID의 처리
const TIMEOUT_ID = setTimeout(()=> console.log('ttt'), 5000);
clearTimeout(TIMEOUT_ID);
console.log(TIMEOUT_ID);

// 3. setInterval(콜백함수, 시간(ms)[, 아큐먼트1, 아규먼트2]) : 일정 시간마다 콜백함수 실행
const INTERVAL_ID = setInterval( ()=>console.log('인터벌'), 1000 )
// let cnt = 1;
// setInterval(() => {
//     console.log('인터벌' + cnt);
//     cnt++;
// }, 1000);

// 4. clearInterval(intervalID) : 해당 intervalID 처리 제거
clearInterval(INTERVAL_ID);

// ex) 화면에 5초 뒤에 '두둥등장'이라는 매우 큰 글씨가 나타나게 해주세요.
// // sol1)
// setTimeout(() => {
//     const BODY = document.querySelector('body');
//     BODY.innerHTML = '<h1>두둥등장</h1>'
//     BODY.style = 'font-size: 5rem';

//     // ex) 출력 후 3초후 삭제
//     setTimeout(()=>{
//         BODY.parentNode.removeChild(BODY);
//     }, 3000);

// }, 5000);

// // sol2)
// setTimeout(() => {
//     const H1 = document.createElement('h1');
//     const TARGET = document.querySelector('body');
//     TARGET.appendChild(H1);
//     H1.innerHTML = '<h1>두둥등장</h1>'
//     H1.style = 'font-size: 5rem';
// }, 5000);

// A)
setTimeout(() => {
    const H1 = document.createElement('h1'); // h1 태그 생성
    H1.innerHTML = '두둥등장'; // h1태그 컨텐츠 삽입
    H1.style.fontSize = '5rem'; // h1태그 글자크기 조절

    document.body.appendChild(H1); // body에 H1 추가

    // 삭제 타임아웃 처리
    setTimeout(()=>{
        const DEL_H1 = document.querySelector('h1'); // DEL_H1 요소 획득
        document.body.removeChild(DEL_H1); // DEL_H1 요소 삭제
    }, 3000);
}, 5000);


// 콜백 지옥
// 비동기 처리를 동기 처리 처럼 만들기위해 아래처럼 콜백 지옥 현상이 생긴다.
// setTimeout(()=> console.log('A'), 3000);
// setTimeout(()=> console.log('B'), 2000);
// setTimeout(()=> console.log('C'), 1000);

setTimeout(() => {
    console.log('A');
    setTimeout(() => {
        console.log('B');
        setTimeout(() => {
            console.log('C');
        }, 1000);
    }, 2000);   
}, 3000);