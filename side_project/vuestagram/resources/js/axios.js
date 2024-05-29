import axios from 'axios';

const axiosInstance = axios.create({
    // baseURL 기본 URL 설정
    //  ex) baseURL: 'http://주소:포트',

    // 기본 헤더 설정
    headers: {
        // 기본 값 : 'Content-Type': 'multipart/form-data',
        'Content-Type': 'application/json',
    }
});

export default axiosInstance;