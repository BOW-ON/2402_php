/* 1. if문
// 기본형태
if(조건1) {
	// 조건1이 참이면 실행할 처리
}
// 조건1이 거짓일경우 다음 체크로 진행
else if(조건2) {
	// 조건2가 참이면 실행할 처리
}
// 앞선 조건1, 조건2 모두 거짓일경우 else가 실행
else {
	
}
*/


// ex1) 1이면 1등, 2면 2등, 3이면 3등, 나머지는 순위 외, 5번만 특별상을 출력
let num = 2;

if (num === 1) {
    console.log("1등");
} else if (num === 2) {
    console.log("2등");
} else if (num === 3) {
    console.log("3등");
} else if (num === 5) {
    console.log("특별상");
} else {
    console.log("순위 외");
}


/* 2. switch문
// 기본 문법
switch(검증 대상) {
	case 일치 검증 값:
		// 실행할 처리
		break;
	case 일치 검증 값:
		// 실행할 처리
		break;
	// 상위 case문에서 일치 검증 값이 없을 경우 실행
	default:
		// 실행할 처리
		break;
}
*/

// ex2) 나이가 20이면 '20대', 30이면 '30대', 나머지는 '모르겠다'
let age = 29;
switch(age) {
    case 20 : 
        console.log('20대');
        break;  
    case 30 : 
        console.log('30대');
        break;
    default :
        console.log('모르겠다');
        break;
}


// ------------------------------
// 3. 반복문( for, while, do_while)
// ------------------------------
// 3-1. for문
for(let i = 1; i < 11; i++){
    if (i % 3 === 0) {
        continue; // 루르를 처리 하지 않고 넘어감
    }
    console.log( i + '번째 루프')
    if (i === 7) {
        break; // 루프를 종료
    }
}

// 3-1. while문
let cnt = 1;
while(cnt <= 10) {
    if (cnt % 3 === 0) {
        cnt++;
        continue;
    }
    console.log(cnt + '번째 루프')
    if (cnt === 7) {
        break;
    }
    cnt++;
}


// ex) 구구단 2~9단을 출력
// 예시)
// ** 2단 **
// 2 X 1 = 2
// 2 X 2 = 4
// ...
// ** 3단 **
// 3 X 1 = 3
// 3 X 2 = 6
// ..
// ** 9단 **
// 9 X 8 = 72
// 9 X 9 = 81

// sol)
for(let j = 2; j <= 9; j++) {
    console.log('**' + j + '단**');
    for(let i = 1; i <= 9; i++) {
        console.log(j + ' X ' + i + ' = ' + (i * j));
    }
}
// 19단
// sol)
for(let j = 2; j <= 19; j++) {
    console.log('**' + j + '단**');
    for(let i = 1; i <= 19; i++) {
        console.log(j + ' X ' + i + ' = ' + (i * j));
    }
}

// A)
const DAN = 9;
for(let dan = 2; dan <= DAN; dan++) {
    console.log(`**${dan}단**`); // ` : 백틱
    for(let multi = 1; multi <= DAN; multi++) {
        console.log( `${dan} X ${multi} = ${dan * multi}`);
    }
}

// 4. for ...in
// 모든 객체를 반복하는 문법
// key에만 접근이 가능
const OBJ = {
    key1: 'val1'
    ,key2: 'val2'
};
console.log(OBJ.key1);
for(let key in OBJ) {
    console.log(OBJ[key]); // key만 가져오므로 값을 원한다면 '객체[키값]' 으로 불러와야됨
}

const ARR1 = [1, 2, 3];
for(let key in ARR1) {
    console.log(ARR1[key]);
}


// 5. for...of
// iterable 객체를 반복하는 문법(String, Array, Map, Set, TypeArray, ...) 
//  **>> 변수.length를 사용할수 있는 경우가 iterable한다는 뜻
// value에만 접근이 가능
const STR1 = '안녕하세요';
for(let val of STR1) {
    console.log(val);
}