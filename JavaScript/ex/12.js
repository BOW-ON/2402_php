// **함수 (function)
// 입력을 받아 출력을 하는 일련의 과정을 정의한 것
// JS에서는 함수 자체가 객체이므로 변수에 담을수 있다.

// 1. 함수 선언식
function mySum(a, b) {
    return a + b
}
console.log(mySum(1,2));

function mySum(a, b) {
    console.log('재할당');
}

// 2. 함수 표현식
// 호이스팅에 영향을 받지 않고, 재할당을 방지
const FNC_MY_SUM = function(a, b) { // JS에서는 함수 자체가 객체이므로 변수에 담을수 있다.
    return a + b;
}
console.log(FNC_MY_SUM(1, 2));

// 3. 화살표 함수 : function과 return을 생략하고 => 으로 적음
const FNC_MY_SUM_2 = (a, b) => a + b;

const FNC_TEST1 = function() {
    return 'FNC_TEST1';
};
const FNC_TEST1_A = () => 'FNC_TEST1'

// 파라미터가 1개일 경우 소괄호 생략 가능
const FNC_TEST2 = function(str) {
    return str;
}
const FNC_TEST2_A = str => str;

// 리터처리 이외의 처리가 있을 경우, {}는 생략 불가능
const FNC_TEST3 = function (str) {
    if(str === 'a') {
        str = 'a입니다.'
    }
    return str;
}

const FNC_TEST3_A = str => {
    if(str === 'a') {
        str = 'a입니다.'
    }
    return str;
}

// 4. 콜백 함수
// 다른 함수의 파라미터로 전달되어 특정 조건에 따라 호출되는 함수
const MY_SUB = (callBack, num) => {
    if( num === 3) {
        return '3입니다.';
    }
    return callBack() - num;
}
const MY_CALLBACK = () => 10;

console.log(MY_SUB(MY_CALLBACK, 2));


// 5. 즉시 실행 함수(IIFE)
// 함수의 정의와 동시에 바로 호출되는 함수
// 딱 한번만 호출, 다시는 호출 불가
// 모듈화, 스코프를 보호, 클로저 형성
const MY_CLASS = (function() {
    const NAME = '홍길동'; 

    return {
        myPrint: function() {
            console.log(NAME + '입니다.');
        }
    }
}) ();

console.log(MY_CLASS.myPrint());