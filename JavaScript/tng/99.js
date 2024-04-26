function myAxiosGet() {
    // URL 획득
    const URL = document.querySelector('#search-input').value;

    // Axios 처리
    axios.get(URL)
    .then(response => {
        myMakeImg(response.data);
    })
    .catch();
}

// 사진데이터를 화면에 추가하는 함수
function myMakeImg(data) {
    data.forEach(item => {
        // 부모요소 접근
        const CONTAINER = document.querySelector('.main');
        
        // no 태그 생성
        const ADD_NO = document.createElement('div');
        ADD_NO.textContent = item.id;
        ADD_NO.style = 'font-weight :bold; text-align: center; background-color : gray; padding : 5px;'

        // img 태그 생성
        const ADD_IMG = document.createElement('img');
        ADD_IMG.setAttribute('src', item.download_url);
        ADD_IMG.style = 'width : 100%; height : 80%;'

        // no, 이미지를 화면에 추가
        CONTAINER.appendChild(ADD_NO);
        ADD_NO.appendChild(ADD_IMG);
    });
}


function myAxiosDEL() {
    const URL_DEL = document.querySelector('.main')
    URL_DEL.textContent = ''
}

const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', myAxiosGet);

const BTN_DEL = document.querySelector('#btn-del');
BTN_DEL.addEventListener('click', myAxiosDEL);


