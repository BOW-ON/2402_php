<!-- html 구조에서 php 작성해보기 -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        foreach($arr as $item) {
            // printf($msg_fomat, $item["name"], $item["age"],$item["gender"]);
    ?>
        <h3> <?php  echo $item["name"]?></h3>
        <p>의 나이는 <?php echo $item["age"]?>이고, 성별은 <?php echo $item["gender"]?>입니다.</p>
    <?php           
        }
    ?>
</body>
</html> 