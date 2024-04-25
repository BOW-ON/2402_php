// 함수 두근두근
const myDokidoki = (e) => {
    alert('두근두근');
}
// 함수 들켰다.
const myBusted = () => {
    alert('들켰다');
    const DIV_BOX = document.querySelector('.box');
    const DIV_CONTAINER = document.querySelector('.container');
    DIV_BOX.classList.toggle('busted'); // 배경색 부여
    DIV_BOX.removeEventListener('click', myBusted); // 기존 들켰다 이벤트 제거
    DIV_BOX.addEventListener('click', myHide ) // 숨는다 이벤트 추가
    DIV_CONTAINER.removeEventListener('mouseenter', myDokidoki); // 기존 두근두근 이벤트 제거
}
// 함수 숨는다.
const myHide = () => {
    const DIV_BOX = document.querySelector('.box');
    const DIV_CONTAINER = document.querySelector('.container');
    alert('숨는다.');
    DIV_BOX.classList.toggle('busted'); // 배경색 부여
    DIV_BOX.removeEventListener('click', myHide); // 기존 숨는다 이벤트 제거
    DIV_BOX.addEventListener('click', myBusted); // 들켰다 이벤트 추가
    DIV_CONTAINER.addEventListener('mouseenter', myDokidoki); // 두근두근 이벤트 추가
    
    // 랜덤 위치 조절
    //  = 랜덤값 * (브라우저 너비|높이 - div.container 너비|높이)의 반올림 값
    const RANDOM_X = Math.round(Math.random() * (window.innerWidth - 100));
    //  window.innerWidth가 화면 끝에 부여 될경우 상자가 화면 바깥으로 출력 되므로 상자 크기만큼(100px) 뺴줘야됨
    const RANDOM_Y = Math.round(Math.random() * (window.innerHeight - DIV_CONTAINER.offsetHeight));
    //  100px을 직접 적지 않고 DIV_CONTAINER.offsetHeight 작성하여 height를 가져올 수 있다.
    DIV_CONTAINER.style.top = `${RANDOM_Y}px`;
    DIV_CONTAINER.style.left = `${RANDOM_X}px`;
}

// 보통 메모리에 불필요한 const가 남아있으면 추후 문제가 발생할 수도 있기 때문에 즉시 실행 함수로 실행함
( () => {

    //1. 
    const BTN_INFO = document.querySelector('#btn');
    BTN_INFO.addEventListener('click', () => (alert('안녕하세요.\n숨어있는 div를 찾아보세요.')));
    
    //2.
    const DIV_CONTAINER = document.querySelector('.container');
    DIV_CONTAINER.addEventListener('mouseenter', myDokidoki);
    // 함수를 넣을때 ()빼고 입력, myDokidoki()을 입력시 바로 호출하므로 이벤트를 하기도 전에 호출됨
    
    
    //3.
    const DIV_BOX = document.querySelector('.box');
    DIV_BOX.addEventListener('click', myBusted);

} )();
