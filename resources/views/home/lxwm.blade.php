@include('home.layout.header')
<body id="smart-body" area="main">

    <input type="hidden" id="pageinfo"
           value="278927"
           data-type="1"
           data-device="Pc"
           data-entityid="278927" />
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

                <div class="smvWrapper"  style="min-width:1200px;  position: relative; background-color: transparent; background-image: none; background-repeat: no-repeat; background:-moz-linear-gradient(top, none, none);background:-webkit-gradient(linear, left top, left bottom, from(none), to(none));background:-o-linear-gradient(top, none, none);background:-ms-linear-gradient(top, none, none);background:linear-gradient(top, none, none);;background-position:0 0;background-size:auto;" bgScroll="none"><div class="smvContainer" id="smv_Main" cpid="278927" style="min-height:400px;width:1200px;height:1702px;  position: relative; "><div id="smv_con_1_20" ctype="slideset"  class="esmartMargin smartAbs " cpid="278927" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 400px; width: 100%; left: 0px; top: 0px;z-index:2;"><div class="yibuFrameContent con_1_20  slideset_Style1  " style="overflow:visible;;" >
<!--w-slide-->
<div id="lider_smv_con_1_20_wrapper">
    <div class="w-slide" id="slider_smv_con_1_20">
        <div class="w-slide-inner" data-u="slides">

                <div class="content-box" data-area="Area0">
                    <div id="smc_Area0" cid="con_1_20" class="smAreaC slideset_AreaC">
                        <div id="smv_con_8_22" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278927" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_1_20" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 119px; width: 524px; left: -1px; top: 152px;z-index:1;"><div class="yibuFrameContent con_8_22  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_8_22">
        <div id="smv_con_9_22" ctype="area"  class="esmartMargin smartAbs " cpid="278927" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_8_22" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 88px; width: 88px; left: 1px; top: 7px;z-index:3;"><div class="yibuFrameContent con_9_22  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_9_22">
            </div>
</div></div></div><div id="smv_con_10_22" ctype="text"  class="esmartMargin smartAbs " cpid="278927" cstyle="Style1" ccolor="Item2" areaId="Area0" isContainer="False" pvid="con_8_22" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 40px; width: 280px; left: 64px; top: 29px;z-index:4;"><div class="yibuFrameContent con_10_22  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_10_22' style="height: 100%;">
    <div class="editableContent" id="txtc_con_10_22" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#ffffff"><span style="font-size:30px"><strong>联系我们</strong></span></span></p>

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
</script></div></div><div id="smv_con_11_22" ctype="text"  class="esmartMargin smartAbs " cpid="278927" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_8_22" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 64px; width: 513px; left: 66px; top: 41px;z-index:1;"><div class="yibuFrameContent con_11_22  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_11_22' style="height: 100%;">
    <div class="editableContent" id="txtc_con_11_22" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:rgba(255, 255, 255, 0.2)"><span style="font-size:54px"><strong><span style="font-family:Arial Black">CONTACT</span></strong></span></span></p>

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
                    <div class="content-box-inner" style="background-image:url(static/images/-48487.jpg);background-position:50% 50%;background-repeat:cover;background-size:cover;background-color:#ffffff;opacity:1"></div>

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
</div></div><div id="smv_con_91_44" ctype="image" smanim='{"delay":0.75,"duration":0.75,"direction":"Left","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278927" cstyle="Style1" ccolor="Item0" areaId="" isContainer="False" pvid="" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 505px; width: 379px; left: 1px; top: 506px;z-index:6;"><div class="yibuFrameContent con_91_44  image_Style1  " style="overflow:visible;;" >
    <div class="w-image-box image-clip-wrap" data-fillType="1" id="div_con_91_44">
        <a target="_self" href="">
            <img
                 src="static/picture/-48489.jpg"
                 alt=""
                 title=""
                 id="img_smv_con_91_44"
                 style="width: 377px; height:503px;"
                 class=""
             >
        </a>
    </div>

    <script type="text/javascript">
        $(function () {

                InitImageSmv("con_91_44", "377", "505", "1");

                 });
    </script>

</div></div><div id="smv_con_92_10" ctype="area" smanim='{"delay":0.75,"duration":0.75,"direction":"Up","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278927" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 321px; width: 889px; left: 311px; top: 661px;z-index:1;"><div class="yibuFrameContent con_92_10  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_92_10">
        <div id="smv_con_93_38" ctype="text"  class="esmartMargin smartAbs " cpid="278927" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_92_10" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 48px; width: 567px; left: 126px; top: 64px;z-index:0;"><div class="yibuFrameContent con_93_38  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_93_38' style="height: 100%;">
    <div class="editableContent" id="txtc_con_93_38" style="height: 100%; word-wrap:break-word;">
        <p><span style="font-family:Source Han Sans"><span style="font-size:26px"><strong>欢迎您随时与我们取得联系</strong></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_93_38').find('table')
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
</script></div></div><div id="smv_con_95_13" ctype="area"  class="esmartMargin smartAbs " cpid="278927" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="True" pvid="con_92_10" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 13px; width: 13px; left: 449px; top: 77px;z-index:1;"><div class="yibuFrameContent con_95_13  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_95_13">
            </div>
</div></div></div><div id="smv_con_97_13" ctype="companyinfo"  class="esmartMargin smartAbs " cpid="278927" cstyle="Style2" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_92_10" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 130px; width: 590px; left: 126px; top: 134px;z-index:3;"><div class="yibuFrameContent con_97_13  companyinfo_Style2  " style="overflow:hidden;;" ><ul class="w-company-info iconStyle1">
        <li class="company-info-item">
            <a href="javascript:void(0)"  >
                <div class="company-info-titleBox">
                    <span class="company-info-icon ">
                        <i class="ltd-icon  gs-dizhi"></i>
                    </span>
                    <span class="company-info-title "style="white-space:pre">地址：</span>
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
                    <span class="company-info-title "style="white-space:pre">电话：</span>
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
                    <span class="company-info-title "style="white-space:pre">传真：</span>
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
                    <span class="company-info-title "style="white-space:pre">邮箱：</span>
                </div>
                <div class="company-text">
                    <span class="company-info-text">name@example.xxx</span>
                </div>
            </a>
        </li>
</ul></div></div>    </div>
</div></div></div><div id="smv_con_94_35" ctype="text" smanim='{"delay":0.75,"duration":0.75,"direction":"Down","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278927" cstyle="Style1" ccolor="Item0" areaId="" isContainer="False" pvid="" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 112px; width: 596px; left: 379px; top: 600px;z-index:0;"><div class="yibuFrameContent con_94_35  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_94_35' style="height: 100%;">
    <div class="editableContent" id="txtc_con_94_35" style="height: 100%; word-wrap:break-word;">
        <p><span style="color:#f7f7f7"><span style="font-size:72px"><strong><span style="font-family:Arial Black">CONTACT US</span></strong></span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_94_35').find('table')
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
</script></div></div><div id="smv_con_98_31" ctype="multicolumn"  class="esmartMargin smartAbs " cpid="278927" cstyle="Style1" ccolor="Item0" areaId="" isContainer="True" pvid="" tareaId=""  re-direction="y" daxis="Y" isdeletable="True" style="height: 580px; width: 100%; left: 0px; top: 1123px;z-index:3;"><div class="yibuFrameContent con_98_31  multicolumn_Style1  " style="overflow:visible;;" >
<div class="w-columns fullScreen" id="mc_con_98_31" data-spacing="0" data-pagewidth="1200" style="width: 1200px;">
    <ul class="w-columns-inner">
            <li class="w-columns-item" data-area="columnArea2" data-width="50">
                <div class="w-columns-interval">
                    <div class="w-columns-content" style="background-color: transparent; background-image: url(static/images/-47770.jpg); background-repeat: repeat; background-position: 50% 50%; background: -moz-linear-gradient(top, none, none);background: -ms-linear-gradient(none, none);background: -webkit-gradient(linear, left top, left bottom, from(none), to(none));background: -o-linear-gradient(top, none, none);background: linear-gradient(top, none, none);background-size:cover;">
                        <div class="w-columns-content-inner smAreaC" id="smc_columnArea2" cid="con_98_31" style="width:600px;">
                                                                                </div>
                    </div>
                </div>
            </li>
            <li class="w-columns-item" data-area="columnArea3" data-width="50">
                <div class="w-columns-interval">
                    <div class="w-columns-content" style="background-color: rgb(68, 68, 68); background-image: none; background-repeat: repeat; background-position: 50% 50%; background: -moz-linear-gradient(top, none, none);background: -ms-linear-gradient(none, none);background: -webkit-gradient(linear, left top, left bottom, from(none), to(none));background: -o-linear-gradient(top, none, none);background: linear-gradient(top, none, none);background-size:auto;">
                        <div class="w-columns-content-inner smAreaC" id="smc_columnArea3" cid="con_98_31" style="width:600px;">
                            <div id="smv_con_99_31" ctype="area" smanim='{"delay":0.25,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278927" cstyle="Style1" ccolor="Item1" areaId="columnArea3" isContainer="True" pvid="con_98_31" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 91px; width: 480px; left: 0px; top: 74px;z-index:5;"><div class="yibuFrameContent con_99_31  area_Style1  " style="overflow:visible;;" ><div class="w-container" data-effect-name="enterTop">
    <div class="smAreaC" id="smc_Area0" cid="con_99_31">
        <div id="smv_con_100_31" ctype="text"  class="esmartMargin smartAbs " cpid="278927" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_99_31" tareaId=""  re-direction="all" daxis="All" isdeletable="True" style="height: 45px; width: 208px; left: 120px; top: 18px;z-index:2;"><div class="yibuFrameContent con_100_31  text_Style1  " style="overflow:hidden;;" ><div id='txt_con_100_31' style="height: 100%;">
    <div class="editableContent" id="txtc_con_100_31" style="height: 100%; word-wrap:break-word;">
        <p style="text-align:center"><span style="color:#ffffff"><span style="font-size:36px">给我们留言</span></span></p>

    </div>
</div>

<script>
    var tables = $(' #smv_con_100_31').find('table')
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
</script></div></div><div id="smv_con_101_31" ctype="line"  class="esmartMargin smartAbs " cpid="278927" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_99_31" tareaId=""  re-direction="x" daxis="All" isdeletable="True" style="height: 20px; width: 105px; left: 9px; top: 27px;z-index:3;"><div class="yibuFrameContent con_101_31  line_Style1  " style="overflow:visible;;" ><!-- w-line -->
<div style="position:relative; height:100%">
    <div class="w-line" style="position:absolute;top:50%;" linetype="horizontal"></div>
</div>
</div></div><div id="smv_con_102_31" ctype="line"  class="esmartMargin smartAbs " cpid="278927" cstyle="Style1" ccolor="Item0" areaId="Area0" isContainer="False" pvid="con_99_31" tareaId=""  re-direction="x" daxis="All" isdeletable="True" style="height: 20px; width: 105px; left: 331px; top: 28px;z-index:3;"><div class="yibuFrameContent con_102_31  line_Style1  " style="overflow:visible;;" ><!-- w-line -->
<div style="position:relative; height:100%">
    <div class="w-line" style="position:absolute;top:50%;" linetype="horizontal"></div>
</div>
</div></div>    </div>
</div></div></div><div id="smv_con_104_31" ctype="leaveword" smanim='{"delay":0.5,"duration":0.75,"direction":"Right","animationName":"slideIn","infinite":"1"}'  class="esmartMargin smartAbs animated" cpid="278927" cstyle="Style5" ccolor="Item0" areaId="columnArea3" isContainer="False" pvid="con_98_31" tareaId=""  re-direction="x" daxis="All" isdeletable="True" style="height: 290px; width: 434px; left: 10px; top: 197px;z-index:6;"><div class="yibuFrameContent con_104_31  leaveword_Style5  " style="overflow:visible;;" ><!--w-guestbook-->
<div class="w-guestbook f-clearfix">

    <!-- 验证信息 w-hide 隐藏验证信息-->
    <div class="w-verify w-hide">
        <span class="w-verify-in"><i class="mw-iconfont">&#xb078;</i><span class="w-verify-text"></span></span>
    </div>

    <!--w-guestbook-container-->
    <div class="w-guestbook-container">

        <!--w-guestbook-item  验证错误样式-->
        <div class="w-guestbook-both">
            <div class="w-guestbook-both-inner">
                <div class="w-guestbook-both-inner-box">
                    <div class="w-guestbook-item w-placeholder">
                        <input type="text" class="w-guestbook-input" placeHolder="留言标题" autocomplete="off" name="Subject"/>
                    </div>
                </div>
            </div>
            <div class="w-guestbook-both-inner">
                <div class="w-guestbook-both-inner-box">
                    <div class="w-guestbook-item w-placeholder">
                        <input type="text" class="w-guestbook-input" placeHolder="联系邮箱" autocomplete="off" name="Email"/>
                    </div>
                </div>
            </div>
        </div>
        <!--/w-guestbook-item-->
        <!--w-guestbook-item-->
        <div class="w-guestbook-item w-placeholder w-item-textarea">
            <textarea class="w-guestbook-textarea" placeHolder="留言内容" autocomplete="off" name="Message"></textarea>
        </div>
        <!--/w-guestbook-item-->
        <!--w-guestbook-item-->
        <div class="w-guestbook-code f-clearfix">
            <div class="w-guestbook-item w-placeholder">
                <input type="text" class="w-guestbook-input" placeHolder="验证码" autocomplete="off" name="Captcha"/>
            </div>
            <div class="w-guestbook-codeimg"><img src="static/picture/code.png" alt="验证码"></div>
        </div>
        <!--/w-guestbook-item-->

    </div>
    <!--/w-guestbook-container-->
    <!--w-guestbook-bottom-->
    <div class="w-guestbook-bottom f-clearfix">
        <a href="javascript:void(0)" class="w-guestbook-btn" name="Submit">提交</a>
    </div>
    <!--/w-guestbook-bottom-->

</div>
<!--/w-guestbook-->


<script type="text/javascript">
    $(function () {

        $('#smv_con_104_31').smartNPLeavewordControl({ controlId: 'smv_con_104_31', emptyPrefix:'请输入', correctMailPrefix: '请输入正确的', contentMaxLength: '不能超过200个字符', postSucess: '提交成功', postFail: '提交失败', correctMailValidate:'请输入正确格式的邮箱！'});

    });

    (function () {
        // JPlaceHolder
        JPlaceHolder(leavewordPlaceHolder);
        function leavewordPlaceHolder() {
            var placeHeight = $(".w-guestbook-item.w-placeholder .placeholder-text .placeholder-text-in").height();
            $(".w-guestbook-item.w-placeholder .placeholder-text .placeholder-text-in").css("lineHeight", placeHeight + "px");
        }

    })(jQuery);
</script></div></div>                                                    </div>
                    </div>
                </div>
            </li>
    </ul>
</div>
<script type="text/javascript">
    $(function () {
        $("#mc_con_98_31>ul >li.w-columns-item").hover(function () {
            $("#smv_con_98_31").attr("selectArea", $(this).attr("data-area"));
        });
        $("#smv_con_98_31").attr("selectArea", "columnArea2");



        var resize = function () {
            var mc = $("#mc_con_98_31.fullScreen");
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
</script></div></div></div></div><input type='hidden' name='__RequestVerificationToken' id='token__RequestVerificationToken' value='NPUlgNbv2DxqIr4kbsQQ7Mfn9uSRaTpUsIHOdEXeS91LcUQkuRljwfZiih_Evsl2mK18s-OrTVORFLSbqozCWW3hOXGtklQ0WDRn4pb0HCo1' />
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
            setCurrentPageTitle('联系我们', 2);
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
