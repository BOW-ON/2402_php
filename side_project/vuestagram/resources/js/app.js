require('./bootstrap');

import { createApp } from 'vue';
import router from './router.js';
import store from './store.js';
import AppComponent from '../components/AppComponent.vue';

// *createApp 사용시 단일 파일에서 컨포넌트를 한번에 많이 등록하는 법
//      >> components 속성 사용
createApp({
    components: {
        AppComponent,
    }
})
.use(router)
.use(store)
.mount('#app');

// *createApp 사용시 컨포넌트가 많지 않을때 확실하게 등록하는법
//      >> component 메소드 사용
// const app = createApp({});
// app.component('App-component', AppComponent);
// app.use(router);
// app.use(store);
// app.mount('#app');