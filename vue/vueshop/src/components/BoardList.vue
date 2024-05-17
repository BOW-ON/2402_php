<template >
  <div v-for="item in props.products" :key="item.productName"> <!-- v-for="(값, 키) in 배열" :key="" : 반복문 -->
    
    <h4 @click="$emit('myOpenModal', item)">{{ item.productName }}</h4>
    <p>{{ item.price }}원</p>
    <!-- <button @click="refPrice += 100 ">가격증가</button> -->
  </div>
  <!-- 부모에서 슬롯을 받아옴 -->
  <slot></slot>
  <ProvideTset />
</template>



<script setup>

import { defineProps } from 'vue';
import ProvideTset from './ProvideTest.vue';

const props = defineProps({
  'products': Object
});


// console.log(props);

</script>



<style>
    
</style>