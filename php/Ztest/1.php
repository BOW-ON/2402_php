<?php

$list_cnt = 5; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화


$btn_page_cnt = 5;  // 한페이지 버튼 숫자  >> $offset
$max_page_num = 30; // 총 페이지
$now_page = 30;     // 현재 페이지  >> $page_num

$start_page = ceil($now_page / $btn_page_cnt) * $btn_page_cnt - ($btn_page_cnt - 1);
$end_page = $start_page + ($btn_page_cnt - 1);
$end_page = $end_page > $max_page_num ? $max_page_num : $end_page;

for($i = $start_page; $i <= $end_page; $i++) {
    echo "$i page\n";
}


// 한페이지 버튼 숫자  >> $offset

$start_page = ceil($page_num / $offset) * $offset - ($offset - 1);
$end_page = $start_page + ($offset - 1);
$end_page = $end_page > $max_page_num ? $max_page_num : $end_page;

for($num = $start_page; $num <= $end_page; $num++) {
    echo "$num page\n";
}




//버튼
$max_page_num = ceil($result_board_cnt / $list_cnt);
$prev = ($id - 1) < 1 ? 1 : ($id - 1);
$next = ($id + 1) >= $max_board_id ? $max_board_id : ($id + 1); //TODO : +1말고 다음키로 넘어가는거 만들어야함.