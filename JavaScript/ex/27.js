// *배열
const ARR = [1, 2, 3, 4, 5];

console.log(ARR[2]);
ARR[5] = 6;

// 1. 배열의 길이 획득하는 방법
console.log(ARR.length);

ARR[ARR.length] = 7;

// 2. 배열 여부 체크
console.log(Array.isArray(ARR));
console.log(Array.isArray(1));

// 3. 배열에서 특정 요소를 검색해 해당 인덱스를 획득하는 메소드
let arr = ['홍길동', '갑순이','갑돌이'];
arr.indexOf('갑돌이');
if(arr.indexOf('갑돌이') < 0) {
    // 요소가 없을 때 처리
}

// 4. includes() : 배열에서 특정 요소의 존재 여부를 체크, 리턴 : boolean
arr.includes('홍길동')
if(!(arr.indexOf('홍길동'))) {
    // 요소가 없을 때 처리
}

// 5. push() : 원본 배열의 마지막 요소를 추가, 리턴 : 변경된 length
arr = ['홍길동', '갑순이','갑돌이'];
let len = arr.push('반장님', '한철이'); // 파라미터를 복수 설정해서 여러 값을 한번에 추가하기 편리함, but) 속도가 느림
// so) 하나를 추가할때는 앞에 사용했던것 처럼
//      arr[arr.length] = '반장님'; 으로 값을 넣으면 속도가 상대적으로 빠름


// 6. 배열 복사
arr = ['홍길동', '갑순이','갑돌이'];
let arr2 = [...arr]; // Spread Operator : 원본은 변하지 않음(주소값이 복사 되는 것이 아닌 값 자체가 복사됨)
arr2.push('반장님');


// 7. 마지막 요소를 제거
// POP() : 원본 배열의 마미막 요소를 제거, 리턴 : 제거된 요소의 값 반환
arr = ['홍길동', '갑순이','갑돌이'];
let result = arr.pop()
console.log(arr);

// 8. unshift() : 원본 배열의 첫번째 요소를 추가
arr = ['홍길동', '갑순이','갑돌이'];
result = arr.unshift('둘리');
console.log(result, arr);

// 9. shift() : 원본 배열의 첫번째 요소를 제거, 제거된 요소의 값 반환
result = arr.shift();
console.log(result, arr);

// 10. splice(start, count, ...args) : 요소를 잘라서 자른 배열을 반환
// 원본이 변경됨
arr = [1, 2, 3, 4, 5];
result = arr.splice(2);
console.log(arr); // [1, 2]
console.log(result); // [3, 4, 5]

arr = [1, 2, 3, 4, 5];
result = arr.splice(-2); // 음수
console.log(arr); // [1, 2, 3]
console.log(result); // [4, 5]

arr = [1, 2, 3, 4, 5];
result = arr.splice(1, 2, 100, 200, 300); // ...args : 값 추가
console.log(arr); // [1, 100, 200, 300, 4, 5]
console.log(result); // [2, 3]

arr = [1, 2, 3, 4, 5];
result = arr.splice(2, 0, 100, 200);
console.log(arr); // [1, 2, 100, 200, 3, 4, 5]
console.log(result); // []

// 11. join() : 배열의 요소를 구분자로 연결한 문자열을 만들어서 반환
// 구분문자는 디폴트가 ','
arr = [1, 2, 3, 4 ]; 
result = arr.join(' a ');

console.log(result);

// 12. sort() : 배열의 요소를 문자열(str)로 반환 후 오름차순 정렬하고, 정렬된 배열을 반환
// 원변이 변경됨
arr = [4, 3, 6, 1, 2, 5, 10];
result = arr.sort((a, b) => a - b);
// sort는 버블정렬과 비슷한 처리가 있음(정확하게 버블정렬은 아니지만 이해하기 편하기 위해 비슷하다고 생각하기)
//  앞에서 두개씩(a, b) 가져와서 (a - b) 처리
//      (a - b)가 양수일 경우, a가 큰수, b가 작은수로 인식하여 정렬
//      (a - b)가 음수일 경우, a가 작은수, b가 큰수로 인식하여 정렬
//      (a - b)가 0일 경우, 같은 값으로로 인식하여 정렬하지 않음
//  이런식으로 루프를 돌리듯 완료될때까지 정렬함
// (b - a): 숫자 내림차순 정렬
console.log(arr);
console.log(result);


// 13. map() : 배열의 모든 요소에 대해서 콜백 함수르 반복 실행한 후, 그 결과를 새로운 배열로 반환
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// 모든 요소의 값 * 2를 한 결과를 얻고 싶다.
// [2, 4, 6, 8, ... , 20]

let copyArr = [];
for(let val of arr) {
    copyArr[copyArr.length] = val * 2;
}

let mapArr = arr.map(val => val * 2);

// 14. some() : 배열의 모든요소에 대해서 콜백함수를 반복 실행하고,
//      조건에 만족하는 결과가 하나라도 있으면 true, 만족하는 결과가 하나도 없으면 false
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result = arr.some(val => val === 11);

// 15. every() : 배열의 모든 요소에 대해서 콜백함수를 반복 실행하고,
//      모든 결과가 만족하면 true, 하나라도 만족하지 않으면 false
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result = arr.every(val => val >= 1);

// 16. filter() : 배열의 모든 요소에 대해서 콜백함수를 반복 실행하고,
//      조건에 맞는 요소만 모아서 배열로 반환
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result = arr.filter( val => val % 3 === 0); // [3, 6, 9]

// 17. forEach() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
arr.forEach((val, key) => console.log(`key : ${key}, val : ${val}`))