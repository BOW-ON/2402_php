// *String 객체

let str = '문자열입니다';
let str2 = String('원래 문자열 만드는 법');

// 1. length : 문자열의 길이를 반환
console.log(str.length);
console.log(str2.length); // 공백 포함

// 2. chatAt() : 특정 인덱스의 문자를 반환
str.charAt(3); // '입' 출력

// 3. indexOf() : 문자열에서 특정 문자열을 찾아 최초의 인덱스를 반환
//      찾지 못하면 -1 반환
str = '안녕하세요. 안녕하세요.';
str.indexOf('녕');
if(str.indexOf('효') < 0 ) {
    console.log('해당문자열 없음');
}
// 검색을 시작할 인덱스 위치 지정 하는 방법
str.indexOf('녕',5); // 검색 시작을 5로 지정

// 4. includes() : 문자열에서 특정 문자열을 찾아 true/false 반환
if(str.includes('하세요')) {
    console.log('검색 문자열 존재');
}

// 5. replace() : 특정 문자열(첫번째)를 찾아서 지정한 문자열로 치환한 문자열을 반환
str = 'abcdefg dede'
str.replace('de', '안녕');

// 6. replaceAll() : 모든 특정 문자열을 찾아서 지정한 문자열로 치환한 문자열을 반환
str.replaceAll('da','안녕');

// 7. substring() : 시작 인덱스부터 종료 인덱스까지 자른 문자열을 반환
str = '안녕하세요. JavaScript입니다.';
str.substring(7, 17);
// str.substring(str.indexOf('JavaScript'), str.indexOf('JavaScript') + 'JavaScript'.length);
let pattern = 'JavaScript';
let patternIndex = str.indexOf(pattern);
str.substring(patternIndex, patternIndex + pattern.length);

// 8. split() : separator를 기준으로 문자열을 잘라서 배열 요소로 담은 배열을 반환
str = '빵, 돼지숯불, 제육, 돈까스';
str.split(', ');
str.split(', ', 2); // 배열길이를 2로 제한

// 9. trim() : 좌우 공백을 제거해서 문자열을 만들어줌
str = '   asdfas      ';
str.trim();

// 10. toUpperCase(), toLowerCase() : 알파벳을 대/소문자로 바꿔서 출력
str = 'aBcD';
str.toUpperCase();
str.toLowerCase();