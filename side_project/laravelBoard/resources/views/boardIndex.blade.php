@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', $boardNameInfo->name)

{{-- 자바스크립트 파일 --}}
@section('script')
  <script src="/js/board.js" defer></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

{{-- 메인 --}}
@section('main')
<div class="text-center mt-5 mb-5"> <!-- 중앙정렬, 마진(1 = 0.25rem) -->
  <h1>{{$boardNameInfo->name}}</h1>
  <!-- 아이콘 설정 --> <!-- 모달 연결-->
  <svg
    xmlns="http://www.w3.org/2000/svg"
    width="50"
    height="50"
    fill="currentColor"
    class="bi bi-journal-plus"
    viewBox="0 0 16 16"
    data-bs-toggle="modal"
    data-bs-target="#modalInsert"
  >
    <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
  </svg>
</div>

<main>

  @foreach($data as $item)
  <div class="card" id="card{{$item->id}}">
    <img src="{{$item->img}}" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">{{$item->title}}</h5>
      <p class="card-text">{{$item->content}}</p>
      <button
        href="#"
        class="btn btn-primary my-btn-detail"
        data-bs-toggle="modal"
        data-bs-target="#modalDetail"
        value="{{$item->id}}">상세</button>
    </div>
  </div>

  @endforeach
  
</main>

  <!-- 상세 모달 -->
<div class="modal" tabindex="-1" id="modalDetail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">제목</h5> <!-- board.js에서 클릭 이벤트시 제목 삽입 처리 --> 
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="경로" class="card-img-top" alt="이미지"> <!-- board.js에서 클릭 이벤트시 경로 삽입 처리 --> 
        <br>
        <p>내용</p> <!-- board.js에서 클릭 이벤트시 내용 삽입 처리 --> 
      </div>
      <div class="modal-footer justify-content-between">
        <div>
            <button id="my-btn-delete" type="button" class="btn btn-danger" data-bs-dismiss="modal">삭제</button>
        </div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>
</div>

  <!-- 작성 모달 -->
  <div class="modal" tabindex="-1" id="modalInsert">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- 폼 컨트롤 -->
        <form action="{{route('board.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="type" value="{{$boardNameInfo->type}}">
          <div class="modal-header">
            <!-- input -->
            <input type="text" class="form-control" name="title" placeholder="제목을 입력하세요.">
          </div>
          <div class="modal-body">
            <!-- textarea -->
            <textarea class="form-control" name="content" cols="30" rows="10" placeholder="제목을 입력하세요."></textarea>
            <br><br>
            <input type="file" name="file" accept="image/*">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
            <button type="submit" class="btn btn-primary">작성</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
