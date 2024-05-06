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
  <title><?php echo $this->boardName; ?></title>
</head>
<body>
  <!-- 헤더 -->
  <?php require_once("view/inc/header.php"); ?>
    
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
    
    <div class="card" id="card<?php echo $item["b_id"]; ?>">
      <?php
        if(!empty($item["b_img"])){
      ?>
        <img src="<?php echo $item["b_img"]; ?>" class="card-img-top">
      <?php    
        }
      ?>
      <!-- 같은 처리 -->
      <!-- <img src="<?php //echo empty($item["b_img"]) ? "" : $item["b_img"]; ?>" class="card-img-top"> -->

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
        <form action="" method="post">
          <div class="modal-header">
            <h5 class="modal-title">제목</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>내용</p>
            <br>
            <?php
              if(!empty($item["b_img"])){
            ?>
              <img src="<?php echo $item["b_img"]; ?>" class="card-img-top">
            <?php    
              }
            ?>
          </div>
          <div class="modal-footer justify-content-between">
            <div>
              <!-- <button type="button" class="btn btn-warning">수정</button> -->
              <button id="my-btn-delete" type="button" class="btn btn-danger" data-bs-dismiss="modal">삭제</button>
            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
          </div>
        </form>
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
            <input type="file" name="img" accept="video/*">
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