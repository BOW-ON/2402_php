@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '회원가입')

{{-- 회원가입용 js --}}
@section('script')
  <script src="/js/regist.js" defer></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh', "vh-100")

{{-- 메인 --}}
@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
  <form style ="width: 400px" action="{{route('regist.store')}}" method="post">
    
    @csrf       {{-- csrf 토큰 설정 --}}
    {{-- 에러 메세지 표시 --}}
    @if ($errors->any())
    <div class="form-text text-danger">
      {{-- 에러 메세지 루프 처리 --}}
      @foreach ($errors->all() as $err)
      <span>{{$err}}</span>
      <br> 
      @endforeach
    </div>
    @endif
    
    <label for="email" class="form-label">이메일</label>
    <span id="print-chk-email"></span>
    <button id="btn-chk-email" type="button" class="btn btn-secondary float-end mb-1">중복 확인</button>
    <input type="text" class="form-control mb-3" id="email" name="email">

    <label for="name" class="form-label">이름</label>
    <input type="text" class="form-control mb-3" id="name" name="name">

    <label for="password" class="form-label">비밀번호</label>
    <input type="password" class="form-control mb-3" id="password" name="password">

    <label for="password-chk" class="form-label">비밀번호 확인</label>
    <input type="password" class="form-control mb-3" id="password-chk" name="password-chk">

    {{-- oninput : 입력값을 받아 실시간으로 처리 --}}
    <input type="text" oninput="handleInput(event)">

    <script>
        function handleInput(event) {
            console.log('Input value:', event.target.value);
            if (event.target.value === '1') {
              return 'oninput 테스트'
            } else {
              return 'oninput 테스트2'
            }
        }
    </script>

    <button id="my-btn-complete" type="submit" class="btn btn-dark">완료</button>
    {{-- <button id="my-btn-complete" type="submit" disabled="disabled" class="btn btn-dark">완료</button> --}}
    <a href="{{route('get.login')}}" class="btn btn-danger float-end">취소</a>

  </form>
</main>
@endsection
