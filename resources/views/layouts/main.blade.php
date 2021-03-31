<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield("title", "Hello News") </title>

    <link rel="stylesheet" href="/css/main.css">
    @yield("head")

</head>

<body>
    @include('_include.header')

    @yield("content")


    @include('_include.footer')


    <script src="/js/main.js"></script>
    @yield("bottom")
</body>

</html>