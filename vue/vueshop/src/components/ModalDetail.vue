<template >

<Transition name="container">
  
  <div class="bg_black" v-if="props.flgModal"> <!-- v-if : 모달 출력 여부-->
    <div class="bg_white">
      <img :src=" props.product.img "> <!-- :속성 : 원래 속성명을 vue 문법으로 사용하고 싶을때 콜론(:)을 붙이고 {{ }}를 뺀다-->
      <h4>{{ props.product.productName }}</h4>
      <p>{{ props.product.productContent }}</p>
      <p>{{ props.product.price }} 원</p>
      <p>총액 : {{ props.product.price * cnt }} 원</p>
      <input type="number" min="1" v-model="cnt">
      <br>
      <br>
      <!-- 부모에서 받아온 요소를 자식에서 직접적으로 변경할 수 없음, so)  컴포넌트 이벤트 이용 -->
      <!-- <button @click= "flgModal = !flgModal">닫기</button> -->
      <button @click= "close()">닫기</button>
    </div>
  </div>

</Transition>


</template>

<script setup>
import { defineEmits, defineProps, ref } from 'vue';

const props = defineProps({
  'product': Object
  ,'flgModal': Boolean
});
const emit = defineEmits(['myCloseModal']);

// 총액 처리 부분
const cnt = ref(1);

function close() {
  cnt.value = 1;
  emit('myCloseModal', props.product.productName);
}

// console.log(props);

</script>

<style>
.container-enter-from {
  opacity: 0;
}
.container-enter-active {
  transition: 0.5s ease;
}
.container-enter-to {
  opacity: 1;
}

.container-leave-from {
  transform: translateX(0px);
}
.container-leave-active {
  transition: all 20s;
}
.container-leave-to {
  transform: translateX(100000px);
}

</style>