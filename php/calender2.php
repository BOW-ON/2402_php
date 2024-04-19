<!DOCTYPE html>
<html>
<head>
    <title>오늘 날짜의 달력</title>
    <style>
        table {
            border-collapse: collapse;
            border: 2px solid transparent;
        }
        th, td {
            border: 1px solid transparent;
            padding: 10px;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: black;
        }
        a:hover {
            background-color: lightgray;
        }
        .ab {
            display : flex;
            flex-direction: column;
            width : 300px;
        }
        .bb {
            background-image : url("./img.png");
            background-size : contain;
            /* background-repeat: no-repeat; */
            width: 100%;
            height: 1rem;
        }
    </style>
</head>
<body>

<h2><?php echo date('Y년 n월'); ?></h2>

<!DOCTYPE html>
<html>
<head>
    <title>오늘 날짜의 달력</title>
    <style>
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }
        .dayA {
            display : inline-block;
            width : 100%;
            height : 100%;
        }
        .day {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;

        }
        .day:hover {
            background-color: lightgray;
        }
        .controls {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="ab">
    <div class="controls">
        <?php
        // 현재 연도와 월
        $year = date('Y');
        $month = date('n');
        
        // 이전 달 계산
        $prevMonthYear = ($month == 1) ? $year - 1 : $year;
        $prevMonth = ($month == 1) ? 12 : $month - 1;
        
        // 다음 달 계산
        $nextMonthYear = ($month == 12) ? $year + 1 : $year;
        $nextMonth = ($month == 12) ? 1 : $month + 1;
        ?>
        <a href="?year=<?php echo $prevMonthYear; ?>&month=<?php echo $prevMonth; ?>">이전 달</a>
        <span><?php echo date('Y년 n월'); ?></span>
        <a href="?year=<?php echo $nextMonthYear; ?>&month=<?php echo $nextMonth; ?>">다음 달</a>
    </div>
    <div class="calendar">
        <?php
        // 오늘 날짜 가져오기
        $today = date('Y-m-d');
        
        // 오늘 날짜로부터 해당 월의 첫 번째 날과 마지막 날 구하기
        $first_day = strtotime(date('Y-m-01', strtotime($today)));
        $last_day = strtotime(date('Y-m-t', strtotime($today)));
    
        // 첫 날의 요일 구하기 (0: 일요일, 1: 월요일, ..., 6: 토요일)
        $start_day_of_week = date('w', $first_day);
    
        // 마지막 날의 날짜 구하기
        $last_date = date('j', $last_day);
    
        // 달력 출력을 위한 행과 열의 개수 설정
        $rows = 6;
        $cols = 7;
    
        // 달력 출력
        $day_count = 1;
        for ($row = 1; $row <= $rows; $row++) {
            for ($col = 1; $col <= $cols; $col++) {
                if (($row == 1 && $col <= $start_day_of_week) || ($day_count > $last_date)) {
                    echo "<div class='day'></div>";
                } else {
                    // 각 날짜에 링크를 추가하여 클릭 시 해당 날짜로 이동하도록 합니다.
                    echo "<div class='day'><a class=dayA href='somepage.php?date={$day_count}'>{$day_count}</a></div>";
                    $day_count++;
                }
            }
        }
        ?>
    </div>
</div>

</body>
</html>