<?php
// 데이터베이스 연결 정보
$servername = "localhost";
$username = "root"; // 데이터베이스 사용자명
$password = "6305"; // 데이터베이스 비밀번호
$dbname = "calender"; // 데이터베이스 이름

// MySQL 연결 생성
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 클릭한 날짜로부터 작성된 글을 가져오는 SQL 쿼리 작성
if(isset($_GET['date'])) {
    $clicked_date = $_GET['date'];
    $sql = "SELECT content FROM Z WHERE created_at = '$clicked_date'";
    $result = $conn->query($sql);

    // 결과 처리
    if ($result->num_rows > 0) {
        // 데이터 출력
        while($row = $result->fetch_assoc()) {
            echo $row["content"];
        }
    } else {
        echo "작성된 글이 없습니다.";
    }
}

// 연결 종료
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>달력</title>
<link rel="stylesheet" href="calender.css">
</head>
<body>
    <div class="calendar">
        <h2>달력</h2>
        <table>
            <tr>
                <th>일</th>
                <th>월</th>
                <th>화</th>
                <th>수</th>
                <th>목</th>
                <th>금</th>
                <th>토</th>
            </tr>
            <?php
            // 첫 번째 요일부터 일요일(0)까지 출력합니다.
            for ($i = 0; $i < 7; $i++) {
                // 현재 요일을 가져오고, 해당 요일을 출력합니다.
                $day_of_week = date('D', strtotime("Sunday +{$i} days"));
                echo "<td>{$day_of_week}</td>";
            }
            ?>
        </table>
    </div>
    <div class="post">
        <h2>작성글</h2>
        <div id="post_content">
            <!-- 작성글을 출력할 부분 -->
        </div>
    </div>
</body>
</html>