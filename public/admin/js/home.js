layui.use(['admin', 'popup', 'context'], function () {
  var admin = layui.admin;
  var popup = layui.popup;

  var layadmin = JSON.parse(layui.context.get('layadmin'));

  admin.render(layadmin.page.components);

  // 登出逻辑
  admin.logout(function () {
    popup.success("注销成功", function () {
      location.href = "login.html";
    })
    // 注销逻辑 返回 true / false
    return true;
  })

  // 初始化消息回调
  admin.message();

  // 实现消息回调 [消息列表点击事件]
  // admin.message(function(id, title, context, form) {});
})
