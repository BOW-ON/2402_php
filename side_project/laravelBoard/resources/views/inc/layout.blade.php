<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- 부트스트랩 -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>     --}}
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/css/myCommon.css">
    {{-- <script src="/js/bootstrap/bootstrap.js" defer></script> --}}
    @yield('script')
    <script src="/js/bootstrap/bootstrap.js" defer></script>
    <title>@yield('title', '미니')</title>
</head>
{{-- @section('bodyClassVh') --}}
<body class="@yield('bodyClassVh')">
{{-- @show --}}
  @include('inc.header')

  @yield('main')
  
  @include('inc.footer')
</body>
</html>