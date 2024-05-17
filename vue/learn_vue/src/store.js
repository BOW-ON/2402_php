import { createStore } from "vuex";

const store = createStore ({
  state() {
    // 데이터가 저장되는 영역
    return {
      account: '',
    }
  },
  mutations: {
    // 데이터를 수정할 수 있는 함수들을 정의하는 영역
    setAccount(state, account) {
      // 파라미터 state는 위 state() 영역을 나타내므로 무조건 지정, account는 우리가 받을 파라미터
      state.account = account;
    }
  },
  actions: {
    // 비동기성 비지니스 로직 함수들을 정의하는 영역

  }
});

export default store;