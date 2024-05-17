import { createApp } from 'vue'
import App from './App.vue'

import router from './router.js' // .js 생략 가능
import Store from './store.js'

createApp(App)
.use(router) // view App을 createApp할때 router를 사용
.use(Store)
.mount('#app')
