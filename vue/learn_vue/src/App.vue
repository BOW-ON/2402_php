<template>
  <h1>테스트</h1>
  <p>{{ cnt }}</p>
  <button @click="cnt++">증가</button>
  <button @click="cnt--">감소</button>
  <main>
    <!-- 화면 전환 해도 라이프사이클 훅 실행 안됨 -->
    <router-link to="/login"><button>로그인</button></router-link>
    <router-link to="/board"><button>게시판</button></router-link>
    <router-view></router-view>
    <button @click="movePath('/login')">JS 로그인</button>
    <button @click="movePath('/board')">JS 게시판</button>

    <!-- 화면 전환 하면 라이프사이클 훅 실행 됨 -->
    <!-- <button @click="flg = 0">로그인</button>
    <button @click="flg = 1">게시판</button>
    <LoginComponent v-if="flg === 0"/>
    <BoardComponent v-if="flg === 1"/> -->

  </main>
</template>

<script setup>
import { ref, onBeforeMount, onMounted, onBeforeUpdate, onUpdated, onBeforeUnmount, onUnmounted } from 'vue';
// import BoardComponent from './components/BoardComponent.vue';
// import LoginComponent from './components/LoginComponent.vue';
import router from './router.js';

// // 컴포넌트 전환용 플래그
// const flg = ref(0);


// ----------------------------
// js에서 vue route 사용
// ----------------------------
function movePath(path) {
  // push('경로') : URL 히스토리를 추가하면서 URL 이동 (뒤로가기 해도 기록이 남아서 돌아갈 수 있음)
  // router.push(path);
  
  // replace('경로') : URL 히스토리를 추가하지 않고 URL 이동 (뒤로가기 해도 기록이 남지 않아서 돌아갈 수 없음)
  router.replace(path);
}






// 라이프사이클 훅 관련 함수
const cnt = ref(0);

onBeforeMount( ()=> {
  console.log('비포 마운트');
});
onMounted(() => {
  console.log('마운티드');
});


onBeforeUpdate( () => {
  console.log('비포 업데이트')
  if( cnt.value === 5 ){
    cnt.value = 0;
  } else if (cnt.value === -5) {
    cnt.value = 0;
  }
});
onUpdated( () =>{
  console.log('업데이티드')
});


onBeforeUnmount( () => {
  console.log('비포 언마운트')
});
onUnmounted( () => {
  console.log('언마운트')
});


</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
