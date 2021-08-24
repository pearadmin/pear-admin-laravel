;
(function ($, window, document, undefined) {
    $.fn.jqueryzoom = function (options) {
        var settings = {
            xzoom: 110,
            yzoom: 110,
            offset: 10,
            position: "right",
            preload: 1,
            clickAction: null,
            hover: null,
            hoverout:null,
        };
        if (options) {
            $.extend(settings, options);
        }
        var noalt = '';
        var self = this;
        $(this).children('img').bind("mouseenter", function (ev) {
            var imageLeft = $(this).offset().left;
            var imageTop = $(this).offset().top;
            var imageWidth = $(this).get(0).offsetWidth;
            var imageHeight = $(this).get(0).offsetHeight;
            var boxLeft = $(this).parent().offset().left;
            var boxTop = $(this).parent().offset().top;
            var boxWidth = $(this).parent().width();
            var boxHeight = $(this).parent().height();
            noalt = $(this).attr("alt");
            var bigimage = $(this).attr("longdesc");
            if ($("div.zoomDiv").get().length == 0) {
                $(document.body).append("<div class='zoomDiv'><img class='bigimg' src='" + bigimage + "'/></div><div class='zoomMask'>&nbsp;</div>");
                if (typeof settings.hover == "function") {
                    settings.hover();
                }
                var g = this;
                if (!$(this).closest("a").attr("href") || $(this).closest("a").attr("href") =="javascript:void(0)"){
                    if (settings.clickAction) {
                        if (!$("div.zoomMask").attr("onclick")) {
                            $("div.zoomMask").click(settings.clickAction);
                        }
                    }
                } else {
                    $("div.zoomMask").click(function () {
                        var el = $(g).closest("a")[0];
                        var target = $(g).closest("a").attr("target");
                        el.target = target; //指定在新窗口打开
                        el.click();//触发打开事件
                    });
                }
            }
            if (settings.position == "right") {
                if (boxLeft + boxWidth + settings.offset + settings.xzoom > screen.width) {
                    leftpos = boxLeft - settings.offset - settings.xzoom;
                } else {
                    leftpos = boxLeft + boxWidth + settings.offset;
                }
            } else {
                leftpos = imageLeft - settings.xzoom - settings.offset;
                if (leftpos < 0) {
                    leftpos = imageLeft + imageWidth + settings.offset;
                }
            }
            $("div.zoomDiv").css({
                top: boxTop,
                left: leftpos
            });
            $("div.zoomDiv").width(settings.xzoom);
            $("div.zoomDiv").height(settings.yzoom);
            $("div.zoomDiv").show();
            $(this).css('cursor', 'crosshair');
            $(document.body).mousemove(function (e) {
                mouse = new MouseEvent(e);
                if (mouse.x < boxLeft || mouse.x > boxLeft + boxWidth || mouse.y < boxTop || mouse.y > boxTop + boxHeight) {
                    mouseOutImage();
                    return;
                }
                var bigwidth = $(".bigimg").get(0).offsetWidth;
                var bigheight = $(".bigimg").get(0).offsetHeight;
                var scaley = 'x';
                var scalex = 'y';
                if (isNaN(scalex) | isNaN(scaley)) {
                    var scalex = (bigwidth / imageWidth);
                    var scaley = (bigheight / imageHeight);
                    var nw = (settings.xzoom) / scalex;
                    if (nw > imageWidth) {
                        nw = imageWidth;
                    }
                    var nh = (settings.yzoom) / scaley;
                    if (nh > imageHeight) {
                        nh = imageHeight;
                    }
                    $("div.zoomMask").width(80);
                    $("div.zoomMask").height(80);
                    $("div.zoomMask").css('visibility', 'visible');
                }
                xpos = mouse.x - $("div.zoomMask").width() / 2;
                ypos = mouse.y - $("div.zoomMask").height() / 2;
                xposs = mouse.x - $("div.zoomMask").width() / 2 - imageLeft;
                yposs = mouse.y - $("div.zoomMask").height() / 2 - imageTop;
                xpos = (mouse.x - $("div.zoomMask").width() / 2 < imageLeft) ? imageLeft : (mouse.x + $("div.zoomMask").width() / 2 > imageWidth + imageLeft) ? (imageWidth + imageLeft - $("div.zoomMask").width()) : xpos;
                ypos = (mouse.y - $("div.zoomMask").height() / 2 < imageTop) ? imageTop : (mouse.y + $("div.zoomMask").height() / 2 > imageHeight + imageTop) ? (imageHeight + imageTop - $("div.zoomMask").height()) : ypos;
                $("div.zoomMask").css({
                    top: ypos,
                    left: xpos
                });
                $("div.zoomDiv").get(0).scrollLeft = xposs * scalex;
                $("div.zoomDiv").get(0).scrollTop = yposs * scaley;

            });
        });

        function mouseOutImage() {
            if (typeof settings.hoverout == "function") {
                settings.hoverout();
            }
            $(self).attr("alt", noalt);
            $(document.body).unbind("mousemove");
            $("div.zoomMask").remove();
            $("div.zoomDiv").remove();
        }
        count = 0;
        if (settings.preload) {
            $('body').append("<div style='display:none;' class='jqPreload" + count + "'></div>");
            $(this).each(function () {
                var imagetopreload = $(this).find("img").attr("longdesc");
                var content = jQuery('div.jqPreload' + count + '').html();
                jQuery('div.jqPreload' + count + '').html(content + '<img src=\"' + imagetopreload + '\">');
            });
        }
    }
})(jQuery, window, document);
function MouseEvent(e) { this.x = e.pageX; this.y = e.pageY; }