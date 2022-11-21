<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Student Data</title>
</head>

<body>
    @auth
    @include('navbar')
    @endauth
    <div class="container bg-white">
        @yield('main')
    </div>
    <script src="/js/bootstrap.js"></script>
</body>

</html>