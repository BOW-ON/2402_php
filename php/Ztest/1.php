<?php

$btn_page_cnt = 5;
$max_page_num = 30;
$now_page = 11;

$start_page = ceil($now_page / $btn_page_cnt) * $btn_page_cnt - ($btn_page_cnt -1);
$end_page = $start_page + ($btn_page_cnt);
$end_page = $end_page > $max_page_num ? $max_page_num : $end_page;

for($i = $start_page; $i <= $end_page; $i++) {
    echo "$i page\n";
}