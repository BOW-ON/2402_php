// Axios

// axios.get('https://picsum.photos/v2/list?page=1&limit=5')
// .then( response => {
//     console.log(response); // config, data ... 등등 여러가지 정보가 담겨있음
//     console.log(response.data); // data 안에 사용할 데이터가 있음.
// })
// .catch( err => console.log(err))
// .finally( () =>console.log('파이널리'))
// ;

function myAxiosGet() {
    // URL 획득
    const URL = document.querySelector('#input-url').value;

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
        const CONTAINER = document.querySelector('.img-container');
        
        // img 태그 생성
        const ADD_IMG = document.createElement('img');
        ADD_IMG.setAttribute('src', item.download_url);
        ADD_IMG.style = 'width : 200px; height : 200px;'

        // 이미지 화면에 추가
        CONTAINER.appendChild(ADD_IMG);
    });
}

const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', myAxiosGet);