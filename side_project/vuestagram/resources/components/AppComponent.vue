<template>
  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="header-content">
        <div class="title">
          <router-link to="/board"><h1>Vuestagram</h1></router-link>
        </div>
        <img class="img-logo" src="/logo.png">
        <div class="btn-group">
          <div v-if="!$store.state.authFlg">
            <router-link v-if="route.path === '/userRegist'" to="/login">
              <button class="btn btn-header btn-bg-black">로그인</button>
            </router-link>
            <router-link v-else-if="route.path === '/login'" to="/userRegist">
              <button class="btn btn-header btn-bg-white">회원가입</button>
            </router-link>
          </div>

          <!-- <div v-if="!$store.state.authFlg">
              <router-link to="/login"><button class="btn btn-header btn-bg-black">로그인</button></router-link>
              <router-link to="/regist"><button class="btn btn-header btn-bg-white">가입하기</button></router-link>
          </div> -->


          <div v-else>
            <button @click="$store.dispatch('logout')" class="btn btn-header btn-bg-black">로그아웃</button>
          </div>
        </div>
      </div>
    </div>
  </header>
  <hr>

  <!-- Main -->
  <main>
    <UserInfoComponent v-if="$store.state.authFlg"/>
    <div class="container">
      <router-view></router-view>
    </div>
  </main>

  <!-- Footer -->
  <footer>
      <p>저작권</p>
  </footer>
</template>
<script setup>
import UserInfoComponent from './UserInfoComponent.vue';
import { useRoute } from 'vue-router';

const route = useRoute();

</script>
<style>
@import url('../css/common.css');


</style>