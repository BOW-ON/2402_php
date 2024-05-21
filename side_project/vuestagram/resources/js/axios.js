import axios from 'axios';

const axiosInstance = axios.create({
    // baseURL 기본 URL 설정
    //  ex) baseURL: 'http://주소:포트',

    // 기본 헤더 설정
    headers: {
        'Content-Type': 'application/json',
    }
});

export default axiosInstance;