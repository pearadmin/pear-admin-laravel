layui.use(['form', 'button', 'popup', 'http', 'sliderVerify'], function () {
    if (window !== top) {
        top.location.href = location.href;
    }

    var form = layui.form;
    var button = layui.button;
    var popup = layui.popup;
    var http = layui.http;

    var sliderVerify = layui.sliderVerify;

    var slider = sliderVerify.render({
        elem: '#slider',
    })

    // 登 录 提 交
    form.on('submit(login)', function (data) {

        /// 验证

        /// 登录

        /// 动画
        if (slider.isOk()) {
            button.load({
                elem: '.login',
                time: 1500,
                done: function () {
                    http.ajax({
                        url: '/login',
                        data: JSON.stringify(data.field),
                        success: function (response) {
                            if (response.status === 'success') {
                                popup.success(response.message, function () {
                                    location.href = layadmin.path.home
                                });
                            } else {
                                popup.failure(response.message);
                            }
                        },
                        error: function (e, code) {
                            http.ajax.logError(e)
                        }
                    })
                }
            });
        }else{
            layer.msg("请先通过滑块验证");
        }

        return false;
    });
})
