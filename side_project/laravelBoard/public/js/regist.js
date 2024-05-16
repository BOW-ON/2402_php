// email 검색후 axios 처리
document.querySelector('#btn-chk-email').addEventListener('click', chkEmail);
let registChk = {
    'emailChk': false
    ,'passwordChk': false
    ,'nameChk': false
};

// 이메일 체크(async로 작성)
async function chkEmail() {
    
    try{
        const email = document.querySelector('#email').value;

        const url = '/user/chk';
    
    
        // 폼 데이터 생성
        const form = new FormData();
        form.append('email', email);
    
        // Ajax
        const response = await axios.post(url, form);

        const btnComplete = document.querySelector('#my-btn-complete');
        const printChkEmail = document.querySelector('#print-chk-email');
        printChkEmail.innerHTML = '';
        // 정상 처리
        if(response.data.emailFlg) {
            // 중복 이메일
            printChkEmail.innerHTML = '사용불가';
            printChkEmail.classList = 'text-danger fw-bold';
            btnComplete.setAttribute('disabled', 'disabled');
        } else {
            // 사용 가능 이메일
            printChkEmail.innerHTML = '사용가능';
            printChkEmail.classList = 'text-success fw-bold';
            btnComplete.removeAttribute('disabled');
        }

        // TODO : chkRegist 추가

    } catch(err) {
        console.log(err);
        alert('회원가입 실패')
    }

}

// 이름 체크
async function chkName() {
    try{
        const name = document.querySelector('#name').value;

        const url = '/user/chk';
    
    
        // 폼 데이터 생성
        const form = new FormData();
        form.append('name', name);
    
        // Ajax
        const response = await axios.post(url, form);

        const btnComplete = document.querySelector('#my-btn-complete');
        const printChkEmail = document.querySelector('#print-chk-email');
        printChkEmail.innerHTML = '';
        // 정상 처리
        if(response.data.emailFlg) {
            // 중복 이메일
            printChkEmail.innerHTML = '사용불가';
            printChkEmail.classList = 'text-danger fw-bold';
            btnComplete.setAttribute('disabled', 'disabled');
        } else {
            // 사용 가능 이메일
            printChkEmail.innerHTML = '사용가능';
            printChkEmail.classList = 'text-success fw-bold';
            btnComplete.removeAttribute('disabled');
        }

        // TODO : chkRegist 추가

    } catch(err) {
        console.log(err);
        alert('회원가입 실패')
    }
}

// 패스워드 체크
async function chkPassword() {
    try{
        const password = document.querySelector('#password').value;

        const url = '/user/chk';
    
    
        // 폼 데이터 생성
        const form = new FormData();
        form.append('email', email);
    
        // Ajax
        const response = await axios.post(url, form);

        const btnComplete = document.querySelector('#my-btn-complete');
        const printChkEmail = document.querySelector('#print-chk-email');
        printChkEmail.innerHTML = '';
        // 정상 처리
        if(response.data.emailFlg) {
            // 중복 이메일
            printChkEmail.innerHTML = '사용불가';
            printChkEmail.classList = 'text-danger fw-bold';
            btnComplete.setAttribute('disabled', 'disabled');
        } else {
            // 사용 가능 이메일
            printChkEmail.innerHTML = '사용가능';
            printChkEmail.classList = 'text-success fw-bold';
            btnComplete.removeAttribute('disabled');
        }

        // TODO : chkRegist 추가

    } catch(err) {
        console.log(err);
        alert('회원가입 실패')
    }
}

// 패스워드 확인 체크
async function chkPasswordChk() {
    try{
        const password2 = document.querySelector('#password-chk').value;

        const url = '/user/chk';
    
    
        // 폼 데이터 생성
        const form = new FormData();
        form.append('email', email);
    
        // Ajax
        const response = await axios.post(url, form);

        const btnComplete = document.querySelector('#my-btn-complete');
        const printChkEmail = document.querySelector('#print-chk-email');
        printChkEmail.innerHTML = '';
        // 정상 처리
        if(response.data.emailFlg) {
            // 중복 이메일
            printChkEmail.innerHTML = '사용불가';
            printChkEmail.classList = 'text-danger fw-bold';
            btnComplete.setAttribute('disabled', 'disabled');
        } else {
            // 사용 가능 이메일
            printChkEmail.innerHTML = '사용가능';
            printChkEmail.classList = 'text-success fw-bold';
            btnComplete.removeAttribute('disabled');
        }

        // TODO : chkRegist 추가

    } catch(err) {
        console.log(err);
        alert('회원가입 실패')
    }
}


// 이메일, 패스워드, 패스워드 확인, 이름이 모두 확인 되면 버튼 활성화
async function chkRegist() {
    try{

        // 폼 데이터 생성
        const form = new FormData();
        form.append('email', email);
    
        // Ajax
        const response = await axios.post(url, form);

        const btnComplete = document.querySelector('#my-btn-complete');
        const printChkEmail = document.querySelector('#print-chk-email');
        printChkEmail.innerHTML = '';
        // 정상 처리
        if(response.data.emailFlg) {
            // 중복 이메일
            printChkEmail.innerHTML = '사용불가';
            printChkEmail.classList = 'text-danger fw-bold';
            btnComplete.setAttribute('disabled', 'disabled');
        } else {
            // 사용 가능 이메일
            printChkEmail.innerHTML = '사용가능';
            printChkEmail.classList = 'text-success fw-bold';
            btnComplete.removeAttribute('disabled');
        }

        // TODO : chkRegist 추가

    } catch(err) {
        console.log(err);
        alert('회원가입 실패')
    }
}
