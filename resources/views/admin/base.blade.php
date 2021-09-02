
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('page_title')</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset(BE_COMPONENT.'/pear/css/pear.css')}}"/>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="bookmark" href="/favicon.ico">
            
    @yield('style')
</head>
<body class="pear-container">

    @yield('content')

<script src="{{asset(BE_COMPONENT.'/layui/layui.js')}}"></script>
<script src="{{asset(BE_COMPONENT.'/pear/pear.js')}}"></script>
    @yield('editor')
<script>
    layui.use(['layer'], function() {
        var $ = layui.jquery;
        var layer = layui.layer;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //错误提示
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                layer.msg("{{$error}}",{icon:2});
                @break
            @endforeach
        @endif

        //一次性正确信息提示
        @if(session('success'))
            layer.msg("{{session('success')}}",{icon:1});
        @endif

        //一次性错误信息提示
        @if(session('error'))
        layer.msg("{{session('error')}}",{icon:2});
        @endif

    });

</script>
@yield('script')

@yield('upload')
</body>

</html>



