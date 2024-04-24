// 함수
function btn(){
    alert('안녕하세요.\n숨어있는 div를 찾아보세요.')
}

function dodo(){
    alert('두근두근')
}

function click(e) {
    alert('들켰다!')
    e.target.style.backgroundColor = 'beige';
    DIV.removeEventListener('mouseenter', dodo);
    DIV.removeEventListener('click', click);
    DIV.addEventListener('click', click2);
}


function click2(e) {
    alert('다시 숨는다.');
    e.target.style.backgroundColor = 'white';
    DIV.removeEventListener('click', click2);
    DIV.addEventListener('mouseenter', dodo);
    DIV.addEventListener('click', click);
    const randomTop = Math.random() * 90 + 'vh';
    const randomLeft = Math.random() * 90 + 'vw';
    DIV.style.top = randomTop;
    DIV.style.left = randomLeft;
}



// 1. 버튼을 클릭시 아래 내용의 알러트가 나옵니다.
    // "안녕하세요."
    // "숨어있는 div를 찾아보세요."
    const BTN = document.querySelector('#btn');
    BTN.addEventListener('click', btn);


// 2-1. 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다.
    // "두근두근"
    const DIV = document.querySelector('.container');
    DIV.addEventListener('mouseenter', dodo);
// 2-2. 들킨 상태에서는 알러트가 안나옵니다. 안 들켰으면 계속 알러트가 나와야 합니다.


// 3. 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
    // "들켰다!"
    DIV.addEventListener('click', click);
   

// 4. 3번의 상태에서 다시 한번더 클릭하면 아래의 알러트를 출력하고, 배경색이 흰색으로 바뀌어 안보이게 됩니다.
    // "다시 숨는다."

