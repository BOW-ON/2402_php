<?php
// * 디렉토리
// 1. is_dir : 디렉토리 존재여부 체크
if(is_dir("./test")){
    echo "이미 존재하는 디렉토리\n";
}
else {
    echo "없는 디렉토리\n";

    // 2. mkdir : 디렉토리(폴더) 생성
    $result = mkdir("./test", 777);
    // 참고) 권한 :  777(모든 권한), 666(읽기,쓰기), 444(읽기) 등
    if($result) {
        echo "디렉토리 생성 성공\n";
    }
    else {
        echo "디렉토리 생성 실패\n";
    }
}

// 3. rmdir : 디렉토리 삭제
$result = rmdir("./test");
if($result) {
    echo "디렉토리 삭제 성공\n";
}
else {
    echo "디렉토리 삭제 실패\n";
}

// 4. 디렉토리 열기 및 읽기
$open_dir = opendir("./"); // 디렉토리 열기
while($item = readdir($open_dir)) {
    // 변수가 존재하면 true로 인식
    echo $item."\n";
}

// 5. 디렉토리 닫기
closedir($open_dir);
// void는 리턴값이 없어서 if 없이 닫기만 하면 됨.

// *파일
// 1. 파일 오픈
$file = fopen("./999_test.php", "a");
// 기존 파일이 없더라도 쓰기전용으로 오픈하면 파일이 생성됨.
if ($file) {
    echo "파일 오픈 성공";
    
    // 2. 파일에 데이터 쓰기
    fwrite($file, "글쓰기 테스트\n");

    // 3. 파일 닫기
    fclose($file);
}
else {
    echo "파일 오픈 실패";
}

// 4. 파일 삭제
unlink("./999_test.php");
// bool이므로 원래는 if 처리 필요함