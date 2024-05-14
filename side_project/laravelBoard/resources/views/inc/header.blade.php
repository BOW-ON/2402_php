<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- 색상변경 -->
    <div class="container-fluid">
      <a class="navbar-brand" href="#">미니보드</a>
      @auth {{-- 로그인 상태 확인 후 처리 : @auth(로그인이 되어있을 경우)--}}
       
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              게시판
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown"> <!-- 색상변경 -->
              @foreach($globalBoardNameInfo as $item)
              <li><a class="dropdown-item" href="{{route('board.index').'?type='.$item->type}}">{{$item->name}}</a></li>
              @endforeach
            </ul>
          </li>
        </ul>


        <a href="{{route('logout')}}" class="navbar-nav nav-link text-light" role="button">로그아웃</a>
      </div>
      
      @endauth

      @guest {{-- 로그인 상태 확인 후 처리 : @guest(로그인이 되어 있지 않을 경우) --}}

      {{-- 회원 가입 페이지에서 회원가입 버튼 없애기 --}}
      @if (Route::currentRouteName() !== 'regist.index')
      {{-- Route::currentRouteName() : 현재 실행된 라우트의 이름을 반환 --}}
      <a href="{{ route('regist.index') }}" class="navbar-nav nav-link text-light" role="button">회원가입</a>
      @endif

      @endguest
      
    </div>
  </nav>
</header> 