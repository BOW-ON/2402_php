<template >

  <div class="bg_black" v-if="data.flgModal"> <!-- v-if : 모달 출력 여부-->
    <div class="bg_white">
      <img :src=" data.product.img "> <!-- :속성 : 원래 속성명을 vue 문법으로 사용하고 싶을때 콜론(:)을 붙이고 {{ }}를 뺀다-->
      <h4>{{ data.product.productName }}</h4>
      <p>{{ data.product.productContent }}</p>
      <p>{{ data.product.price }} 원</p>
      <!-- <button @click= "flgModal = !flgModal">닫기</button> -->
    </div>
  </div>

</template>

<script setup>
import { defineProps } from 'vue';

const data = defineProps({
  'product': Object
  ,'flgModal': Boolean
});


console.log(data);

</script>

<style>
    
</style>