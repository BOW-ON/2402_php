import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';
import BoardCreateComponent from '../components/BoardCreateComponent.vue';
import RegistrationComponent from '../components/RegistrationComponent.vue';
import store from './store';

const routes = [
		{
            path: '/',
            redirect: '/login',
        },
        {
            path: '/login',
            component: LoginComponent,
        },
        {
            path: '/board',
            component: BoardComponent,
            beforeEnter: chkAuth, // beforeEnter : path 처리 하기 전에 먼저 실행함
        },
        {
            path: '/board/create',
            component: BoardCreateComponent,
            beforeEnter: chkAuth,
        },
        {
            path: '/registration',
            component: RegistrationComponent,
        },
];

// 로그인 상태일때만 페이지 이동
function chkAuth(to, from, next) {
    if(store.state.authFlg) {
        next(); // 원래 이동하려는 처리를 실행
    } else {
        alert('로그인이 필요한 서비스 입니다.');
        next('/login'); // 로그인 페이지로 이동
    }
}


const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
