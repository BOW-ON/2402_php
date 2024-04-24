// review) 함수 표현식, 함수 선언식 비교
// 아무거나 사용해도 되지만 왜 사용하는지 알고 쓰기
// # 함수 표현식
// 호이스팅에 영향을 받지 않고 const로 만들기때문에 재할당을 방지할 수 있음
const FNC1 = (a, b) => a + b;
// # 함수 선언식
function myFnc1(a, b) {
    return a + b;
}


// *이벤트
// 1. 인라인 이벤트
function myAlert() {
    alert('안녕하세요. myAlert()');
}

// 2. 프로퍼티 리스너
const BTN2 = document.querySelector('#btn2');
// BTN2.onclick = () => (alert('안녕하세요.'));
BTN2.onclick = myAlert;
// myAlert() 를 사용 하지 않고 myAlert를 사용하는 이유
// 바로 실행하지 않고 콜백함수로 사용하기 위해서

// 3. addEventListener()
//     : 추가한 순서대로 똑같은 이벤트를 계속 추가할 수 있음.
const BTN3 = document.querySelector('#btn3');
BTN3.addEventListener('click', () => (alert('버튼3')));
// - 화살표 함수를 꼭 사용할 필요는 없음(아래 참고)
BTN3.addEventListener('click', function() {
    alert('버튼32222222222');
});
BTN3.addEventListener('click', test);


// 4. removeEventListener() : 이벤트 추가시 사용했던 이벤트 형식과 콜백함수가 완전 동일해야 한다.
BTN3.removeEventListener('click', function() {
    alert('버튼32222222222');
}); // 제거가 안됨
BTN3.removeEventListener('click', test); // 제거 됨
function test() {
    alert('test함수 알러트');
}


// *이벤트 객체
const BTN4 = document.querySelector('#btn4');
BTN4.addEventListener('click', e => {
    console.log(e);
    console.log(e.target.value);
    e.target.style.color = 'red';
});


// -------------------------------------
// *팝업창
const BTN_POPUP = document.querySelector('#popup');
BTN_POPUP.addEventListener('click', () => {
    open('https://naver.com','','width=500 height=500')
});


// *모달
const BTN_MODAL = document.querySelector('#btn-modal');
BTN_MODAL.addEventListener('click', toggleModalContainer);

function toggleModalContainer() {
    const MODAL_CONTAINER = document.querySelector('.modal-container');
    MODAL_CONTAINER.classList.toggle('display-none');
    alert('숨는다')
}

// 1. 모달 컨테이너 영역 클릭시 모달 닫기
const MODAL_CONTAINER = document.querySelector('.modal-container');
MODAL_CONTAINER.addEventListener('click', toggleModalContainer);

// 2. 모달 아이템 영역 눌렀을 때 꺼지지 않게 하는 방법 중 하나
//      toggle이 자식요소와 부모요소 둘다 받기때문에 적용이 안되는거 처럼 보임
const TEST = document.querySelector('.modal-item');
TEST.addEventListener('click', toggleModalContainer);

// 3. mousedown : 마우스를 눌렀을 때 이벤트 (click은 눌렀다가 땠을때 적용)
const H1 = document.querySelector('h1');
H1.addEventListener('mousedown', e => {
    e.target.style.backgroundColor = 'red';
});
// 4. mouseup : 마우스를 땠을때 이벤트
H1.addEventListener('mouseup', e => {
    e.target.style.backgroundColor = '#fff';
});
// 5. mouseenter : 마우스 포인터가 진입했을때 이벤트
H1.addEventListener('mouseenter', e => {
    e.target.style.color = 'orange';
});
// 6. mouseleave : 마우스 포인터가 벗어났을때 이벤트
H1.addEventListener('mouseleave', e => {
    e.target.style.color = '#000';
});
// 7. dblclick : 더블 클릭 이벤트
H1.addEventListener('dblclick', e => {
    e.target.style.color = 'green';
});