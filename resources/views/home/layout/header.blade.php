<!DOCTYPE html>
<html lang="zh" class="smart-design-mode">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" />
    <meta name="keywords" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="renderer" content="webkit" />
    <meta name="applicable-device" content="pc" />
    <meta http-equiv="Cache-Control" content="no-transform" />
    <title>首页-企业官网</title>
    <link rel="icon" href="favicon.ico"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <link rel="bookmark" href="favicon.ico"/>
    <link href="{{asset(FE_STATICS.'css/pcstyle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(FE_STATICS.'css/reset.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(FE_STATICS.'css/iconfont.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(FE_STATICS.'css/iconfont_1.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(FE_STATICS.'css/pager.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(FE_STATICS.'css/hover-effects.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(FE_STATICS.'css/antchain.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset(FE_STATICS.'css/30536_pc_zh-cn.css')}}" rel="stylesheet" />
    <script src="{{asset(FE_STATICS.'js/jquery-1.10.2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset(FE_STATICS.'js/jquery.lazyload.min.js')}}" type="text/javascript"></script>
    <script src="{{asset(FE_STATICS.'js/smart.animation.min.js')}}" type="text/javascript"></script>
    <script src="{{asset(FE_STATICS.'js/kino.razor.min.js')}}" type="text/javascript"></script>
    <script src="{{asset(FE_STATICS.'js/common.min.js')}}" type="text/javascript"></script>
    <script src="{{asset(FE_STATICS.'js/admin.validator.min.js')}}" type="text/javascript"></script>
    <script src="{{asset(FE_STATICS.'js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script type="text/javascript" id="jssor-all" src="{{asset(FE_STATICS.'js/jssor.slider-22.2.16-all.min.js')}}" ></script>
    <script type="text/javascript" id="slideshown" src="{{asset(FE_STATICS.'js/slideshow.js')}}" ></script>
    <script type="text/javascript" id="lzparallax" src="{{asset(FE_STATICS.'js/lz-parallax.min.js')}}" ></script>
    <script type="text/javascript" id="jqueryzoom" src=""{{asset(FE_STATICS.'js/jquery.jqueryzoom.js')}}" ></script>
    <script type="text/javascript" id="slideshow" src=""{{asset(FE_STATICS.'js/slideshow.js')}}" ></script>

    <script type="text/javascript">
        $.ajaxSetup({
            cache: false,
            beforeSend: function (jqXHR, settings) {
                settings.data = settings.data && settings.data.length > 0 ? (settings.data + "&") : "";
                settings.data = settings.data + "__RequestVerificationToken=" + $('input[name="__RequestVerificationToken"]').val();
                return true;
            }
        });
    </script>
</head>
