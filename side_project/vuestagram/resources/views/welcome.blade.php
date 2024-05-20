<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Vuestagram</title>
</head>
<body>
    <div id="app">
        {{-- AppComponent.vue로 만들었지만 블래이드 템블릿으로 작성할때는 App-Component 처럼 -로 구분 --}}
        <App-Component></App-Component>
    </div>
</body>
</html>