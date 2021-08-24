@include('home.layout.header')
<body id="smart-body" area="main">

    <input type="hidden" id="pageinfo"
           value="278872"
           data-type="1"
           data-device="Pc"
           data-entityid="278872" />
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
<div id="mainContentWrapper" style="background-color: transparent; background-image: none; background-repeat: no-repeat;background-position:0 0; background:-moz-linear-gradient(top, none, none);background:-webkit-gradient(linear, left top, left bottom, from(none), to(none));background:-o-linear-gradient(top, none, none);background:-ms-linear-gradient(top, none, none);background:linear-gradient(top, none, none);;
     position: relative; width: 100%;min-width:1200px;background-size: auto;" bgScroll="none">
    <div style="background-color: transparent; background-image: none; background-repeat: no-repeat;background-position:0 0; background:-moz-linear-gradient(top, none, none);background:-webkit-gradient(linear, left top, left bottom, from(none), to(none));background:-o-linear-gradient(top, none, none);background:-ms-linear-gradient(top, none, none);background:linear-gradient(top, none, none);;
         position: relative; width: 100%;min-width:1200px;background-size: auto;" bgScroll="none">
        <div class=" header" cpid="30459" id="smv_Area0" style="width: 1200px; height: 79px;  position: relative; margin: 0 auto">
            <div id="smv_tem_70_50" ctype="banner"  class="esmartMargin smartAbs " cpid="30459" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="" tareaId="Area0"  re-direction="y" daxis="Y" isdeletable="True" style="height: 80px; width: 100%; left: 0px; top: 0px;z-index:5;"><div class="yibuFrameContent tem_70_50  banner_Style1  " style="overflow:visible;;" ><div class="fullcolumn-inner smAreaC" id="smc_Area0" cid="tem_70_50" style="width:1200px">
    <div id="smv_tem_71_21" ctype="logoimage"  class="esmartMargin smartAbs " cpid="30459" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="tem_70_50" tareaId="Area0"  re-direction="all" daxis="All" isdeletable="True" style="height: 40px; width: 108px; left: 0px; top: 21px;z-index:2;"><div class="yibuFrameContent tem_71_21  logoimage_Style1  " style="overflow:visible;;" >
<div class="w-image-box" data-fillType="0" id="div_tem_71_21">
    <a target="_self" href="/sy">
        <img src="static/picture/-48490.png" alt="" title="" id="img_smv_tem_71_21" style="width: 108px; height:40px;">
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

                <div class="smvWrapper"  style="min-width:1200px;  position: relative; background-color: transparent; background-image: none; background-repeat: no-repeat; background:-moz-linear-gradient(top, none, none);background:-webkit-gradient(linear, left top, left bottom, from(none), to(none));background:-o-linear-gradient(top, none, none);background:-ms-linear-gradient(top, none, none);background:linear-gradient(top, none, none);;background-position:0 0;background-size:auto;" bgScroll="none"><div class="smvContainer" id="smv_Main" cpid="278872" style="min-height:400px;width:1200px;height:2257px;  position: relative; "><div id="smv_con_1_20" ctype="slideset"  class="esmartMargin smartAbs " cpid="278872" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 400px; width: 100%; left: 0px; top: 0px;z-index:2;"><div class="yibuFrameContent con_1_20  slideset_Style1  " style="overflow:visible;;" >
<!--w-slide-->
<div id="lider_smv_con_1_20_wrapper">
    <div class="w-slide" id="slider_smv_con_1_20">
        <div class="w-slide-inner" data-u="slides">

                <div class="content-box" data-area="Area0">
                    <div id="smc_Area0" cid="con_1_20" class="smAreaC slideset_AreaC">
                        <div id="smv_con_8_22" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_1_20" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 119px; width: 524px; left: -1px; top: 152px;z-index:1;"><div class="yibuFrameContent con_8_22  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_8_22">
        <div id="smv_con_9_22" ctype="area"  class="esmartMargin smartAbs " cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_8_22" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 88px; width: 88px; left: 1px; top: 7px;z-index:3;"><div class="yibuFrameContent con_9_22  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_9_22">
            </div>
</div></div></div><div id="smv_con_10_22" ctype="text"  class="esmartMargin smartAbs " cpid="278872" cstyle="Style1" ccolor="Item2" areaId="Area0" isContainer="False" pvid="con_8_22" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 40px; width: 280px; left: 64px; top: 29px;z-index:4;"><div class="yibuFrameContent con_10_22  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_10_22' style="height: 100%;">
    <div class="editableContent" id="txtc_con_10_22" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#ffffff"><span style="font-size:30px"><strong>服务范围</strong></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_10_22').find('table')
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
</script></div></div><div id="smv_con_11_22" ctype="text"  class="esmartMargin smartAbs " cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_8_22" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 64px; width: 513px; left: 66px; top: 41px;z-index:1;"><div class="yibuFrameContent con_11_22  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_11_22' style="height: 100%;">
    <div class="editableContent" id="txtc_con_11_22" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:rgba(255, 255, 255, 0.2)"><span style="font-size:54px"><strong><span style="font-family:Arial Black">SERVICE SCOPE</span></strong></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_11_22').find('table')
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
                    <div class="content-box-inner" style="background-image:url(static/images/-48480.jpg);background-position:50% 50%;background-repeat:cover;background-size:cover;background-color:#ffffff;opacity:1"></div>

                </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="w-slide-btn-box  f-hide " data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div class="w-slide-btn" data-u="prototype"></div>
        </div>

        <!-- 1Arrow Navigator -->
        <span data-u="arrowleft" class="w-slide-arrowl  slideArrow  f-hide  " data-autocenter="2" id="left_con_1_20">
            <i class="w-itemicon mw-iconfont">&#xb133;</i>
        </span>
        <span data-u="arrowright" class="w-slide-arrowr slideArrow  f-hide " data-autocenter="2" id="right_con_1_20">
            <i class="w-itemicon mw-iconfont">&#xb132;</i>
        </span>
    </div>
</div>

    <!--/w-slide-->
<script type="text/javascript">
    con_1_20_page = 1;
    con_1_20_sliderset3_init = function () {
        var jssor_1_options_con_1_20 = {
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
        var slide = new $JssorSlider$("slider_smv_con_1_20", jssor_1_options_con_1_20);
        $('#smv_con_1_20').data('jssor_slide', slide);

        //resize游览器的时候触发自动缩放幻灯秀

        //幻灯栏目自动或手动切换时触发的事件
        slide.$On($JssorSlider$.$EVT_PARK, function (slideIndex, fromIndex) {
            var $slideWrapper = $("#slider_smv_con_1_20 .w-slide-inner:last");
            var $fromSlide = $slideWrapper.find(".content-box:eq(" + fromIndex + ")");
            var $curSlide = $slideWrapper.find(".content-box:eq(" + slideIndex + ")");
            var $nextSlide = $slideWrapper.find(".content-box:eq(" + (slideIndex+1) + ")");
            $("#smv_con_1_20").attr("selectArea", $curSlide.attr("data-area"));
            $fromSlide.find(".animated").smanimate("stop");
            $curSlide.find(".animated").smanimate("stop");
            $nextSlide.find(".animated").smanimate("stop");
            $("#switch_con_1_20 .page").html(slideIndex + 1);
            $curSlide.find(".animated").smanimate("replay");
            return false;
        });
        //切换栏点击事件
        $("#switch_con_1_20 .left").unbind("click").click(function () {
            if(con_1_20_page==1){
                con_1_20_page =1;
            } else {
                con_1_20_page = con_1_20_page - 1;
            }
            $("#switch_con_1_20 .page").html(con_1_20_page);
            slide.$Prev();
            return false;
        });
        $("#switch_con_1_20 .right").unbind("click").click(function () {
            if(con_1_20_page==1){
                con_1_20_page = 1;
        } else {
        con_1_20_page = con_1_20_page + 1;
    }
    $("#switch_con_1_20 .page").html(con_1_20_page);
    slide.$Next();
    return false;
    });
    };


    $(function () {

        var jssorCopyTmp = document.getElementById('slider_smv_con_1_20').cloneNode(true);

        var $jssorIntt = function () {

            //获取幻灯显示动画类型
            var $this = $('#slider_smv_con_1_20');
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

            con_1_20_sliderset3_init();

            var areaId = $("#smv_con_1_20").attr("tareaid");
            if(areaId==""){
                var mainWidth = $("#smv_Main").width();
                $("#smv_con_1_20 .slideset_AreaC").css({"width":mainWidth+"px","position":"relative","margin":"0 auto"});
            }else{
                var controlWidth = $("#smv_con_1_20").width();
                $("#smv_con_1_20 .slideset_AreaC").css({"width":controlWidth+"px","position":"relative","margin":"0 auto"});
            }
            $("#smv_con_1_20").attr("selectArea", "Area0");

            var arrowHeight = $('#slider_smv_con_1_20 .w-slide-arrowl').eq(-1).outerHeight();
            var arrowTop = (18 - arrowHeight) / 2;
            $('#slider_smv_con_1_20 .w-slide-arrowl').eq(-1).css('top', arrowTop);
            $('#slider_smv_con_1_20 .w-slide-arrowr').eq(-1).css('top', arrowTop);
        }
        $jssorIntt();


                 function ScaleSlider() {
                     var inst = $('#slider_smv_con_1_20');
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
</div></div><div id="smv_con_13_33" ctype="banner"  class="esmartMargin smartAbs " cpid="278872" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 620px; width: 100%; left: 0px; top: 399px;z-index:6;"><div class="yibuFrameContent con_13_33  banner_Style1  " style="overflow:visible;;" ><div class="fullcolumn-inner smAreaC" id="smc_Area0" cid="con_13_33" style="width:1200px">
    <div id="smv_con_14_50" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Up","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_13_33" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 146px; width: 506px; left: 2px; top: 338px;z-index:5;"><div class="yibuFrameContent con_14_50  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_14_50' style="height: 100%;">
    <div class="editableContent" id="txtc_con_14_50" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:justify"><span style="color:#777777"><span style="font-size:14px"><span style="line-height:2"><span style="font-family:Source Han Sans,Geneva,sans-serif">解答、介绍目前网络营销的主要渠道、工具、营销方式等；针对企业所属行业和企业具体情况，分析企业存在的可优化问题并提供互联网解决方案，包括降本增效和提高线上营收的方案等；解答技术问题，如分析开发某程序或应用所需技术种类、技术构架如何设计、团队或开发人员如何配置、所需成本费用、注意事项等</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_14_50').find('table')
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
</script></div></div><div id="smv_con_15_20" ctype="image" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_13_33" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 362px; width: 584px; left: 602px; top: 128px;z-index:6;"><div class="yibuFrameContent con_15_20  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="1" id="div_con_15_20">
        <a target="_self" href="">
            <img
                 src="static/picture/-48484.jpg"
                 alt=""
                 title=""
                 id="img_smv_con_15_20"
                 style="width: 582px; height:360px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_15_20", "582", "362", "1");

                 });
    </script>

</div></div><div id="smv_con_16_28" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_13_33" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 187px; width: 226px; left: 974px; top: 317px;z-index:0;"><div class="yibuFrameContent con_16_28  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_16_28">
        <div id="smv_con_17_45" ctype="area"  class="esmartMargin smartAbs " cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_16_28" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 15px; width: 15px; left: 205px; top: 165px;z-index:7;"><div class="yibuFrameContent con_17_45  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_17_45">
            </div>
</div></div></div>    </div>
</div></div></div><div id="smv_con_18_7" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_13_33" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 40px; width: 503px; left: 0px; top: 213px;z-index:8;"><div class="yibuFrameContent con_18_7  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_18_7' style="height: 100%;">
    <div class="editableContent" id="txtc_con_18_7" style="height: 100%; word-wrap:break-word;">
        <p><strong><span style="font-size:28px"><span style="font-family:Source Han Sans,Geneva,sans-serif">企业信息化咨询</span></span></strong></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_18_7').find('table')
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
</script></div></div><div id="smv_con_19_20" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"","animationName":"fadeIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_13_33" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 15px; width: 15px; left: 0px; top: 281px;z-index:7;"><div class="yibuFrameContent con_19_20  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_19_20">
            </div>
</div></div></div><div id="smv_con_70_58" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item5" areaId="Area0" isContainer="False" pvid="con_13_33" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 31px; width: 360px; left: 1px; top: 250px;z-index:9;"><div class="yibuFrameContent con_70_58  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_70_58' style="height: 100%;">
    <div class="editableContent" id="txtc_con_70_58" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#cccccc"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:14px">Enterprise information consulting</span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_70_58').find('table')
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
</script></div></div><div id="smv_con_71_40" ctype="image" smanim='{"delay":0.75,"duration":0.75,"direction":"Down","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_13_33" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 66px; width: 66px; left: -4px; top: 142px;z-index:10;"><div class="yibuFrameContent con_71_40  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="0" id="div_con_71_40">
        <a target="_self" href="">
            <img
                 src="static/picture/-48481.png"
                 alt=""
                 title=""
                 id="img_smv_con_71_40"
                 style="width: 64px; height:64px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_71_40", "64", "66", "0");

                 });
    </script>

</div></div></div>
<div id="bannerWrap_con_13_33" class="fullcolumn-outer" style="position: absolute; top: 0; bottom: 0;">
</div>

<script type="text/javascript">

    $(function () {
        var resize = function () {
            $("#smv_con_13_33 >.yibuFrameContent>.fullcolumn-inner").width($("#smv_con_13_33").parent().width());
            $('#bannerWrap_con_13_33').fullScreen(function (t) {
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
</div></div><div id="smv_con_72_27" ctype="banner"  class="esmartMargin smartAbs " cpid="278872" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 620px; width: 100%; left: 0px; top: 1018px;z-index:6;"><div class="yibuFrameContent con_72_27  banner_Style1  " style="overflow:visible;;" ><div class="fullcolumn-inner smAreaC" id="smc_Area0" cid="con_72_27" style="width:1200px">
    <div id="smv_con_73_27" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Up","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_72_27" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 197px; width: 506px; left: 695px; top: 324px;z-index:5;"><div class="yibuFrameContent con_73_27  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_73_27' style="height: 100%;">
    <div class="editableContent" id="txtc_con_73_27" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:justify"><span style="color:#777777"><span style="font-size:14px"><span style="line-height:2"><span style="font-family:Source Han Sans,Geneva,sans-serif">客户企业避免形成信息孤岛：同一家软件供应商提供的系统互相连通和协同更高效；也降低IT运维成本。责任清楚，避免有新需求或发生异常时，多个供应商之间扯皮。降低IT系统经常替换和推倒重来的风险。客户省事，一家IT公司提供所有IT服务。当然，对软件供应商来说，对一个客户交叉销售（Cross-Selling）多个产品能够扩大营收、降低营销成本和服务成本并为客户提供以上便利，这些是该决策关键的考量。</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_73_27').find('table')
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
</script></div></div><div id="smv_con_74_27" ctype="image" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_72_27" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 362px; width: 584px; left: 13px; top: 128px;z-index:1;"><div class="yibuFrameContent con_74_27  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="1" id="div_con_74_27">
        <a target="_self" href="">
            <img
                 src="static/picture/-48486.jpg"
                 alt=""
                 title=""
                 id="img_smv_con_74_27"
                 style="width: 582px; height:360px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_74_27", "582", "362", "1");

                 });
    </script>

</div></div><div id="smv_con_75_27" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_72_27" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 187px; width: 226px; left: 0px; top: 317px;z-index:0;"><div class="yibuFrameContent con_75_27  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_75_27">
        <div id="smv_con_76_27" ctype="area"  class="esmartMargin smartAbs " cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_75_27" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 15px; width: 15px; left: 5px; top: 165px;z-index:7;"><div class="yibuFrameContent con_76_27  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_76_27">
            </div>
</div></div></div>    </div>
</div></div></div><div id="smv_con_77_27" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_72_27" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 40px; width: 503px; left: 693px; top: 212px;z-index:8;"><div class="yibuFrameContent con_77_27  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_77_27' style="height: 100%;">
    <div class="editableContent" id="txtc_con_77_27" style="height: 100%; word-wrap:break-word;">
        <p><strong><span style="font-size:28px"><span style="font-family:Source Han Sans,Geneva,sans-serif">一站式解决方案</span></span></strong></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_77_27').find('table')
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
</script></div></div><div id="smv_con_78_27" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"","animationName":"fadeIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_72_27" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 15px; width: 15px; left: 693px; top: 280px;z-index:7;"><div class="yibuFrameContent con_78_27  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_78_27">
            </div>
</div></div></div><div id="smv_con_79_27" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item5" areaId="Area0" isContainer="False" pvid="con_72_27" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 31px; width: 360px; left: 694px; top: 249px;z-index:9;"><div class="yibuFrameContent con_79_27  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_79_27' style="height: 100%;">
    <div class="editableContent" id="txtc_con_79_27" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#aaaaaa"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:14px">One-stop solution</span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_79_27').find('table')
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
</script></div></div><div id="smv_con_80_27" ctype="image" smanim='{"delay":0.75,"duration":0.75,"direction":"Down","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_72_27" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 66px; width: 66px; left: 689px; top: 141px;z-index:10;"><div class="yibuFrameContent con_80_27  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="0" id="div_con_80_27">
        <a target="_self" href="">
            <img
                 src="static/picture/-48482.png"
                 alt=""
                 title=""
                 id="img_smv_con_80_27"
                 style="width: 64px; height:64px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_80_27", "64", "66", "0");

                 });
    </script>

</div></div></div>
<div id="bannerWrap_con_72_27" class="fullcolumn-outer" style="position: absolute; top: 0; bottom: 0;">
</div>

<script type="text/javascript">

    $(function () {
        var resize = function () {
            $("#smv_con_72_27 >.yibuFrameContent>.fullcolumn-inner").width($("#smv_con_72_27").parent().width());
            $('#bannerWrap_con_72_27').fullScreen(function (t) {
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
</div></div><div id="smv_con_81_25" ctype="banner"  class="esmartMargin smartAbs " cpid="278872" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 620px; width: 100%; left: 0px; top: 1637px;z-index:6;"><div class="yibuFrameContent con_81_25  banner_Style1  " style="overflow:visible;;" ><div class="fullcolumn-inner smAreaC" id="smc_Area0" cid="con_81_25" style="width:1200px">
    <div id="smv_con_82_25" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Up","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item3" areaId="Area0" isContainer="False" pvid="con_81_25" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 146px; width: 506px; left: 2px; top: 338px;z-index:5;"><div class="yibuFrameContent con_82_25  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_82_25' style="height: 100%;">
    <div class="editableContent" id="txtc_con_82_25" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:justify"><span style="color:#777777"><span style="font-size:14px"><span style="line-height:2"><span style="font-family:Source Han Sans,Geneva,sans-serif">公司定位于大视频领域，依托上亿级端到端系统的建设优势，面向运营商、媒体、金融等主要行业提供软件定制开发、媒体运营为主的技术开发服务。目前，公司主要业务涉及大视频运营、超高清视频直播点播、融合媒体平台、视频智能应用、物联网等领域。</span></span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_82_25').find('table')
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
</script></div></div><div id="smv_con_83_25" ctype="image" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_81_25" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 362px; width: 584px; left: 602px; top: 128px;z-index:6;"><div class="yibuFrameContent con_83_25  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="1" id="div_con_83_25">
        <a target="_self" href="">
            <img
                 src="static/picture/-48485.jpg"
                 alt=""
                 title=""
                 id="img_smv_con_83_25"
                 style="width: 582px; height:360px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_83_25", "582", "362", "1");

                 });
    </script>

</div></div><div id="smv_con_84_25" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_81_25" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 187px; width: 226px; left: 974px; top: 317px;z-index:0;"><div class="yibuFrameContent con_84_25  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_84_25">
        <div id="smv_con_85_25" ctype="area"  class="esmartMargin smartAbs " cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_84_25" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 15px; width: 15px; left: 205px; top: 165px;z-index:7;"><div class="yibuFrameContent con_85_25  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_85_25">
            </div>
</div></div></div>    </div>
</div></div></div><div id="smv_con_86_25" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_81_25" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 40px; width: 503px; left: 0px; top: 213px;z-index:8;"><div class="yibuFrameContent con_86_25  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_86_25' style="height: 100%;">
    <div class="editableContent" id="txtc_con_86_25" style="height: 100%; word-wrap:break-word;">
        <p><strong><span style="font-size:28px"><span style="font-family:Source Han Sans,Geneva,sans-serif">技术与运营服务商</span></span></strong></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_86_25').find('table')
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
</script></div></div><div id="smv_con_87_25" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"","animationName":"fadeIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_81_25" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 15px; width: 15px; left: 0px; top: 281px;z-index:7;"><div class="yibuFrameContent con_87_25  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_87_25">
            </div>
</div></div></div><div id="smv_con_88_25" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item5" areaId="Area0" isContainer="False" pvid="con_81_25" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 31px; width: 360px; left: 1px; top: 250px;z-index:9;"><div class="yibuFrameContent con_88_25  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_88_25' style="height: 100%;">
    <div class="editableContent" id="txtc_con_88_25" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#aaaaaa"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:14px">Technical and operational service providers</span></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_88_25').find('table')
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
</script></div></div><div id="smv_con_89_25" ctype="image" smanim='{"delay":0.75,"duration":0.75,"direction":"Down","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278872" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_81_25" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 66px; width: 66px; left: -4px; top: 141px;z-index:10;"><div class="yibuFrameContent con_89_25  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="0" id="div_con_89_25">
        <a target="_self" href="">
            <img
                 src="static/picture/-48483.png"
                 alt=""
                 title=""
                 id="img_smv_con_89_25"
                 style="width: 64px; height:64px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_89_25", "64", "66", "0");

                 });
    </script>

</div></div></div>
<div id="bannerWrap_con_81_25" class="fullcolumn-outer" style="position: absolute; top: 0; bottom: 0;">
</div>

<script type="text/javascript">

    $(function () {
        var resize = function () {
            $("#smv_con_81_25 >.yibuFrameContent>.fullcolumn-inner").width($("#smv_con_81_25").parent().width());
            $('#bannerWrap_con_81_25').fullScreen(function (t) {
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
</div></div></div></div><input type='hidden' name='__RequestVerificationToken' id='token__RequestVerificationToken' value='2BbEMOT1Pt3rdPnKIhh0fKwqzyqbU4k-s_3DUjT1mBtg_a2KqP6MZrdtqtylGsQNR7meJ52DtnZ98bY4-SPR84hngQZrpDjqULI4Krqrc6Q1' />
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
        <img src="static/picture/-48490.png" alt="" title="" id="img_smv_tem_74_16" style="width: 129px; height:48px;">
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
                 src="static/picture/-48491.png"
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
            setCurrentPageTitle('服务范围', 2);
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
                if (info.style === 'style1') {
                    $('#b_style1').css('display', 'block');
                    if (!info.ga) {
                        $('.ga-area').hide()
                        $('.ga-area')
                            .prev('.divider')
                            .hide()
                    }
                    if (!info.icp) {
                        $('.icp-area').hide()
                        $('.icp-area')
                            .next('.divider')
                            .hide()
                    }
                }
                if (info.style === 'style2') {
                    $('#b_style2').css('display', 'block');
                    if (!info.ga) {
                        $('.ga-area').hide()
                        $('.ga-area')
                            .next('.divider')
                            .hide()
                    }
                    if (!info.icp) {
                        $('.icp-area').hide()
                        $('.icp-area')
                            .prev('.divider')
                            .hide()
                    }
                }
                if (info.style === 'style3') {
                    $('#b_style3').css('display', 'block');
                    if (!info.ga) {
                        $('.ga-area').hide()
                        $('.ga-area')
                            .next('.divider')
                            .hide()
                    }
                    if (!info.copyright) {
                        $('.copyright-area').hide()
                        $('.copyright-area')
                            .prev('.divider')
                            .hide()
                    }
                    if (!info.icp) {
                        $('.icp-area').hide()
                        $('.icp-area')
                            .prev('.divider')
                            .hide()
                        $('.copyright-area').hide()
                        $('.copyright-area')
                            .prev('.divider')
                            .hide()
                    }
                    if (!info.ga && !info.copyright) {
                        $('.copyright-area').hide()
                        $('.copyright-area')
                            .next('.divider')
                            .hide()
                    }
                }
                if (info.style === 'style4') {
                    $('#b_style4').css('display', 'block');
                    if (!info.icp) {
                        $('.icp-area').hide()
                        $('.icp-area')
                            .prev('.divider')
                            .hide()
                        $('.copyright-area').hide()
                        $('.copyright-area')
                            .next('.divider')
                            .hide()
                    }
                    if (!info.copyright) {
                        $('.copyright-area').hide()
                        $('.copyright-area')
                            .next('.divider')
                            .hide()
                    }
                    if (!info.ga) {
                        $('.ga-area').hide()
                        $('.ga-area')
                            .prev('.divider')
                            .hide()
                    }
                    if (!info.icp && !info.copyright) {
                        $('.icp-area').hide()
                        $('.icp-area')
                            .next('.divider')
                            .hide()
                    }
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
