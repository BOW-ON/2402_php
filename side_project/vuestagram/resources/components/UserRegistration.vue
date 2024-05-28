<template>
  <div class="form-box">
    <h3 class="form-title">회원가입</h3>
    <input v-model="userRegist.account" type="text" name="account" placeholder="아이디">
    <input v-model="userRegist.password" type="password" name="password" placeholder="비밀번호" autoComplete="off">
    <input type="password" name="password_chk" placeholder="비밀번호 확인" autoComplete="off">
    <input v-model="userRegist.name" type="text" name="name" placeholder="이름" autoComplete="off">
    <div class="radio-box">
      <div>
        <label for="male">남자</label>
        <input v-model="userRegist.gender" type="radio" name="gender" id="male" value="0">
      </div>
      <div>
        <label for="female">여자</label>
        <input v-model="userRegist.gender" type="radio" name="gender" id="female" value="1">
      </div>
    </div>
    <label for="btn-img" class="btn btn-file">프로필 파일 선택</label>
    <input @change="setFile" type="file" name="img" id="btn-img" accept="image/*">
    <span v-if="userRegist.img">{{ userRegist.img.name }}</span>
    <hr>
    <button @click="$store.dispatch('userStoreRegist', userRegist)" class="btn btn-submit btn-bg-black">가입 완료</button>
    <button @click="$router.back()" class="btn btn-submit">취소</button>
  </div>
</template>

<script setup>
import { reactive } from 'vue';

const userRegist = reactive({
  account: '',
  password: '',
  name: '',
  gender:'',
  img: null,
  profileURL: '',
});


function setFile(e) {
  const file = e.target.files[0];
  if (file) {
    userRegist.img = file;
    userRegist.profileURL = URL.createObjectURL(userRegist.img);
  }
}

</script>

<style>


</style>
