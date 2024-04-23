// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];

// sol)
let arr1 = [...ARR1];
let result = arr1.sort((a, b) => a - b);
console.log(result);

// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요.
const ARR2 = [5, 7, 3, 4, 5, 1, 2];

// sol)
let even1 = ARR2.filter( val => val % 2 === 0);
let even = even1.sort((a, b) => a - b )
console.log(even);

let odd1 = ARR2.filter( val => val % 2 === 1);
// let odd1 = ARR2.filter( val => val % 2 !== 0);
let odd = odd1.sort((a, b) => a - b )
console.log(odd);

// sol2)
const EVEN2 = [];
const ODD2 = [];
ARR2.forEach(num => {
    if(num % 2 === 0) {
        EVEN2[EVEN2.length] = num;
    } else {
        ODD2[ODD2.length] = num;
    }
})
console.log(EVEN2, ODD2);