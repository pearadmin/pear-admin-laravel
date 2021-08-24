@include('home.layout.header')
<body id="smart-body" area="main">

    <input type="hidden" id="pageinfo"
           value="30536"
           data-type="1"
           data-device="Pc"
           data-entityid="30536" />
    <input id="txtDeviceSwitchEnabled" value="show" type="hidden" />

    <script type="text/javascript">
        $(function() {

        if (""=="True") {
        $('#mainContentWrapper').addClass('translate');
        $('#antChainWrap').fadeIn(500);

        $('#closeAntChain').off('click').on('click', function(){
        $('#antChainWrap').fadeOut('slow',function(){
        $('#mainContentWrapper').removeClass('translate');
        });
        $(document).off("scroll",isWatchScroll);

        });
        $('#showQrcodeBtn').off('click').on('click', function(){
        $('#qrCodeWrappper').toggleClass('qrCodeShow');
        });
        $(document).scroll(isWatchScroll)
        }


        function isWatchScroll(){
        var scroH = $(document).scrollTop();
        if(scroH >= 80) {
        $('#mainContentWrapper').removeClass('translate');
        } else {
        $('#mainContentWrapper').addClass('translate');
        }
        }


        })
    </script>

<link href="{{asset(FE_STATICS.'css/view.css')}}" rel="stylesheet" type="text/css"/>
<div id="mainContentWrapper" style="background-color: transparent; background-image: none; background-repeat: no-repeat;background-position:0 0; background:-moz-linear-gradient(top, none, none);background:-webkit-gradient(linear, left top, left bottom, from(none), to(none));background:-o-linear-gradient(top, none, none);background:-ms-linear-gradient(top, none, none);background:linear-gradient(top, none, none);;
     position: relative; width: 100%;min-width:1200px;background-size: auto;" bgScroll="none">
    <div style="background-color: transparent; background-image: none; background-repeat: no-repeat;background-position:0 0; background:-moz-linear-gradient(top, none, none);background:-webkit-gradient(linear, left top, left bottom, from(none), to(none));background:-o-linear-gradient(top, none, none);background:-ms-linear-gradient(top, none, none);background:linear-gradient(top, none, none);;
         position: relative; width: 100%;min-width:1200px;background-size: auto;" bgScroll="none">
        <div class=" header" cpid="30459" id="smv_Area0" style="width: 1200px; height: 79px;  position: relative; margin: 0 auto">
            <div id="smv_tem_70_50" ctype="banner"  class="esmartMargin smartAbs " cpid="30459" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="" tareaId="Area0"  re-direction="y" daxis="Y" isdeletable="True" style="height: 80px; width: 100%; left: 0px; top: 0px;z-index:5;"><div class="yibuFrameContent tem_70_50  banner_Style1  " style="overflow:visible;;" ><div class="fullcolumn-inner smAreaC" id="smc_Area0" cid="tem_70_50" style="width:1200px">
    <div id="smv_tem_71_21" ctype="logoimage"  class="esmartMargin smartAbs " cpid="30459" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="tem_70_50" tareaId="Area0"  re-direction="all" daxis="All" isdeletable="True" style="height: 40px; width: 108px; left: 0px; top: 21px;z-index:2;"><div class="yibuFrameContent tem_71_21  logoimage_Style1  " style="overflow:visible;;" >
<div class="w-image-box" data-fillType="0" id="div_tem_71_21">
    <a target="_self" href="/sy">
        <img src="{{asset(FE_STATICS.'picture/-48490.png')}}" alt="" title="" id="img_smv_tem_71_21" style="width: 108px; height:40px;">
    </a>
</div>

<script type="text/javascript">
    $(function () {
        InitImageSmv("tem_71_21", "108", "40", "0");
    });
</script>

</div></div><div id="smv_tem_72_25" ctype="nav"  class="esmartMargin smartAbs " cpid="30459" cstyle="Style2" ccolor="Item0" areaId="Area0" isContainer="False" pvid="tem_70_50" tareaId="Area0"  re-direction="all" daxis="All" isdeletable="True" style="height: 54px; width: 617px; left: 602px; top: 14px;z-index:3;"><div class="yibuFrameContent tem_72_25  nav_Style2  " style="overflow:visible;;" ><div id="nav_tem_72_25" class="nav_pc_t_2">
    <ul class="w-nav" navstyle="style2">
                <li class="w-nav-inner">
                    <div class="w-nav-item">
                        <a href="/sy" target="_self" class="w-nav-item-link">
                            <span class="mw-iconfont"></span>
                            <span class="w-link-txt">首页</span>
                        </a>
                    </div>
                </li>
                <li class="w-nav-inner">
                    <div class="w-nav-item">
                        <a href="/gywm" target="_self" class="w-nav-item-link">
                            <span class="mw-iconfont"></span>
                            <span class="w-link-txt">关于我们</span>
                        </a>
                    </div>
                </li>
                <li class="w-nav-inner">
                    <div class="w-nav-item">
                        <a href="/fwfw" target="_self" class="w-nav-item-link">
                            <span class="mw-iconfont"></span>
                            <span class="w-link-txt">服务范围</span>
                        </a>
                    </div>
                </li>
                <li class="w-nav-inner">
                    <div class="w-nav-item">
                        <a href="/xwzx" target="_self" class="w-nav-item-link">
                            <span class="mw-iconfont"></span>
                            <span class="w-link-txt">新闻资讯</span>
                        </a>
                    </div>
                </li>
                <li class="w-nav-inner">
                    <div class="w-nav-item">
                        <a href="/lxwm" target="_self" class="w-nav-item-link">
                            <span class="mw-iconfont"></span>
                            <span class="w-link-txt">联系我们</span>
                        </a>
                    </div>
                </li>

    </ul>
</div>
<script>
    $(function () {
        //宽度需要减去边框值
        var liInner = $("#nav_tem_72_25 .w-nav-inner");
        var rightBorder = parseInt(liInner.css("border-right-width"));
        var leftBorder = parseInt(liInner.css("border-left-width"));
        var topBorder = parseInt(liInner.css("border-top-width"));
        var bottomBorder = parseInt(liInner.css("border-bottom-width"));
        var totalWidth = $("#nav_tem_72_25").width();
        //总边框
        var count = liInner.length;
        var totalBorderWidth = (rightBorder + leftBorder) * count;
        var width = 0;
        if (count > 1) {
            //边距
            var marginLeft = parseInt($(liInner[1]).css("margin-left"));
            var totalMargin = marginLeft * count * 2;
            width = totalWidth - totalBorderWidth - totalMargin;
        } else {
            width = totalWidth - totalBorderWidth;
        }
        var totalHeight = liInner.height()-20;
        $('#nav_tem_72_25 .w-nav').height(totalHeight);
        $("#smv_tem_72_25").height(totalHeight + 20);
        liInner.height(totalHeight - topBorder - bottomBorder).css("line-height", totalHeight - topBorder - bottomBorder+"px");
        var realWidth = (width / count) + "px";
        //liInner.css("width", realWidth);


        $('#nav_tem_72_25 .w-nav').find('.w-subnav').hide();
        var $this, item, itemAll;
        if ("True".toLocaleLowerCase() == "true") {
        } else {
            $("#nav_tem_72_25 .w-subnav-inner").css("width", "120" + "px");
            $("#nav_tem_72_25 .w-subnav").css("width", "120" + "px");
        }
        $('#nav_tem_72_25 .w-nav').off('mouseenter').on('mouseenter', '.w-nav-inner', function () {
            itemAll = $('#nav_tem_72_25 .w-nav').find('.w-subnav');
            $this = $(this);
            item = $this.find('.w-subnav');
            item.slideDown(function () {
                item.css({
                    height: ''
                })
            });
        }).off('mouseleave').on('mouseleave', '.w-nav-inner', function () {
            item = $(this).find('.w-subnav');
            item.stop().slideUp();
        });
        SetNavSelectedStyleForInner('nav_tem_72_25');//选中当前导航
    });
</script></div></div></div>
<div id="bannerWrap_tem_70_50" class="fullcolumn-outer" style="position: absolute; top: 0; bottom: 0;">
</div>

<script type="text/javascript">

    $(function () {
        var resize = function () {
            $("#smv_tem_70_50 >.yibuFrameContent>.fullcolumn-inner").width($("#smv_tem_70_50").parent().width());
            $('#bannerWrap_tem_70_50').fullScreen(function (t) {
                if (VisitFromMobile()) {
                    t.css("min-width", t.parent().width())
                }
            });
        }
        $(window).resize(function (e) {
            if (e.target == this) {
                resize();
            }
        });
        resize();
    });
</script>
</div></div>
        </div>
    </div>
    <div class="main-layout-wrapper" id="smv_AreaMainWrapper" style="background-color: transparent; background-image: none;
         background-repeat: no-repeat;background-position:0 0; background:-moz-linear-gradient(top, none, none);background:-webkit-gradient(linear, left top, left bottom, from(none), to(none));background:-o-linear-gradient(top, none, none);background:-ms-linear-gradient(top, none, none);background:linear-gradient(top, none, none);;background-size: auto;"
         bgScroll="none">
        <div class="main-layout" id="tem-main-layout11" style="width: 100%;">
            <div style="display: none">

            </div>
            <div class="" id="smv_MainContent" rel="mainContentWrapper" style="width: 100%; min-height: 300px; position: relative; ">

                <div class="smvWrapper"  style="min-width:1200px;  position: relative; background-color: transparent; background-image: none; background-repeat: no-repeat; background:-moz-linear-gradient(top, none, none);background:-webkit-gradient(linear, left top, left bottom, from(none), to(none));background:-o-linear-gradient(top, none, none);background:-ms-linear-gradient(top, none, none);background:linear-gradient(top, none, none);;background-position:0 0;background-size:auto;" bgScroll="none"><div class="smvContainer" id="smv_Main" cpid="30536" style="min-height:400px;width:1200px;height:3900px;  position: relative; "><div id="smv_con_1_8" ctype="slideset"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 700px; width: 100%; left: 0px; top: 0px;z-index:2;"><div class="yibuFrameContent con_1_8  slideset_Style1  " style="overflow:visible;;" >
<!--w-slide-->
<div id="lider_smv_con_1_8_wrapper">
    <div class="w-slide" id="slider_smv_con_1_8">
        <div class="w-slide-inner" data-u="slides">

                <div class="content-box" data-area="Area0">
                    <div id="smc_Area0" cid="con_1_8" class="smAreaC slideset_AreaC">
                        <div id="smv_con_8_49" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_1_8" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 315px; width: 621px; left: -75px; top: 226px;z-index:2;"><div class="yibuFrameContent con_8_49  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_8_49">
        <div id="smv_con_9_17" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_8_49" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 103px; width: 554px; left: 26px; top: 118px;z-index:2;"><div class="yibuFrameContent con_9_17  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_9_17' style="height: 100%;">
    <div class="editableContent" id="txtc_con_9_17" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:right"><span style="color:rgba(255, 255, 255, 0.1)"><span style="font-size:72px"><span style="font-family:Arial Black"><strong>IMPRESSION</strong></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_9_17').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_12_9" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_8_49" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 85px; width: 460px; left: 113px; top: 38px;z-index:3;"><div class="yibuFrameContent con_12_9  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_12_9' style="height: 100%;">
    <div class="editableContent" id="txtc_con_12_9" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:right"><span style="line-height:1.5"><span style="font-size:48px"><span style="color:#ffffff">品质缔造价值</span></span></span></p>

<p style="text-align:right">&nbsp;</p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_12_9').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_13_11" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_8_49" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 82px; width: 460px; left: 113px; top: 101px;z-index:3;"><div class="yibuFrameContent con_13_11  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_13_11' style="height: 100%;">
    <div class="editableContent" id="txtc_con_13_11" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:right"><span style="line-height:1.5"><strong><span style="font-size:48px"><span style="color:#ffffff">信誉筹筑品牌</span></span></strong></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_13_11').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_16_17" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_8_49" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 52px; width: 360px; left: 222px; top: 193px;z-index:5;"><div class="yibuFrameContent con_16_17  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_16_17' style="height: 100%;">
    <div class="editableContent" id="txtc_con_16_17" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:right"><span style="letter-spacing:15px"><span style="color:#ffffff"><span style="font-size:14px"><span style="font-family:Source Han Sans,Geneva,sans-serif">打造高科技民营企业</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_16_17').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div>                    </div>
                    <div class="content-box-inner" style="background-image:url({{asset(FE_STATICS.'images/-48500.jpg')}});background-position:50% 50%;background-repeat:cover;background-size:cover;background-color:#ffffff;opacity:1"></div>

                </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="w-slide-btn-box  f-hide " data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div class="w-slide-btn" data-u="prototype"></div>
        </div>

        <!-- 1Arrow Navigator -->
        <span data-u="arrowleft" class="w-slide-arrowl  slideArrow  f-hide  " data-autocenter="2" id="left_con_1_8">
            <i class="w-itemicon mw-iconfont">&#xb133;</i>
        </span>
        <span data-u="arrowright" class="w-slide-arrowr slideArrow  f-hide " data-autocenter="2" id="right_con_1_8">
            <i class="w-itemicon mw-iconfont">&#xb132;</i>
        </span>
    </div>
</div>

    <!--/w-slide-->
<script type="text/javascript">
    con_1_8_page = 1;
    con_1_8_sliderset3_init = function () {
        var jssor_1_options_con_1_8 = {
            $AutoPlay: "False"=="True"?false:"on" == "on",//自动播放
            $PlayOrientation: 1,//2为向上滑，1为向左滑
            $Loop: 1,//循环
            $Idle: parseInt("4000"),//切换间隔
            $SlideDuration: "1000",//延时
            $SlideEasing: $Jease$.$OutQuint,

             $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: GetSlideAnimation("3", "1000"),
                $TransitionsOrder: 1
            },

            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $ActionMode: "1"
            }
        };
        //初始化幻灯
        var slide = new $JssorSlider$("slider_smv_con_1_8", jssor_1_options_con_1_8);
        $('#smv_con_1_8').data('jssor_slide', slide);

        //resize游览器的时候触发自动缩放幻灯秀

        //幻灯栏目自动或手动切换时触发的事件
        slide.$On($JssorSlider$.$EVT_PARK, function (slideIndex, fromIndex) {
            var $slideWrapper = $("#slider_smv_con_1_8 .w-slide-inner:last");
            var $fromSlide = $slideWrapper.find(".content-box:eq(" + fromIndex + ")");
            var $curSlide = $slideWrapper.find(".content-box:eq(" + slideIndex + ")");
            var $nextSlide = $slideWrapper.find(".content-box:eq(" + (slideIndex+1) + ")");
            $("#smv_con_1_8").attr("selectArea", $curSlide.attr("data-area"));
            $fromSlide.find(".animated").smanimate("stop");
            $curSlide.find(".animated").smanimate("stop");
            $nextSlide.find(".animated").smanimate("stop");
            $("#switch_con_1_8 .page").html(slideIndex + 1);
            $curSlide.find(".animated").smanimate("replay");
            return false;
        });
        //切换栏点击事件
        $("#switch_con_1_8 .left").unbind("click").click(function () {
            if(con_1_8_page==1){
                con_1_8_page =1;
            } else {
                con_1_8_page = con_1_8_page - 1;
            }
            $("#switch_con_1_8 .page").html(con_1_8_page);
            slide.$Prev();
            return false;
        });
        $("#switch_con_1_8 .right").unbind("click").click(function () {
            if(con_1_8_page==1){
                con_1_8_page = 1;
        } else {
        con_1_8_page = con_1_8_page + 1;
    }
    $("#switch_con_1_8 .page").html(con_1_8_page);
    slide.$Next();
    return false;
    });
    };


    $(function () {

        var jssorCopyTmp = document.getElementById('slider_smv_con_1_8').cloneNode(true);

        var $jssorIntt = function () {

            //获取幻灯显示动画类型
            var $this = $('#slider_smv_con_1_8');
            var dh = $(document).height();
            var wh = $(window).height();
            var ww = $(window).width();
            var width = 1000;
            //区分页头、页尾、内容区宽度
            if ($this.parents(".header").length > 0 ) {
                width = $this.parents(".header").width();
            } else if ($this.parents(".footer").length > 0 ){
                width = $this.parents(".footer").width();
            } else {
                width = $this.parents(".smvContainer").width();
            }

            if (ww > width) {
                var left = parseInt((ww - width) * 10 / 2) / 10;
                $this.css({ 'left': -left, 'width': ww });
            } else {
                $this.css({ 'left': 0, 'width': ww });
            }

            //解决手机端预览PC端幻灯秀时不通栏问题
            if (VisitFromMobile()) {
                $this.css("min-width", width);
                setTimeout(function () {
                    var boxleft = (width - 330) / 2;
                    $this.find(".w-slide-btn-box").css("left", boxleft + "px");
                }, 300);
            }
            $this.children().not(".slideArrow").css({ "width": $this.width() });

            con_1_8_sliderset3_init();

            var areaId = $("#smv_con_1_8").attr("tareaid");
            if(areaId==""){
                var mainWidth = $("#smv_Main").width();
                $("#smv_con_1_8 .slideset_AreaC").css({"width":mainWidth+"px","position":"relative","margin":"0 auto"});
            }else{
                var controlWidth = $("#smv_con_1_8").width();
                $("#smv_con_1_8 .slideset_AreaC").css({"width":controlWidth+"px","position":"relative","margin":"0 auto"});
            }
            $("#smv_con_1_8").attr("selectArea", "Area0");

            var arrowHeight = $('#slider_smv_con_1_8 .w-slide-arrowl').eq(-1).outerHeight();
            var arrowTop = (18 - arrowHeight) / 2;
            $('#slider_smv_con_1_8 .w-slide-arrowl').eq(-1).css('top', arrowTop);
            $('#slider_smv_con_1_8 .w-slide-arrowr').eq(-1).css('top', arrowTop);
        }
        $jssorIntt();


                 function ScaleSlider() {
                     var inst = $('#slider_smv_con_1_8');
                     var orginWidth = inst.width();
                     if (orginWidth == $(window).width()) return;
                    var inst_parent = inst.parent();
                    inst.remove()
                    inst_parent.append(jssorCopyTmp.cloneNode(true));

                    $jssorIntt();
                }
                $Jssor$.$AddEvent(window, "resize", ScaleSlider);



    });
</script>
</div></div><div id="smv_con_17_35" ctype="banner"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 645px; width: 100%; left: 0px; top: 699px;z-index:7;"><div class="yibuFrameContent con_17_35  banner_Style1  " style="overflow:visible;;" ><div class="fullcolumn-inner smAreaC" id="smc_Area0" cid="con_17_35" style="width:1200px">
    <div id="smv_con_27_35" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Up","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_17_35" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 113px; width: 1022px; left: 89px; top: 261px;z-index:5;"><div class="yibuFrameContent con_27_35  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_27_35' style="height: 100%;">
    <div class="editableContent" id="txtc_con_27_35" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="line-height:2"><span style="font-family:Source Han Sans,Geneva,sans-serif">公司主要数据处理和信息安全领域。立足于全国市场，紧密结合各行业特点，深挖客户应用，依托强大的研发实力，融合世界前沿的技术理念，快速响应客户的变化需求，为行业客户提供先进、可靠、安全、高质量、易扩展的应用定制解决方案和产品工程解决方案，以及相关软硬件产品、平台及服务。以的服务、的技术和的产品，打造公司的核心竞争力，成就优秀的行业品牌，提供有价值的行业服务</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_27_35').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_28_35" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"","animationName":"zoomIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_17_35" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 119px; width: 524px; left: 335px; top: 130px;z-index:1;"><div class="yibuFrameContent con_28_35  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_28_35">
        <div id="smv_con_29_35" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_28_35" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 88px; width: 88px; left: 58px; top: 7px;z-index:3;"><div class="yibuFrameContent con_29_35  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_29_35">
            </div>
</div></div></div><div id="smv_con_30_35" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item2" areaId="Area0" isContainer="False" pvid="con_28_35" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 40px; width: 391px; left: 102px; top: 29px;z-index:4;"><div class="yibuFrameContent con_30_35  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_30_35' style="height: 100%;">
    <div class="editableContent" id="txtc_con_30_35" style="height: 100%; word-wrap:break-word;">
        <p><span style="font-family:Source Han Sans"><span style="font-size:30px"><strong>打造高科技民营企业</strong></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_30_35').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_31_35" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_28_35" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 64px; width: 360px; left: 123px; top: 41px;z-index:1;"><div class="yibuFrameContent con_31_35  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_31_35' style="height: 100%;">
    <div class="editableContent" id="txtc_con_31_35" style="height: 100%; word-wrap:break-word;">
        <p><span style="font-size:54px"><span style="color:#eeeeee"><strong><span style="font-family:Arial Black">ABOUT US</span></strong></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_31_35').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div><div id="smv_con_32_22" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_17_35" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 122px; width: 248px; left: 115px; top: 388px;z-index:6;"><div class="yibuFrameContent con_32_22  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_32_22">
        <div id="smv_con_33_32" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_32_22" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 77px; width: 147px; left: 44px; top: 18px;z-index:2;"><div class="yibuFrameContent con_33_32  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_33_32' style="height: 100%;">
    <div class="editableContent" id="txtc_con_33_32" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#555555"><span style="font-size:54px"><span style="font-family:Arial Black">1990</span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_33_32').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_34_31" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item2" areaId="Area0" isContainer="False" pvid="con_32_22" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 33px; width: 127px; left: 51px; top: 82px;z-index:3;"><div class="yibuFrameContent con_34_31  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_34_31' style="height: 100%;">
    <div class="editableContent" id="txtc_con_34_31" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#555555"><span style="font-size:16px">成立于1990年</span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_34_31').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_35_37" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_32_22" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 25px; width: 25px; left: 170px; top: 20px;z-index:1;"><div class="yibuFrameContent con_35_37  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_35_37">
            </div>
</div></div></div>    </div>
</div></div></div><div id="smv_con_40_58" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Up","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_17_35" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 122px; width: 305px; left: 464px; top: 388px;z-index:6;"><div class="yibuFrameContent con_40_58  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_40_58">
        <div id="smv_con_41_58" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_40_58" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 77px; width: 242px; left: 44px; top: 18px;z-index:2;"><div class="yibuFrameContent con_41_58  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_41_58' style="height: 100%;">
    <div class="editableContent" id="txtc_con_41_58" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#555555"><span style="font-size:54px"><span style="font-family:Arial Black">10000+</span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_41_58').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_42_58" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item2" areaId="Area0" isContainer="False" pvid="con_40_58" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 33px; width: 179px; left: 51px; top: 82px;z-index:3;"><div class="yibuFrameContent con_42_58  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_42_58' style="height: 100%;">
    <div class="editableContent" id="txtc_con_42_58" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#555555"><span style="font-size:16px">服务客户一万余次</span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_42_58').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_43_58" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_40_58" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 25px; width: 25px; left: 240px; top: 20px;z-index:1;"><div class="yibuFrameContent con_43_58  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_43_58">
            </div>
</div></div></div>    </div>
</div></div></div><div id="smv_con_44_5" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_17_35" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 122px; width: 248px; left: 871px; top: 388px;z-index:6;"><div class="yibuFrameContent con_44_5  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_44_5">
        <div id="smv_con_45_5" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_44_5" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 77px; width: 156px; left: 44px; top: 18px;z-index:2;"><div class="yibuFrameContent con_45_5  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_45_5' style="height: 100%;">
    <div class="editableContent" id="txtc_con_45_5" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#555555"><span style="font-size:54px"><span style="font-family:Arial Black">2000</span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_45_5').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_46_5" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item2" areaId="Area0" isContainer="False" pvid="con_44_5" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 33px; width: 155px; left: 51px; top: 82px;z-index:3;"><div class="yibuFrameContent con_46_5  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_46_5' style="height: 100%;">
    <div class="editableContent" id="txtc_con_46_5" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#555555"><span style="font-size:16px">在职员工两千余人</span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_46_5').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_47_5" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_44_5" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 25px; width: 25px; left: 170px; top: 20px;z-index:1;"><div class="yibuFrameContent con_47_5  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_47_5">
            </div>
</div></div></div>    </div>
</div></div></div></div>
<div id="bannerWrap_con_17_35" class="fullcolumn-outer" style="position: absolute; top: 0; bottom: 0;">
</div>

<script type="text/javascript">

    $(function () {
        var resize = function () {
            $("#smv_con_17_35 >.yibuFrameContent>.fullcolumn-inner").width($("#smv_con_17_35").parent().width());
            $('#bannerWrap_con_17_35').fullScreen(function (t) {
                if (VisitFromMobile()) {
                    t.css("min-width", t.parent().width())
                }
            });
        }
        $(window).resize(function (e) {
            if (e.target == this) {
                resize();
            }
        });
        resize();
    });
</script>
</div></div><div id="smv_con_50_12" ctype="banner"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style3" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 462px; width: 100%; left: 0px; top: 1343px;z-index:10;"><div class="yibuFrameContent con_50_12  banner_Style3  " style="overflow:visible;;" >
<div class="w-banner">
    <div class="w-banner-content fullcolumn-inner smAreaC" id="smc_Area0" cid="con_50_12" style="width:1200px">
            </div>
    <div class="w-banner-color fullcolumn-outer" id="bannerWrap_con_50_12">
        <div class="w-banner-image"></div>
    </div>
</div>

<script type="text/javascript">

    $(function () {
        var resize = function () {
            $("#smv_con_50_12 >.yibuFrameContent>.w-banner>.fullcolumn-inner").width($("#smv_con_50_12").parent().width());
            $('#bannerWrap_con_50_12').fullScreen(function (t) {
                if (VisitFromMobile()) {
                    t.css("min-width", t.parent().width());
                }

                $("#bannerWrap_con_50_12 > .w-banner-image").lzparallax({ effect:'scroll' ,autoPosition:false});

            });
        }
        $(window).resize(function (e) {
            if (e.target == this) {
                resize();
            }
        });
        resize();
    });
</script>
</div></div><div id="smv_con_65_51" ctype="multicolumn"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 462px; width: 100%; left: 0px; top: 1343px;z-index:100000;"><div class="yibuFrameContent con_65_51  multicolumn_Style1  " style="overflow:visible;;" >
<div class="w-columns fullScreen" id="mc_con_65_51" data-spacing="0" data-pagewidth="1200" style="width: 1200px;">
    <ul class="w-columns-inner">
            <li class="w-columns-item" data-area="columnArea0" data-width="55">
                <div class="w-columns-interval">
                    <div class="w-columns-content" style="background-color: transparent; background-image: none; background-repeat: repeat; background-position: 50% 50%; background: -moz-linear-gradient(top, none, none);background: -ms-linear-gradient(none, none);background: -webkit-gradient(linear, left top, left bottom, from(none), to(none));background: -o-linear-gradient(top, none, none);background: linear-gradient(top, none, none);background-size:auto;">
                        <div class="w-columns-content-inner smAreaC" id="smc_columnArea0" cid="con_65_51" style="width:660px;">
                                                                                </div>
                    </div>
                </div>
            </li>
            <li class="w-columns-item" data-area="columnArea1" data-width="45">
                <div class="w-columns-interval">
                    <div class="w-columns-content" style="background-color: rgba(0, 0, 0, 0.5); background-image: none; background-repeat: repeat; background-position: 50% 50%; background: -moz-linear-gradient(top, none, none);background: -ms-linear-gradient(none, none);background: -webkit-gradient(linear, left top, left bottom, from(none), to(none));background: -o-linear-gradient(top, none, none);background: linear-gradient(top, none, none);background-size:auto;">
                        <div class="w-columns-content-inner smAreaC" id="smc_columnArea1" cid="con_65_51" style="width:540px;">
                            <div id="smv_con_66_15" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="columnArea1" isContainer="True" pvid="con_65_51" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 402px; width: 651px; left: 0px; top: 30px;z-index:2;"><div class="yibuFrameContent con_66_15  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_66_15">
        <div id="smv_con_67_31" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_66_15" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 87px; width: 360px; left: -50px; top: 81px;z-index:2;"><div class="yibuFrameContent con_67_31  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_67_31' style="height: 100%;">
    <div class="editableContent" id="txtc_con_67_31" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#ffffff"><strong><span style="font-size:38px"><span style="font-family:Source Han Sans,Geneva,sans-serif">行业</span></span></strong></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_67_31').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_68_2" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item4" areaId="Area0" isContainer="False" pvid="con_66_15" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 35px; width: 510px; left: -50px; top: 128px;z-index:3;"><div class="yibuFrameContent con_68_2  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_68_2' style="height: 100%;">
    <div class="editableContent" id="txtc_con_68_2" style="height: 100%; word-wrap:break-word;">
        <p><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="color:#dddddd">To help enterprises develop more accurate marketing strategies</span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_68_2').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_69_36" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Down","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_66_15" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 43px; width: 43px; left: 0px; top: 71px;z-index:1;"><div class="yibuFrameContent con_69_36  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_69_36">
            </div>
</div></div></div><div id="smv_con_70_55" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Up","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item4" areaId="Area0" isContainer="False" pvid="con_66_15" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 83px; width: 499px; left: -50px; top: 169px;z-index:4;"><div class="yibuFrameContent con_70_55  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_70_55' style="height: 100%;">
    <div class="editableContent" id="txtc_con_70_55" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:justify"><span style="line-height:1.75"><span style="color:#eeeeee"><span style="font-size:14px">立足于全国市场，紧密结合各行业特点，深挖客户应用，依托强大的研发实力，融合世界前沿的技术理念，快速响应客户的变化需求。</span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_70_55').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_71_42" ctype="button" smanim='{"delay":0.75,"duration":0.75,"direction":"Up","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style9" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_66_15" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 40px; width: 150px; left: -50px; top: 318px;z-index:5;"><div class="yibuFrameContent con_71_42  button_Style9  " style="overflow:visible;;" ><!-- 类 -->
<!-- w-button-isi + (w-isi-top w-isi-bottom w-isi-left w-isi-right) -->
<!-- w-button-wayra + (w-wayra-topLeft w-wayra-topRight w-wayra-bottomLeft w-wayra-bottomRight) -->

<a target="_self" href="/gywm" class="w-button w-isi-left w-button-isi f-ellipsis hover-effect" data-effect-name="float" style="width: 150px; height: 40px; line-height: 40px;">
    <span class="w-button-position">
        <span class="w-button-position-inner">
            <em class="w-button-text f-ellipsis">
                <i class="mw-iconfont w-button-icon w-icon-hide"></i>
                了解我们
            </em>
        </span>
    </span>
</a>
    <script type="text/javascript">
        $(function () {
        });
    </script>
</div></div>    </div>
</div></div></div>                                                    </div>
                    </div>
                </div>
            </li>
    </ul>
</div>
<script type="text/javascript">
    $(function () {
        $("#mc_con_65_51>ul >li.w-columns-item").hover(function () {
            $("#smv_con_65_51").attr("selectArea", $(this).attr("data-area"));
        });
        $("#smv_con_65_51").attr("selectArea", "columnArea0");



        var resize = function () {
            var mc = $("#mc_con_65_51.fullScreen");
            mc.fullScreen();
            if (mc.length > 0) {
                var width = parseInt(mc.css("width"));
                var spacing = parseInt(mc.attr("data-spacing"));
                var items = mc.find(".w-columns-item");
                width = width - (items.length - 1) * spacing;
                var totalwidth = 0;
                items.each(function () {
                    var perw = parseInt($(this).attr("data-width"));
                    var itempx = parseInt(width * perw / 100);
                    $(this).css("width", (itempx + spacing) + "px");
                    totalwidth = totalwidth + itempx;
                });
                var offset = width - totalwidth;
                if (offset > 0) {
                    var lastItem = items.last();
                    var lastwidth = parseInt(lastItem.css("width")) + offset;
                    lastItem.css("width", lastwidth + "px");
                }
            }
        }
        $(window).resize(function (e) {
            if (e.target == this) {
                resize();
            }
        });
        resize();

    });
</script></div></div><div id="smv_con_100_48" ctype="banner"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 698px; width: 100%; left: 0px; top: 1804px;z-index:0;"><div class="yibuFrameContent con_100_48  banner_Style1  " style="overflow:visible;;" ><div class="fullcolumn-inner smAreaC" id="smc_Area0" cid="con_100_48" style="width:1200px">
    <div id="smv_con_73_12" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_100_48" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 119px; width: 1033px; left: 0px; top: 96px;z-index:1;"><div class="yibuFrameContent con_73_12  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_73_12">
        <div id="smv_con_74_12" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_73_12" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 88px; width: 88px; left: 1px; top: 7px;z-index:3;"><div class="yibuFrameContent con_74_12  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_74_12">
            </div>
</div></div></div><div id="smv_con_75_12" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item2" areaId="Area0" isContainer="False" pvid="con_73_12" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 40px; width: 391px; left: 45px; top: 29px;z-index:4;"><div class="yibuFrameContent con_75_12  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_75_12' style="height: 100%;">
    <div class="editableContent" id="txtc_con_75_12" style="height: 100%; word-wrap:break-word;">
        <p><span style="font-size:30px"><strong>我们的六大优势</strong></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_75_12').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_76_12" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_73_12" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 64px; width: 471px; left: 66px; top: 41px;z-index:1;"><div class="yibuFrameContent con_76_12  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_76_12' style="height: 100%;">
    <div class="editableContent" id="txtc_con_76_12" style="height: 100%; word-wrap:break-word;">
        <p><span style="font-size:54px"><span style="color:#eeeeee"><strong><span style="font-family:Arial Black">ADVANTAGES</span></strong></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_76_12').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div><div id="smv_con_78_1" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"","animationName":"zoomIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_100_48" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 169px; width: 344px; left: 0px; top: 254px;z-index:100003;"><div class="yibuFrameContent con_78_1  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_78_1">
        <div id="smv_con_79_56" ctype="image"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_78_1" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 58px; width: 58px; left: 0px; top: 36px;z-index:2;"><div class="yibuFrameContent con_79_56  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="0" id="div_con_79_56">
        <a target="_self" href="">
            <img
                 src="{{asset(FE_STATICS.'picture/-48450.png')}}"
                 alt=""
                 title=""
                 id="img_smv_con_79_56"
                 style="width: 56px; height:56px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_79_56", "56", "58", "0");

                 });
    </script>

</div></div><div id="smv_con_80_43" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_78_1" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 35px; width: 227px; left: 82px; top: 43px;z-index:0;"><div class="yibuFrameContent con_80_43  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_80_43' style="height: 100%;">
    <div class="editableContent" id="txtc_con_80_43" style="height: 100%; word-wrap:break-word;">
        <p><strong><span style="color:#444444"><span style="font-size:18px"><span style="font-family:Source Han Sans,Geneva,sans-serif">拥有高评价口碑</span></span></span></strong></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_80_43').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_82_40" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_78_1" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 13px; width: 13px; left: 213px; top: 50px;z-index:1;"><div class="yibuFrameContent con_82_40  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_82_40">
            </div>
</div></div></div><div id="smv_con_83_33" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_78_1" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 77px; width: 240px; left: 82px; top: 74px;z-index:5;"><div class="yibuFrameContent con_83_33  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_83_33' style="height: 100%;">
    <div class="editableContent" id="txtc_con_83_33" style="height: 100%; word-wrap:break-word;">
        <p><span style="line-height:1.75"><span style="color:#666666"><span style="font-size:14px"><span style="font-family:Source Han Sans,Geneva,sans-serif">的服务、的技术和的产品，提供有价值的行业服务。</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_83_33').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div><div id="smv_con_90_16" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"","animationName":"zoomIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_100_48" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 169px; width: 344px; left: 428px; top: 254px;z-index:100003;"><div class="yibuFrameContent con_90_16  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_90_16">
        <div id="smv_con_91_16" ctype="image"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_90_16" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 58px; width: 58px; left: 19px; top: 36px;z-index:2;"><div class="yibuFrameContent con_91_16  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="0" id="div_con_91_16">
        <a target="_self" href="">
            <img
                 src="{{asset(FE_STATICS.'picture/-48454.png')}}"
                 alt=""
                 title=""
                 id="img_smv_con_91_16"
                 style="width: 56px; height:56px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_91_16", "56", "58", "0");

                 });
    </script>

</div></div><div id="smv_con_92_16" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_90_16" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 35px; width: 227px; left: 101px; top: 43px;z-index:0;"><div class="yibuFrameContent con_92_16  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_92_16' style="height: 100%;">
    <div class="editableContent" id="txtc_con_92_16" style="height: 100%; word-wrap:break-word;">
        <p><strong><span style="color:#444444"><span style="font-size:18px"><span style="font-family:Source Han Sans,Geneva,sans-serif">产品服务高品质</span></span></span></strong></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_92_16').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_93_16" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_90_16" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 13px; width: 13px; left: 232px; top: 50px;z-index:1;"><div class="yibuFrameContent con_93_16  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_93_16">
            </div>
</div></div></div><div id="smv_con_94_16" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_90_16" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 77px; width: 240px; left: 101px; top: 74px;z-index:5;"><div class="yibuFrameContent con_94_16  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_94_16' style="height: 100%;">
    <div class="editableContent" id="txtc_con_94_16" style="height: 100%; word-wrap:break-word;">
        <p><span style="line-height:1.75"><span style="color:#666666"><span style="font-size:14px"><span style="font-family:Source Han Sans,Geneva,sans-serif">立足于全国市场，紧密结合各行业特点，深挖客户应用。</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_94_16').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div><div id="smv_con_95_19" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"","animationName":"zoomIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_100_48" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 169px; width: 344px; left: 856px; top: 254px;z-index:100003;"><div class="yibuFrameContent con_95_19  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_95_19">
        <div id="smv_con_96_19" ctype="image"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_95_19" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 58px; width: 58px; left: 38px; top: 36px;z-index:2;"><div class="yibuFrameContent con_96_19  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="0" id="div_con_96_19">
        <a target="_self" href="">
            <img
                 src="{{asset(FE_STATICS.'picture/-48455.png')}}"
                 alt=""
                 title=""
                 id="img_smv_con_96_19"
                 style="width: 56px; height:56px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_96_19", "56", "58", "0");

                 });
    </script>

</div></div><div id="smv_con_97_19" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_95_19" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 35px; width: 227px; left: 120px; top: 43px;z-index:0;"><div class="yibuFrameContent con_97_19  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_97_19' style="height: 100%;">
    <div class="editableContent" id="txtc_con_97_19" style="height: 100%; word-wrap:break-word;">
        <p><strong><span style="color:#444444"><span style="font-size:18px"><span style="font-family:Source Han Sans,Geneva,sans-serif">公司规模庞大</span></span></span></strong></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_97_19').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_98_19" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_95_19" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 13px; width: 13px; left: 251px; top: 50px;z-index:1;"><div class="yibuFrameContent con_98_19  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_98_19">
            </div>
</div></div></div><div id="smv_con_99_19" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_95_19" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 77px; width: 224px; left: 120px; top: 74px;z-index:5;"><div class="yibuFrameContent con_99_19  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_99_19' style="height: 100%;">
    <div class="editableContent" id="txtc_con_99_19" style="height: 100%; word-wrap:break-word;">
        <p><span style="line-height:1.75"><span style="color:#666666"><span style="font-size:14px"><span style="font-family:Source Han Sans,Geneva,sans-serif">我们是一支专注的团队，我们坚信品质源自客户的信任。</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_99_19').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div><div id="smv_con_101_14" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"","animationName":"zoomIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_100_48" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 169px; width: 344px; left: 1px; top: 428px;z-index:100003;"><div class="yibuFrameContent con_101_14  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_101_14">
        <div id="smv_con_102_14" ctype="image"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_101_14" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 58px; width: 58px; left: 0px; top: 36px;z-index:2;"><div class="yibuFrameContent con_102_14  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="0" id="div_con_102_14">
        <a target="_self" href="">
            <img
                 src="{{asset(FE_STATICS.'picture/-48458.png')}}"
                 alt=""
                 title=""
                 id="img_smv_con_102_14"
                 style="width: 56px; height:56px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_102_14", "56", "58", "0");

                 });
    </script>

</div></div><div id="smv_con_103_14" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_101_14" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 35px; width: 227px; left: 82px; top: 43px;z-index:0;"><div class="yibuFrameContent con_103_14  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_103_14' style="height: 100%;">
    <div class="editableContent" id="txtc_con_103_14" style="height: 100%; word-wrap:break-word;">
        <p><strong><span style="color:#444444"><span style="font-size:18px"><span style="font-family:Source Han Sans,Geneva,sans-serif">解决问题周期短</span></span></span></strong></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_103_14').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_104_14" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_101_14" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 13px; width: 13px; left: 213px; top: 50px;z-index:1;"><div class="yibuFrameContent con_104_14  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_104_14">
            </div>
</div></div></div><div id="smv_con_105_14" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_101_14" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 77px; width: 240px; left: 82px; top: 74px;z-index:5;"><div class="yibuFrameContent con_105_14  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_105_14' style="height: 100%;">
    <div class="editableContent" id="txtc_con_105_14" style="height: 100%; word-wrap:break-word;">
        <p><span style="line-height:1.75"><span style="color:#666666"><span style="font-size:14px"><span style="font-family:Source Han Sans,Geneva,sans-serif">帮助企业利用大数据，在较短的周期内，制定更精准的营销策略。</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_105_14').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div><div id="smv_con_106_14" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"","animationName":"zoomIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_100_48" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 169px; width: 344px; left: 429px; top: 428px;z-index:100003;"><div class="yibuFrameContent con_106_14  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_106_14">
        <div id="smv_con_107_14" ctype="image"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_106_14" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 58px; width: 58px; left: 19px; top: 36px;z-index:2;"><div class="yibuFrameContent con_107_14  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="0" id="div_con_107_14">
        <a target="_self" href="">
            <img
                 src="{{asset(FE_STATICS.'picture/-48459.png')}}"
                 alt=""
                 title=""
                 id="img_smv_con_107_14"
                 style="width: 56px; height:56px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_107_14", "56", "58", "0");

                 });
    </script>

</div></div><div id="smv_con_108_14" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_106_14" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 35px; width: 227px; left: 101px; top: 43px;z-index:0;"><div class="yibuFrameContent con_108_14  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_108_14' style="height: 100%;">
    <div class="editableContent" id="txtc_con_108_14" style="height: 100%; word-wrap:break-word;">
        <p><strong><span style="color:#444444"><span style="font-size:18px"><span style="font-family:Source Han Sans,Geneva,sans-serif">的研发水平</span></span></span></strong></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_108_14').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_109_14" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_106_14" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 13px; width: 13px; left: 232px; top: 50px;z-index:1;"><div class="yibuFrameContent con_109_14  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_109_14">
            </div>
</div></div></div><div id="smv_con_110_14" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_106_14" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 77px; width: 240px; left: 101px; top: 74px;z-index:5;"><div class="yibuFrameContent con_110_14  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_110_14' style="height: 100%;">
    <div class="editableContent" id="txtc_con_110_14" style="height: 100%; word-wrap:break-word;">
        <p><span style="line-height:1.75"><span style="color:#666666"><span style="font-size:14px"><span style="font-family:Source Han Sans,Geneva,sans-serif">依托强大的研发实力，融合世界前沿的技术理念，快速响应客户的变化需求。</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_110_14').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div><div id="smv_con_111_14" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"","animationName":"zoomIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_100_48" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 169px; width: 344px; left: 857px; top: 428px;z-index:100003;"><div class="yibuFrameContent con_111_14  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_111_14">
        <div id="smv_con_112_14" ctype="image"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_111_14" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 58px; width: 58px; left: 38px; top: 36px;z-index:2;"><div class="yibuFrameContent con_112_14  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="0" id="div_con_112_14">
        <a target="_self" href="">
            <img
                 src="{{asset(FE_STATICS.'picture/-48460.png')}}"
                 alt=""
                 title=""
                 id="img_smv_con_112_14"
                 style="width: 56px; height:56px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_112_14", "56", "58", "0");

                 });
    </script>

</div></div><div id="smv_con_113_14" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_111_14" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 35px; width: 227px; left: 120px; top: 43px;z-index:0;"><div class="yibuFrameContent con_113_14  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_113_14' style="height: 100%;">
    <div class="editableContent" id="txtc_con_113_14" style="height: 100%; word-wrap:break-word;">
        <p><strong><span style="color:#444444"><span style="font-size:18px"><span style="font-family:Source Han Sans,Geneva,sans-serif">成长迅速空间大</span></span></span></strong></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_113_14').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_114_14" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_111_14" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 13px; width: 13px; left: 251px; top: 50px;z-index:1;"><div class="yibuFrameContent con_114_14  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_114_14">
            </div>
</div></div></div><div id="smv_con_115_14" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_111_14" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 77px; width: 224px; left: 120px; top: 74px;z-index:5;"><div class="yibuFrameContent con_115_14  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_115_14' style="height: 100%;">
    <div class="editableContent" id="txtc_con_115_14" style="height: 100%; word-wrap:break-word;">
        <p><span style="line-height:1.75"><span style="color:#666666"><span style="font-size:14px"><span style="font-family:Source Han Sans,Geneva,sans-serif">公司已成为集研发、销售、生产和服务于一体的现代高科技企业。</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_115_14').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div></div>
<div id="bannerWrap_con_100_48" class="fullcolumn-outer" style="position: absolute; top: 0; bottom: 0;">
</div>

<script type="text/javascript">

    $(function () {
        var resize = function () {
            $("#smv_con_100_48 >.yibuFrameContent>.fullcolumn-inner").width($("#smv_con_100_48").parent().width());
            $('#bannerWrap_con_100_48').fullScreen(function (t) {
                if (VisitFromMobile()) {
                    t.css("min-width", t.parent().width())
                }
            });
        }
        $(window).resize(function (e) {
            if (e.target == this) {
                resize();
            }
        });
        resize();
    });
</script>
</div></div><div id="smv_con_116_36" ctype="banner"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 600px; width: 100%; left: 0px; top: 2533px;z-index:0;"><div class="yibuFrameContent con_116_36  banner_Style1  " style="overflow:visible;;" ><div class="fullcolumn-inner smAreaC" id="smc_Area0" cid="con_116_36" style="width:1200px">
    <div id="smv_con_123_36" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_116_36" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 87px; width: 360px; left: 1px; top: 173px;z-index:2;"><div class="yibuFrameContent con_123_36  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_123_36' style="height: 100%;">
    <div class="editableContent" id="txtc_con_123_36" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#ffffff"><strong><span style="font-size:38px"><span style="font-family:Source Han Sans,Geneva,sans-serif">真实客户评价</span></span></strong></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_123_36').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_124_36" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item4" areaId="Area0" isContainer="False" pvid="con_116_36" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 35px; width: 510px; left: 3px; top: 224px;z-index:3;"><div class="yibuFrameContent con_124_36  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_124_36' style="height: 100%;">
    <div class="editableContent" id="txtc_con_124_36" style="height: 100%; word-wrap:break-word;">
        <p><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="color:#dddddd">REAL CUSTOMER EVALUATION</span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_124_36').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_126_50" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Down","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_116_36" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 43px; width: 43px; left: 208px; top: 164px;z-index:1;"><div class="yibuFrameContent con_126_50  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_126_50">
            </div>
</div></div></div><div id="smv_con_127_9" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Down","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_116_36" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 162px; width: 283px; left: 609px; top: 118px;z-index:6;"><div class="yibuFrameContent con_127_9  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_127_9">
        <div id="smv_con_128_22" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_127_9" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 13px; width: 13px; left: 16px; top: 20px;z-index:1;"><div class="yibuFrameContent con_128_22  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_128_22">
            </div>
</div></div></div><div id="smv_con_129_15" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_127_9" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 88px; width: 247px; left: 17px; top: 56px;z-index:5;"><div class="yibuFrameContent con_129_15  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_129_15' style="height: 100%;">
    <div class="editableContent" id="txtc_con_129_15" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:justify"><span style="color:#eeeeee"><span style="line-height:1.75"><span style="font-size:14px"><span style="font-family:Source Han Sans,Geneva,sans-serif">贵公司平台作为的行业平台，为我们提供动态行研分析与优质项目的发现和追踪，希望贵公司越来越好！</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_129_15').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div><div id="smv_con_130_21" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_116_36" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 162px; width: 283px; left: 916px; top: 118px;z-index:6;"><div class="yibuFrameContent con_130_21  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_130_21">
        <div id="smv_con_131_21" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_130_21" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 13px; width: 13px; left: 16px; top: 20px;z-index:1;"><div class="yibuFrameContent con_131_21  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_131_21">
            </div>
</div></div></div><div id="smv_con_132_21" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_130_21" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 88px; width: 247px; left: 17px; top: 56px;z-index:5;"><div class="yibuFrameContent con_132_21  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_132_21' style="height: 100%;">
    <div class="editableContent" id="txtc_con_132_21" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:justify"><span style="color:#eeeeee"><span style="line-height:1.75"><span style="font-size:14px"><span style="font-family:Source Han Sans,Geneva,sans-serif">市场风云涌现，企业与我们都面临着越来越高的选择成本，而这里能够帮助双方理性思考、顺利对接。</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_132_21').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div><div id="smv_con_133_10" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_116_36" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 162px; width: 283px; left: 609px; top: 304px;z-index:6;"><div class="yibuFrameContent con_133_10  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_133_10">
        <div id="smv_con_134_10" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_133_10" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 13px; width: 13px; left: 16px; top: 20px;z-index:1;"><div class="yibuFrameContent con_134_10  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_134_10">
            </div>
</div></div></div><div id="smv_con_135_10" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_133_10" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 88px; width: 247px; left: 17px; top: 56px;z-index:5;"><div class="yibuFrameContent con_135_10  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_135_10' style="height: 100%;">
    <div class="editableContent" id="txtc_con_135_10" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:justify"><span style="color:#eeeeee"><span style="line-height:1.75"><span style="font-size:14px"><span style="font-family:Source Han Sans,Geneva,sans-serif">贵公司为我起到了保驾护航的作用，使项目的推进规则化和流程化，有效的帮助我在管理过程中提高效率。</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_135_10').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div><div id="smv_con_136_19" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Up","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_116_36" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 162px; width: 283px; left: 916px; top: 304px;z-index:6;"><div class="yibuFrameContent con_136_19  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_136_19">
        <div id="smv_con_137_19" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_136_19" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 13px; width: 13px; left: 16px; top: 20px;z-index:1;"><div class="yibuFrameContent con_137_19  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_137_19">
            </div>
</div></div></div><div id="smv_con_138_19" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_136_19" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 88px; width: 247px; left: 17px; top: 56px;z-index:5;"><div class="yibuFrameContent con_138_19  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_138_19' style="height: 100%;">
    <div class="editableContent" id="txtc_con_138_19" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:justify"><span style="color:#eeeeee"><span style="line-height:1.75"><span style="font-size:14px"><span style="font-family:Source Han Sans,Geneva,sans-serif">&hellip;&hellip;</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_138_19').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div><div id="smv_con_139_31" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item4" areaId="Area0" isContainer="False" pvid="con_116_36" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 177px; width: 405px; left: 1px; top: 292px;z-index:4;"><div class="yibuFrameContent con_139_31  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_139_31' style="height: 100%;">
    <div class="editableContent" id="txtc_con_139_31" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:justify"><span style="color:#dddddd"><span style="line-height:1.75"><span style="font-size:14px">千万客户心声，快速响应客户的变化需求，为行业客户提供先进、可靠、安全、高质量、易扩展的应用定制解决方案和产品工程解决方案，以及相关软硬件产品、平台及服务。</span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_139_31').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div></div>
<div id="bannerWrap_con_116_36" class="fullcolumn-outer" style="position: absolute; top: 0; bottom: 0;">
</div>

<script type="text/javascript">

    $(function () {
        var resize = function () {
            $("#smv_con_116_36 >.yibuFrameContent>.fullcolumn-inner").width($("#smv_con_116_36").parent().width());
            $('#bannerWrap_con_116_36').fullScreen(function (t) {
                if (VisitFromMobile()) {
                    t.css("min-width", t.parent().width())
                }
            });
        }
        $(window).resize(function (e) {
            if (e.target == this) {
                resize();
            }
        });
        resize();
    });
</script>
</div></div><div id="smv_con_140_52" ctype="banner"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 766px; width: 100%; left: 0px; top: 3133px;z-index:100004;"><div class="yibuFrameContent con_140_52  banner_Style1  " style="overflow:visible;;" ><div class="fullcolumn-inner smAreaC" id="smc_Area0" cid="con_140_52" style="width:1200px">
    <div id="smv_con_141_12" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"","animationName":"zoomIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_140_52" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 119px; width: 524px; left: 338px; top: 106px;z-index:1;"><div class="yibuFrameContent con_141_12  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_141_12">
        <div id="smv_con_142_12" ctype="area"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_141_12" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 88px; width: 88px; left: 155px; top: 7px;z-index:3;"><div class="yibuFrameContent con_142_12  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_142_12">
            </div>
</div></div></div><div id="smv_con_143_12" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item2" areaId="Area0" isContainer="False" pvid="con_141_12" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 40px; width: 232px; left: 199px; top: 29px;z-index:4;"><div class="yibuFrameContent con_143_12  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_143_12' style="height: 100%;">
    <div class="editableContent" id="txtc_con_143_12" style="height: 100%; word-wrap:break-word;">
        <p><span style="font-size:30px"><strong>行业动态</strong></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_143_12').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div><div id="smv_con_144_12" ctype="text"  class="esmartMargin smartAbs " cpid="30536" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_141_12" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 64px; width: 212px; left: 220px; top: 41px;z-index:1;"><div class="yibuFrameContent con_144_12  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_144_12' style="height: 100%;">
    <div class="editableContent" id="txtc_con_144_12" style="height: 100%; word-wrap:break-word;">
        <p><span style="font-size:54px"><span style="color:#eeeeee"><strong><span style="font-family:Arial Black">NEWS</span></strong></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_144_12').find('table')
    for (var i = 0; i < tables.length; i++) {
        var tab = tables[i]
        var borderWidth = $(tab).attr('border')
        if (borderWidth <= 0 || !borderWidth) {
            console.log(tab)
            $(tab).addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tbody").children("tr").children("th").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("td").addClass('hidden-border')
            $(tab).children("thead").children("tr").children("th").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("td").addClass('hidden-border')
            $(tab).children("tfoot").children("tr").children("th").addClass('hidden-border')
        }
    }
</script></div></div>    </div>
</div></div></div><div id="smv_con_146_16" ctype="slide" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style4" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_140_52" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 376px; width: 623px; left: 0px; top: 256px;z-index:1;"><div class="yibuFrameContent con_146_16  slide_Style4  " style="overflow:visible;;" ><!--w-slide-->
<div class="w-slider" id="slider_smv_con_146_16">
    <div class="w-slider-wrap" data-u="slides">

            <div>
                <a href="/newsinfo/-8466.html" target="_self" class="w-imglink">
                    <span style="display:inline-block;height:100%;width:0;vertical-align:middle;margin-left:-5px;"></span>
                    <img data-u="image" id="-48467"  src="{{asset(FE_STATICS.'picture/-48467.jpg')}}" class="CutFill" title="企业没做好这几点，KPI、OKR、BSC绩效工具都没用" alt="企业没做好这几点，KPI、OKR、BSC绩效工具都没用" onerror="changeSrc(this)"/>
                </a>
                <div class="slideTitle " data-u="thumb">企业没做好这几点，KPI、OKR、BSC绩效工具都没用</div>
            </div>
            <div>
                <a href="/newsinfo/-8467.html" target="_self" class="w-imglink">
                    <span style="display:inline-block;height:100%;width:0;vertical-align:middle;margin-left:-5px;"></span>
                    <img data-u="image" id="-48468"  src="{{asset(FE_STATICS.'picture/-48468.jpg')}}" class="CutFill" title="招聘最多企业登场&#160;提供两万就业岗位" alt="招聘最多企业登场&#160;提供两万就业岗位" onerror="changeSrc(this)"/>
                </a>
                <div class="slideTitle " data-u="thumb">招聘最多企业登场&#160;提供两万就业岗位</div>
            </div>
    </div>
    <!-- Thumbnail Navigator -->
    <div data-u="thumbnavigator" class="w-slider-title slideTitle ">
        <div class="w-slider-titlebg slideTitlebg  f-hide "></div>
        <!-- Thumbnail Item Skin Begin -->
        <div class="w-slider-titlewrap" data-u="slides">
            <div data-u="prototype" class="w-slider-titlein">
                <div data-u="thumbnailtemplate" class="w-slider-titletext"></div>
            </div>
        </div>
        <!-- Thumbnail Item Skin End -->
    </div>
    <!-- Bullet Navigator -->
    <div class="w-point slideCircle " data-u="navigator" data-autocenter="1">
        <!-- bullet navigator item prototype -->
        <div class="w-point-item" data-u="prototype"></div>
    </div>

    <!-- Arrow Navigator -->
    <span data-u="arrowleft" class="w-point-left left slideArrow  f-hide " style="top:0px;left:12px;" data-autocenter="2">
        <i class="w-itemicon mw-iconfont ">&#xb133;</i>
    </span>
    <span data-u="arrowright" class="w-point-right right slideArrow  f-hide " style="top:0px;right:12px;" data-autocenter="2">
        <i class="w-itemicon mw-iconfont ">&#xb132;</i>
    </span>
</div>
<!--/w-slide-->
<script type="text/javascript">
    function changeSrc(_this) {
        $(_this).css('margin-top', 0);
    }
      con_146_16_page = 1;
    con_146_16_slider4_init = function () {
        var jssor_1_options = {
            $AutoPlay: "on" == "on",//自动播放
            $PlayOrientation: "1",//2为向上滑，1为向左滑
            $Loop: parseInt("1"),//循环
            $SlideDuration: "1000",//延时
            $Idle: parseInt("5000"),//切换间隔
            $SlideEasing: $Jease$.$OutQuint,

             $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: GetSlideAnimation("3", "1000"),
                $TransitionsOrder: 1
            },

            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $ActionMode: "1"
            },
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 1,
                $Align: 0,
                $NoDrag: true
            }
        };

        var jssor_1_slider = new $JssorSlider$("slider_smv_con_146_16", jssor_1_options);
        jssor_1_slider.$On($JssorSlider$.$EVT_PARK, function (slideIndex, fromIndex) {
            jssor_1_slider.$GoTo(slideIndex);
            return false;
        });

        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 1000);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);

        var fillType = 'Conver';
        if (fillType != "Auto") {
            //大图裁剪
            $("#slider_smv_con_146_16 .w-imglink img").cutFill(623, 376);
        }
        else
        {
            window.setTimeout(function () {
                $("#slider_smv_con_146_16 .w-imglink").css({ textAlign: "center"});
                $("#slider_smv_con_146_16 .w-imglink img").css({ width: "auto", "height": "auto", position: "static", maxWidth: "100%", maxHeight: "100%", textAlign: "center", verticalAlign: "middle" });
            }, 500);

        }
    };
    $(function () {
        con_146_16_slider4_init();
    });
</script></div></div><div id="smv_con_149_21" ctype="listnews" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style4" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_140_52" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 131px; width: 531px; left: 670px; top: 255px;z-index:8;"><div class="yibuFrameContent con_149_21  listnews_Style4  " style="overflow:visible;;" >    <div class="w-list xn-resize">
        <ul class="w-list-ul w-list-imgno" id="ulList_con_149_21"
            data-title-autolines="1"
            data-desc-autolines="2">
                <li class="w-list-item f-clearfix">
                    <div class="w-list-pic">
                        <a href="/newsinfo/-8470.html" target="_self" class="w-list-piclink">
                            <img class="w-listpic-in" src="{{asset(FE_STATICS.'picture/-48471.jpg')}}" />
                        </a>
                    </div>
                    <div class="w-list-r">
                        <div class="w-list-r-in">
                            <h3 class="w-list-title">
                                <a href="/newsinfo/-8470.html" target="_self" class="w-list-titlelink">云空调、私人定制、云网超市－中国企业的“互联网＋”行动</a>
                            </h3>
                            <p class="w-list-desc ">这样的“云空调”正是得益于“互联网＋”的支撑。鼓励制造企业利用物联网、云计算、大数据等技术，整合产品全生命周期数据，形成面向生产组织全过程的决策服务信息，为产品优化升级提供数据支撑。鼓励企业基于互联网开展在线增值服务，拓展产品价值空间，实现从制造向“制造＋服务”的转型升级。</p>
                            <div class="w-list-bottom clearfix ">
                                <span class="w-list-viewnum w-hide"><i class="w-list-viewicon mw-iconfont">&#xb136;</i><span class="AR" data-dt="nvc" data-v="-8470">0</span></span>
                                <span class="w-list-date ">2021-03-10</span>
                            </div>
                        </div>
                    </div>
                </li>
        </ul>
    </div>
    <script>
        var callback_con_149_21 = function() {
            var sv = $("#smv_con_149_21");
            var titlelines = parseInt(sv.find(".w-list-ul").attr("data-title-autolines"));
            var desclines = parseInt(sv.find(".w-list-ul").attr("data-desc-autolines"));
            var desc_line_height =sv.find(".w-list-desc").css("line-height");
            sv.find(".w-list-desc").css("max-height", parseInt(desc_line_height) * desclines);

            var titleItem = sv.find(".w-list-titlelink");
            var title_height = titleItem.css("height");
            sv.find(".w-list-item.w-list-nopic").css("min-height", parseInt(title_height));

            var title_line_height = titleItem.css("line-height");
            titleItem.css("max-height", parseInt(title_line_height) * titlelines);
            sv.find("img").cutFill();
        }
        callback_con_149_21();
    </script>
</div></div><div id="smv_con_150_21" ctype="listnews" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style4" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_140_52" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 131px; width: 531px; left: 669px; top: 387px;z-index:8;"><div class="yibuFrameContent con_150_21  listnews_Style4  " style="overflow:visible;;" >    <div class="w-list xn-resize">
        <ul class="w-list-ul w-list-imgno" id="ulList_con_150_21"
            data-title-autolines="1"
            data-desc-autolines="2">
                <li class="w-list-item f-clearfix">
                    <div class="w-list-pic">
                        <a href="/newsinfo/-8471.html" target="_self" class="w-list-piclink">
                            <img class="w-listpic-in" src="{{asset(FE_STATICS.'picture/-48472.jpg')}}" />
                        </a>
                    </div>
                    <div class="w-list-r">
                        <div class="w-list-r-in">
                            <h3 class="w-list-title">
                                <a href="/newsinfo/-8471.html" target="_self" class="w-list-titlelink">新年报业绩告诉你哪家新基建上市公司有投资机会</a>
                            </h3>
                            <p class="w-list-desc ">目前来看，新型基础设施主要包括信息基础设施、融合基础设施、创新基础设施等三方面内容。而据相关测算，今年的新基建投资可能在1万亿元左右。面对如此明确的投资机会，你将如何把握？</p>
                            <div class="w-list-bottom clearfix ">
                                <span class="w-list-viewnum w-hide"><i class="w-list-viewicon mw-iconfont">&#xb136;</i><span class="AR" data-dt="nvc" data-v="-8471">0</span></span>
                                <span class="w-list-date ">2021-03-10</span>
                            </div>
                        </div>
                    </div>
                </li>
        </ul>
    </div>
    <script>
        var callback_con_150_21 = function() {
            var sv = $("#smv_con_150_21");
            var titlelines = parseInt(sv.find(".w-list-ul").attr("data-title-autolines"));
            var desclines = parseInt(sv.find(".w-list-ul").attr("data-desc-autolines"));
            var desc_line_height =sv.find(".w-list-desc").css("line-height");
            sv.find(".w-list-desc").css("max-height", parseInt(desc_line_height) * desclines);

            var titleItem = sv.find(".w-list-titlelink");
            var title_height = titleItem.css("height");
            sv.find(".w-list-item.w-list-nopic").css("min-height", parseInt(title_height));

            var title_line_height = titleItem.css("line-height");
            titleItem.css("max-height", parseInt(title_line_height) * titlelines);
            sv.find("img").cutFill();
        }
        callback_con_150_21();
    </script>
</div></div><div id="smv_con_151_37" ctype="listnews" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="30536" cstyle="Style4" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_140_52" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 131px; width: 531px; left: 669px; top: 519px;z-index:8;"><div class="yibuFrameContent con_151_37  listnews_Style4  " style="overflow:visible;;" >    <div class="w-list xn-resize">
        <ul class="w-list-ul w-list-imgno" id="ulList_con_151_37"
            data-title-autolines="1"
            data-desc-autolines="2">
                <li class="w-list-item f-clearfix">
                    <div class="w-list-pic">
                        <a href="/newsinfo/-8468.html" target="_self" class="w-list-piclink">
                            <img class="w-listpic-in" src="{{asset(FE_STATICS.'picture/-48469.jpg')}}" />
                        </a>
                    </div>
                    <div class="w-list-r">
                        <div class="w-list-r-in">
                            <h3 class="w-list-title">
                                <a href="/newsinfo/-8468.html" target="_self" class="w-list-titlelink">创业板改革落地,中国新经济企业如何抓住新机遇</a>
                            </h3>
                            <p class="w-list-desc ">发布创业板首发注册办法、创业板再融资注册办法等规则，发布创业板改革并试点注册制配套业务规则征求意见稿，创业板改革大幕正式拉开。</p>
                            <div class="w-list-bottom clearfix ">
                                <span class="w-list-viewnum w-hide"><i class="w-list-viewicon mw-iconfont">&#xb136;</i><span class="AR" data-dt="nvc" data-v="-8468">0</span></span>
                                <span class="w-list-date ">2021-03-10</span>
                            </div>
                        </div>
                    </div>
                </li>
        </ul>
    </div>
    <script>
        var callback_con_151_37 = function() {
            var sv = $("#smv_con_151_37");
            var titlelines = parseInt(sv.find(".w-list-ul").attr("data-title-autolines"));
            var desclines = parseInt(sv.find(".w-list-ul").attr("data-desc-autolines"));
            var desc_line_height =sv.find(".w-list-desc").css("line-height");
            sv.find(".w-list-desc").css("max-height", parseInt(desc_line_height) * desclines);

            var titleItem = sv.find(".w-list-titlelink");
            var title_height = titleItem.css("height");
            sv.find(".w-list-item.w-list-nopic").css("min-height", parseInt(title_height));

            var title_line_height = titleItem.css("line-height");
            titleItem.css("max-height", parseInt(title_line_height) * titlelines);
            sv.find("img").cutFill();
        }
        callback_con_151_37();
    </script>
</div></div></div>
<div id="bannerWrap_con_140_52" class="fullcolumn-outer" style="position: absolute; top: 0; bottom: 0;">
</div>

<script type="text/javascript">

    $(function () {
        var resize = function () {
            $("#smv_con_140_52 >.yibuFrameContent>.fullcolumn-inner").width($("#smv_con_140_52").parent().width());
            $('#bannerWrap_con_140_52').fullScreen(function (t) {
                if (VisitFromMobile()) {
                    t.css("min-width", t.parent().width())
                }
            });
        }
        $(window).resize(function (e) {
            if (e.target == this) {
                resize();
            }
        });
        resize();
    });
</script>
</div></div></div></div><input type='hidden' name='__RequestVerificationToken' id='token__RequestVerificationToken' value='38mws6fPolK7aX_RCGKgXQ69ndObx8_kXT7S0T29nyZ6r5GrSsYaPqv8c_RuJYjI4Nk4yJ19TLrmcNlheaSAIgbKeIgv7tDoPvItR2_Wc2o1' />
            </div>
        </div>
    </div>
    <div style="background-color: rgb(68, 68, 68); background-image: none; background-repeat: no-repeat;background-position:0 0; background:-moz-linear-gradient(top, none, none);background:-webkit-gradient(linear, left top, left bottom, from(none), to(none));background:-o-linear-gradient(top, none, none);background:-ms-linear-gradient(top, none, none);background:linear-gradient(top, none, none);;
         position: relative; width: 100%;min-width:1000px;background-size: auto;" bgScroll="none">
        <div class=" footer" cpid="30459" id="smv_Area3" style="width: 1000px; height: 203px; position: relative; margin: 0 auto;">
            <div id="smv_tem_73_9" ctype="banner"  class="esmartMargin smartAbs " cpid="30459" cstyle="Style1" ccolor="Item0" areaId="Area3" isContainer="True" pvid="" tareaId="Area3"  re-direction="y" daxis="Y" isdeletable="True" style="height: 204px; width: 100%; left: 0px; top: 0px;z-index:2;"><div class="yibuFrameContent tem_73_9  banner_Style1  " style="overflow:visible;;" ><div class="fullcolumn-inner smAreaC" id="smc_Area0" cid="tem_73_9" style="width:1000px">
    <div id="smv_tem_74_16" ctype="logoimage"  class="esmartMargin smartAbs " cpid="30459" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="tem_73_9" tareaId="Area3"  re-direction="all" daxis="All" isdeletable="True" style="height: 48px; width: 129px; left: 2px; top: 58px;z-index:3;"><div class="yibuFrameContent tem_74_16  logoimage_Style1  " style="overflow:visible;;" >
<div class="w-image-box" data-fillType="0" id="div_tem_74_16">
    <a target="_self" href="">
        <img src="{{asset(FE_STATICS.'picture/-48490.png')}}" alt="" title="" id="img_smv_tem_74_16" style="width: 129px; height:48px;">
    </a>
</div>

<script type="text/javascript">
    $(function () {
        InitImageSmv("tem_74_16", "129", "48", "0");
    });
</script>

</div></div><div id="smv_tem_75_29" ctype="companyinfo"  class="esmartMargin smartAbs " cpid="30459" cstyle="Style4" ccolor="Item0" areaId="Area0" isContainer="False" pvid="tem_73_9" tareaId="Area3"  re-direction="all" daxis="All" isdeletable="True" style="height: 30px; width: 320px; left: 0px; top: 132px;z-index:4;"><div class="yibuFrameContent tem_75_29  companyinfo_Style4  " style="overflow:hidden;;" ><div class="w-company-info iconStyle1">
        <span class="company-info-item">
            <a href="javascript:void(0)" >
                <span class="icon company-info-icon    mw-icon-hide ">
                    <i class="ltd-icon gs-gongsi"></i>
                </span>
                <span class="company-info-title"style="white-space:pre">版权所有 &#169;</span>
                <span class="company-info-text">某某有限公司</span>
            </a>
        </span>
</div></div></div><div id="smv_tem_76_4" ctype="line"  class="esmartMargin smartAbs " cpid="30459" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="tem_73_9" tareaId="Area3"  re-direction="x" daxis="All" isdeletable="True" style="height: 20px; width: 137px; left: 0px; top: 111px;z-index:5;"><div class="yibuFrameContent tem_76_4  line_Style1  " style="overflow:visible;;" ><!-- w-line -->
<div style="position:relative; height:100%">
    <div class="w-line" style="position:absolute;top:50%;" linetype="horizontal"></div>
</div>
</div></div><div id="smv_tem_77_27" ctype="companyinfo"  class="esmartMargin smartAbs " cpid="30459" cstyle="Style2" ccolor="Item0" areaId="Area0" isContainer="False" pvid="tem_73_9" tareaId="Area3"  re-direction="all" daxis="All" isdeletable="True" style="height: 117px; width: 275px; left: 548px; top: 52px;z-index:6;"><div class="yibuFrameContent tem_77_27  companyinfo_Style2  " style="overflow:hidden;;" ><ul class="w-company-info iconStyle1">
        <li class="company-info-item">
            <a href="javascript:void(0)"  >
                <div class="company-info-titleBox">
                    <span class="company-info-icon ">
                        <i class="ltd-icon  gs-dizhi"></i>
                    </span>
                    <span class="company-info-title   mw-icon-hide "style="white-space:pre">地址：</span>
                </div>
                <div class="company-text">
                    <span class="company-info-text">中国北京市东城区某某大厦8-88室</span>
                </div>
            </a>
        </li>
        <li class="company-info-item">
            <a href="tel:400xxx8888"  >
                <div class="company-info-titleBox">
                    <span class="company-info-icon ">
                        <i class="ltd-icon  gs-dianhua"></i>
                    </span>
                    <span class="company-info-title   mw-icon-hide "style="white-space:pre">电话：</span>
                </div>
                <div class="company-text">
                    <span class="company-info-text">400xxx8888</span>
                </div>
            </a>
        </li>
        <li class="company-info-item">
            <a href="javascript:void(0)"  >
                <div class="company-info-titleBox">
                    <span class="company-info-icon ">
                        <i class="ltd-icon  gs-chuanzhen"></i>
                    </span>
                    <span class="company-info-title   mw-icon-hide "style="white-space:pre">传真：</span>
                </div>
                <div class="company-text">
                    <span class="company-info-text">010xxxx8888</span>
                </div>
            </a>
        </li>
        <li class="company-info-item">
            <a href="mailto:name@example.xxx"  >
                <div class="company-info-titleBox">
                    <span class="company-info-icon ">
                        <i class="ltd-icon  gs-youxiang"></i>
                    </span>
                    <span class="company-info-title   mw-icon-hide "style="white-space:pre">邮箱：</span>
                </div>
                <div class="company-text">
                    <span class="company-info-text">name@example.xxx</span>
                </div>
            </a>
        </li>
</ul></div></div><div id="smv_tem_78_25" ctype="image"  class="esmartMargin smartAbs " cpid="30459" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="tem_73_9" tareaId="Area3"  re-direction="all" daxis="All" isdeletable="True" style="height: 86px; width: 86px; left: 913px; top: 60px;z-index:7;"><div class="yibuFrameContent tem_78_25  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="2" id="div_tem_78_25">
        <a target="_self" href="">
            <img
                 src="{{asset(FE_STATICS.'picture/-48491.png')}}"
                 alt=""
                 title=""
                 id="img_smv_tem_78_25"
                 style="width: 84px; height:84px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("tem_78_25", "84", "86", "2");

                 });
    </script>

</div></div></div>
<div id="bannerWrap_tem_73_9" class="fullcolumn-outer" style="position: absolute; top: 0; bottom: 0;">
</div>

<script type="text/javascript">

    $(function () {
        var resize = function () {
            $("#smv_tem_73_9 >.yibuFrameContent>.fullcolumn-inner").width($("#smv_tem_73_9").parent().width());
            $('#bannerWrap_tem_73_9').fullScreen(function (t) {
                if (VisitFromMobile()) {
                    t.css("min-width", t.parent().width())
                }
            });
        }
        $(window).resize(function (e) {
            if (e.target == this) {
                resize();
            }
        });
        resize();
    });
</script>
</div></div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(function () {
            $("img.lazyload").lazyload({ skip_invisible: false, effect: "fadeIn", failure_limit: 15, threshold: 100 });
            $('.animated').smanimate();
            $('.smartRecpt').smrecompute();
            setCurrentPageTitle('首页', 2);
            xwezhan.initWz();

            if ($("#txtDeviceSwitchEnabled").val() == "hide") {
                $(".m-deviceSwitch").css("display", "none");
            }

            // 隐藏备案信息展示
            $('div[ctype=companyinfo]').find('.company-info-title').each(function (i, it) {
                if ($(it).text().indexOf('备案') > -1 || $(it).next().text().toLowerCase().indexOf('icp') > -1) {
                    $(it).parent().parent().css('display', 'none');
                }
            })
            var info = {
                icp: "",
                ga: '',
                copyright: '' != "" ? '版权所有© ' + '' : "",
                color: '#989898',
                background: '#ffffff',
                powerby: 'Powered by ' + 'CloudDream',
                ipv6: 'True' == 'True',
                ali: "True" == "True",
                style: 'style1',
                align: 'center',
                fontsize:12
        };

            _initData()
            _initShow()

            function _initData() {
                var linkUrl = "http://www.beian.gov.cn/portal/registerSystemInfo?recordcode="
                if (info.ga != "") {
                    linkUrl = linkUrl + info.ga.substring(5, 19);
                }
                $('.ga_link').attr('href', linkUrl);
                $('.bottom-content').css({ 'text-align': info.align })
                $('.icp-area .icp-words').text(info.icp)
                $('.ga-area .ga-words').text(info.ga)
                $('.copyright-area').text(info.copyright)
                $('.powerby-area').find('span').text(info.powerby)
                $('.page-bottom--area').css({ background: info.background })
                $('.bottom-words').css({ color: info.color })
                $('.bottom-border').css({ background: info.color })
                $('.ipv6-box').css({ 'border-color': info.color })
                $('.ali-area').find('svg g').css({ 'fill': info.color, height: info.fontsize, width: parseInt(info.fontsize * 55 / 13 + 'px') })
                $('.ga-area').find('img').css({ width: info.fontszie + 'px' })

                $('.ipv-area').css({ 'line-height': info.fontsize + 'px' })
                $('.ali-area').find('svg g').css({ 'fill': info.color })
                $('.divider').css({ height: info.fontsize + 'px' })
                $('.ali-area').find('svg').css({ height: info.fontsize, width: parseInt(info.fontsize * 55 / 13 + 'px') })
                $('.ga-area').find('img').css({ width: info.fontsize + 'px', height: info.fontsize + 'px' })
                $('.page-bottom--area').find('.common-style').css({ fontSize: info.fontsize + 'px' })
            }

            function _initShow() {
                if ("True" == "False") {
                    $('.top-area').css('display', 'none');
                }
                if ("True".toLowerCase() == "false") {
                    $('.ali-area').hide()
                    $('.ali-area')
                        .next('.divider')
                        .hide()
                }
                if ("True".toLowerCase() == "false") {
                    $('.ipv-area').hide()
                    $('.ipv-area')
                        .prev('.divider')
                        .hide()
                }
                if ("True".toLowerCase() == "false") {
                    $('.powerby-area').hide()
                    $('.powerby-area')
                        .prev('.divider')
                        .hide()
                }
                if ("True".toLowerCase() == "false" && "True".toLowerCase() == "false") {
                    $('.ipv-area').hide()
                    $('.ipv-area')
                        .next('.divider')
                        .hide()
                }
                if ((!info.ga && !info.icp) || ("True".toLowerCase() == "false" && "True".toLowerCase() == "false" && "True".toLowerCase() == "false")) {
                    $('.top-area').css({ 'margin-bottom': 0 })
                }
            }
        });
</script>
    <div id="systemDialogLayer" style="position:relative;z-index:999999"></div>
</body>
</html>
