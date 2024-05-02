<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- 부트스트랩 -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
  <script src="/view/js/bootstrap/bootstrap.js" defer></script>
  <link rel="stylesheet" href="/view/css/bootstrap/bootstrap.css">
  
  <link rel="stylesheet" href="/view/css/myCommon.css">
  <script src="/view/js/board.js" defer></script>
  <!-- axios 연결(로드 : unpkg CDN 사용) -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <title>자유게시판</title>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- 색상변경 -->
      <div class="container-fluid">
        <a class="navbar-brand" href="#">미니보드</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                게시판
              </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown"> <!-- 색상변경 -->
                  <!-- 게시판 -->
                  <?php 
                    foreach($this->arrBoardsNameInfo as $item) {
                  ?>

                    <li><a class="dropdown-item" href="/board/list?b_type=<?php echo $item["b_type"]; ?>"><?php echo $item["bn_name"]; ?></a></li>

                  <?php    
                    }
                  ?>
                </ul>
            </li>
          </ul>
          <a href="/user/logout" class="navbar-nav nav-link text-light" role="button">로그아웃</a>
        </div>
      </div>
    </nav>
  </header>
    
  <div class="text-center mt-5 mb-5"> <!-- 중앙정렬, 마진(1 = 0.25rem) -->
    <h1><?php echo $this->boardName; ?></h1> <!-- 게시판 제목 -->
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
    <?php
      foreach($this->arrBoardList as $item) {
    ?>
    
    <div class="card">
      <img src="<?php echo $item["b_img"]; ?>" class="card-img-top" alt="이미지">
        <div class="card-body">
          <h5 class="card-title"><?php echo $item["b_title"]; ?></h5>
          <p class="card-text"><?php echo $item["b_content"]; ?></p>
          <button
            value="<?php echo $item["b_id"]; ?>"
            class="btn btn-primary my-btn-detail"
            data-bs-toggle="modal"
            data-bs-target="#modalDetail">상세</button>
        </div>
    </div>
    
    <?php
      }
    ?>

  </main>
  <footer class="fixed-bottom bg-dark text-center text-light p-3">저작권</footer>
  
  <!-- 상세 모달 -->
  <div class="modal" tabindex="-1" id="modalDetail">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">제목</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>내용</p>
          <br>
          <img src="./img/otter_face_end.png" class="card-img-top" alt="이미지">
        </div>
        <div class="modal-footer">
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
        <form action="/board/add" method="post" enctype="multipart/form-data">
          <input type="hidden" name="b_type" value="<?php echo $this->getBoardType(); ?>"> <!-- Review) getter, setter -->
          <div class="modal-header">
            <!-- input -->
            <input type="text" name="b_title" class="form-control" placeholder="제목을 입력하세요.">
          </div>
          <div class="modal-body">
            <!-- textarea -->
            <textarea class="form-control" name="b_content" cols="30" rows="10" placeholder="제목을 입력하세요."></textarea>
            <br><br>
            <input type="file" name="img" accept="image/*">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
            <button type="submit" class="btn btn-primary">작성</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>