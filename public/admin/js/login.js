layui.use(['form', 'button', 'popup','http'], function() {
  var form = layui.form;
  var button = layui.button;
  var popup = layui.popup;
  var http = layui.http;

  // 登 录 提 交
  form.on('submit(login)', function(data) {

    /// 验证

    /// 登录

    /// 动画
    button.load({
      elem: '.login',
      time: 1500,
      done: function() {
          http.ajax({
              url: '/admin/login',
              data: JSON.stringify(data.field),
              success: function (response) {
                  if (response.status === 'success') {
                      popup.success(response.message, function () {
                          location.href = "/admin/home"
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
    })
    return false;
  });
})
