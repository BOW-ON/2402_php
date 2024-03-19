<?php
// 세션 시작 : 세션 시작 전에 출력 처리가 있으면 안됨
//      출력 처리 : echo, print, var_dump 등

// 세션 명을 지정하는 방법
session_name("login");

session_start(); // 세션 시작은 무조건 있어야됨

// 세션에 데이터 작성
$_SESSION["my_session1"] = "세션1";