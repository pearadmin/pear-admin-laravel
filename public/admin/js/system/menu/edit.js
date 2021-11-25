layui.use(['form', 'http', 'popup', 'context'], function () {
  let form = layui.form;
  let http = layui.http;
  let popup = layui.popup;
  let context = layui.context;

  let actions = {
    setup: function () {
      // this.fetchProjectPotions();
      // this.fetchEnv()
    },
    fetchData: function () {
      http.ajax({
        url: '/api/menus/' + layadmin.request.id,
        type: 'get',
        success: function (response) {
          if (response.status === 'success') {
            let data = response.data

            form.val('system-menu-edit', {
              name: data.name,
              desc: data.desc,
              git_repository: data.git_repository,
              git_branch: data.git_branch,
              keep_releases: data.keep_releases,
              deploy_path: data.deploy_path,
            })

          } else {
            popup.failure(response.message);
          }
        },
        error: function (e, code) {
          http.ajax.logError(e)
        }
      })
    },
    updateMenu: function (data) {
      http.ajax({
        url: '/envs/' + layadmin.request.id,
        data: JSON.stringify(data.field),
        type: 'put',
        success: function (response) {
          if (response.status === 'success') {
            popup.success(response.message, function () {
              parent.layer.close(parent.layer.getFrameIndex(window.name));//关闭当前页
              parent.layui.table.reload("system-menu-index");
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
  }

  actions.setup();

  // 事件监听
  form.on('submit(system-menu-edit-submit)', function (data) {
    actions.updateMenu(data)
  });
})