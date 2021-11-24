layui.use(['table', 'http', 'popup'], function () {
  let table = layui.table;
  let http = layui.http;
  let popup = layui.popup;
  let tableUniqueId = 'system-route-index';

  table.on('toolbar(system-route-index)', function (obj) {
    if (obj.event === 'sync') {
      actions.sync();
    }
  });

  let actions = {
    sync: function () {
      http.ajax({
        url: '/api/routes/',
        type: "put",
        success: function (response) {
          if (response.status === 'success') {
            popup.success(response.message, function () {
              table.reload(tableUniqueId);
            });
          } else {
            popup.failure(response.message);
          }
        },
        error: function (e, code) {
          http.ajax.logError(e)
        }
      })
    },
    refresh: function () {
      table.reload(tableUniqueId);
    }
  }
})
