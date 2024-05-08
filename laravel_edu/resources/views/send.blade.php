<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send</title>
</head>
<body>
    <h1>{{ $gender }}</h1> {{-- {{ }} : 출력기능, echo 기능과 동일 --}}
    <h2>{{ $name.", age : ".$age }}</h2>
    <h2>{{ $data['id']." , ".$data['email'] }}</h2>
</body>
</html>