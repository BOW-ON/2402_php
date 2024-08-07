@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '회원가입')

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh', "vh-100")

{{-- 메인 --}}
@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <div>
        <h2>500 에러</h2>
        <p>정상적으로 처리되지 않았습니다.</p>
        <p>잠시 후 다시 시도해 주십시오.</p>
        <a href="{{route('get.login')}}">로그인페이지 돌아가기</a>
    </div>
</main>
@endsection
