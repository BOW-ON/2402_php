console.log("js 파일에서 안녕하세요.");

// 1. 변수
// 1-1. var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프 // 지양함
var num1 = 1; // 최초 선언
var num1 = 2; // 중복 선언
num1 = 3; // 재할당

// 1-2. let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
let num2 = 2;
// let num2 = 3; // 중복 선언 불가
num2 = 5; // 재할당 가능


// 2. 상수 (대문자)
// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프
const NUM = 3;
// const NUM = 5; // 중복 선언 불가
// NUM = 4; // 재할당 불가 



// -------------
// 3. 스코프(Scope)
// -------------
// 변수나 함수가 유효한 범위
// 전역 레벨, 지역, 블록 3가지의 스코프


// 3-1. 전역 스코프
let globalScope = '전역 스코프';

function myPrint() {
    console.log(globalScope);
}

myPrint();
console.log(globalScope);

// 3-2. 지역 스코프
function mylocalPrint() {
    let localStr = '지역 스코프 let';
    console.log(localStr);
}
mylocalPrint();
// console.log(localStr); 지역 변수라서 오류 발생

// 3-3. 블록 레벨 스코프
// {    }로 둘러싸인 범위 (함수, if, for 등등..)
function myBlock(){
    if(true) {
        var test1 = 'var';
        let test2 = 'let';
        const TEST3 = 'const';
    }
    console.log(test1);
    console.log(test2);
    console.log(TEST3);
}
// myBlock(); // test2 가 정의 되어 있지 않음, TEST3은 실행도 안됨.




// 4. 호이스팅(hoisting)
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것
// var의 호이스팅 문제 so) var를 지양하고 let을 선호함.
// console.log(test); 
// test = "aaa";
// console.log(test);
// // var test;
// let test;


// 5. 데이터 타입
// 5-1. number 숫자
let num = 1;

// 5-2. string 문자열
let str = 'abcde';

// 5-3. boolean 논리 (true/false)
let boo = true;

// 5-4. null : 존재하지 않는 값
let letNull = null;

// 5-5. undefined : 값이 할당 되어 있지 않은 상태
let letUndefined;

// 5-6. object 객체
let obj = {
    key1: 'val1',
    key2: 'val2'
};
console.log(typeof obj);

// 5-7. Array 배열
let arr = [1, 2, 3];
console.log(typeof arr); // >> obj로 나옴

// 5-8. symbol 심볼 ( 같은 값을 가진다고 해도 비교하면(===) false로 나옴 )
let lstStr1 = '심볼1';
let lstStr2 = '심볼1';
let lstSymbol1 = symbol('심볼1');
let lstSymbol2 = symbol('심볼1');











