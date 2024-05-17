<!-- template :  HTML 작성하는 부분 -->
<template>
  <img alt="Vue logo" src="./assets/logo.png">

  <!-- 헤더 -->
  <!-- props : 자식 컴포넌트에게 props 속성을 이용해서 데이터를 전달-->
  <HearderComponent :navList="navList" />

  <!-- 컴포넌트 분리 -->
  <!-- <div class="nav" >
  <a v-for="item in navList" :key="item.navName" :href="item.navHref" >{{ item.navName }}</a>
  </div> -->


  <!-- 상품 리스트 -->
  <BoardList
    :products = "products"
    :price = "productPrices"
    @myOpenModal ="myOpenModal"
  >
    <!-- slot : 자식쪽에서 <slot></slot> 부분에 전달하여 자식 컴포넌트에서 렌더링 -->
    <h3>부모쪽에서 정의한 슬롯</h3>
  </BoardList>

  <!-- 컴포넌트 분리 -->
  <!-- <div v-for="item in products" :key="item.productName"> -->
    <!-- v-for="(값, 키) in 배열" :key="" : 반복문 -->
    <!-- <h4 @click="myOpenModal(item)">{{ item.productName }}</h4> -->
    <!-- <p>{{ item.price }}원</p> -->
    <!-- <button @click="refPrice += 100 ">가격증가</button> -->
    <!-- <button @click="item.price += 100 ">가격증가</button> -->
  <!-- </div> -->



  <!-- 모달 -->
  <!-- 컨포넌트 이벤트 : 부모 @, 자식 $emit 이용 -->
  <ModalDetail
    :product="product"
    :flgModal="flgModal"
    @myCloseModal="myCloseModal"
    />



<!-- 
  <div class="bg_black" v-if="flgModal"> 
    v-if : 모달 출력 여부
    <div class="bg_white">
      <img :src=" product.img "> 
      :속성 : 원래 속성명을 vue 문법으로 사용하고 싶을때 콜론(:)을 붙이고 {{ }}를 뺀다
      <h4>{{ product.productName }}</h4>
      <p>{{ product.productContent }}</p>
      <p>{{ product.price }} 원</p>
      <button @click= "flgModal = !flgModal">닫기</button>
    </div>
  </div> -->


</template>



<!-- script : js 작성하는 부분 -->
<script setup> 
// setup : 컴포넌트의 스크립트 부분을 더 간결하고 직관적으로 작성.(Composition API)
//  vue 에서 Composition API, Option API 비교

import { ref, reactive, provide } from 'vue'; // vue에 있는 ref, reactive 함수 import 함
import HearderComponent from './components/HeaderComponent.vue'; // 자식 컴포넌트 import 함
import BoardList from './components/BoardList.vue'; // 자식 컴포넌트 import 함
import ModalDetail from './components/ModalDetail.vue'; // 자식 컴포넌트 import 함

// -----------------------------
// *데이터 바인딩
// -----------------------------

// 1. ref : 타입제한 없이 사용가능하나 일반적으로 string, number, boolean 과 같은 기본유형에 대한 반응적 참조를 위해 사용
// const refPants = ref('바지');
// const refPrice = ref(1000);

// 2. reactive : 객체 타입에서만 사용가능하며, 해당 객체에 대한 반응적 참조를 위해 사용
const products = reactive([
  {productName: '수달', price: 1000, productContent: '수달입니다.', img: require('@/assets/img/o1.png')}
  ,{productName: '폴더', price: 2000, productContent: '폴더 입니다.', img: require('@/assets/img/f1.png')}
  ,{productName: '휴지통', price: 3000, productContent: '휴지통 입니다.', img: require('@/assets/img/d1.png')}
]);


// ---------------------------
// *헤더 처리
// ---------------------------
const navList  = reactive([
  {navName:'홈', navHref : '#'}
  ,{navName: '상품', navHref : '#'}
  ,{navName: '기타', navHref : '#'}
  ,{navName: '질문', navHref : '#'}
]);


// -----------------------------
// *모달용
// -----------------------------
const flgModal = ref(false); // 모달 표시용 플래그
let product = reactive({});

function myOpenModal(item) {
  flgModal.value = !flgModal.value;
  product = item;

}

function myCloseModal() {
  flgModal.value = !flgModal.value;
}


// Provide / Inject 연습 (ProvideTest.vue)
const count = ref(0);

function addCount() {
  count.value++;
}

provide('test', {
  count
  ,addCount
});

</script>


<!-- style : css 작성하는 부분 -->
<style>
@import url('./assets/css/common.css'); /* css 파일 불러오기 */

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

</style>
