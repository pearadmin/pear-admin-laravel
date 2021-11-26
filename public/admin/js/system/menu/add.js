layui.use(['form', 'http', 'popup', 'context', 'icon','dtree'], function () {
  let form = layui.form;
  let http = layui.http;
  let popup = layui.popup;
  let icon = layui.icon;
  let dtree = layui.dtree;

  icon.render({
    elem: '#icon',
    style: 'color: #5FB878;',
    placeholder: '',
    isSplit: true,
    page: false,
    search: true
  });

  let actions = {
    setup: function () {
      this.fetchMenuTypeOptions();
      this.fetchMenuOpenTypeOptions();
      this.fetchMenuTree();
    },
    fetchMenuTypeOptions: function () {
      http.ajax({
        url: '/api/options/menuType',
        type: 'get',
        success: function (response) {
          if (response.status === 'success') {
            layui.each(response.data, function (key, item) {
              layui.$('#type').append(new Option(item.name, item.value))
              form.render('select')
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
    fetchMenuOpenTypeOptions: function () {
      http.ajax({
        url: '/api/options/menuOpenType',
        type: 'get',
        success: function (response) {
          if (response.status === 'success') {
            layui.each(response.data, function (key, item) {
              // 渲染下拉单选
              layui.$('#open_type').append(new Option(item.name, item.value))
              form.render('select')
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
    fetchMenuTree: function () {
      dtree.render({
        elem: "#p_id",
        initLevel: "1",
        method: 'get',
        url: "/api/options/menuTree?type=dtree",
        select: true,
        dataStyle:"layuiStyle",
      });
    },
    addMenu: function (data) {
      let reqData = {
        title:data.field.title,
        type:data.field.type,
        href:data.field.href,
        icon:data.field.icon,
        open_type:data.field.open_type,
        sort:data.field.sort,
        p_id:data.field.p_id_select_nodeId,
      }

      http.ajax({
        url: '/api/menus',
        data: JSON.stringify(reqData),
        success: function (response) {
          if (response.status === 'success') {
            popup.success(response.message, function () {
              parent.layer.close(parent.layer.getFrameIndex(window.name));//关闭当前页
              top.layui.admin.refreshThis()
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
  form.on('submit(system-menu-add-submit)', function (data) {
    actions.addMenu(data)
  });

  form.on('select(type)', function (data) {
    layui.$("div[data-id=p_id]").toggleClass('layui-hide');
    layui.$("div[data-id=icon]").toggleClass('layui-hide');
    layui.$("div[data-id=href]").toggleClass('layui-hide');
    layui.$("div[data-id=open_type]").toggleClass('layui-hide');
  });
})