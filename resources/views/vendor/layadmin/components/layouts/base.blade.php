<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $layadmin['page']['title'] ?? config('layadmin.title') }}</title>

    {{-- 全局 styles --}}
    <link rel="stylesheet" href="{{ asset('layadmin/component/pear/css/pear.css') }}"/>

    {{-- Page styles  --}}
    @foreach($layadmin['page']['styles'] as $href)
        <link rel="stylesheet" href="{{ asset($href) }}"/>
    @endforeach

    {{-- 自定义 CSS   --}}
    @stack('style')
</head>
<body class="{{ $attributes->get('class') }}" background="{{ $attributes->get('background') }}" style="{{ $attributes->get('style') }}">
    {{ $slot }}

    {{-- 全局 scripts --}}
    <script src="{{ asset('layadmin/component/layui/layui.js') }}"></script>
    <script src="{{ asset('layadmin/component/pear/pear.js') }}"></script>
    <script src="{{ asset('layadmin/component/lodash.min.js') }}"></script>
    <script>
        layui.use(['context'], function () {
            layui.context.put("layadmin", JSON.stringify(@json($layadmin,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)))
        })
    </script>

    {{-- Page scripts  --}}
    <script src="{{ asset('layadmin/component/app.js') }}"></script>
    @foreach($layadmin['page']['scripts'] as $src)
        <script src="{{ asset($src) }}"></script>
    @endforeach

    {{--自定义 scripts--}}
    @stack('script')
</body>
</html>
