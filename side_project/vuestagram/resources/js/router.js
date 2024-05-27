import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';
import BoardCreateComponent from '../components/BoardCreateComponent.vue';
import UserRegistComponent from '../components/UserRegistration.vue';
import store from './store';

function chkAuth(to, from, next) {
    if(!store.state.authFlg) {
        next('/login');
    }
    next();
}

function chkAuthReturn(to, from, next) {
    if(to.path === '/login' && store.state.authFlg) {
        if(from.path === '/') {
            next('board');
        }
        next(from.path);
    }
    next();
}

const routes = [
    // 기본 라우터
    {
        path: '/',
        redirect: '/login',
    },
    // 로그인 라우터
    {
        path: '/login',
        component: LoginComponent,
        beforeEnter: chkAuthReturn,
    },
    // 보드 라우터
    {
        path: '/board',
        component: BoardComponent,
        beforeEnter: chkAuth, // beforeEnter : path로 이동하기전에 실행 (보통 권한체크 할때 많이 사용함)
    },
    // 작성 라우터
    {
        path: '/create',
        component: BoardCreateComponent,
        beforeEnter: chkAuth, 
    },
    // 회원가입 라우터
    {
        path: '/userRegist',
        component: UserRegistComponent,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;