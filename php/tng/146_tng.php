<?php
$ID = "";
$PW = "";
if(isset($_GET["ID"])) {
    $ID = $_GET["ID"]; 
}
if(isset($_GET["PW"])) {
    $PW = $_GET["PW"]; 
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./146_tng.css">
</head>
<body>
    <!-- <h1>검색어를 입력하세요.</h1> -->
    <div class="container">
        <fieldset>
            <legend><h1>로그인</h1></legend>
        <form action="/146_tng.php" method="get">
            <ul>
                <li>
                    <label for="ID">아이디</label>
                    <input type="text" name="ID" id="ID">
                </li>
                <br>
                <li>
                    <label for="PW">패스워드</label>
                    <input type="password" name="PW" id="PW">
                </li>
            </ul>
            <br><br>
            <button class ="btn_log" type="submit">로그인</button>
            <button class ="btn_reset" type="reset">취소</button>
        </form>
        <br><br>
        <?php
            if($ID !== "") {
                echo "<h2>당신의 ID는 $ID 입니다.</h2>";
            }
            if($PW !== "") {
                echo "<h2>당신의 PW는 $PW 입니다.</h2>";
            }
        ?>
        </fieldset>
    </div>
</body>
</html>