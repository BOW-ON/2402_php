<template>
    <div  class="user-info-box">
      <img :src= "$store.state.userInfo.profile">
      <div class="user-info-content">
        <h2> {{ $store.state.userInfo.name }}</h2>
        <h3>작성글 수 : {{ $store.state.userInfo.boards_count }}
          <button @click="$store.dispatch('accountIndex', $store.state.userInfo.account)" class="btn btn-bg-white">내글 보기</button>
          <button @click="$store.dispatch('getBoardData')" class="btn btn-bg-white">전체 보기</button>
        </h3>
      </div>
      <router-link to="/board/create"><button class="btn btn-submit b">글작성</button></router-link>
    </div>
    <hr>
</template>

<script setup>
</script>

<style>
@import url('../css/userInfo.css');
</style>
