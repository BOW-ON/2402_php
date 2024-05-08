<?php
// 비밀번호+이메일 > 암호화
$qwer = base64_encode("qwer1234!test@tes1t.com");
// 암호화 > 비밀번호+이메일
$qwer2 = base64_decode("cXdlcjEyMzQhdGVzdEB0ZXMxdC5jb20=");


echo $qwer;
echo "\n";
echo $qwer2;
