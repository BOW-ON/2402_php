// **Math 객체

// 올림, 반올림, 버림
Math.ceil(0.1); // 올림 : 1
Math.round(0.5); // 반올림 : 1
Math.floor(0.9); // 버림 : 0

// 랜덤 값
Math.random(); // 0 ~ 1 랜덤한 수를 반환
// 1 ~ 10 랜덤한 수를 반환
Math.ceil(Math.random() * 10); 

for(let i = 0; i < 10; i++) {
    Math.ceil(Math.random() * 10);
}

// 최소값 , 최대값, 절대값
const ARR = [54,654,65,465,4,654,654,21,5,9,879,13,2,18,74,986,165,16];

// 최소값 
let max = Math.max(...ARR);
console.log(max);
// 최대값
let min = Math.min(...ARR);
console.log(min);
// 절대값
Math.abs(1);
Math.abs(-1);

