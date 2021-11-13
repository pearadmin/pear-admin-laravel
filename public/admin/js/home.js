layui.use(['admin', 'popup', 'context','http'], function () {
    var admin = layui.admin;
    var popup = layui.popup;
    var http = layui.http;

    var layadmin = JSON.parse(layui.context.get('layadmin'));

    admin.render(layadmin.page.components);

    // 登出逻辑
    admin.logout(function () {
        http.ajax({
            url: '/admin/logout',
            type: 'DELETE',

            success: function (response) {
                if (response.status === 'success') {
                    popup.success(response.message, function () {
                        location.href = "/admin/login";
                    })
                } else {
                    popup.failure(response.message);
                }
            },
            error: function (e, code) {
                http.ajax.logError(e)
            }
        })

        // 注销逻辑 返回 true / false
        return true;
    })

    // 初始化消息回调
    admin.message();

    // 实现消息回调 [消息列表点击事件]
    // admin.message(function(id, title, context, form) {});
})
