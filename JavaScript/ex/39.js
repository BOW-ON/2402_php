// ----------------
// *요소 선택
// -------------------
// 1. 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');
TITLE.style.color = 'blue';

// 2. 태그명으로 요소를 선택하는 방법 - 지양함
//      태그명이 겹치는 경우 위에서 아래순서 배열로 가져오므로 사용을 잘 안함
const H1 = document.getElementsByTagName('h1');
H1[1].style = 'color: green; font-size : 3rem;';

// 3. 클래스 요소를 선택 - 지양함
//      태그명과 동일하게 사용을 잘 안함
const CLASS_ELE = document.getElementsByClassName('none-li')

// 4. CSS 선택자를 이용해서 요소를 선택 - 지향함
//      현업에서 가장 많이 사용함
const CSS_ID = document.querySelector('#title');
const CSS_CLS = document.querySelector('.none-li'); // 제일 최상위 클래스만 가져옴
const CSS_CLS_ALL = document.querySelectorAll('.none-li'); // 모든 클래스 다 가져옴
// 색상 변경
CSS_CLS_ALL.forEach(node => node.style.color = 'blue');
// CSS_CLS_ALL.forEach(function(node) {
//     node.style.color = 'blue';
// });

// ex) 지뢰찾기li 선택하기
// sol1)
const LI = document.getElementsByTagName('li')
LI[2]
// sol2)
const CSS_ALL = document.querySelectorAll('.none-li');
CSS_ALL[1]
// A)
const SECOND_CHILD = document.querySelector('#ul > li:nth-child(2)');
SECOND_CHILD.style = 'color: red; font-size: 3rem;';

// ----------------
// *요소 조작
// ----------------

// 1. textContent : 컨텐츠를 획득 또는 변경, 순수한 텍스트데이터를 전달
TITLE.textContent = '텍스트 컨텐츠로 바꿈';
// TITLE.textContent = '<a>링크</a>' // <a>링크</a>로 바꿈, 태그가 아니고 문자로 변환

// 2. innerHTML : 컨텐츠를 획득 또는 변경, 태그는 태그로 인식해서 전달
TITLE.innerHTML = '<a>링크</a>'; // 태그로 인식

// 3. setAttribute(속성명, 값) : 해당 속성과 값을 요소에 추가
const INPUT1 = document.getElementById('input1');
INPUT1.setAttribute('placeholder', '값값값');
INPUT1.setAttribute('name', 'input1');

// 4. removeAttribute(속성명) : 해당 속성을 요소에서 제거
INPUT1.removeAttribute('placeholder');


// ----------------
// *요소 스타일링
// ----------------

// 1. style : 인라인으로 스타일 추가
TITLE.style.color = 'blue';
TITLE.removeAttribute('style'); // style 제거

// 2. classList : 클래스 스타일 추가 및 삭제
// 2-1. classList.add() : 추가
TITLE.classList.add('font_color-red'); // 1개만 추가
TITLE.classList.add('font_color-red', 'css1', 'css2',); // 여러개 추가
// 2-2. classList.remove() : 제거
TITLE.classList.remove('font-color-red');

// 3. classList.toggle() : 해당 클래스를 토글
TITLE.classList.toggle('none');


// ex) 리스트의 요소들의 글자색을 짝수는 빨강, 홀수는 파랑으로 수정
// sol1)
// 짝수
const EVEN_CHILD = document.querySelectorAll('#ul > li:nth-child(even)');
EVEN_CHILD.forEach(node => node.style.color = 'red');
// 홀수
const ODD_CHILD = document.querySelectorAll('#ul > li:nth-child(odd)');
ODD_CHILD.forEach(node => node.style.color = 'blue');

// sol2)
const CSS_CLS_ALL_li = document.querySelectorAll('li');
// forEach에서 받아올때 처음은 값, 두번째는 키를 받아온다
CSS_CLS_ALL_li.forEach(function(node, key) {
        if(key % 2 === 0) {
            node.style.color = 'red';
        } else {
            node.style.color = 'blue';
        }
    });


// A)
const ITEMS = document.querySelectorAll('#ul > li')
ITEMS.forEach((item,key) => (item.style.color = key % 2 === 0 ? 'red' : 'blue'));


// ----------------
// *새로운 요소 생성
// ----------------
// 1. createElement(태그명) : 새로운 요소 생성
const NEW_LI = document.createElement('li');
NEW_LI.innerHTML = '광산게임';

const TARGET = document.querySelector('#ul'); // 삽입할 부모요소 선택
// 2. appendChild(노드) : 해당 부모 노드에 마지막 자식으로 노드 추가
TARGET.appendChild(NEW_LI);
// 동일한 형태의 요소를 여러개 추가하는 법
// for (let i = 0; i > 3; i++) {
//     const LI = document.createElement('li');
//     LI.innerHTML = '쿠키게임';
//     const TARGET2 = document.querySelector('#ul');
//     TARGET2.appendChild(LI);
// }

// 3. insertBefore(새로운노드, 기존노드) : 해당 부모 노드의 자식인 기준노드 앞에 새로운 노드 추가
const NEW_LI2 = document.createElement('li');
NEW_LI2.innerHTML = '굴착소년쿵야';

const LI2_STANDARD = document.querySelector('#ul > li:nth-child(3)'); // 기준 노드
TARGET.insertBefore(NEW_LI2, LI2_STANDARD);

// ex) '프리셀'을 스페이스와 사과게임 사이에 넣기
// sol1)
const NEW_LI3 = document.createElement('li');
NEW_LI3.innerHTML = '프리셀';

const LI3_STANDARD = document.querySelector('#ul > li:nth-child(5)');
TARGET.insertBefore(NEW_LI3, LI3_STANDARD);

// A)
const NEW_LI4 = document.createElement('li');
NEW_LI4.innerHTML = '프리셀2';

const APPLE = document.querySelector('#apple');
TARGET.insertBefore(NEW_LI4, APPLE);

// 4. removeChild() : 해당 부모 노드의 자식을 삭제
TARGET.removeChild(NEW_LI4);