<?php
session_start(); // 세션 시작은 무조건 있어야됨

// 저장된 세션  데이터 획득
echo $_SESSION["my_session1"];