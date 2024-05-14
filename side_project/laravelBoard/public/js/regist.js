// email 검색후 axios 처리
document.querySelector('#btn-chk-email').addEventListener('click', chkEmailPassword);

// async로 작성
async function chkEmailPassword() {
    
    try{
        const email = document.querySelector('#email').value;
        const password = document.querySelector('#password').value;
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

    } catch(err) {
        console.log(err);
        alert('회원가입 실패')
    }

}

